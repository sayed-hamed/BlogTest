<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $posts=Post::all();
        return  view('admin.posts.posts',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'author'=>'required',
            'img'=>'required|image|mimes:jpg,bmp,png,jpeg,svg',
            'desc'=>'required',
        ]);

        if ($request->hasFile('img'))
        {
            $file=$request->img;
            $file_name=$file->getClientOriginalName();
            $file->storeAs('posts',$file_name,'uploads');

        }

        Post::create([
           'title'=>$request->title,
            'author'=>$request->author,
            'date'=>$request->desc,
            'image'=>$file_name,
        ]);

        toastr()->success('Data Saved Successfully!!');
        return redirect()->route('admin.posts.index');

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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'author'=>'required',
            'img'=>'required|image|mimes:jpg,bmp,png,jpeg,svg',
            'desc'=>'required',
        ]);

        $old_img=Post::findOrFail($request->id)->image;
        if ($request->file('img'))
        {
            Storage::disk('uploads')->delete('posts/'.$old_img);
            $file=$request->img;
            $file_name=$file->getClientOriginalName();
            $file->storeAs('posts',$file_name,'uploads');

        }

        $post=Post::findOrFail($request->id);
        $post->update([
            'title'=>$request->title,
            'author'=>$request->author,
            'date'=>$request->desc,
            'image'=>$file_name,
        ]);

        toastr()->success('Data Updated Successfully!!');
        return redirect()->route('admin.posts.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        $post=Post::findOrFail($request->id);
        Storage::disk('uploads')->delete('posts/'.$post->image);
        $post->delete();
        toastr()->error('Data has been Deleted successfully!');
        return redirect()->route('admin.posts.index');
    }
}
