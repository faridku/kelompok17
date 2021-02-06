<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $comment = new Comment;
        $comment->isi = $request->comment;
        $comment->user_id = Auth::id();
        $comment->question_id = $request->question_id;
        $comment->save();
        return redirect('/question/' . $request->question_id);
    }

    public function storeAnsComment(Request $request)
    {
        // dd($request->question_id);
        $comment = new Comment;
        $comment->isi = $request->comment;
        $comment->user_id = Auth::id();
        $comment->answer_id = $request->answer_id;

        $comment->save();
        return redirect('/question/' . $request->question_id);
    }

    public function destroy($id, Request $request)
    {
        $comment = Comment::find($id);
        // dd($comment->id);
        $comment->delete();

        return redirect('/question/' . $request->question_id);
    }

    public function destroyAnsComment(Request $request, $id)
    {
        $comment = Comment::find($id);
        $comment->delete();

        return redirect('/question/' . $request->question_id);
    }
}
