<?php

namespace App\Http\Controllers\Admin;

use App\Mail\GuestbookMail;
use App\Http\Controllers\Controller;
use App\Models\Mentoring;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Models\Teacher;
use RealRashid\SweetAlert\Facades\Alert;

class AdminMentoringController extends Controller
{
    public function index()
    {
        $mentors = Mentoring::all();
        return view('admin.admin-mentoring', compact('mentors'));
    }

    public function remindTeacher(Request $request, $teacherId = null)
    {
        $teacherId = $teacherId ?? $request->input('teacher_id');

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            Alert::error('Failed', $validator->errors()->first());
            return redirect()->back()->withErrors($validator);
        }

        $teacher = Teacher::find($teacherId);

        if (!$teacher) {
            Alert::error('Failed', 'Teacher not found.');
            return redirect()->back();
        }

        $fixedMessage = 'Please promptly answer your mentee`s questions.';

        $email = new GuestbookMail($request->name, $request->email, $fixedMessage);
        Mail::to(env('Admin', $teacher->user->email))->send($email);

        Alert::success('Success', 'Success send');
        return redirect()->back();
    }
}
