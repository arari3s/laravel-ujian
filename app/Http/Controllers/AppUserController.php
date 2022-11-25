<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppUserController extends Controller
{
    public function startQuiz()
    {
        return view('pages.quiz.quiz');
    }
}
