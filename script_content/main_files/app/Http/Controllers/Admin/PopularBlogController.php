<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PopularPost;
use App\Models\Blog;
use Illuminate\Http\Request;

class PopularBlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $blogs = Blog::where('status',1)->get();
        $popularBlogs = PopularPost::with('blog')->get();
        return view('admin.popular_blog',compact('blogs','popularBlogs'));
    }

    public function store(Request $request)
    {
        $rules = [
            'blog_id'=>'required|unique:popular_posts',
        ];
        $customMessages = [
            'blog_id.required' => trans('Blog is required'),
            'blog_id.unique' => trans('Blog already exist'),
        ];
        $this->validate($request, $rules,$customMessages);

        $popularBlog = new PopularPost();
        $popularBlog->blog_id = $request->blog_id;
        $popularBlog->status = 1;
        $popularBlog->save();


        $notification = trans('Added Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.popular-blog.index')->with($notification);
    }

    public function destroy($id)
    {
        $blog = PopularPost::find($id);
        $blog->delete();

        $notification= trans('Delete Successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.popular-blog.index')->with($notification);
    }

    public function changeStatus($id){
        $blog = PopularPost::find($id);
        if($blog->status==1){
            $blog->status=0;
            $blog->save();
            $message= trans('Inactive Successfully');
        }else{
            $blog->status=1;
            $blog->save();
            $message= trans('Active Successfully');
        }
        return response()->json($message);
    }
}
