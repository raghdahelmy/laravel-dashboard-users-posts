<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Filament\Notifications\Notification;

class postController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $posts = Post::orderBy('created_at','desc')->get();
        // dd($posts);
        return view('users.post', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('users.PostCreat');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
'title'=> 'required|min:2|max:100',
'description'=>'required|min:2|max:255',
        ]);

        Post::create([
            "description"=> $request->description,
            'title'=>$request->title,
        ]);
        Notification::make()
            ->title("Success!")
            ->body("Your post is now live. The world is ready to hear your voice!")
            ->success()
            ->send();
            // dd('Notification sent');

            // session()->flash('message', 'Your post is now live!');

            // session()->flash('toastr', [
            //     'type' => 'success', // أو 'error', 'warning', 'info'
            //     'message' => 'Your post is now live!'
            // ]);

            session()->flash('notification', 'Your post is now live. The world is ready to hear your voice!');

return redirect()->route('posts.index');
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
        // echo "hello from edit";
        $post = Post::find($id);
        return view('users.postEdit',['posts'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);
        $post = Post::find($id);
        $post->title = $request->title;
        $post->description = $request->description;
$post->save();
session()->flash('message', 'Your post is updated');

return redirect()->route("posts.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        echo "hello from deleted page";
        $post = Post::find($id);
        $post->delete();

        session()->flash('messagee', 'Your post is deleted');

        return redirect()->route("posts.index");
    }
}
