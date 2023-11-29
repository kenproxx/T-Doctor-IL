<?php

namespace App\Http\Controllers\connect;

use App\Http\Controllers\Controller;
use App\Models\ConnectCallVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Pusher\Pusher;

class CallVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index3()
    {
        return view('admin.connect.video.index-materu');
    }


    public function createMeeting(Request $request)
    {

        $METERED_DOMAIN = env('METERED_DOMAIN');
        $METERED_SECRET_KEY = env('METERED_SECRET_KEY');


        // Contain the logic to create a new meeting
        $response = Http::post("https://{$METERED_DOMAIN}/api/v1/room?secretKey={$METERED_SECRET_KEY}", [
            'autoJoin' => true
        ]);

        $roomName = $response->json("roomName");

        $connect = ConnectCallVideo::where('user_id_1', Auth::user()->id)->orWhere('user_id_2',
            Auth::user()->id)->first();

        $data['from'] = Auth::user()->name;
        $data['to'] = $request->input('user_id_2');
        $data['content'] = route('joinMeeting', ['meetingId' => $connect->room_name]);

        $options = array(
            'cluster' => 'ap1',
            'encrypted' => true
        );

        $pusher = new Pusher(env('PUSHER_APP_KEY'), env('PUSHER_APP_SECRET'), env('PUSHER_APP_ID'), $options);

        $pusher->trigger('send-message', 'send-message', $data);

        if ($connect) {
            return redirect(route('joinMeeting', ['meetingId' => $connect->room_name])); // We will update this soon
        } else {
            $connect = new ConnectCallVideo();
            $connect->room_name = $roomName;
            $connect->user_id_1 = $request->input('user_id_1');
            $connect->user_id_2 = $request->input('user_id_2');
            $connect->save();
            return redirect(route('joinMeeting', ['meetingId' => $roomName])); // We will update this soon.
        }
    }

    public function validateMeeting(Request $request)
    {
        $METERED_DOMAIN = env('METERED_DOMAIN');
        $METERED_SECRET_KEY = env('METERED_SECRET_KEY');

        $meetingId = $request->input('meetingId');

        // Contains logic to validate existing meeting
        $response = Http::get("https://{$METERED_DOMAIN}/api/v1/room/{$meetingId}?secretKey={$METERED_SECRET_KEY}");

        $roomName = $response->json("roomName");


        if ($response->status() === 200) {
            return redirect(route('joinMeeting', ['meetingId' => $roomName])); // We will update this soon
        } else {
            return redirect("/?error=Invalid Meeting ID");
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
