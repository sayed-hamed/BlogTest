<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $comments=Comment::all();
        $posts=Post::all();
        return view('admin.comments.comment',compact('comments','posts'));
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
            'desc'=>'required',
            'post_id'=>'required'
        ]);

        $comment=new Comment();
        $comment->title=$request->title;
        $comment->body=$request->desc;
        $comment->post_id=$request->post_id;
        $comment->save();


        toastr()->success('Data Saved Successfully!!');
        return redirect()->route('admin.comments.index');
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
            'desc'=>'required',
            'post_id'=>'required'
        ]);

        $comment=Comment::findOrFail($request->id);
        $comment->title=$request->title;
        $comment->body=$request->desc;
        $comment->post_id=$request->post_id;
        $comment->save();


        toastr()->success('Data Saved Successfully!!');
        return redirect()->route('admin.comments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        $comment=Comment::findOrFail($request->id);
        if ($comment->trashed()){
            $comment->forceDelete();
            toastr()->error('Data Deleted Successfully!!');
            return redirect()->route('admin.comments.index');
        }
        $comment->delete();
        toastr()->error('Data Deleted Successfully!!');
        return redirect()->route('admin.comments.index');
    }

    public function deleteTrash(Request $request)
    {
        $comment=Comment::where('id',$request->id);
        $comment->forceDelete();
        toastr()->error('Data Deleted Successfully!!');
        return redirect()->route('admin.comments.index');
    }

    public function trashBack(Request $request)
    {
        $comment=Comment::where('id',$request->id);
        $comment->restore();
        toastr()->success('Data Restored Successfully!!');
        return redirect()->route('admin.comments.index');
    }

    public function trash()
    {
        $comments=Comment::onlyTrashed()->get();
        return view('admin.comments.Tash',compact('comments'));
    }
}
