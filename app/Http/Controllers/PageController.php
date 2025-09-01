<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $questions = Question::with('category', 'user')->latest()->get();
        return view('pages.home', [
            'questions' => $questions
        ]);
    }   
}
