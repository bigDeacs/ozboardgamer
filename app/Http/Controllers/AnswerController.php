<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\AnswerRequest;
use App\Answer;
use Image;
use App\Http\Controllers\Controller;

class AnswerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($quizId, $questionId)
    {
        $answers = Answer::where('question_id', '=', $questionId);
        return view('answers.index', compact('answers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($quizId, $questionId)
    {
        $question = Question::where('id', '=', $questionId)->firstOrFail();
        $results = Result::where('quiz_id', '=', $quizId)->where('status', '=', '1')->lists('name', 'id');
        return view('answers.create', compact('question'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnswerRequest $request, $quizId, $questionId)
    {
        $answer = Answer::create($request->all());
        
        return redirect('/admin/quizzes/'.$quizId.'/questions/'.$questionId.'/answers');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $answer = Answer::where('id', '=', $id)->firstOrFail();
        return view('answers.show', compact('answer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($quizId, $questionId, $id)
    {
        $question = Question::where('question_id', '=', $questionId);
        $answer = Answer::where('id', '=', $id)->firstOrFail();
        $results = Result::where('quiz_id', '=', $quizId)->where('status', '=', '1')->lists('name', 'id');
        return view('answers.edit', compact('answer', 'question', '$results'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AnswerRequest $request, $quizId, $questionId, $id)
    {
        $answer = Answer::where('id', '=', $id)->firstOrFail();
        $answer->update($request->all());
        $answer->save();

        return redirect('/admin/quizzes/'.$quizId.'/questions/'.$questionId.'/answers');
    }

    public function activate($quizId, $questionId, $id)
    {
        $answer = Answer::find($id);
        $answer->status = 1;
        $answer->save();

        return redirect('/admin/quizzes/'.$quizId.'/questions/'.$questionId.'/answers');
    }

    public function deactivate($quizId, $questionId, $id)
    {
        $answer = Answer::find($id);
        $answer->status = 0;
        $answer->save();

        return redirect('/admin/quizzes/'.$quizId.'/questions/'.$questionId.'/answers');
    }
}
