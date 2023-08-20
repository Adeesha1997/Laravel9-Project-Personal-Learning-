<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogCategory;
use Image;
use Illuminate\Support\Carbon;

class BlogController extends Controller
{
    public function AllBlog()
    {
        $blog = Blog::latest()->get();
        return view('admin.blog.blog_all' , compact('blog'));
    }

    public function AddBlog()
    {
        $categories = BlogCategory::orderBy('blog_category', 'ASC')->get();
        return view('admin.blog.blog_add', compact('categories'));

    }

    public function StoreBlog(Request $request)
    {


            $image = $request->file('blog_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            Image::make($image)->resize(430,327)->save('upload/blog/'.$name_gen);

            $save_url = 'upload/blog/'.$name_gen;


            Blog::insert([
                    'blog_category_id' => $request->blog_category_id,
                    'blog_title' => $request->blog_title,
                    'blog_image' => $save_url,
                    'blog_tags' => $request->blog_tags,
                    'blog_description' => $request->blog_description,
                    'created_at' => Carbon::now(),
            ]);
                $notification = array(
                    'message' => 'Blog Inserted Successfully',
                    'alert-type' => 'success'
                );

            return redirect()->route('all.blog')->with($notification);
    }

    public function EditBlog($id)
    {
        $blog = Blog::findOrFail($id);
        $categories = BlogCategory::orderBy('blog_category', 'ASC')->get();
        return view('admin.blog.blog_edit' , compact('blog','categories'));
    }

    public function UpdateBlog(Request $request){

        $blog_id = $request->id;

        if($request->file('blog_image'))
        {
            $image = $request->file('blog_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            Image::make($image)->resize(430,327)->save('upload/blog/'.$name_gen);

            $save_url = 'upload/blog/'.$name_gen;


            Blog::findOrFail($blog_id)->update([
                'blog_category_id' => $request->blog_category_id,
                    'blog_title' => $request->blog_title,
                    'blog_image' => $save_url,
                    'blog_tags' => $request->blog_tags,
                    'blog_description' => $request->blog_description,
            ]);
                $notification = array(
                    'message' => 'Blog Updated With Image Successfully',
                    'alert-type' => 'success'
                );

            return redirect()->route('all.blog')->with($notification);

        }else{

            Blog::findOrFail($blog_id)->update([
                'blog_category_id' => $request->blog_category_id,
                    'blog_title' => $request->blog_title,
                    'blog_tags' => $request->blog_tags,
                    'blog_description' => $request->blog_description,


        ]);
            $notification = array(
                'message' => 'Blog Updated Without Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.blog')->with($notification);
        }
    }

    public function DeleteBlog($id)
    {
        $blog = Blog::findOrFail($id);
        $img = $blog->blog_image;

        unlink($img);

        Blog::findOrfail($id)->delete();

        $notification = array(
            'message' => 'Blog Deleted Successfully !',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }

    public function BlogDetails($id)
    {
        $categories = BlogCategory::orderBy('blog_category', 'ASC')->get();
        $allblog = Blog::latest()->limit(5)->get();
        $blog = Blog::findOrFail($id);
        return view('frontend.blog_details' , compact('blog' , 'allblog' , 'categories'));

    }

    public function CatrgoryBlog($id)
    {
        $blogpost = Blog::where('blog_category_id' , $id)->orderBy('id','DESC')->get();
        return view('frontend.cat_blog_details' , compact('blogpost'));

    }


    public function HomeBlog()
    {
        $categories = BlogCategory::orderBy('blog_category', 'ASC')->get();
        $allblog = Blog::latest()->paginate(3);
        return view('frontend.blog' , compact('allblog','categories'));

    }



}
