<?php

namespace App\Http\Controllers;

use App\Enums\ShortVideoStatus;
use App\Models\ShortVideo;
use Illuminate\Support\Facades\DB;

class ShortVideoController extends Controller
{
    public function showVideo()
    {
        $videos = DB::table('short_videos')
            ->join('users', 'users.id', '=', 'short_videos.user_id')
            ->where('short_videos.status', ShortVideoStatus::ACTIVE)
            ->orderBy('short_videos.id', 'desc')
            ->select('short_videos.*', 'users.username', 'users.name', 'users.avt')
            ->paginate(3);
        return view('short-video.list-video', compact('videos'));
    }

    public function detail($id)
    {
        $video = ShortVideo::find($id);
        return view('short-video.detail-video', compact('video'));
    }
}
