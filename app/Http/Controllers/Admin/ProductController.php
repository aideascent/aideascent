<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Product;
use App\Models\Admin\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use DB;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $product = Product::all();
        return view('admin.product.index', compact('product'));
    }

    public function create()
    {
		$categories = ProductCategory::where('parent','=',0)->orderby('category_name','ASC')->get();
	
		foreach($categories as $cat){
			$category[] = array(
				'id' => $cat['id'],
				'name' => $cat['category_name'],
				'parent' => $cat['parent'],
			);
			
		}
		
		$ob = new ProductCategory;
		$tree = $ob->buildTree($category);
        return view('admin.product.create', compact('tree'));
    }

    public function store(Request $request)
    {
        $product = new Product();
        $data = $request->only($product->getFillable());

        $request->validate([
            'product_name' => 'required',
            'product_slug' => 'unique:products',
            'product_current_price' => 'required',
            //'product_stock' => 'required',
            'product_content' => 'required',
            'product_content_short' => 'required',
           // 'product_featured_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if(empty($data['product_slug'])) {
            $data['product_slug'] = Str::slug($request->product_name);
        }
		$req = $request->all();
		
		if(!empty($req['tabname'])) {
			
			$n = $req['tabname'];
			$da = array();
			for($i = 0; $i<count($n); $i++){
				$da[] = array(
					'name' => base64_encode($n[$i]),
					'description' => base64_encode($req['tabdesc'][$i])
				);
			}
			$data['additionaltab'] = serialize($da); 
		}
		
        /* $statement = DB::select("SHOW TABLE STATUS LIKE 'products'");
        $ai_id = $statement[0]->Auto_increment;

        $ext = $request->file('product_featured_photo')->extension();
        $final_name = 'product-'.$ai_id.'.'.$ext;
        $request->file('product_featured_photo')->move(public_path('uploads/'), $final_name); */
        $data['product_featured_photo'] = $request->file_name;

        $product->fill($data)->save();
        return redirect()->route('admin.product.index')->with('success', 'Product is added successfully!');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
		$categories = ProductCategory::where('parent','=',0)->orderby('category_name','ASC')->get();
	
		foreach($categories as $cat){
			$category[] = array(
				'id' => $cat['id'],
				'name' => $cat['category_name'],
				'parent' => $cat['parent'],
			);
			
		}
		
		$ob = new ProductCategory;
		$tree = $ob->buildTree($category);
        return view('admin.product.edit', compact('product','tree'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $data = $request->only($product->getFillable());

        /* if($request->hasFile('product_featured_photo')) {
            $request->validate([
                'product_name' => 'required',
                'product_slug'   =>  [
                    Rule::unique('products')->ignore($id),
                ],
                'product_current_price' => 'required',
                'product_stock' => 'required',
                'product_content' => 'required',
                'product_content_short' => 'required',
                'product_featured_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);
            unlink(public_path('uploads/'.$product->product_featured_photo));
            $ext = $request->file('product_featured_photo')->extension();
            $final_name = 'product-'.$id.'.'.$ext;
            $request->file('product_featured_photo')->move(public_path('uploads/'), $final_name);
            $data['product_featured_photo'] = $final_name;
        } else { */
            $request->validate([
                'product_name' => 'required',
                'product_slug'   =>  [
                    Rule::unique('products')->ignore($id),
                ],
                'product_current_price' => 'required',
               // 'product_stock' => 'required',
                'product_content' => 'required',
                'product_content_short' => 'required',
            ]);
            $data['product_featured_photo'] = $request->file_name;
       // }

        if(empty($data['product_slug']))
        {
            unset($data['product_slug']);
            $data['product_slug'] = Str::slug($request->product_name);
        }
		$req = $request->all();
		if(!empty($req['tabname'])) {
			
			$n = $req['tabname'];
			$da = array();
			for($i = 0; $i<count($n); $i++){
				$da[] = array(
					'name' => base64_encode($n[$i]),
					'description' => base64_encode($req['tabdesc'][$i])
				);
			}
			$data['additionaltab'] = serialize($da); 
		}

        $product->fill($data)->save();
        return redirect()->route('admin.product.index')->with('success', 'Product is updated successfully!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        //unlink(public_path('uploads/'.$product->product_featured_photo));
        $product->delete();
        return Redirect()->back()->with('success', 'Product is deleted successfully!');
    }
	
	public function categoryIndex()
    {
        $category = ProductCategory::where('parent',0)->orderby('created_at', 'DESC')->get();
		
        return view('admin.product.category.index', compact('category'));
    }
	
	 public function categoryCreate()
    {
        return view('admin.product.category.create');
    }
	
	public function categoryStore(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:product_categories',
            'category_slug' => 'unique:product_categories'
        ]);
        $category = new ProductCategory();
        $data = $request->only($category->getFillable());
        if(empty($data['category_slug']))
        {
            unset($data['category_slug']);
            $data['category_slug'] = Str::slug($request->category_name);
        }
        $category->fill($data)->save();
        return redirect()->route('admin.productcategory.index')->with('success', 'Category is added successfully!');
    }
	
	public function categoryEdit($id)
    {
        $category = ProductCategory::findOrFail($id);
		$categories = ProductCategory::where('id','!=','')->orderby('category_name','ASC')->get();
	
		foreach($categories as $cat){
			$mcategory[] = array(
				'id' => $cat['id'],
				'name' => $cat['category_name'],
				'parent' => $cat['parent'],
			);
			
		}
		
		$ob = new ProductCategory;
		$tree = $ob->buildTree($mcategory);
        return view('admin.product.category.edit', compact('category', 'tree'));
    }
	
	public function categoryUpdate(Request $request, $id)
    {

        $request->validate([
            'category_name'   =>  [
                'required',
                Rule::unique('product_categories')->ignore($id),
            ],
            'category_slug'   =>  [
                Rule::unique('product_categories')->ignore($id),
            ]
        ]);

        $category = ProductCategory::findOrFail($id);
        $data = $request->only($category->getFillable());
        if(empty($data['category_slug']))
        {
            unset($data['category_slug']);
            $data['category_slug'] = Str::slug($request->category_name);
        }
        $category->fill($data)->save();
        return redirect()->route('admin.productcategory.index')->with('success', 'Category is updated successfully!');
    }
	
	public function categoryDestroy($id)
    {
        // Deleting data from "categories" table
        $category = ProductCategory::findOrFail($id);
		if(ProductCategory::where('parent',$id)->exists()){
			return Redirect()->back()->with('success', 'Category is not deleted. it has subcategory first delete all subcategory of this category!');
		}else{
        $category->delete();

        // Deleting data from "blogs" table
        
        DB::table('products')->where('category_id',$id)->delete();

        // Success Message and redirect
        return Redirect()->back()->with('success', 'Category is deleted successfully!');
		}
    }
	
	public function subcategory_index()
    {
        $category = ProductCategory::where('parent','!=',0)->orderby('created_at', 'DESC')->get();
		
        return view('admin.product.category.subcategory', compact('category'));
    }
	
	public function subcategory_create()
    {
		$categories = ProductCategory::where('id','!=','')->orderby('category_name','ASC')->get();
	
		foreach($categories as $cat){
			$category[] = array(
				'id' => $cat['id'],
				'name' => $cat['category_name'],
				'parent' => $cat['parent'],
			);
			
		}
		
		$ob = new ProductCategory;
		$tree = $ob->buildTree($category);
        return view('admin.product.category.subcreate', compact(['tree']));
    }
	
	public function subcategory_store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:product_categories',
            'category_slug' => 'unique:product_categories'
        ]);
        $category = new ProductCategory();
        $data = $request->only($category->getFillable());
        if(empty($data['category_slug']))
        {
            unset($data['category_slug']);
            $data['category_slug'] = Str::slug($request->category_name);
        }
        $category->fill($data)->save();
        return redirect()->route('admin.productsubcategory.index')->with('success', 'Category is added successfully!');
    }
	
	public function subcategory_edit($id)
    {
        $category = ProductCategory::findOrFail($id);
		$categories = ProductCategory::where('id','!=','')->orderby('category_name','ASC')->get();
	
		foreach($categories as $cat){
			$mcategory[] = array(
				'id' => $cat['id'],
				'name' => $cat['category_name'],
				'parent' => $cat['parent'],
			);
			
		}
		
		$ob = new ProductCategory;
		$tree = $ob->buildTree($mcategory);
        return view('admin.product.category.subedit', compact('category', 'tree'));
    }
	
	 public function subcategory_update(Request $request, $id)
    {

        $request->validate([
            'category_name'   =>  [
                'required',
                Rule::unique('product_categories')->ignore($id),
            ],
            'category_slug'   =>  [
                Rule::unique('product_categories')->ignore($id),
            ]
        ]);

        $category = ProductCategory::findOrFail($id);
        $data = $request->only($category->getFillable());
        if(empty($data['category_slug']))
        {
            unset($data['category_slug']);
            $data['category_slug'] = Str::slug($request->category_name);
        }
        $category->fill($data)->save();
        return redirect()->route('admin.productsubcategory.index')->with('success', 'Category is updated successfully!');
    }
}
