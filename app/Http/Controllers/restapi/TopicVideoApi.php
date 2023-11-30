<?php

namespace App\Http\Controllers\restapi;

use App\Enums\TopicVideoStatus;
use App\Http\Controllers\Controller;
use App\Models\TopicVideo;

class TopicVideoApi extends Controller
{
    public function getAll()
    {
        $topics = TopicVideo::where('status', TopicVideoStatus::ACTIVE)
            ->orderBy('id', 'desc')
            ->get();
        return response()->json($topics);
    }

    public function getAllByUserID($id)
    {
        $topics = TopicVideo::where('status', TopicVideoStatus::ACTIVE)
            ->where('user_id', $id)
            ->orderBy('id', 'desc')
            ->get();
        return response()->json($topics);
    }

    public function detail($id)
    {
        $topic = TopicVideo::find($id);
        if (!$topic || $topic->status != TopicVideoStatus::ACTIVE) {
            return response('Not found!', 404);
        }
        return response()->json($topic);
    }
}
