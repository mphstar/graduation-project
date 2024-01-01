<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\BroadcastMessageStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BroadcastController extends Controller
{
    public function index(Request $request)
    {
        $broadcast = BroadcastMessageStudent::where('teacher_id', Auth::user()->student->teacher_id)->orderBy('created_at', 'desc')->get();
        if ($request->has('search')) {
            $broadcast = BroadcastMessageStudent::where('title', 'LIKE', '%' . $request->query('search') . '%')->where('teacher_id', Auth::user()->student->teacher_id)->orderBy('created_at', 'desc')->get();
        }
        return view('pages.student.broadcast', [
            "broadcast" => $broadcast
        ]);
    }
}
