<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Subscriber;
use App\Models\Admin\SubscriberCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailToAllSubscribers;
use DB;

class SubscriberController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $subscriber = Subscriber::where('subs_active', 1)->get();
        return view('admin.subscriber.index', compact('subscriber'));
    }

    public function destroy($id)
    {
        $subscriber = Subscriber::findOrFail($id);
        $subscriber->delete();
        return Redirect()->back()->with('success', 'Subscriber is deleted successfully!');
    }

    public function send_email()
    {
        return view('admin.subscriber.send_email');
    }

    public function send_email_action(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'message' => 'required'
        ]);

        $subject = $request->subject;
        $message = $request->message;

        $all_subscribers = Subscriber::where('subs_active', 1)->get();
        foreach($all_subscribers as $row)
        {
            $subs_email = $row->subs_email;
            Mail::to($subs_email)->send(new MailToAllSubscribers($subject,$message));
        }

        return redirect()->back()->with('success', 'Email is sent successfully to all subscribers!');
    }
	
	public function categoryIndex()
    {
        $category = SubscriberCategory::where('parent',0)->orderby('created_at', 'DESC')->get();
		
        return view('admin.subscriber.category.index', compact('category'));
    }
	
	 public function categoryCreate()
    {
        return view('admin.subscriber.category.create');
    }
	
	public function categoryStore(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:subscriber_categories',
            'category_slug' => 'unique:subscriber_categories'
        ]);
        $category = new SubscriberCategory();
        $data = $request->only($category->getFillable());
        if(empty($data['category_slug']))
        {
            unset($data['category_slug']);
            $data['category_slug'] = Str::slug($request->category_name);
        }
        $category->fill($data)->save();
        return redirect()->route('admin.subscribercategory.index')->with('success', 'Category is added successfully!');
    }
	
	public function categoryEdit($id)
    {
        $category = SubscriberCategory::findOrFail($id);
		$categories = SubscriberCategory::where('id','!=','')->orderby('category_name','ASC')->get();
	
		foreach($categories as $cat){
			$mcategory[] = array(
				'id' => $cat['id'],
				'name' => $cat['category_name'],
				'parent' => $cat['parent'],
			);
			
		}
		
		$ob = new SubscriberCategory;
		$tree = $ob->buildTree($mcategory);
        return view('admin.subscriber.category.edit', compact('category', 'tree'));
    }
	
	public function categoryUpdate(Request $request, $id)
    {

        $request->validate([
            'category_name'   =>  [
                'required',
                Rule::unique('subscriber_categories')->ignore($id),
            ],
            'category_slug'   =>  [
                Rule::unique('subscriber_categories')->ignore($id),
            ]
        ]);

        $category = SubscriberCategory::findOrFail($id);
        $data = $request->only($category->getFillable());
        if(empty($data['category_slug']))
        {
            unset($data['category_slug']);
            $data['category_slug'] = Str::slug($request->category_name);
        }
        $category->fill($data)->save();
        return redirect()->route('admin.subscribercategory.index')->with('success', 'Category is updated successfully!');
    }
	
	public function categoryDestroy($id)
    {
        // Deleting data from "categories" table
        $category = SubscriberCategory::findOrFail($id);
		if(SubscriberCategory::where('parent',$id)->exists()){
			return Redirect()->back()->with('success', 'Category is not deleted. it has subcategory first delete all subcategory of this category!');
		}else{
        $category->delete();

        // Deleting data from "blogs" table
        
        DB::table('subscribers')->where('category_id',$id)->delete();

        // Success Message and redirect
        return Redirect()->back()->with('success', 'Category is deleted successfully!');
		}
    }
	
	public function subcategory_index()
    {
        $category = SubscriberCategory::where('parent','!=',0)->orderby('created_at', 'DESC')->get();
		
        return view('admin.subscriber.category.subcategory', compact('category'));
    }
	
	public function subcategory_create()
    {
		$categories = SubscriberCategory::where('id','!=','')->orderby('category_name','ASC')->get();
	
		foreach($categories as $cat){
			$category[] = array(
				'id' => $cat['id'],
				'name' => $cat['category_name'],
				'parent' => $cat['parent'],
			);
			
		}
		
		$ob = new SubscriberCategory;
		$tree = $ob->buildTree($category);
        return view('admin.subscriber.category.subcreate', compact(['tree']));
    }
	
	public function subcategory_store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:subscriber_categories',
            'category_slug' => 'unique:subscriber_categories'
        ]);
        $category = new SubscriberCategory();
        $data = $request->only($category->getFillable());
        if(empty($data['category_slug']))
        {
            unset($data['category_slug']);
            $data['category_slug'] = Str::slug($request->category_name);
        }
        $category->fill($data)->save();
        return redirect()->route('admin.subscribersubcategory.index')->with('success', 'Category is added successfully!');
    }
	
	public function subcategory_edit($id)
    {
        $category = SubscriberCategory::findOrFail($id);
		$categories = SubscriberCategory::where('id','!=','')->orderby('category_name','ASC')->get();
	
		foreach($categories as $cat){
			$mcategory[] = array(
				'id' => $cat['id'],
				'name' => $cat['category_name'],
				'parent' => $cat['parent'],
			);
			
		}
		
		$ob = new SubscriberCategory;
		$tree = $ob->buildTree($mcategory);
        return view('admin.subscriber.category.subedit', compact('category', 'tree'));
    }
	
	 public function subcategory_update(Request $request, $id)
    {

        $request->validate([
            'category_name'   =>  [
                'required',
                Rule::unique('subscriber_categories')->ignore($id),
            ],
            'category_slug'   =>  [
                Rule::unique('subscriber_categories')->ignore($id),
            ]
        ]);

        $category = SubscriberCategory::findOrFail($id);
        $data = $request->only($category->getFillable());
        if(empty($data['category_slug']))
        {
            unset($data['category_slug']);
            $data['category_slug'] = Str::slug($request->category_name);
        }
        $category->fill($data)->save();
        return redirect()->route('admin.subscribersubcategory.index')->with('success', 'Category is updated successfully!');
    }
}
