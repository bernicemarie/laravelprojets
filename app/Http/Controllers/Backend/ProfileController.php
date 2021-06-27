<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Models\User;

class ProfileController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
  }
    public function ProfileView(){
    $id = Auth::user()->id;
  $user['profile']= User::find($id);
 return view('backend.user.view_profile',$user);
    } 
    public function ProfileEdit(){
    $id = Auth::user()->id;
  $user['profile']= User::find($id);
 return view('backend.user.edit_profile_user',$user);
    }
    public function ProfileUpdate(Request $request){
         $data = User::find(Auth::user()->id);
         $data->telephone = $request->telephone;
         $data->name = $request->name;
         $data->adresse = $request->adresse;
         $data->sexe = $request->sexe;
         if ($request->file('image')) {
             $file = $request->file('image');
             @unlink(public_path('upload_image/user_image/'.$data->image));
             $filename = date('YmdHi').$file->getClientOriginalName();
             $file->move(public_path('upload_image/user_image'),$filename);
             $data['image']= $filename;
         }
         
        $data->save();
        $notification=['message'=>'Profile modifié avec succès',
                        'alert-type'=>'success'
                         ];
        return Redirect()->route('profile.view')->with($notification); 
         

    }
     public function PasswordView(){
    $id = Auth::user()->id;
  $user['profile']= User::find($id);
 return view('backend.user.edit_password',$user);
    }

     public function PasswordStore(Request $request){
        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->current_password,$hashedPassword)) {
            $user = User::find(Auth::id());
             if ($request->password == $request->confirm_password) {
            $user->password= Hash::make($request->password);
            $user->save();
            Auth::logout();
             return Redirect()->route('login'); 
            }
             else{
                $notification=['message'=>'Confirmer bien votre nouveau mot de pass',
                        'alert-type'=>'error'
                         ];
           return Redirect()->route('password.view')->with($notification); 
        }
            

        }
        else{
            $notification=['message'=>'Donner votre mot de pass actuel',
                        'alert-type'=>'error'
                         ];
            return Redirect()->back()->with($notification); 
        }
         /*$data = User::find(Auth::user()->id);
         $data->password = bcrypt($request->password) ;
        $data->save();
        $notification=['message'=>'Mot de pass modifié avec succès',
                        'alert-type'=>'success'
                         ];*/
       /* return Redirect()->route('profile.view')->with($notification); */
         

    }
}
