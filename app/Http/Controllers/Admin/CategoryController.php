<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use DB;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $category = Category::where('parent',0)->orderby('created_at', 'DESC')->get();
		
        return view('admin.category.index', compact('category'));
    }
	
	public function subcategory_index()
    {
        $category = Category::where('parent','!=',0)->orderby('created_at', 'DESC')->get();
		
        return view('admin.category.subcategory', compact('category'));
    }

    public function create()
    {
        return view('admin.category.create');
    } 
	
	public function subcategory_create()
    {
		$categories = Category::where('id','!=','')->orderby('category_name','ASC')->get();
	
		foreach($categories as $cat){
			$category[] = array(
				'id' => $cat['id'],
				'name' => $cat['category_name'],
				'parent' => $cat['parent'],
			);
			
		}
		
		$ob = new Category;
		$tree = $ob->buildTree($category);
        return view('admin.category.subcreate', compact(['tree']));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:categories',
            'category_slug' => 'unique:categories'
        ]);
        $category = new Category();
        $data = $request->only($category->getFillable());
        if(empty($data['category_slug']))
        {
            unset($data['category_slug']);
            $data['category_slug'] = Str::slug($request->category_name);
        }
        $category->fill($data)->save();
        return redirect()->route('admin.category.index')->with('success', 'Category is added successfully!');
    }
	
	public function subcategory_store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:categories',
            'category_slug' => 'unique:categories'
        ]);
        $category = new Category();
        $data = $request->only($category->getFillable());
        if(empty($data['category_slug']))
        {
            unset($data['category_slug']);
            $data['category_slug'] = Str::slug($request->category_name);
        }
        $category->fill($data)->save();
        return redirect()->route('admin.subcategory.index')->with('success', 'Category is added successfully!');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
		$categories = Category::where('id','!=','')->orderby('category_name','ASC')->get();
	
		foreach($categories as $cat){
			$mcategory[] = array(
				'id' => $cat['id'],
				'name' => $cat['category_name'],
				'parent' => $cat['parent'],
			);
			
		}
		
		$ob = new Category;
		$tree = $ob->buildTree($mcategory);
        return view('admin.category.edit', compact('category', 'tree'));
    }
	
	public function subcategory_edit($id)
    {
        $category = Category::findOrFail($id);
		$categories = Category::where('id','!=','')->orderby('category_name','ASC')->get();
	
		foreach($categories as $cat){
			$mcategory[] = array(
				'id' => $cat['id'],
				'name' => $cat['category_name'],
				'parent' => $cat['parent'],
			);
			
		}
		
		$ob = new Category;
		$tree = $ob->buildTree($mcategory);
        return view('admin.category.subedit', compact('category', 'tree'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'category_name'   =>  [
                'required',
                Rule::unique('categories')->ignore($id),
            ],
            'category_slug'   =>  [
                Rule::unique('categories')->ignore($id),
            ]
        ]);

        $category = Category::findOrFail($id);
        $data = $request->only($category->getFillable());
        if(empty($data['category_slug']))
        {
            unset($data['category_slug']);
            $data['category_slug'] = Str::slug($request->category_name);
        }
        $category->fill($data)->save();
        return redirect()->route('admin.category.index')->with('success', 'Category is updated successfully!');
    }
	
	 public function subcategory_update(Request $request, $id)
    {

        $request->validate([
            'category_name'   =>  [
                'required',
                Rule::unique('categories')->ignore($id),
            ],
            'category_slug'   =>  [
                Rule::unique('categories')->ignore($id),
            ]
        ]);

        $category = Category::findOrFail($id);
        $data = $request->only($category->getFillable());
        if(empty($data['category_slug']))
        {
            unset($data['category_slug']);
            $data['category_slug'] = Str::slug($request->category_name);
        }
        $category->fill($data)->save();
        return redirect()->route('admin.subcategory.index')->with('success', 'Category is updated successfully!');
    }

    public function destroy($id)
    {
        // Deleting data from "categories" table
        $category = Category::findOrFail($id);
		if(Category::where('parent',$id)->exists()){
			return Redirect()->back()->with('success', 'Category is not deleted. it has subcategory first delete all subcategory of this category!');
		}else{
			$category->delete();

        
			DB::table('blogs')->where('category_id',$id)->delete();

        // Success Message and redirect
			return Redirect()->back()->with('success', 'Category is deleted successfully!');
		}
    }

}
