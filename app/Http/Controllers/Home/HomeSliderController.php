<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeSlide;
use Intervention\Image\Facades\Image;

class HomeSliderController extends Controller
{
    public function HomeSlider(){

        $homeslide = HomeSlide::find(1);
        return view('admin.home_slide.home_slide_all',compact('homeslide'));
    }//end method

    public function UpdateSlider(Request $request){
        
        $slide_id = $request->id;
       
        if($request->file('home_slide')){
            $image = $request->file('home_slide');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(636,852)->save('Upload/home_slide/'.$name_gen);
            $save_url = 'Upload/home_slide/'.$name_gen;
            HomeSlide::findOrFail($slide_id)->update([
                'title'=>$request->title,
                'short_title'=>$request->short_title,
                'vedio_url'=>$request->video_url,
                'home_slide'=>$save_url,
            ]);

            $notification = array (
                'message' => 'Home Slide  updated Successfuly',
                'alert-type'=> 'success'
            );
            return redirect()->back()->with($notification);

        }else{

            HomeSlide::findOrFail($slide_id)->update([
                'title'=>$request->title,
                'short_title'=>$request->short_title,
                'vedio_url'=>$request->video_url,
                
            ]);

            $notification = array (
                'message' => 'Home Slide with out image updated Successfuly',
                'alert-type'=> 'success'
            );
            return redirect()->back()->with($notification);
        }//end else

    }//end method



    
}
