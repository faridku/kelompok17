<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;
use App\Comment;
use App\Question;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AnswerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
    }

    public function create($id)
    {
        $question = Question::where('id', $id)->first();
        return view('answers.create', compact('question'));
    }

    public function store(Request $request, $question_id)
    {
        $this->validate(request(), [
            'isi'    => 'required',
        ]);
        //insert ke answer
        $answer = new Answer;
        $answer->isi = $request->isi;
        $answer->question_id = $question_id;
        $answer->user_id = Auth::id();
        $answer->save();
        Alert::success('Success', 'Answer has been saved');
        return redirect('/question/' . $request->question_id);
    }

    public function show($id)
    {
        //
    }
    public function edit(Request $request, $id)
    {
        $answer = Answer::find($id);
        $question = Question::find($answer->question_id)->first();
        return view('answers.edit', compact('answer', 'question'));
    }

    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'isi'    => 'required',
        ]);
        $answer = Answer::find($id);

        $answer->isi = $request->isi;
        $answer->save();
        Alert::success('Success', 'Answer has been updated');
        return redirect('/question/' . $request->question_id);
    }

    public function destroy(Request $request, $id)
    {

        $comment = Comment::where('answer_id', $id)->delete();
        $answer = Answer::find($id);
        $answer->delete();

        Alert::error('Destroy', 'Answer has been deleted');
        return redirect('/question/' . $request->question_id);
    }
    public function verify($id, Request $request)
    {
        $answerAll = Answer::all();
        foreach ($answerAll as $all) {
            $all->check = 0;
            $all->save();
        }
        $answer = Answer::find($id);
        $answer->check = 1;
        $answer->save();
        Alert::info('The Answer', 'Verified');
        return redirect('/question/' . $answer->question_id);
    }
}
