<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\QuizRequest;
use App\Quiz;
use Image;
use App\Http\Controllers\Controller;

class QuizController extends Controller
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
    public function index()
    {
        $quizzes = Quiz::all();
        return view('quizzes.index', compact('quizzes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('quizzes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuizRequest $request)
    {
        $quiz = Quiz::create($request->all());
        $quiz->thumb = '-thumb-' . $quiz->image;
        $quiz->save();

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
                $quiz->image = ('/uploads/' . $filename);
                $quiz->thumb = ('/uploads/' . $thumbname);
                $quiz->save();
            }
        }

        return redirect('/admin/quizzes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $quiz = Quiz::where('id', '=', $id)->with('questions')->with('results')->get();
        dd($quiz);
        return view('quizzes.show', compact('quiz'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quiz = Quiz::find($id);
        return view('quizzes.edit', compact('quiz'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuizRequest $request, $id)
    {
        $quiz = Quiz::where('id', '=', $id)->firstOrFail();
        $quiz->update($request->all());
        $quiz->save();

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
                $quiz->image = ('/uploads/' . $filename);
                $quiz->thumb = ('/uploads/' . $thumbname);
                $quiz->save();
            }
        }

        return redirect('/admin/quizzes');
    }

    public function activate($id)
    {
        $quiz = Quiz::find($id);
        $quiz->status = 1;
        $quiz->save();

        return redirect('/admin/quizzes');
    }

    public function deactivate($id)
    {
        $quiz = Quiz::find($id);
        $quiz->status = 0;
        $quiz->save();

        return redirect('/admin/quizzes');
    }
}
