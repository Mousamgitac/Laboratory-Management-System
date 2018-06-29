<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\controller;
use App\Post;

class blogController extends Controller
{
   public function getIndex()
    {
     $posts = Post::paginate(1);
     return view('blog.index')->withPosts($posts);
    }

    public function getSingle($slug){
    //fetch the data from db based on slug
    $post = Post::where('slug','=', $slug)->first();
    //return the view and pass in the post object
    return view('blog.single')->withPost($post);
  }

}
