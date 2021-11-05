<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function add(Request $request, $card_id) {
        $comment_text = $request->input('comment_text');

        $comment = new Comment();
        $comment->card_id = $card_id;
        $comment->comment_text = $comment_text;
        $comment->save();
        return response()->json($comment, 201);
    }


    public function like($comment_id) {
        $comment = Comment::find($comment_id);
        $comment->comment_likes++;
        $comment->save();
        return response()->json($comment, 200);
    }

    public function dislike($comment_id) {
        $comment = Comment::find($comment_id);
        $comment->comment_dislikes++;
        $comment->save();
        return response()->json($comment, 200);
    }

    public function delete($comment_id) {
        $comment = Comment::find($comment_id);
        $comment->delete();
        return response("Successfully deleted", 200);
    }
}
