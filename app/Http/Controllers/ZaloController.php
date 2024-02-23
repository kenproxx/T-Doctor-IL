<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Zalo\Builder\MessageBuilder;
use Zalo\Util\PKCEUtil;
use Zalo\Zalo;
use Zalo\ZaloEndPoint;

class ZaloController extends Controller
{
    protected $app_id = '4088853414878610478';
    protected $app_secret = 'T16EKXcI7mgrP3ACX0KY';
    protected $app_redirect = 'https%3A%2F%2Fkrmedi.vn%2Fzalo-service%2Fcallback';
    protected $app_url_permission = 'https://oauth.zaloapp.com/v4/oa/permission';
    protected $app_url_token = 'https://oauth.zaloapp.com/v4/oa/access_token';
    protected $app_url_get_follower = 'https://openapi.zalo.me/v2.0/oa/getfollowers';

    public function main()
    {
        $config = array(
            'app_id' => $this->app_id,
            'app_secret' => $this->app_secret
        );
        $zalo = new Zalo($config);

        return $zalo;
    }

    public function getAuthCode()
    {
        $url = $this->getLoginUrlOA();
        return redirect($url);
    }

    public function getParameter(Request $request)
    {
        $parameters = $request->all();
        $code = $parameters['code'];

        $url_redirect = route('zalo.service.token') . '?code=' . $code;
        return redirect($url_redirect);
    }

    public function getToken(Request $request)
    {
        $code = $request->input('code');
        $array_token = $this->getAccessToken($code);
        $dataToken = null;
        if ($array_token['status'] == 200) {
            $dataToken = $array_token['data'];
        }
        $array = json_decode($dataToken, true);
        if (isset($array['access_token'])) {
            $expiration_time = time() + $array['expires_in'];
            setCookie('access_token_zalo', $array['access_token'], $expiration_time, '/');
            setCookie('refresh_token_zalo', $array['refresh_token'], $expiration_time, '/');
        }
        return redirect(route('home'));
    }

    public function getFollower()
    {
        $data = [
            'data' => json_encode([
                'offset' => 0,
                'count' => 50
            ])
        ];
        $accessToken = $_COOKIE['access_token_zalo'] ?? null;
        $response = $this->main()->get(ZaloEndPoint::API_OA_GET_LIST_FOLLOWER, $accessToken, $data);
        return $response->getDecodedBody();
    }

    public function sendMessage(Request $request)
    {

    }

    public function sendMessagePicture(Request $request)
    {

    }

    public function sendMessageText(Request $request)
    {

    }

    private function getLoginUrlOA()
    {
        $url = $this->app_url_permission;

        $codeChallenge = '';
        $state = '';

        $app_id_url = '?app_id=' . $this->app_id;
        $redirect_url = '&redirect_uri=' . $this->app_redirect;
        $challenge_url = '&code_challenge=' . $codeChallenge;
        $state_url = '&state=' . $state;

        return $url . $app_id_url . $redirect_url;
    }

    private function getAccessToken($code)
    {
        try {
            $client = new Client();

            $response = $client->post($this->app_url_token, [
                'headers' => [
                    'secret_key' => $this->app_secret,
                    'Content-Type' => 'application/x-www-form-urlencoded',
                ],
                'form_params' => [
                    'code' => $code,
                    'app_id' => $this->app_id,
                    'grant_type' => 'authorization_code',
                ],
            ]);

            return [
                'data' => $response->getBody()->getContents(),
                'status' => 200,
            ];
        } catch (\Exception $exception) {
            return [
                'data' => $exception->getMessage(),
                'status' => 500,
            ];
        }
    }
}
