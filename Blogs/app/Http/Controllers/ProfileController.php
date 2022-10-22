<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\profile;
use App\Models\blog;
use Illuminate\Support\Facades\DB;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $user=Auth::user();
        $id=Auth::id();
 
        $this->validate($request,[
      
        'bio'=>'required',
        'gender'=>'required',
        'address'=>'required'
    ]);
        $profile = Profile::where('user_id', Auth::user()->id)->first();
        $profile->gender=$request->gender;
        $profile->address=$request->address;
        $profile->bio=$request->bio;
        $profile->user_id=$id;
    // $user=Auth::user();
    // $user->profile->bio=$request->bio;
    // $user->profile->user_id=$request->$id;
    //$user->profile->address=$request->address;
    $profile->save();

    return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
