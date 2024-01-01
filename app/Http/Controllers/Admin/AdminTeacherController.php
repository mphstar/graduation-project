<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\Rule;

class AdminTeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();
        return view('admin.admin-teacher-list', compact('teachers'));
    }

    public function addTeacher(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'teacher_id' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'level' => 'teacher',
        ]);

        $teacher = new Teacher([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'teacher_id' => $request->input('teacher_id'),
        ]);

        $user->teacher()->save($teacher);

        return redirect()->route('admin-teacher')->with('success', 'Teacher added successfully!');
    }

    public function update(Request $request)
    {
        // Validate the request
        $request->validate([
            'update_first_name' => 'required|string|max:255',
            'update_last_name' => 'required|string|max:255',
            'update_teacher_id' => 'required|string|max:255',
            'update_password' => 'nullable|string|min:8',
        ]);

        // Find the teacher
        $teacher = Teacher::findOrFail($request->id);

        // Update teacher fields
        $teacher->first_name = $request->update_first_name;
        $teacher->last_name = $request->update_last_name;
        $teacher->teacher_id = $request->update_teacher_id;

        // Save the teacher
        $teacher->save();

        // Find the user
        $user = User::findOrFail($teacher->id);

        // Update password only if provided
        if ($request->filled('update_password')) {
            $user->password = bcrypt($request->update_password);
        }

        // Save the user
        $user->save();

        Alert::success('Success', 'Success update profile');
        return redirect()->route('admin-teacher')->with('success', 'Teacher updated successfully');
    }

    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();

        return redirect()->route('admin-teacher')->with('success', 'Teacher deleted successfully');
    }
}
