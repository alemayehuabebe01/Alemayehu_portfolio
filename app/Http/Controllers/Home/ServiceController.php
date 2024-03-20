<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class ServiceController extends Controller
{
    public function AllService(){
        $services = Service::latest()->get();
        return view('admin.services.all_service', compact('services'));
    }// end method

    public function AddService(){
        return view('admin.services.service_add');
    }// end function method

            public function StoreService(Request $request){

                
            $request ->validate([
                'service_name'=> 'required',
                'service_title'=> 'required',
                'service_description'=> 'required',
                'service_image'=> 'required',
            [
            'service_name.required' => 'Serices Name Is Required',
            'service_title.required' => 'Serices Title Is Required',
            'service_image.required' => 'Serices Image  Is Required',

            ] ]);

            $service_id = $request->id;
            if($request->file('service_image')){
                $service_image = $request->file('service_image');
                $name_gen = hexdec(uniqid()).'.'.$service_image->getClientOriginalExtension();
                Image::make($service_image)->resize(850,430)->save('Upload/service_image/'.$name_gen);
                $save_url = 'Upload/service_image/'.$name_gen;
                Service::insert([

                    'service_name'=>$request->service_name,
                    'service_title'=>$request->service_title,
                    'service_description'=>$request->service_description,
                    'service_image'=>$save_url,
                    'created_at' => Carbon::now(),
                    
                ]);

                $notification = array (
                    'message' => 'Serices Data Inserted Successfuly',
                    'alert-type'=> 'success'
                );
                return redirect()->route('all.service')->with($notification);
            
            }

           

}// end methode

    public function ServiceDetails(){
       return view('frontend.service_details');
    }

}
