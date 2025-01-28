<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Filament\Notifications\Notification;
use App\Http\Requests\Comment\StoreRequest;
use App\Http\Requests\Comment\UpdateRequest;

class CommentController extends Controller
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
        Comment::create([
            'post_id' => $request->post_id,
            'parent_comment_id' => null,
            'content' => $request->content,
            'user_id' => auth()->id(),

        ]);
        // Notification::make()
        //             ->title("Success!")
        //             ->body("Your post is now live. The world is ready to hear your voice!")
        //             ->success()
        //             ->send();
        session()->flash('notification', 'comment added ');
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
        $comment = Comment::find($id);
        // dd($comment);
        return view('users.commentEdit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        //
        $comment = Comment::find($id);
        $comment->content = $request->content;
        $comment->save();
        session()->flash('message', 'Your post is updated');
        return to_route("posts.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $comment = comment::find($id);
        $comment->delete();

        session()->flash('messagee', 'Your post is deleted');

        return to_route("posts.index");
    }
}
