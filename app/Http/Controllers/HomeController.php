<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Post;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    public function cover()
    {
        return view('cover');
    }

    public function landing()
    {
        $posts = Post::orderBy('id', 'ASC')->paginate(4);
        $last_post = Post::all()->last();
        return view('index', compact('posts', 'last_post'));
    }
}
