<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Comment;

class CommentController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'video_id'  => ['required', 'string', 'max:355'],
            'comment'   => ['string', 'max:655'],
        ]);


        $comment = Comment::create([
            'video_id'  => $request->video_id,
            'user_id'   => auth()->user()->user_id,
            'comment'   => $request->comment,
        ]);
        if ($comment)
            return redirect()->back();

        return redirect()->back()->withErrors(['message' => "Could not process your comment."]);
    }
}
