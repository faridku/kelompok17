<?php

namespace App\Http\Controllers;

use App\Answer;
use Illuminate\Http\Request;
use App\Question;
use App\Models\Tag;
use App\Comment;
use Illuminate\Support\Facades\Auth;

// sweet alert
use RealRashid\SweetAlert\Facades\Alert;



class QuestionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }
    public function index()
    {
        $list = Question::orderBy('created_at', 'desc')->get();
        return view('questions.index', compact('list'));
    }


    public function create()
    {
        return view('questions.create');
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'isi'    => 'required',
            'judul'    => 'required',
            // 'user_id'    => 'required',
        ]);
        // to question
        $question = new Question;
        $question->judul = $request->judul;
        $question->isi = $request->isi;
        $question->user_id = Auth::id();
        $question->save();

        // tag
        $arrTag = explode(',', $request->tags);
        $tags = [];
        foreach ($arrTag as $strTag) {
            $tagArrAssoc['tag_name'] = $strTag;
            $tags[] = $tagArrAssoc;
        }
        foreach ($tags as $tagCheck) {
            $insertTag = Tag::firstOrCreate($tagCheck);
            $question->tags()->attach($insertTag->id);
        }
        Alert::success('Success', 'Question has been saved');
        return redirect('question');
    }

    public function show($id)
    {
        $list = Question::all();
        $question = $list->find($id);
        $comment = Comment::all();
        $answer  = $question->answer()->orderBy('created_at', 'desc')->get();
        // dd($answer);
        return view('questions.show', compact('question', 'answer', 'comment'));
    }

    public function edit($id)
    {
        $list = Question::all();
        $question = $list->find($id);
        return view('questions.edit', compact('question'));
    }

    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'isi'    => 'required',
            'judul'    => 'required',
        ]);
        $question = Question::find($id);

        $question->judul = $request['judul'];
        $question->isi = $request['isi'];

        $question->save();
        Alert::success('Success', 'Question has been updated');
        return redirect('question');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = Question::find($id);
        $question->tags()->detach();
        $answer = Answer::where('question_id', $id)->delete();
        // $comment = Comment::find($id);
        // $comment->comment()->detach();
        $question->delete();
        Alert::error('Destroy', 'Question has been deleted');
        return redirect('question');
    }
}
