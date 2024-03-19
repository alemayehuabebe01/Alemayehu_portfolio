<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function AllBlog(){
        
    $blogs = Blog::latest()->get();
    return view('admin.blogs.blogs_all', compact('blogs'));
    }// end method


    public function AddBlog(){
    $categories = BlogCategory::orderBy('blog_category','ASC')->get();
    return view('admin.blogs.blogs_add',compact('categories'));
    }// end method 

    public function StoreBlog(Request $request){
        $request ->validate([
            'blog_category_id'=> 'required',
            'blog_title'=> 'required',
            'blog_tags'=> 'required',
            'blog_description'=> 'required',
            'blog_image'=> 'required',
            
         [
          'blog_category_id.required' => 'Blog category Name Is Required',
          'blog_title.required' => 'Blog Title Is Required',
          'blog_tags.required' => 'Blog tags  Is Required',
          'blog_description.required' => 'Blog Description Is Required',
          'blog_image.required' => 'Blog Image  Is Required',
    
         ] ]);

        
             $blog_image = $request->file('blog_image');
             $name_gen = hexdec(uniqid()).'.'.$blog_image->getClientOriginalExtension();
             Image::make($blog_image)->resize(430,327)->save('Upload/blog/'.$name_gen);
             $save_url = 'Upload/blog/'.$name_gen;
             Blog::insert([
 
                 'blog_category_id'=>$request->blog_category_id,
                 'blog_title'=>$request->blog_title,
                 'blog_description'=>$request->blog_description,
                 'blog_tags'=>$request->blog_tags,
                 'blog_image'=>$save_url,
                 'created_at' => Carbon::now(),
                 
             ]);
 
             $notification = array (
                 'message' => 'Blog Data Inserted Successfuly',
                 'alert-type'=> 'success'
             );
             return redirect()->route('all.blog')->with($notification);
 
         
    }//end function method

    public function EditBlog(Request $request , $id){
        $categories = BlogCategory::orderBy('blog_category','ASC')->get();
        $edit_blog = Blog::findOrFail($id);
        return view('admin.blogs.edit_blog_data', compact('edit_blog','categories'));

    }//end method

    public function UpdateBlog(Request $request){

        $blog_id = $request->id;
        if($request->file('blog_image')){
            $blog_image = $request->file('blog_image');
            $name_gen = hexdec(uniqid()).'.'.$blog_image->getClientOriginalExtension();
            Image::make($blog_image)->resize(430,327)->save('Upload/blog/'.$name_gen);
            $save_url = 'Upload/blog/'.$name_gen;
            Blog::findOrFail($blog_id)->update([
                'blog_category_id'=>$request->blog_category_id,
                'blog_title'=>$request->blog_title,
                'blog_description'=>$request->blog_description,
                'blog_tags'=>$request->blog_tags,
                'blog_image'=>$save_url,
                
                
            ]);
  
            $notification = array (
                'message' => 'Blog Updated Successfuly',
                'alert-type'=> 'success'
            );
            return redirect()->route('all.blog')->with($notification);
  
        }else{
  
            Blog::findOrFail($blog_id)->update([
              
                'blog_category_id'=>$request->blog_category_id,
                'blog_title'=>$request->blog_title,
                'blog_description'=>$request->blog_description,
                'blog_tags'=>$request->blog_tags,
                
            ]);
  
            $notification = array (
                'message' => 'Blog updated with out image successfuly',
                'alert-type'=> 'success'
            );
            return redirect()->route('all.blog')->with($notification);
        }//end else

    }// end function method

    public function DeleteBlog($id){
      $blog = Blog::findOrFail($id);
      $img =$blog->blog_image;
      unlink($img);
      Blog::findOrFail($id)->delete();

      $notification = array (
          'message' => 'Blog Data Deleted Successfuly',
          'alert-type'=> 'success'
      );
      return redirect()->back()->with($notification);
    }// end function method

    public function BlogDetails($id){

        $allblogs = Blog::latest()->limit(5)->get();
        $categories = BlogCategory::orderBy('blog_category','ASC')->get();
        $blog = Blog::findOrFail($id);
        return view('frontend.blog_details', compact('blog','allblogs','categories'));

    }// end of method 

    public function CategoryBlog($id){
     $allblogs = Blog::latest()->limit(5)->get();
     $categories = BlogCategory::orderBy('blog_category','ASC')->get();
     $blogpost = Blog::where('blog_category_id',$id)->orderBy('id','DESC')->get();
     $categoryname = BlogCategory::findOrFail($id);
     return view('frontend.cat_blog_details',compact('blogpost','allblogs','categories','categoryname'));
    }//end function method

    public function HomeBlog(){
        $allblog = Blog::latest()->paginate(3);
        $categories = BlogCategory::orderBy('blog_category','ASC')->get();
        return view('frontend.blog',compact('allblog','categories'));

    }//end function method


}
