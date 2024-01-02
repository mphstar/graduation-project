<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\BroadcastMessage;
use Illuminate\Http\Request;

class BroadcastController extends Controller
{
    public function index(Request $request)
    {
        $broadcast = BroadcastMessage::orderBy('created_at', 'desc')->get();
        if ($request->has('search')) {
            $broadcast = BroadcastMessage::where('title', 'LIKE', '%' . $request->query('search') . '%')->orderBy('created_at', 'desc')->get();
        }
        return view('pages.teacher.broadcast', [
            "broadcast" => $broadcast
        ]);
    }
}
