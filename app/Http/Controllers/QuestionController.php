<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function show(Question $question)
    //public function show()
    {
        $question->load('answers','category', 'user');
        //$question = Question::with('answers','category', 'user')->findOrFail(request()->question);


        return view('questions.show', [
            'question' => $question
        ]);
    }
}
