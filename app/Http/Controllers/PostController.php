<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function createPost(Request $request)
    {
        $userResponse = $request([
            "title" => 'required',
            "body" => 'required'
        ]);

        $createPost = Post::create($userResponse);
    }
}
