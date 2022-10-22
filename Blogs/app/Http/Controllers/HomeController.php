<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;


use App\Models\blog;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $post=blog::latest()->paginate(10);

     return view('home',compact('post'));
    }
}
