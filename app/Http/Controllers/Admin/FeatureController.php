<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Feature;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use DB;

class FeatureController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $slider = Feature::all();
        return view('admin.feature.index', compact('slider'));
    }

    public function create()
    {
        return view('admin.feature.create');
    }

    public function store(Request $request)
    {
       
        $slider = new Feature();
        $data = $request->only($slider->getFillable());
 $slider->fill($data)->save();

        return redirect()->route('admin.feature.index')->with('success', 'Feature is added successfully!');
    }

    public function edit($id)
    {
        $slider = Feature::findOrFail($id);
        return view('admin.feature.edit', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        $slider = Feature::findOrFail($id);
        $data = $request->only($slider->getFillable());

       
        $slider->fill($data)->save();

        return redirect()->route('admin.feature.index')->with('success', 'Feature is updated successfully!');
    }

    public function destroy($id)
    {
        $slider = Feature::findOrFail($id);
        $slider->delete();

        // Success Message and redirect
        return Redirect()->back()->with('success', 'Feature is deleted successfully!');
    }

}
