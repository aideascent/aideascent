<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use DB;

class PartnerController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $slider = Partner::all();
        return view('admin.partner.index', compact('slider'));
    }

    public function create()
    {
        return view('admin.partner.create');
    }

    public function store(Request $request)
    {
       
        $slider = new Partner();
        $data = $request->only($slider->getFillable());
		$data['partner_img'] = $request->file_name;
 $slider->fill($data)->save();

        return redirect()->route('admin.partners.index')->with('success', 'Partner is added successfully!');
    }

    public function edit($id)
    {
        $slider = Partner::findOrFail($id);
        return view('admin.partner.edit', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        $slider = Partner::findOrFail($id);
        $data = $request->only($slider->getFillable());
		$data['partner_img'] = $request->file_name;
       
        $slider->fill($data)->save();

        return redirect()->route('admin.partners.index')->with('success', 'Partner is updated successfully!');
    }

    public function destroy($id)
    {
        $slider = Partner::findOrFail($id);
        $slider->delete();

        // Success Message and redirect
        return Redirect()->back()->with('success', 'Partner is deleted successfully!');
    }

}
