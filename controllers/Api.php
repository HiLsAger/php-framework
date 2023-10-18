<?php

namespace controllers;

use classes\Controller;
use models\Post;

class Api extends Controller
{
    public function index()
    {
        print_r(Post::all());
        $this->render('index', [
            'text' => 'Hello world'
        ]);
    }
    public function create()
    {
        $post = new Post();
        $post->name = 'Третий пост';
        $post->content = 'Третий пост';
        $post->status = 'published';

        if ($post->save()) {
            $this->render('success');
        }
        $this->render('fail');
    }

    public function GetResponse()
    {
        $this->render('payment-order', [
            'text' => 'Hello world'
        ]);
    }
}
