<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array (
            'message' => 'You are Logout Successfuly',
            'alert-type'=> 'success'
        );

        return redirect('/login')->with($notification);
    }

    public function Profile(){
        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view('admin.admin_profile_view', compact('adminData'));
    }//end method

    public function editProfile(){

        $id = Auth::user()->id;
        $editData = User::find($id);
        return view('admin.admin_profile_edit', compact('editData'));

    }//end method

    public function StoreProfile(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->username = $request->username;

        if($request->file('profile_image')){
            // take the file that came with post request and store on $file variable
            $file = $request->file('profile_image');
             
            @unlink(public_path('Upload/admin_images/'. $data->profile_image));
             // here i am changing the name of the image to unique file name

            $filename=  date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('Upload/admin_images'),$filename);
            $data['profile_image'] = $filename;
            
        }
        $data->save();

        $notification = array (
            'message' => 'Admin profile updated Successfuly',
            'alert-type'=> 'success'
        );
        return redirect()->route('admin.profile')->with($notification);


    }//end method

    public function ChangePassword(){

        return view('admin.admin_change_password');
    }//end method

    public function UpdatePassword(Request $request){
    
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required',
            'confirm_password' => 'required|same:newpassword',
             

        ]);

        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->oldpassword,$hashedPassword)){
            $users = User::find(Auth::id());
            $users -> password = bcrypt($request->newpassword);
            $users -> save();

            session()->flash('message', 'Password updated successfully');
            return redirect()->back();
        }else{
            session()->flash('message', 'Old Password is not updated,try again');
            return redirect()->back();
        }

    }//end method

     public function HomePage(){
         
        return view('admin.index');
        
     }//end method
}
