<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

use App\Models\blog;
class userController extends Controller
{
    public function index(){
      $id=Auth::id();
        $role=auth()->user()->role;
        if($role == 2){
      $post=blog::latest()->where('user_id',$id)->paginate(5);
      // $post = DB::table('blogs')->where('id',$id);
         //$post=blog::all();
         return view('user.dashboard',compact('post')); 
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
            return view('users.profile')->with('pro',$pro);
        
           return view('user.profile');
        }
       }
       public function settings(){
        $role=auth()->user()->role;
        if($role == 2){
         
           return view('user.settings');
        }
       }
}
