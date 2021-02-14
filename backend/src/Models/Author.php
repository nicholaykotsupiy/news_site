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
            $author->setAuthorName($currentAuthor['name']);
            return $author;
        }, $initialAuthor);
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId(): int
    {
        return $this->id;
    }

    public function setAuthorName($name)
    {
        $this->name = $name;
    }
    public function getAuthorName(): string
    {
        return $this->name;
    }
    public function getShortName(): string
    {  
        $str = self::getAuthorName();
        $explodeStr = explode(' ', $str);
        $shortStr = $explodeStr[0] . ' ';

        for ($i = 1; $i < count($explodeStr); $i++) {
            $shortStr .= mb_substr($explodeStr[$i], 0, 1) . '.';
        }

        return $shortStr;
    }
}