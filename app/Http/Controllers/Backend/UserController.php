<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
  }
    public function UserView(){
       $data['allData']= User::where ('usertype','Admin')->get();
        return view ('backend.user.view_user',$data);
    }
    public function UserAdd(){
        return view ('backend.user.add_user');

    }
    public function UserStore(Request $request){
        $validatedData = $request->validate([
          'email'=> 'required|unique:users|max:255',
          'name'=> 'required',
        ],
        [
        'email.required'=>'Ce champ doit avoir @',
        'name.required'=>'Ce champ est obligatoire',

        ]
    );
         $data = new User();
         $code = rand(0000,9999);
         $data->usertype = 'Admin';
         $data->role = $request->role;
         $data->email = $request->email;
         $data->name = $request->name;
         $data->password = bcrypt($code);
         $data->code = $code;
    
    /* $brand->user_id = Auth::user()->id; */
        $data->save();
        $notification=['message'=>'Utilisateur ajouté avec succès',
                        'alert-type'=>'success'
                         ];
        return Redirect()->route('user.view')->with($notification); 

    }
     public function UserEdit($id){
         $editData['userData']= User::find($id);
        return view ('backend.user.edit_user',$editData);

    }
    public function UserUpdate(Request $request, $id){
         $data = User::find($id);
         $code = rand(0000,9999);
         $data->password = bcrypt($code);
         $data->code = $code;
         $data->role = $request->role;
         $data->name = $request->name;
         
        $data->save();
        $notification=['message'=>'Utilisateur modifié avec succès',
                        'alert-type'=>'success'
                         ];
        return Redirect()->route('user.view')->with($notification); 
         

    }

    public function UserDelete($id){
         $data = User::find($id);
        @unlink(public_path('upload_image/user_image/'.$data->image));
        $data->delete();
        $notification=['message'=>'Utilisateur supprimé avec succès',
                        'alert-type'=>'success'
                         ];
        return Redirect()->route('user.view')->with($notification); 
         

    }
}
