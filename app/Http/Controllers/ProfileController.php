<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;

class ProfileController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profile.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function setting()
    {
        $user = Auth::user();
        if ($user->profile == null) {
            Profile::create([
                'user_id'   => $user->id,
                'image'     => 'default.png',
                'facebook'  => 'https://www.facebook.com',
                'twitter'   => 'https://www.twitter.com',
                'github'    => 'https://www.github.com',
                'about'     => 'About here',
            ]);
        }
        return view('profile.setting', compact('user'));
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
        // dd($request);
        // Validate on all data coming form request
        // $this->validate($request, [
        //     'name'      => 'required',
        //     'email'     => 'required|email',
        //     'password'  => 'required|password|confirmed',
        //     'image'    => 'nullable|image',
        //     'facebook'  => 'nullable',
        //     'twitter'   => 'nullable',
        //     'github'    => 'nullable',
        //     'about'     => 'nullable',
        // ]);

        $user = User::find($id);
        $request_data = $request->all();

        if ($request->image && $request->image != null) {
            // Delete image from uploads folder
            if ($user->profile->image) {
                Storage::disk('public_uploads')->delete('/users/' . $user->profile->image);
            }
            Image::make($request->image)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/users/' . $request->image->hashName()));
            $request_data['image'] = $request->image->hashName();


            $user->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
            // if request has password and password not null
            if ($request->has('password') && $request->password != null) {
                $user->update([
                    'password' => Hash::make($request->password),
                ]);
            }
            $user->profile->update([
                'image'     => $request->image->hashName(),
                'facebook'  => $request->facebook,
                'twitter'   => $request->twitter,
                'github'    => $request->github,
                'about'     => $request->about,
            ]);
        } else {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
            // if request has password and password not null
            if ($request->has('password') && $request->password != null) {
                $user->update([
                    'password' => Hash::make($request->password),
                ]);
            }
            $user->profile->update([
                'facebook'  => $request->facebook,
                'twitter'   => $request->twitter,
                'github'    => $request->github,
                'about'     => $request->about,
            ]);
        }

        return redirect()->back();
    }

    public function dashboard()
    {
        $posts = Post::where('user_id', Auth::user()->id)->get();
        $postsTrashed = Post::onlyTrashed()->where('user_id', Auth::user()->id)->get();
        return view('profile.dashboard', compact('posts', 'postsTrashed'));
    }
}
