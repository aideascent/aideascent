<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\PageVideoGalleryItem;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use DB;

class PageVideoGalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function edit()
    {
        $page_video_gallery = PageVideoGalleryItem::where('id',1)->first();
        return view('admin.page_setting.page_video_gallery', compact('page_video_gallery'));
    }

     public function update(Request $request)
     {
         $data['name'] = $request->input('name');
         $data['detail'] = $request->input('detail');
         $data['status'] = $request->input('status');
         $data['seo_title'] = $request->input('seo_title');
         $data['seo_meta_description'] = $request->input('seo_meta_description');

         PageVideoGalleryItem::where('id',1)->update($data);

         return redirect()->back()->with('success', 'Video Gallery Page Content is updated successfully!');

     }

}
