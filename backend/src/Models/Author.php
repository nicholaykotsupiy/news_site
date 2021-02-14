<?php

namespace It20Academy\App\Models;

use It20Academy\App\Core\Db;

class Author
{
    private $id;
    private $name;

    public static function authorCreate(): array
    {
        $dbh = (new Db())->getHandler();
        $statement = $dbh->query('select * from authors');
        $initialAuthor = $statement->fetchAll();

        return array_map(function($currentAuthor){
            $author = new self;
            $author->setId($currentAuthor['id']);
            $author->setName($currentAuthor['name']);
            return $author;
        }, $initialAuthor);
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId(): int
    {
        return $this->$id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
    public function getName(): string
    {
        return $this->$name;
    }
}