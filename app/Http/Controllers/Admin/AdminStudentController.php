<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminStudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('admin.admin-student-list', compact('students'));
    }

    public function update(Request $request)
    {
        // Validate the request
        $request->validate([
            'update_first_name' => 'required|string|max:255',
            'update_last_name' => 'required|string|max:255',
            'update_student_id' => 'required|string|max:255',
        ]);

        // Find the teacher
        $teacher = Student::findOrFail($request->id);

        // Update teacher fields
        $teacher->first_name = $request->update_first_name;
        $teacher->last_name = $request->update_last_name;
        $teacher->student_id = $request->update_student_id;

        // Save the teacher
        $teacher->save();

        Alert::success('Success', 'Success update profile');
        return redirect()->route('admin-student')->with('success', 'Students updated successfully');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('admin-student')->with('success', 'Students deleted successfully');
    }
}
