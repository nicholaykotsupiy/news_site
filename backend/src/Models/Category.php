<?php

namespace It20Academy\App\Models;

use It20Academy\App\Core\Db;

class Category
{
    private $id;
    private $name;

    public static function categoryCreate(): array
    {
        $dbh = (new Db())->getHandler();
        $statement = $dbh->query('select * from categories');
        $initialCategory = $statement->fetchAll();

        return array_map(function($currentCategory){
            $category = new self;
            $category->setId($currentCategory['id']);
            $category->setCategoryName($currentCategory['name']);
            return $category;
        }, $initialCategory);
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId(): int
    {
        return $this->id;
    }

    public function setCategoryName($name)
    {
        $this->name = $name;
    }
    public function getCategoryName(): string
    {
        return $this->name;
    }
}