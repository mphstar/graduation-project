<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Major;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        // return Auth::user();
        return view('pages.teacher.profile', [
            "user" => Auth::user(),
            "major" => Major::all()
        ]);
    }

    public function update_profile(Request $request){
        $user = User::find(Auth::user()->id);

        // $user->email = $request->
    }
}
