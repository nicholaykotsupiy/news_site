<?php

namespace It20Academy\App\Models;

use It20Academy\App\Core\Db;

class Post
{
    private $id;
    private $title;
    private $author;
    private $status;
    private $category;
    private $img;
    private $content;

    public static function all(): array
    {
        $dbh = (new Db())->getHandler();
        $statement = $dbh->query('select * from posts');
        $initialPosts = $statement->fetchAll();

        return array_map(function($currentPost){
            $post = new self;
            $post->setId($currentPost['id']);
            $post->setTitle($currentPost['title']);
            $post->setAuthor($currentPost['author_id']);
            $post->setStatus($currentPost['status_id']);
            $post->setCategory($currentPost['category_id']);
            $post->setImg($currentPost['img']);
            $post->setContent($currentPost['content']);
            return $post;
        }, $initialPosts);
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId(): int
    {
        return $this->id;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }
    public function getTitle(): string
    {
        return $this->title;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
    }
    public function getAuthor(): int
    {
        return $this->author;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }
    public function getStatus(): int
    {
        return $this->status;
    }

    public function setCategory($category)
    {
        $this->category = $category;
    }
    public function getCategory(): int
    {
        return $this->category;
    }

    public function setImg($img)
    {
        $this->img = $img;
    }
    public function getImg(): string
    {
        return $this->img;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }
    public function getContent(): string
    {
        return $this->content;
    }
}