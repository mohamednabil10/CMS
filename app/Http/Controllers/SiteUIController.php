<?php

namespace App\Http\Controllers;
use App\Settings;
use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use PDO;

class SiteUIController extends Controller
{



    public function index()
    {
        return view('index')
        ->with('blog_name', Settings::first()->blog_name)
        ->with('categories', Category::take(5)->get())
        ->with('first_post', Post::orderBy('created_at', 'desc')->first())
        ->with('second_post', Post::orderBy('created_at', 'desc')->skip(1)->take(1)->get()->first())
        ->with('third_post', Post::orderBy('created_at', 'desc')->skip(2)->take(1)->get()->first())
        ->with('php', Category::find(2))
        ->with('html', Category::find(4))
        ->with('laravel', Category::find(3))
        ->with('cs', Category::find(5))
        ->with('java', Category::find(1))
        ->with('tags', Tag::take(12)->get())
        ->with('settings', Settings::first());
    }


    public function show($slug)
    {
        $post=Post::where('slug', $slug)->first();
        $next_post=Post::where('id', '>', $post->id)->min('id');
        $prev_post=Post::where('id', '<', $post->id)->max('id');

        return view('posts.show')
       ->with('posts', $post)
       ->with('next', Post::find($next_post))
       ->with('prev', Post::find($prev_post))
       ->with('title', $post->title)
       ->with('settings', Settings::first())
       ->with('categories', Category::take(5)->get())
       ->with('blog_name', Settings::first()->blog_name)
       ->with('tags', Tag::take(12)->get());

       dd($next_post);
    }



    public function category($id)
    {
        $category=Category::find($id);

        return view('categories.category')
          ->with('category', $category)
          ->with('name', $category->name)
          ->with('categories', Category::take(5)->get())
          ->with('blog_name', Settings::first()->blog_name)
          ->with('tags', Tag::take(12)->get())
          ->with('settings', Settings::first());
    }


    public function tag($id)
    {
        $tag=Tag::find($id);

        return view('tags.tag')
        ->with('tag', $tag)
        ->with('name_of_tag', $tag->tag)
        ->with('categories', Category::take(5)->get())
        ->with('blog_name', Settings::first()->blog_name)
        ->with('tags', Tag::take(12)->get())
        ->with('settings', Settings::first());


    }



}
