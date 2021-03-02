<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function show()
    {
        return view('questions', [
            'questions' => Question::with(['author', 'answers'])->get()
        ]);
    }
}
