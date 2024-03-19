<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use App\Models\MultiImage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;

class AboutController extends Controller
{
    public function AboutPage(){

        $aboutpage = About::find(1);
        return view('admin.about_page.about_page_all',compact('aboutpage'));
    }//end method

    public function UpdateAbout(Request $request){
        
        $about_id = $request->id;
        if($request->file('about_image')){
            $about_image = $request->file('about_image');
            $name_gen = hexdec(uniqid()).'.'.$about_image->getClientOriginalExtension();
            Image::make($about_image)->resize(523,605)->save('Upload/home_about/'.$name_gen);
            $save_url = 'Upload/home_about/'.$name_gen;
            About::findOrFail($about_id)->update([
                'title'=>$request->title,
                'short_title'=>$request->short_title,
                'short_description'=>$request->short_description,
                'long_description'=>$request->long_description,
                'about_image'=>$save_url,
                
            ]);

            $notification = array (
                'message' => 'About page updated Successfuly',
                'alert-type'=> 'success'
            );
            return redirect()->back()->with($notification);

        }else{

            About::findOrFail($about_id)->update([
                'title'=>$request->title,
                'short_title'=>$request->short_title,
                'short_description'=>$request->short_description,
                'long_description'=>$request->long_description,
                
            ]);

            $notification = array (
                'message' => 'About Page updated with out image successfuly',
                'alert-type'=> 'success'
            );
            return redirect()->back()->with($notification);
        }//end else

    }//end method

    public function HomeAbout(){
        $aboutpage = About::find(1);
        return view('frontend.about_page', compact('aboutpage'));
    }//end method 

    public function AboutMultiImage(){
          
        return view('admin.about_page.multimage');

    }// end method

    public function StoreMultiImage(Request $request){
        $image = $request->file('multi_image');

        foreach( $image as $multi_image){
            $name_gen = hexdec(uniqid()).'.'.$multi_image->getClientOriginalExtension();
            Image::make($multi_image)->resize(220,220)->save('Upload/multi/'.$name_gen);
            $save_url = 'Upload/multi/'.$name_gen;
            MultiImage::insert([
                'multi_image'=>$save_url,
                'created_at' =>Carbon::now()
      
            ]);  

        }//end foreach function
            $notification = array (
                'message' => 'Multi Image uploaded Successfuly',
                'alert-type'=> 'success'
            );
            return redirect()->route('all.multi.image')->with($notification);
            
       
    }// end method

    public function AllMultiImage(){
$allMultiImage = MultiImage::all();
return view('admin.about_page.all_multiimage',compact('allMultiImage'));
    }// end method

    public function EditMultiImage($id){
        $multiImage = MultiImage::findOrFail($id);
        return view('admin.about_page.edit_multi_image', compact('multiImage'));
    }// end method

    public function UpdateMultiImage(Request $request){

        $multi_image_id = $request->id;
        if($request->file('multi_image')){
            $about_image = $request->file('multi_image');
            $name_gen = hexdec(uniqid()).'.'.$about_image->getClientOriginalExtension();
            Image::make($about_image)->resize(220,220)->save('Upload/multi/'.$name_gen);
            $save_url = 'Upload/multi/'.$name_gen;
            MultiImage::findOrFail($multi_image_id)->update([
                'multi_image'=>$save_url,
                
            ]);

            $notification = array (
                'message' => 'Deleted Successfuly',
                'alert-type'=> 'success'
            );
            return redirect()->route('all.multi.image')->with($notification);

        }
    }//end of method

    public function DeleteMultiImage($id){
        $multi = MultiImage::findOrFail($id);
        $img =$multi->multi_image;
        unlink($img);
        MultiImage::findOrFail($id)->delete();

        $notification = array (
            'message' => 'Deleted Successfuly',
            'alert-type'=> 'success'
        );
        return redirect()->back()->with($notification);

    }//end of method
}
