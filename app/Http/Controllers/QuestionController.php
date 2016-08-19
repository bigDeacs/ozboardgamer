<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\QuestionRequest;
use App\Question;
use App\Quiz;
use Image;
use App\Http\Controllers\Controller;

class QuestionController extends Controller
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
    public function index($quizId)
    {
        $questions = Question::where('quiz_id', '=', $quizId);
        return view('questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($quizId)
    {
        $quiz = Quiz::where('id', '=', $quizId);
        return view('questions.create', compact('quiz'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionRequest $request, $quizId)
    {
        $question = Question::create($request->all());
        $question->thumb = '-thumb-' . $question->image;
        $question->save();

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            if ($file->isValid())
            {
                $img = Image::make($file);
                $img->fit(400, 148);
                $img->interlace();
                $img->save(storage_path() . '/uploads/' . $thumbname = time() . '-thumb-' . $file->getClientOriginalName());

                $file->move(storage_path() . '/uploads/', ($filename = time() . '-' . $file->getClientOriginalName()));
                $question->image = ('/uploads/' . $filename);
                $question->thumb = ('/uploads/' . $thumbname);
                $question->save();
            }
        }

        return redirect('/admin/quizzes/'.$quizId.'/questions');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Question::where('id', '=', $id)->firstOrFail();
        return view('questions.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($quizId, $id)
    {
        $question = Question::where('id', '=', $id)->firstOrFail();
        $quiz = Quiz::where('id', '=', $quizId);
        return view('questions.edit', compact('question', '$quiz'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionRequest $request, $quizId, $id)
    {
        $question = Question::where('id', '=', $id)->firstOrFail();
        $question->update($request->all());
        $question->save();

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            if ($file->isValid())
            {
                $img = Image::make($file);
                $img->fit(400, 148);
                $img->interlace();
                $img->save(storage_path() . '/uploads/' . $thumbname = time() . '-thumb-' . $file->getClientOriginalName());

                $file->move(storage_path() . '/uploads/', ($filename = time() . '-' . $file->getClientOriginalName()));
                $question->image = ('/uploads/' . $filename);
                $question->thumb = ('/uploads/' . $thumbname);
                $question->save();
            }
        }

        return redirect('/admin/quizzes/'.$quizId.'/questions');
    }

    public function activate($quizId, $id)
    {
        $question = Question::find($id);
        $question->status = 1;
        $question->save();

        return redirect('/admin/quizzes/'.$quizId.'/questions');
    }

    public function deactivate($quizId, $id)
    {
        $question = Question::find($id);
        $question->status = 0;
        $question->save();

        return redirect('/admin/quizzes/'.$quizId.'/questions');
    }
}
