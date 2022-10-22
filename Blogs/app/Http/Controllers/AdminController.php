<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Models\blog;


class AdminController extends Controller
{
   public function index(){
    $role=auth()->user()->role;
    if($role == 1){
      $post=blog::latest()->paginate(5);
      return view('admin.dashboard',compact('post'));
       
    }
   }

   public function profile(){
    $role=auth()->user()->role;
    if($role == 2){
     $user=Auth::user();
     $id=Auth::id();  

    
        $pro = DB::table('profile_users')->where('user_id',$id)->first();
        

        if($pro  == null){
                $profile=profile::create([
                        'gender'=>'any',
                        'bio'=>'hellow',
                        'user_id'=>$id,
                        'address'=>'pleace']);
        }
        
        //$pro=profile::find($id);
    //$pro=profile::find($id);
          $pro = DB::table('profile_users')->where('user_id',$id)->first();
        //return view('admin.profile')->with('pro',$pro);
    

   
    return  view('admin.profile')->with('pro',$pro);
  }
   }
}
