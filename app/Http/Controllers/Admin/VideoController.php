<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use DB;

class VideoController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $video = Video::orderBy('video_order')->get();
        return view('admin.video.index', compact('video'));
    }

    public function create()
    {
        return view('admin.video.create');
    }

    public function store(Request $request)
    {
        $video = new Video();
        $data = $request->only($video->getFillable());

        $request->validate([
            'video_youtube' => 'required',
            'video_order' => 'numeric|min:0|max:32767'
        ]);

        $video->fill($data)->save();
        return redirect()->route('admin.video.index')->with('success', 'Video is added successfully!');
    }

    public function edit($id)
    {
        $video = Video::findOrFail($id);
        return view('admin.video.edit', compact('video'));
    }

    public function update(Request $request, $id)
    {
        $video = Video::findOrFail($id);
        $data = $request->only($video->getFillable());

        $request->validate([
            'video_youtube' => 'required',
            'video_order' => 'numeric|min:0|max:32767'
        ]);

        $video->fill($data)->save();
        return redirect()->route('admin.video.index')->with('success', 'Video is updated successfully!');
    }

    public function destroy($id)
    {
        $video = Video::findOrFail($id);
        $video->delete();
        return Redirect()->back()->with('success', 'Video is deleted successfully!');
    }
}
