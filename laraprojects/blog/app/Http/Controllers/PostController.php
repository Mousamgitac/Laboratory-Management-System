<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\controller;
use App\Post;
use App\Category;
use App\Tag;
use Session;
use Image;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
    }


    public function index()
    {
     $posts = Post::paginate(5);
     $categories = Category::all();
     
     return view('posts.index')->withPosts($posts)->withCategories($categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
                'title' => 'required|max:255',
                'slug' => 'required|alpha_dash|max:255|min:5',
                'body'  => 'required',
                'category_id' => 'required|numeric'
            ));

        // store in the database
        $post = new Post;

        $post->title = $request->title;
        $post->body = $request->body;
        $post->category_id = $request->category_id;
        $post->slug = $request->slug;

        if($request->hasFile('featured_image')){
         $image = $request->file('featured_image');
         $filename = time() .'.' . $image->getClientOriginalExtension();
         $location =public_path('images/' .$filename);
         Image::make($image)->resize(800,400)->save($location);
         $post->image = $filename;
        }

        $post->save();

        $post->tags()->sync($request->tag_id,false);

        Session::flash('success', 'The blog post was successfully saved!');

        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $post = Post::find($id); 
        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     $post = Post::find($id);
     $categories = Category::all();
     $tags = Tag::all();
     return view('posts.edit')->withPost($post)->withCategories($categories)->withTags($tags);   
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
         //validate the data
        $post = Post::find($id);
        if($request->input('slug') == $post->slug){
          $this->validate($request,array(
         'title'=>'required|max:254',
         'body'=>'required',
         'category_id' => 'required|numeric'
     ));   
        }
        else{
        $this->validate($request,array(
            'title'=>'required|max:254',
            'slug' => 'required|alpha_dash|max:255|min:5|unique:posts,slug',
            'body'=>'required',
            'category_id' => 'required|numeric'
    ));
    }
        //store in db
         $post = Post::find($id);
         $post->title = $request->input('title');
         $post->slug = $request->input('slug');
         $post->category_id = $request->category_id;
         $post->body = $request->input('body');
         $post->save();
         $post->tags()->sync($request->tag_id);
         $request->session()->flash('success','The blog was successfully updated');
         return redirect()->route('posts.show',$post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $post = Post::find($id);
      $post->delete();
      Session::flash('success','The blog was successfully deleted');
      return redirect()->route('posts.index'); 
    }
}
