<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    public function index()
    {
        return view('questions.index', [
            'questions' => Question::with(['author', 'answers'])->get()
        ]);
    }

    public function new()
    {
        return view('questions.new');
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'body'  => ['required', 'json',]
        ]);

        $question = new Question();
        $question->title = $data['title'];
        $question->body = $data['body'];
        $question->author()->associate(Auth::user());

        $question->save();
        return redirect()->route('questions.show', ['question' => $question->id]);
    }

    public function show($question)
    {
        return view('questions.show', [
            'question' => Question::with(['author', 'answers'])->find($question)
        ]);
    }
}
