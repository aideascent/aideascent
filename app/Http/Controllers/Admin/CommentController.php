<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function approved()
    {
        $comments_approved = DB::table('comments')
                            ->join('blogs', 'comments.blog_id', '=', 'blogs.id')
                            ->select('comments.*', 'blogs.blog_title', 'blogs.blog_slug')
                            ->where('comment_status', 'Approved')
                            ->get();
        return view('admin.comment.approved', compact('comments_approved'));
    }

    public function make_pending($id)
    {
        $data['comment_status'] = 'Pending';
        DB::table('comments')->where('id',$id)->update($data);
        return redirect()->back()->with('success', 'Comment is pending successfully!');
    }

    public function pending()
    {
        $comments_pending = DB::table('comments')
            ->join('blogs', 'comments.blog_id', '=', 'blogs.id')
            ->select('comments.*', 'blogs.blog_title', 'blogs.blog_slug')
            ->where('comment_status', 'Pending')
            ->get();
        return view('admin.comment.pending', compact('comments_pending'));
    }

    public function make_approved($id)
    {
        $data['comment_status'] = 'Approved';
        DB::table('comments')->where('id',$id)->update($data);
        return redirect()->back()->with('success', 'Comment is approved successfully!');
    }

    public function destroy($id)
    {
        DB::table('comments')->where('id', $id)->delete();
        return Redirect()->back()->with('success', 'Comment is deleted successfully!');
    }

}
