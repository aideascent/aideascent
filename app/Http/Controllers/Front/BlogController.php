<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use App\Models\Admin\GeneralSetting;
use App\Models\Admin\Comment;
use App\Models\Admin\Blog;
use Illuminate\Http\Request;
use DB;
use App\Mail\CommentMessageToAdmin;
use Illuminate\Support\Facades\Mail;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $g_setting = DB::table('general_settings')->where('id', 1)->first();
        $blog = DB::table('page_blog_items')->where('id', 1)->first();
        $query = Blog::orderby('id', 'desc');
		if ($request->has('tag')) 
		{
			$search_term 		= 	$request->input('tag');
			if(trim($search_term) != '')
			{		
				$query->whereRaw("FIND_IN_SET(?, tags) > 0", [$search_term]);
			}
		}
		if ($request->has('s')) 
		{
			$search_term 		= 	$request->input('s');
			if(trim($search_term) != '')
			{		
				$search_string_filter = '%'.$search_term.'%';
				$query->where('blog_title','like',$search_string_filter);
			}
		}
		$blog_items = $query->paginate($g_setting->no_of_post_body_academy);
        $blog_items_no_pagi = DB::table('blogs')->orderby('id', 'desc')->paginate($g_setting->no_of_post_right_academy);
        $categories = DB::table('categories')->where('parent', 0)->get();
        return view('pages.blogs', compact('blog','g_setting','blog_items','categories','blog_items_no_pagi'));
    }

    public function detail($category = Null, $subcategory = Null, $slug)
    {
        $g_setting = DB::table('general_settings')->where('id', 1)->first();
        $blog_detail = DB::table('blogs')->where('blog_slug', $slug)->first();
        $blog_items = DB::table('blogs')->get();
        $blog_items_no_pagi = DB::table('blogs')->orderby('id', 'desc')->get();
        $categories = DB::table('categories')->where('parent', 0)->get();
		 $general_setting = GeneralSetting::where('id',1)->first();
        if(!$blog_detail) {
            return abort(404);
        }
        $comments = '';
        $comments = DB::table('comments')->where('blog_id', $blog_detail->id)->where('comment_status', 'Approved')->get();
        return view('pages.blog_detail', compact('g_setting','blog_detail','blog_items','blog_items_no_pagi','categories','comments', 'general_setting'));
    }

    public function comment(Request $request)
    {
		$g_setting = DB::table('general_settings')->where('id', 1)->first();
        $comment = new Comment();
        $data = $request->only($comment->getFillable());

        $request->validate([
            'person_name' => 'required',
            'person_email' => 'required|email',
            'person_message' => 'required'
        ]);
		 if($g_setting->google_recaptcha_status == 'Show') {
            $request->validate([
                'g-recaptcha-response' => 'required'
            ],
            [
                'g-recaptcha-response.required' => 'You must have to input recaptcha correctly'
            ]);
        }
        $comment->fill($data)->save();

        // Send email to admin
        $email_template_data = DB::table('email_templates')->where('id', 2)->first();
        $subject = $email_template_data->et_subject;
        $message = $email_template_data->et_content;

        $comment_see_url = url('blog/'.$request->blog_slug);

        $message = str_replace('[[person_name]]', $request->person_name, $message);
        $message = str_replace('[[person_email]]', $request->person_email, $message);
        $message = str_replace('[[person_message]]', $request->person_message, $message);
        $message = str_replace('[[comment_see_url]]', $comment_see_url, $message);

        $admin_data = DB::table('admins')->where('id',1)->first();

        Mail::to($admin_data->email)->send(new CommentMessageToAdmin($subject,$message));
        return redirect()->back()->with('success', 'Your comment is sent to admin successfully. Admin will check and approve it.');
    }
}
