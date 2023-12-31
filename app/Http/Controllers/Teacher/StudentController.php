<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $student = Student::with('major')->where('teacher_id', Auth::user()->teacher->id)->get();
        $selected_student = Student::with('major')->where('teacher_id', Auth::user()->teacher->id)->get();

        $unselected_student = Student::where('teacher_id', null)->get();


        if ($request->has('search')) {
            $student = Student::with('major')->where(function ($query) use ($request) {
                return $query->where('first_name', 'LIKE', '%' . $request->query('search') . '%')->orWhere('last_name', 'LIKE', '%' . $request->query('search') . '%');
            })->where('teacher_id', Auth::user()->teacher->id)->get();
        }

        return view('pages.teacher.student', [
            "student" => $student,
            "unselected_student" => $unselected_student,
            "selected_student" => $selected_student
        ]);
    }

    public function set_student(Request $request)
    {

        Student::where('teacher_id', Auth::user()->teacher->id)->update([
            "teacher_id" => null
        ]);

        if ($request->ids_selected) {
            foreach ($request->ids_selected as $key => $value) {
                Student::where('id', $value)->update([
                    "teacher_id" => Auth::user()->teacher->id
                ]);
            }
        }


        if ($request->ids_unselected) {
            foreach ($request->ids_unselected as $key => $value) {
                Student::where('id', $value)->update([
                    "teacher_id" => Auth::user()->teacher->id
                ]);
            }
        }



        Alert::success('Success', 'Success update student');
        return redirect()->route('teacher.student');
    }
}
