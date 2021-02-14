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

    public static function filteredPost()
    {
        $posts = self::all();

        return array_filter($posts, function($post){
            if(($post->getStatus()-1) === 0){
                return $post;
            }
        });
    }
    
    private function translit($value)
    {
        $converter = array(
            'а' => 'a',    'б' => 'b',    'в' => 'v',    'г' => 'g',    'д' => 'd',
            'е' => 'e',    'ё' => 'e',    'ж' => 'zh',   'з' => 'z',    'и' => 'i',
            'й' => 'y',    'к' => 'k',    'л' => 'l',    'м' => 'm',    'н' => 'n',
            'о' => 'o',    'п' => 'p',    'р' => 'r',    'с' => 's',    'т' => 't',
            'у' => 'u',    'ф' => 'f',    'х' => 'h',    'ц' => 'c',    'ч' => 'ch',
            'ш' => 'sh',   'щ' => 'sch',  'ь' => '',     'ы' => 'y',    'ъ' => '',
            'э' => 'e',    'ю' => 'yu',   'я' => 'ya',

            'А' => 'A',    'Б' => 'B',    'В' => 'V',    'Г' => 'G',    'Д' => 'D',
            'Е' => 'E',    'Ё' => 'E',    'Ж' => 'Zh',   'З' => 'Z',    'И' => 'I',
            'Й' => 'Y',    'К' => 'K',    'Л' => 'L',    'М' => 'M',    'Н' => 'N',
            'О' => 'O',    'П' => 'P',    'Р' => 'R',    'С' => 'S',    'Т' => 'T',
            'У' => 'U',    'Ф' => 'F',    'Х' => 'H',    'Ц' => 'C',    'Ч' => 'Ch',
            'Ш' => 'Sh',   'Щ' => 'Sch',  'Ь' => '',     'Ы' => 'Y',    'Ъ' => '',
            'Э' => 'E',    'Ю' => 'Yu',   'Я' => 'Ya',
        );

        $value = strtr($value, $converter);
        return $value;
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
    public function slag(string $str): string
    {
        return str_replace(' ', '_', strtolower(self::translit($str)));
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
    public function getTruncateContent(int $maxsymbol = 200): string
    {
        $str = self::getContent();
        
        if (strlen($str) > $maxsymbol) {
            return mb_substr($str, 0, $maxsymbol - 3) . '...';
        } else {
            return $str;
        }
    }
}