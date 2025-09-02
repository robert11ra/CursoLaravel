<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function show(Question $question)
    {
        $userId = 1;
        $question->load([
            'user',
            'category',
            'answers' => fn($query) => $query->with([
                'user',
                'hearts' => fn($query) => $query->where('user_id', $userId),
                'comments' => fn($query) => $query->with([
                    'user',
                    'hearts' => fn($query) => $query->where('user_id', $userId)
                ])
            ]),
            'comments' => fn($query) => $query->with([
                'user',
                'hearts' => fn($query) => $query->where('user_id', $userId)
            ]),

            'hearts' => fn($query) => $query->where('user_id', $userId)

        ]);




        return view('questions.show', [
            'question' => $question
        ]);
    }

    public function destroy(Question $question)
    {
        $question->delete();

        return redirect()->route('home');
    }
}
