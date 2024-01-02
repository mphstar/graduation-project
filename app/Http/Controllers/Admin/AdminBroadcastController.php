<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BroadcastMessage;
use RealRashid\SweetAlert\Facades\Alert;

class AdminBroadcastController extends Controller
{
    public function index()
    {
        $broadcastMessages = BroadcastMessage::orderBy('id', 'desc')->get();

        return view('admin.admin-broadcast', ['broadcastMessages' => $broadcastMessages]);
    }

    public function broadcastMessage(Request $request)
    {
        // Validate the request
        $request->validate([
            'broadcast_title' => 'required|string',
            'broadcast_content' => 'required|string',
        ]);

        // Create a new broadcast message
        $message = new BroadcastMessage();
        $message->title = $request->input('broadcast_title');
        $message->content = $request->input('broadcast_content');
        $message->save();

        Alert::success('Success', 'Broadcast message sent successfully');
        return redirect()->back()->with('success', 'Broadcast message sent successfully');
    }
}
