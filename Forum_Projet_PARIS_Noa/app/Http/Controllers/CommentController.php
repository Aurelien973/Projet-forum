<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Topic;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Topic $topic)
    {
        request()->validate([
            'content' => 'required|min:3'
        ]);

        $comment = new Comment();
        $comment->content = request('content');
        $comment->user_id = auth()->user()->id;

        $topic->comments()->save($comment);

        return redirect()->route('topics.show', $topic);

    }

    public function storeCommentReply(Comment $comment)
    {
        request()->validate([
            'replyComment' => 'required|min:3'
        ]);

        $commentReply = new Comment();
        $commentReply->content = request('replyComment');
        $commentReply->user_id = auth()->user()->id;

        $comment->comments()->save($commentReply);
        return redirect()->back();
    }
}
