<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use Illuminate\Http\Request;
use App\Http\Requests\Reply\StoreRequest;
use App\Http\Requests\Reply\UpdateRequest;

class RepliesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        //
         Reply::create([
'content' => $request->content,
 'user_id' => auth()->id(),
 'parent_comment_id' => $request->parent_comment_id,
        ]);
            session()->flash('notification', 'reply added ');
            return to_route('posts.index');
        }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $reply = Reply::find($id);
        // dd($comment);
        return view('users.replyEdit', compact('reply'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest$request, string $id)
    {
        //
        $reply = Reply::find($id);
        $reply->content = $request->content;
        $reply->save();
        session()->flash('message', 'Your Reply is updated');
        return to_route("posts.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $reply = Reply::find($id);
        $reply->delete();

        session()->flash('messagee', 'Reply is deleted');

        return to_route("posts.index");
    }
}
