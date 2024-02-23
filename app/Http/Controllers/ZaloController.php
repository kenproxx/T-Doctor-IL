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
    protected $app_url_get_token = 'https://oauth.zaloapp.com/v4/oa/access_token';

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
        $accessToken = null;
        if ($array_token['status'] == 200) {
            $accessToken = $array_token['data'];
        }
        dd($array_token);
        return $accessToken;
    }

    protected function getParam($url)
    {
        $url_components = parse_url($url);
        $query = $url_components['query'];
        parse_str($query, $params);
        return $params;
    }

    public function sendMessage(Request $request)
    {
        $user_id = $request->input('user_id');
        $message = $request->input('message') ?? 'Message to....';
        $msgBuilder = new MessageBuilder(MessageBuilder::MSG_TYPE_TXT);
        $msgBuilder->withUserId($user_id);
        $msgBuilder->withText($message);

        $msgText = $msgBuilder->build();

        $zalo = $this->main();
        $accessToken = $this->getToken();

        $response = $zalo->post(ZaloEndPoint::API_OA_SEND_CONSULTATION_MESSAGE_V3, $accessToken, $msgText);
        $result = $response->getDecodedBody();
        return $result;
    }

    public function sendMessagePicture()
    {
        $msgBuilder = new MessageBuilder(MessageBuilder::MSG_TYPE_MEDIA);
        $msgBuilder->withUserId('user_id');
        $msgBuilder->withText('Message Image');
        $msgBuilder->withMediaUrl('https://stc-developers.zdn.vn/images/bg_1.jpg');

        $msgImage = $msgBuilder->build();

        $zalo = $this->main();
        $accessToken = $this->getToken();

        $response = $zalo->post(ZaloEndPoint::API_OA_SEND_CONSULTATION_MESSAGE_V3, $accessToken, $msgImage);
        $result = $response->getDecodedBody();
        return $result;
    }

    public function sendMessageText($phone)
    {
        $msgBuilder = new MessageBuilder('text');
        $msgBuilder->withUserId('494021888309207992');
        $msgBuilder->withText('Message Text');

        $zalo = $this->main();
        $accessToken = $this->getToken();

        $actionOpenSMS = $msgBuilder->buildActionOpenSMS($phone, 'Message Text');
        $msgBuilder->withButton('Open SMS', $actionOpenSMS);

        $msgText = $msgBuilder->build();

        $response = $zalo->post(ZaloEndPoint::API_OA_SEND_MESSAGE, $accessToken, $msgText);
        $result = $response->getDecodedBody();
        return $result;
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

            $response = $client->post($this->app_url_get_token, [
                'headers' => [
                    'secret_key' => $this->app_secret,
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'code' => $code,
                    'app_id' => $this->app_id,
                    'grant_type' => 'authorization_code',
                ],
            ]);

            return [
                'data' => $response,
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
