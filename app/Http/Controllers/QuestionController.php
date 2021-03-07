<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        return view('questions.index', [
            'questions' => Question::with(['author', 'answers'])->get()
        ]);
    }

    public function show($question)
    {
        return view('questions.show', [
            'question' => Question::with(['author', 'answers'])->find($question)
        ]);
    }
}
