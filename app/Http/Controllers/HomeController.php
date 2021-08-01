<?php

namespace App\Http\Controllers;
use App\user;
use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
  /*  public function __construct()
    {
        $this->middleware('auth');
    } */

    public function __construct(){


        return $this->middleware('auth');


           }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    public function dashboard()
    {
        return view('dashboard')
        ->with('post_count',Post::all()->count())
        ->with('category_count',category::all()->count())
        ->with('tag_count',Tag::all()->count())
        ->with('user_count',user::all()->count())
        ->with('trashed_count',Post::onlyTrashed()->get()->count());




    }


}
