<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Service;
use App\Models\Admin\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use DB;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $service = Service::all();
        return view('admin.service.index', compact('service'));
    }

    public function create()
    {
		$categories = ServiceCategory::where('parent','=',0)->orderby('category_name','ASC')->get();
	
		foreach($categories as $cat){
			$category[] = array(
				'id' => $cat['id'],
				'name' => $cat['category_name'],
				'parent' => $cat['parent'],
			);
			
		}
		
		$ob = new ServiceCategory;
		$tree = $ob->buildTree($category);
        return view('admin.service.create', compact('tree'));
    }

    public function store(Request $request)
    {
        $service = new Service();
        $data = $request->only($service->getFillable());

        $request->validate([
            'name' => 'required|unique:services',
            'slug' => 'unique:services',
            //'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if(empty($data['slug'])) {
            $data['slug'] = Str::slug($request->name);
        }

        /* $statement = DB::select("SHOW TABLE STATUS LIKE 'services'");
        $ai_id = $statement[0]->Auto_increment;
        $ext = $request->file('photo')->extension();
        $final_name = 'service-'.$ai_id.'.'.$ext;
        $request->file('photo')->move(public_path('uploads/'), $final_name); */
        $data['photo'] = $request->file_name;

        $service->fill($data)->save();
        return redirect()->route('admin.service.index')->with('success', 'Service is added successfully!');
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
		$categories = ServiceCategory::where('parent','=',0)->orderby('category_name','ASC')->get();
	
		foreach($categories as $cat){
			$category[] = array(
				'id' => $cat['id'],
				'name' => $cat['category_name'],
				'parent' => $cat['parent'],
			);
			
		}
		
		$ob = new ServiceCategory;
		$tree = $ob->buildTree($category);
        return view('admin.service.edit', compact('service', 'tree'));
    }

    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);
        $data = $request->only($service->getFillable());

        /* if($request->hasFile('photo')) {
            $request->validate([
                'name'   =>  [
                    'required',
                    Rule::unique('services')->ignore($id),
                ],
                'slug'   =>  [
                    Rule::unique('services')->ignore($id),
                ],
               // 'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);
            unlink(public_path('uploads/'.$service->photo));
            $ext = $request->file('photo')->extension();
            $final_name = 'service-'.$id.'.'.$ext;
            $request->file('photo')->move(public_path('uploads/'), $final_name);
            $data['photo'] = $final_name;
        } else { */
            $request->validate([
                'name'   =>  [
                    'required',
                    Rule::unique('services')->ignore($id),
                ],
                'slug'   =>  [
                    Rule::unique('services')->ignore($id),
                ]
            ]);
            $data['photo'] = $request->file_name;
        //}

        $service->fill($data)->save();
        return redirect()->route('admin.service.index')->with('success', 'Service is updated successfully!');
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        //unlink(public_path('uploads/'.$service->photo));
        $service->delete();
        return Redirect()->back()->with('success', 'Service is deleted successfully!');
    }
	
	public function categoryIndex()
    {
        $category = ServiceCategory::where('parent',0)->orderby('created_at', 'DESC')->get();
		
        return view('admin.service.category.index', compact('category'));
    }
	
	 public function categoryCreate()
    {
        return view('admin.service.category.create');
    }
	
	public function categoryStore(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:service_categories',
            'category_slug' => 'unique:service_categories'
        ]);
        $category = new ServiceCategory();
        $data = $request->only($category->getFillable());
        if(empty($data['category_slug']))
        {
            unset($data['category_slug']);
            $data['category_slug'] = Str::slug($request->category_name);
        }
        $category->fill($data)->save();
        return redirect()->route('admin.servicecategory.index')->with('success', 'Category is added successfully!');
    }
	
	public function categoryEdit($id)
    {
        $category = ServiceCategory::findOrFail($id);
		$categories = ServiceCategory::where('id','!=','')->orderby('category_name','ASC')->get();
	
		foreach($categories as $cat){
			$mcategory[] = array(
				'id' => $cat['id'],
				'name' => $cat['category_name'],
				'parent' => $cat['parent'],
			);
			
		}
		
		$ob = new ServiceCategory;
		$tree = $ob->buildTree($mcategory);
        return view('admin.service.category.edit', compact('category', 'tree'));
    }
	
	public function categoryUpdate(Request $request, $id)
    {

        $request->validate([
            'category_name'   =>  [
                'required',
                Rule::unique('service_categories')->ignore($id),
            ],
            'category_slug'   =>  [
                Rule::unique('service_categories')->ignore($id),
            ]
        ]);

        $category = ServiceCategory::findOrFail($id);
        $data = $request->only($category->getFillable());
        if(empty($data['category_slug']))
        {
            unset($data['category_slug']);
            $data['category_slug'] = Str::slug($request->category_name);
        }
        $category->fill($data)->save();
        return redirect()->route('admin.servicecategory.index')->with('success', 'Category is updated successfully!');
    }
	
	public function categoryDestroy($id)
    {
        // Deleting data from "categories" table
        $category = ServiceCategory::findOrFail($id);
		if(ServiceCategory::where('parent',$id)->exists()){
			return Redirect()->back()->with('success', 'Category is not deleted. it has subcategory first delete all subcategory of this category!');
		}else{
			 $category->delete();

        // Deleting data from "blogs" table
        
			DB::table('services')->where('category_id',$id)->delete();

        // Success Message and redirect
			return Redirect()->back()->with('success', 'Category is deleted successfully!');
		}
		
       
    }
	
	public function subcategory_index()
    {
        $category = ServiceCategory::where('parent','!=',0)->orderby('created_at', 'DESC')->get();
		
        return view('admin.service.category.subcategory', compact('category'));
    }
	
	public function subcategory_create()
    {
		$categories = ServiceCategory::where('id','!=','')->orderby('category_name','ASC')->get();
	
		foreach($categories as $cat){
			$category[] = array(
				'id' => $cat['id'],
				'name' => $cat['category_name'],
				'parent' => $cat['parent'],
			);
			
		}
		
		$ob = new ServiceCategory;
		$tree = $ob->buildTree($category);
        return view('admin.service.category.subcreate', compact(['tree']));
    }
	
	public function subcategory_store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:service_categories',
            'category_slug' => 'unique:service_categories'
        ]);
        $category = new ServiceCategory();
        $data = $request->only($category->getFillable());
        if(empty($data['category_slug']))
        {
            unset($data['category_slug']);
            $data['category_slug'] = Str::slug($request->category_name);
        }
        $category->fill($data)->save();
        return redirect()->route('admin.servicesubcategory.index')->with('success', 'Category is added successfully!');
    }
	
	public function subcategory_edit($id)
    {
        $category = ServiceCategory::findOrFail($id);
		$categories = ServiceCategory::where('id','!=','')->orderby('category_name','ASC')->get();
	
		foreach($categories as $cat){
			$mcategory[] = array(
				'id' => $cat['id'],
				'name' => $cat['category_name'],
				'parent' => $cat['parent'],
			);
			
		}
		
		$ob = new ServiceCategory;
		$tree = $ob->buildTree($mcategory);
        return view('admin.service.category.subedit', compact('category', 'tree'));
    }
	
	 public function subcategory_update(Request $request, $id)
    {

        $request->validate([
            'category_name'   =>  [
                'required',
                Rule::unique('service_categories')->ignore($id),
            ],
            'category_slug'   =>  [
                Rule::unique('service_categories')->ignore($id),
            ]
        ]);

        $category = ServiceCategory::findOrFail($id);
        $data = $request->only($category->getFillable());
        if(empty($data['category_slug']))
        {
            unset($data['category_slug']);
            $data['category_slug'] = Str::slug($request->category_name);
        }
        $category->fill($data)->save();
        return redirect()->route('admin.servicesubcategory.index')->with('success', 'Category is updated successfully!');
    }
}
