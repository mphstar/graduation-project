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
            'update_major_id' => 'required|exists:major,id',
        ]);

        // Find the teacher
        $student = Student::findOrFail($request->id);

        // Update teacher fields
        $student->first_name = $request->update_first_name;
        $student->last_name = $request->update_last_name;
        $student->student_id = $request->update_student_id;
        $student->major_id = $request->update_major_id;

        // Save the teacher
        $student->save();

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
