<?php

namespace It20Academy\App\Controllers;

use It20Academy\App\Models\Post;
use It20Academy\App\Models\Author;
use It20Academy\App\Models\Status;
use It20Academy\App\Models\Category;
use It20Academy\App\Core\View;

class PostsController
{
    public function index()
    {
        $posts = Post::all();
        $authors = Author::authorCreate();
        $statuses = Status::statusCreate();
        $categories = Category::categoryCreate();

        echo View::render('posts-index', compact('posts', 'authors', 'statuses', 'categories'));
    }
}