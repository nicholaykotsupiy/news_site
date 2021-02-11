<?php

namespace It20Academy\App\Models;

class Post
{
    private $title;

    public static function all(): array
    {
        $db = [];
        $posts = isset($db['posts']) ? $db['posts'] : [];

        return array_map(function ($initialPost) {
            $post = new self;



        }, $posts);
    }


    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
}