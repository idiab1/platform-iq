<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view("posts.index", compact("posts"));
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

        if ($categories->count() == 0) {
            return redirect()->route('category.create');
        }
        if ($tags->count() == 0) {
            return redirect()->route('tag.create');
        }

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
        // Validate on all data coming form users
        $this->validate($request, [
            'title' => 'required|string',
            'content' => 'required',
            'image' => 'image',
            'category_id' => 'required',
            'tags' => 'required'
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
        }

        // Create new post from post model
        // post::create($request_data);
        $post = post::create([
            "title" => $request->title,
            "content" => $request->content,
            "category_id" => $request->category_id,
            "slug" => Str::slug($request->title),
            "image" => $request->image->hashName(),
        ]);

        $post->tags()->attach($request->tags);

        // Return to home page of posts with success session
        return redirect()->route('posts.index')->with('success', 'Post of created');
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
    public function edit($id)
    {
        $post = Post::find($id);
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
            'title' => 'required|string',
            'content' => 'required',
            'image' => 'image',
            'category_id' => 'required',
            'tags' => 'required'
        ]);
        $request_data = $request->all();

        // Select post by id
        $post = Post::find($id);


        /* Check image exist in request then kame image
            with resize 300 and save aspect ratio
            then save on uploads folder
        */
        // if ($request->image) {
        //     Image::make($request->image)->resize(300, null, function ($constraint) {
        //         $constraint->aspectRatio();
        //     })->save(public_path('uploads/posts/' . $request->image->hashName()));
        //     $request_data['image'] = $request->image->hashName();
        // }

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
            "title" => $request->title,
            "content" => $request->content,
            "category_id" => $request->category_id,
            "slug" => Str::slug($request->title),
        ]);


        $post->tags()->sync($request->tags);

        // Return to home page of posts with success session
        return redirect()->route('posts.index')->with('success', 'Post of created');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    // Soft delete
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->back();
    }

    // Return only posts trashed
    public function trashed()
    {
        $posts = Post::onlyTrashed()->get();
        return view('posts.trashed', compact('posts'));
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->where("id", $id)->first();
        $post->restore();
        return redirect()->back();
    }

    public function hdelete($id)
    {
        $post = Post::withTrashed()->where("id", $id)->first();
        if ($post->image) {
            Storage::disk("public_uploads")->delete('/posts/' . $post->image);
        }
        $post->forceDelete();
        return redirect()->back();
    }
}
