<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    public function AllBlogCategory(){

    $blogcategory = BlogCategory::latest()->get();
    return view('admin.blog_category.blog_category_all', compact('blogcategory'));

    }//end method

    public function AddBlogCategory(){
        return view('admin.blog_category.blog_category_add');
    }//end method

    public function StoreBlogCategory(Request $request){

      
         BlogCategory::insert([

            'blog_category'=>$request->blog_category,
            'created_at' => Carbon::now(),
            
        ]);

        $notification = array (
            'message' => 'BLog Category Data Inserted Successfuly',
            'alert-type'=> 'success'
        );
        return redirect()->route('all.blog.category')->with($notification);
    }//end method

    public function EditBlogCategory($id){
        $edit_blog_category = BlogCategory::findOrFail($id);
        return view('admin.blog_category.blog_category_edit', compact('edit_blog_category'));
    }//end method 

    public function DeleteBlogCategory($id){

      $blog_category = BlogCategory::findOrFail($id);
       BlogCategory::findOrFail($id)->delete();

      $notification = array (
          'message' => 'Blog Category Item Data Deleted Successfuly',
          'alert-type'=> 'success'
      );
      return redirect()->back()->with($notification);

    }//end method

    public function UpdateBlogCategory(Request $request, $id){
       // Find the blog category by its ID or throw a 404 error if not found
        BlogCategory::findOrFail($id)->update([
            
      // Update the blog_category field with the value from the request
            'blog_category'=>$request->blog_category, 
    
          ]);

        // Create a success notification message
          $notification = array (
              'message' => 'Blog Category Item Data updated Successfuly',
              'alert-type'=> 'success'
          );
          // Redirect to the specified route with the success notification
          return redirect()->route('all.blog.category')->with($notification);
    }//end method



    


}
