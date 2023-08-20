<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notofication = array(
            'message' => 'User Logout Succesfully',
            'alert-type' => 'success'
        );
        return redirect('/login')->with($notofication);
    }

   public function Profile(){
        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view('admin.admin_profile_view',compact('adminData'));

   }

   public function EditProfile(){
        $id = Auth::user()->id;
        $editData = User::find($id);
        return view('admin.admin_profile_edit',compact('editData'));

   }

   public function StoreProfile(Request $request){
    $id = Auth::user()->id;
    $data = User::find($id);
    $data->name = $request->name;
    $data->email = $request->email;
    $data->username = $request->username;


    if($request->file('profile_image')){
        $file = $request->file('profile_image');

        $filename = date('YmdHi').$file->getClientOriginalName();
        $file->move(public_path('upload/admin_images'),$filename);
        $data['profile_image'] = $filename;
    }
    $data->save();

    $notofication = array(
        'message' => 'Admin Profile Updated Succesfully',
        'alert-type' => 'success'
    );

    return redirect('/admin/profile')->with($notofication);

}

public function ChangePassword(){
    return view('admin.admin_change_password');
}


public function UpdatePassword(Request $request){
    $validateData = $request->validate([
        'oldpassword' => 'required',
        'newpassword' => 'required',
        'confirm_password' => 'required|same:newpassword',

    ]);

    $hashedPassword = Auth::user()->password;
    if(Hash::check($request->oldpassword,$hashedPassword))
    {
        $users = User::find(Auth::id());
        $users->password = bcrypt($request->newpassword);
        $users->save();

        session()->flash('message', 'Password Updated Successfully');
        return redirect()->back();
    }else{
        session()->flash('message', 'Old Password Is Not Match');
        return redirect()->back();
    }


}


}

