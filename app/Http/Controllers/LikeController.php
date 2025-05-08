<?php

namespace App\Http\Controllers;

use App\Http\Requests\likeRequest;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function postLike(likeRequest $request)
    {
        $userId = $request->user()->id;
        $postId = $request->id;
        global $response;
        $user_like = Like::where('post_id', $postId)->where('user_id', $userId)->first();
        if ($user_like) {
            $user_like->delete();
            $response = false;
        }
        else{
            $liked = Like::create([
                'post_id' => $postId,
                'user_id' => $userId,
            ]);
            if ($liked) {
                $response = true;
            }
            else{
                $response = "error";
            }
        }
        return response()->json($response);
    }
}
