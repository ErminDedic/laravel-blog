<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        $posts = Post::latest()->paginate(10);
        return view('home')->with([
            'posts' => $posts,
        ]);
    }

    public function searchByTerm(Request $request){
        $posts = Post::orderBy('created_at','desc')
                    ->where('title_en', 'like', '%'.$request->term.'%')
                    ->published()->get();
        return response()->json($posts);
    }
}