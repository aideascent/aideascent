<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use DB;

class PhotoChangeController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $admin_data = Admin::where('id',1)->first();
        return view('admin.auth.photo_change', compact('admin_data'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Unlink old photo
        unlink(public_path('uploads/'.$request->current_photo));

        // Uploading new photo
        $ext = $request->file('photo')->extension();
        $final_name = 'user-1'.'.'.$ext;
        $request->file('photo')->move(public_path('uploads/'), $final_name);

        $data['photo'] = $final_name;

        Admin::where('id',1)->update($data);

        session(['photo' => $final_name]);

        return redirect()->back()->with('success', 'Photo is updated successfully!');



    }

}
