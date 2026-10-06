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

    public function update() {
        $post = Post::find(6);
        $post->update([
                'title' => 'updated',
                'content' => 'updated',
                'image' => 'updated',
                'likes' => 500,
                'is_published' => 0,
        ]);
        dd('updated');
    }

    public function delete(){
        $post = Post::find(2);
        // $post = Post::withTrashed()->find(2);
        // $post->restore();
        $post->delete();
        dd('deleted');
    }

    public function firstOrCreate(){
        $anotherPost = [
                'title' => 'some post',
                'content' => 'some content',
                'image' => 'some image.png',
                'likes' => 5000,
                'is_published' => 1,
        ];

        $post = Post::firstOrCreate([
            'title' => 'some post'
        ],[
                'title' => 'some post',
                'content' => 'some content',
                'image' => 'some image.png',
                'likes' => 5000,
                'is_published' => 1,
        ]);
        dump($post->content);
        dd('finished');
    }
    public function updateOrCreate(){
                $anotherPost = [
                'title' => 'update or create some post',
                'content' => 'some content',
                'image' => 'some image.png',
                'likes' => 500,
                'is_published' => 0,
        ];
        $post = Post::updateOrCreate([
            'title' => 'some post'
        ],
        [
                            'title' => 'update or create some post',
                'content' => 'some content',
                'image' => 'some image.png',
                'likes' => 500,
                'is_published' => 0,
        ])
    }


}
