<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnswerController extends Controller
{
    public function store(Request $request, Question $question)
    {
        $request->validate([
            'content' => 'required|string|max:1900',
        ]);

        $question->answers()->create([
            'content' => $request->content,
            'user_id' => Auth::id(),
        ]);

        return back();
    }
}
