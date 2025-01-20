<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class homeController extends Controller
{
    public function index():View
    {
        return view('welcome');
    }
    public function test(?int $id = null){
        return "hello from session in laravel " . $id;
    }
}
