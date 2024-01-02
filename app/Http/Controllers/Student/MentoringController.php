<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Mentoring;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class MentoringController extends Controller
{
    public function index(Request $request)
    {
        $mentoring = Mentoring::where('student_id', Auth::user()->student->id)->orderBy('created_at', 'desc')->get();

        if ($request->has('search')) {
            $mentoring = Mentoring::where('question', 'LIKE', '%' . $request->query('search') . '%')->where('student_id', Auth::user()->student->id)->orderBy('created_at', 'desc')->get();
        }
        return view('pages.student.mentoring', [
            "mentoring" => $mentoring
        ]);
    }

    public function new_question(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'question' =>  'required',
            'question_file' => 'required'
        ]);

        if ($validator->fails()) {
            Alert::error('Failed', 'Failed add new question');
            return redirect()->back()->withErrors($validator);
        }

        $question = new Mentoring;
        $question->question = $request->question;
        $question->question_date = Carbon::now();
        $question->student_id = Auth::user()->student->id;

        $file = $request->file('question_file');
        if ($file) {
            $name_file = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/'), $name_file);
            $question->question_file_path = $name_file;
        }

        $question->save();

        Alert::success('Success', 'Success send new question');
        return redirect()->route('student.mentoring');
    }
}
