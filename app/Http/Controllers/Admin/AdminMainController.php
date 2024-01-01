<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Mentoring;
use Illuminate\Http\Request;

class AdminMainController extends Controller
{
    public function index()
    {
        $totalQuestions = Mentoring::whereNotNull('question')->count();
        $totalAnswers = Mentoring::whereNotNull('answer')->count();
        return view('admin.admin-main', compact('totalQuestions', 'totalAnswers'));
    }
}
