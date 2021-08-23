<?php

namespace App\Http\Controllers;

use App\Category;
use App\Tag;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags   = Tag::all();
        return view('posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        // Validate on all data coming form users
        $this->validate($request, [
            'title'         => 'required|string',
            'content'       => 'required',
            'image'         => 'image',
            'category_id'   => 'required',
            'tags'          => 'required'
        ]);
        $request_data = $request->all();
        // dd($request_data);

        /* Check image exist in request then kame image
            with resize 300 and save aspect ratio
            then save on uploads folder
        */

        if ($request->image) {
            Image::make($request->image)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/posts/' . $request->image->hashName()));
            $request_data['image'] = $request->image->hashName();

            $post = Post::create([
                "title"         => $request->title,
                "user_id"       => Auth::user()->id,
                "content"       => $request->content,
                "category_id"   => $request->category_id,
                "slug"          => Str::slug($request->title),
                'image'         => $request->image->hashName(),
            ]);

            $post->tags()->attach($request->tags);
        } else {
            $post = Post::create([
                "user_id" => Auth::user()->id,
                "title" => $request->title,
                "content" => $request->content,
                "category_id" => $request->category_id,
                "slug" => Str::slug($request->title),
            ]);

            $post->tags()->attach($request->tags);
        }



        // Return to home page of posts with success session
        return redirect()->route('home')->with('success', 'Post of created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $post = Post::where('slug', $slug)->where('user_id', Auth::user()->id)->first();
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        // Validate on all data coming form users
        $this->validate($request, [
            'title'         => 'required|string',
            'content'       => 'required',
            'image'         => 'image',
            'category_id'   => 'required',
            'tags'          => 'required'
        ]);
        $request_data = $request->all();

        // Select post by id
        $post = Post::find($id);


        /* Check image exist in request then kame image
            with resize 300 and save aspect ratio
            then save on uploads folder
        */

        if ($request->hasFile('image')) {
            // Delete image from uploads folder
            if ($post->image) {
                Storage::disk('public_uploads')->delete('/posts/' . $post->image);
            }
            // then add new image to uploads folder
            Image::make($request->image)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/posts/' . $request->image->hashName()));
            $request_data['image'] = $request->image->hashName();
            // Edit on database table
            $post->update([
                "image" => $request->image->hashName(),
            ]);
        }


        // Create new post from post model
        $post->update([
            "user_id"       => Auth::user()->id,
            "title"         => $request->title,
            "content"       => $request->content,
            "category_id"   => $request->category_id,
            "slug"          => Str::slug($request->title),
        ]);


        $post->tags()->sync($request->tags);

        // Return to home page of posts with success session
        return redirect()->route('home');
    }
}
