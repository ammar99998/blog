<?php

namespace App\Http\Controllers;

use App\Models\blog;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id=Auth::id();
        $role=auth()->user()->role;
        if($role == 1){
            $post=blog::latest()->where('user_id',$id)->paginate(5);
            // $post = DB::table('blogs')->where('id',$id);
               //$post=blog::all();
               return view('admin.dashboard',compact('post')); 
              }
        if($role == 2){
        $post=blog::latest()->where('user_id',$id)->paginate(5);
        // $post = DB::table('blogs')->where('id',$id);
           //$post=blog::all();
           return view('user.dashboard',compact('post')); 
          }
        // $post=blog::latest()->paginate(5);
        // return view('index',compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,blog $blog)
    {
        $request->validate([
            'subject'=>'required',
            'Description'=>'required',
            
        ]);
        $user=Auth::user()->id;
        
        $blog->user_id=$user;
        $blog->subject=$request['subject'];
        $blog->Description=$request['Description'];
        $blog->save();
       // $post=blog::create($request->all());
        if($user == 1){
        return redirect()->route('admindashoard')->with('success','the blog add sccessflly');
        }else{
            return redirect()->route('user.dashboard')->with('success','the blog add sccessflly');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(blog $blog)
    {

        return view('show',compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
 
$blog=blog::find($id);
     return view('edit',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, blog $blog,$id)
    {
        $request->validate([
            'subject'=>'required',
            'Description'=>'required'

        ]);

        $user=Auth::user()->id;
        $post= blog::find($id);
        $post->subject=$request['subject'];
        $post->Description=$request['Description'];
        $post->save();
        if($user == 1){
            return redirect()->route('admindashoard')->with('success','the blog update sccessflly');
            }else{
                return redirect()->route('user.dashboard')->with('success','the blog update sccessflly');
            }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post= blog::find($id);
  $post->delete();
   return redirect()->route('index')->with('success','the blog deleted sccessflly');
    }
}
