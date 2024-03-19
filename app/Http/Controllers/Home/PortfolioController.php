<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class PortfolioController extends Controller
{
   public function AllPortfolio(){
    $portfolio = Portfolio::latest()->get();
    return view('admin.portofolio.portfolio_all', compact('portfolio'));
   }// end method 

   public function AddPortfolio(){

    return view('admin.portofolio.portfolio_add');

   }//end method

   public function StorePortfolio(Request $request){


      $request ->validate([
        'portfolio_name'=> 'required',
        'portfolio_title'=> 'required',
        'portfolio_description'=> 'required',
        'portfolio_image'=> 'required',
        
     [
      'portfolio_name.required' => 'Portfolio Name Is Required',
      'portfolio_title.required' => 'Portfolio Title Is Required',
      'portfolio_image.required' => 'Portfolio Image  Is Required',




     ] ]);

          $portfolio_id = $request->id;
        if($request->file('portfolio_image')){
            $portfolio_image = $request->file('portfolio_image');
            $name_gen = hexdec(uniqid()).'.'.$portfolio_image->getClientOriginalExtension();
            Image::make($portfolio_image)->resize(1020,520)->save('Upload/portfolio/'.$name_gen);
            $save_url = 'Upload/portfolio/'.$name_gen;
            Portfolio::insert([

                'portfolio_name'=>$request->portfolio_name,
                'portfolio_title'=>$request->portfolio_title,
                'portfolio_description'=>$request->portfolio_description,
                'portfolio_image'=>$save_url,
                'created_at' => Carbon::now(),
                
            ]);

            $notification = array (
                'message' => 'Portfolio Data Inserted Successfuly',
                'alert-type'=> 'success'
            );
            return redirect()->route('all.portfolio')->with($notification);

        }

   }//end method

   public function EditPortfolioImage($id){
      $edit_portfolio = Portfolio::findOrFail($id);
      return view('admin.portofolio.edit_portfolio_image', compact('edit_portfolio'));
   }// end method

    public function DeletePortfolioData($id){

      $portfolio = Portfolio::findOrFail($id);
      $img =$portfolio->portfolio_image;
      unlink($img);
      Portfolio::findOrFail($id)->delete();

      $notification = array (
          'message' => 'Portfolio Data Deleted Successfuly',
          'alert-type'=> 'success'
      );
      return redirect()->back()->with($notification);

    }// end method 

    public function UpdatePortfolioImage(Request $request){

      $portfolio_id = $request->id;
      if($request->file('portfolio_image')){
          $portfolio_image = $request->file('portfolio_image');
          $name_gen = hexdec(uniqid()).'.'.$portfolio_image->getClientOriginalExtension();
          Image::make($portfolio_image)->resize(1020,520)->save('Upload/portfolio/'.$name_gen);
          $save_url = 'Upload/portfolio/'.$name_gen;
          Portfolio::findOrFail($portfolio_id)->update([

            'portfolio_name'=>$request->portfolio_name,
            'portfolio_title'=>$request->portfolio_title,
            'portfolio_description'=>$request->portfolio_description,
            'portfolio_image'=>$save_url,
              
          ]);

          $notification = array (
              'message' => 'Portfolio page updated Successfuly',
              'alert-type'=> 'success'
          );
          return redirect()->route('all.portfolio')->with($notification);

      }else{

         Portfolio::findOrFail($portfolio_id)->update([
            'portfolio_name'=>$request->portfolio_name,
            'portfolio_title'=>$request->portfolio_title,
            'portfolio_description'=>$request->portfolio_description,
              
          ]);

          $notification = array (
              'message' => 'portfolio Page updated with out image successfuly',
              'alert-type'=> 'success'
          );
          return redirect()->route('all.portfolio')->with($notification);
      }//end else
    }//end method

    public function PortfolioDetails($id){

      $portfolio_details = Portfolio::findOrFail($id);
      return view('frontend.portfolio_details', compact('portfolio_details'));
    }//end method

    public function HomePortfolio(){
      $portfolio = Portfolio::latest()->get();
      return view('frontend.portfolio',compact('portfolio'));
    }//end function method
}
