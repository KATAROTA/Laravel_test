<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use function PHPUnit\Framework\returnArgument;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $first_post = Post::first();
        
        return view('post.index', compact('posts', 'first_post'));

    }

    public function create()
    {
        return view('post.create');
    }
    public function store(){
        $data =request()->validate([
            'title'=>'string',
            'content'=>'string',
            'image'=>'string',
        ]);
        Post::create($data);
        return redirect()->route('post.index');
    }

    public function show(Post $post) {
        return view('post.show', compact('post'));
        
    }

    public function edit(Post $post){
        return view('post.edit', compact('post'));
    }



    public function update(Post $post) {
        $data = request()->validate([
            'title'=>'string',
            'content'=>'string',
            'image'=>'string',
        ]);
        $post->update($data);
        return redirect()->route('post.show', $post->id);

    }

    public function delete(){
        $post = Post::find(2);
        // $post = Post::withTrashed()->find(2);
        // $post->restore();
        $post->delete();
        dd('deleted');
    }

    public function destroy(Post $post){
        $post->delete();
        return redirect()->route('post.index');
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
    // public function updateOrCreate(){
    //     $anotherPost = [
    //     'title' => 'update or create some post',
    //     'content' => 'some content',
    //         'image' => 'some image.png',
    //         'likes' => 500,
    //         'is_published' => 0,
    //     ];
    //     $post = Post::updateOrCreate([
    //         'title' => 'some post'
    //     ],
    //     [
    //             'title' => 'update or create some post',
    //             'content' => 'some content',
    //             'image' => 'some image.png',
    //             'likes' => 500,
    //             'is_published' => 0,
    //     ])
    // }


}
