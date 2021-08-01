<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Support\Str;



class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index')->with('posts', post::all());
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $categories=Category::all();
          if($categories->count()==0){

            return redirect(route('category.create'));

          }

          $tags=Tag::all();
          if($tags->count()==0){

            return redirect(route('tag.create'));

          }

        return view('posts.create')->with('categories', $categories)->with('tags',$tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [

                "title"     =>    "required",
                "content"   =>    "required",
                "category_id" =>   "required",
                "featured"  =>    "required|image",
                "tags" =>   "required"


        ]);

        $featured=$request->featured;
        $featured_new=time().$featured->getClientOriginalName();
        $featured->move('uploads/posts', $featured_new);



        $post = post::create([
            'title'=> $request->title,
            'content' => $request->content,
            'category_id'=> $request->category_id,
            'featured' =>  'uploads/posts/' . $featured_new,
            'slug' => Str::slug($request->title)

           ]);

              $post->tags()->attach($request->tags);

        return redirect()->back();
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
        $post=post::find($id);
        return view('posts.edit')->with('posts',$post)->with('categories',Category::all())->with('tags',Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post=post::find($id);

        $this->validate($request, [

            "title"     =>    "required",
            "content"   =>    "required",
            "category_id" =>   "required",

    ]);
            if($request->hasFile('featured')){

                $featured=$request->featured;
                $featured_new=time().$featured->getClientOriginalName();
                $featured->move('uploads/posts', $featured_new);
                $post->featured='uploads/posts/' .$featured_new;

            }

            $post->title =  $request->title;
            $post->content =  $request->content;
            $post->category_id = $request->category_id;
            $post->save();

            $post->tags()->sync($request->tags);
             return redirect(route('posts'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=post::find($id);
        $post->delete();
        return redirect()->back();
    }

    public function trashed()
    {
        $post=post::onlyTrashed()->get();
        return view('posts.softdeleted')->with('posts', $post);
    }


    public function restore($id)
    {
        $post=post::withTrashed()->where('id', $id)->first();
        $post->restore();
        return redirect(route('posts'));
    }


    public function hdelete($id)
    {
        $post=post::withTrashed()->where('id', $id)->first();
        $post->forceDelete();
        return redirect()->back();
    }
}
