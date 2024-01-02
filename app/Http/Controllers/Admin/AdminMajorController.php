<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Major;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminMajorController extends Controller
{
    public function index()
    {
        $majors = Major::all();
        return view('admin.admin-major-list', compact('majors'));
    }

    public function addMajor(Request $request)
    {
        $request->validate([
            'add_name' => 'required|string|max:255',
        ]);

        $majors = Major::create([
            'name' => $request->input('add_name'),
        ]);

        $majors->save();

        Alert::success('Success', 'Success added Major');
        return redirect()->route('admin-major')->with('success', 'Major added successfully!');
    }

    public function updateMajor(Request $request)
    {
        // Validate the request
        $request->validate([
            'update_name' => 'required|string|max:255',
        ]);

        // Find the teacher
        $majors = Major::findOrFail($request->id);

        // Update teacher fields
        $majors->name = $request->update_name;

        // Save the teacher
        $majors->save();

        Alert::success('Success', 'Success update Major');
        return redirect()->route('admin-major')->with('success', 'Major updated successfully');
    }

    public function destroy($id)
    {
        $majors = Major::findOrFail($id);
        $majors->delete();

        return redirect()->route('admin-major')->with('success', 'Students deleted successfully');
    }
}
