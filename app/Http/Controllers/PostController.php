<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('is_published', 0)->get();
        foreach ($posts as $post) {
            dump($post->title);
        }
        dd('end');

    }

    public function create()
    {
        $postsArr = [
            [
                'title' => 'title of post from VS code',
                'content' => 'some interesting content',
                'image' => 'image.png',
                'likes' => 20,
                'is_published' => 1,
            ],
            [
                'title' => 'another title of post from VS code',
                'content' => ' another some interesting content',
                'image' => 'another image.png',
                'likes' => 50,
                'is_published' => 1,
            ],
        ];
        foreach ($postsArr as $item) {
            Post::create($item);
        }

        // Post::create([
        //     'title' => 'another title of post from VS code',
        //     'content' => ' another some interesting content',
        //     'image' => 'another image.png',
        //     'likes' => 50,
        //     'is_published' => 1,
        // ]);
        dd("created");
    }




}
