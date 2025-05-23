<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\View;

class homeController extends Controller
{
    public function __invoke()
    {
        $posts = Post::with('user')->latest()->get();

        return view('users.post',compact('posts'));
    }

    // public function test(?int $id = null){
    //     return "hello from session in laravel " . $id;
    // }
}
