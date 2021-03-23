<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $g_setting = DB::table('general_settings')->where('id', 1)->first();
        $service = DB::table('page_service_items')->where('id', 1)->first();
        $query = DB::table('services');
		if ($request->has('s')) 
		{
			$search_term 		= 	$request->input('s');
			if(trim($search_term) != '')
			{		
				$search_string_filter = '%'.$search_term.'%';
				$query->where('name','like',$search_string_filter)->orWhere('description','like',$search_string_filter);
			}
		}
		$service_items = $query->paginate($g_setting->no_of_post_body_service);
		$categories = DB::table('service_categories')->where('parent', 0)->get();
		 $blog_items_no_pagi = DB::table('services')->orderby('id', 'desc')->paginate($g_setting->no_of_post_right_service);
        return view('pages.services', compact('service','g_setting','categories','service_items','blog_items_no_pagi'));
    }

    public function detail($slug)
    {
        $g_setting = DB::table('general_settings')->where('id', 1)->first();
        $service_detail = DB::table('services')->where('slug', $slug)->first();
        $service_items = DB::table('services')->get();
        if(!$service_detail) {
            return abort(404);
        }
        return view('pages.service_detail', compact('g_setting','service_detail','service_items'));
    }
}
