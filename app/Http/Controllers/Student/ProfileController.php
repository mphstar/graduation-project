<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Major;
use App\Models\Student;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function index()
    {
        // return Auth::user();
        return view('pages.student.profile', [
            "user" => Auth::user(),
            "major" => Major::all()
        ]);
    }

    public function update_profile(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'first_name' =>  'required',
            'last_name' => 'required',
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore(Auth::user()->id)]
        ]);

        if ($validator->fails()) {
            Alert::error('Failed', $validator->errors()->first());
            return redirect()->back()->withErrors($validator);
        }


        $user = User::find(Auth::user()->id);

        $user->email = $request->email;
        $student = Student::where('user_id', $user->id)->first();
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->student_id = $request->student_id;
        $student->major_id = $request->major;
        $student->gender = $request->gender;
        $student->date_of_birth = $request->datebirth;

        $student->save();
        $user->save();

        Alert::success('Success', 'Success update profile');
        return redirect()->route('student.profile');
    }

    public function update_password(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'password' =>  'required|confirmed',
        ]);

        if ($validator->fails()) {
            Alert::error('Failed', $validator->errors()->first());
            return redirect()->back()->withErrors($validator);
        }


        $user = User::find(Auth::user()->id);

        $user->forceFill([
            'password' => Hash::make($request->password),
            'remember_token' => Str::random(60),
        ]);

        event(new PasswordReset($user));

        $user->save();

        Alert::success('Success', 'Success update profile');
        return redirect()->route('student.profile');
    }
}
