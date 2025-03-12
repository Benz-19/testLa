<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function createPost(Request $request)
    {
        $userResponse = $request->validate([
            "title" => 'required',
            "body" => 'required'
        ]);

        $userResponse["title"] = strip_tags($userResponse["title"]);
        $userResponse["body"] = strip_tags($userResponse["body"]);
        $userResponse["user_id"] = auth()->id();

        Post::create($userResponse);
        return redirect("/");
    }

    public function showEditScreen(Post $post)
    {
        if (auth()->user()->id !== $post['user_id'])
            return redirect('/');
        return view('edit-post', ['post' => $post]);
    }

    public function updatePost(Post $post, Request $request)
    {
        if (auth()->user()->id !== $post['user_id'])
            return redirect('/');

        $incomingRequest = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $incomingRequest['title'] = strip_tags($incomingRequest['title']);
        $incomingRequest['body'] = strip_tags($incomingRequest['body']);

        $post->update($incomingRequest);
        return redirect('/');
    }

    public function deletePost(Post $post, Request $request)
    {
        if (auth()->user()->id === $post['user_id']) {
            $post->delete();
        }
        return redirect('/');
    }
}
