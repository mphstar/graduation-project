<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Mentoring;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class MentoringController extends Controller
{
    public function index(Request $request)
    {
        $student = Student::where('teacher_id', Auth::user()->teacher->id)->pluck('id');
        $mentoring = Mentoring::with('student')->whereIn('student_id', $student)->orderBy('created_at', 'desc')->get();


        if ($request->has('search')) {
            $mentoring = Mentoring::with('student')->where('question', 'LIKE', '%' . $request->query('search') . '%')->whereIn('student_id', $student)->orderBy('created_at', 'desc')->get();
        }
        return view('pages.teacher.mentoring', [
            "mentoring" => $mentoring
        ]);
    }

    public function answer(Request $request){
        $validator = Validator::make($request->all(), [
            'id' =>  'required',
            'answer' =>  'required',
            'answer_file' => 'required'
        ]);

        if ($validator->fails()) {
            Alert::error('Failed', 'Failed to answer question');
            return redirect()->back()->withErrors($validator);
        }

        $answer = Mentoring::find($request->id);
        $answer->answer = $request->answer;
        $answer->answer_date = Carbon::now();

        $file = $request->file('answer_file');
        if ($file) {
            $name_file = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/'), $name_file);
            $answer->answer_file_path = $name_file;
        }

        $answer->save();

        Alert::success('Success', 'Success send answer');
        return redirect()->route('teacher.mentoring');
    }
}
