<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;

class AdminStudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('admin.admin-student-list', compact('students'));
    }
}
