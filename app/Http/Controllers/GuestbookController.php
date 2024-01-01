<?php

namespace App\Http\Controllers;

use App\Mail\GuestbookMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class GuestbookController extends Controller
{
    public function guestbook(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' =>  'required',
            'email' => 'required',
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            Alert::error('Failed', $validator->errors()->first());
            return redirect()->back()->withErrors($validator);
        }



        $email = new GuestbookMail($request->name, $request->email, $request->message);
        Mail::to(env('MAIL_USERNAME', 'graduation@mphstar.my.id'))->send($email);

        Alert::success('Success', 'Success send');
        return redirect('/');
    }
}
