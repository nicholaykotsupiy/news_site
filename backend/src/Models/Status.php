<?php

namespace It20Academy\App\Models;

use It20Academy\App\Core\Db;

class Status
{
    private $id;
    private $name;

    public static function statusCreate(): array
    {
        $dbh = (new Db())->getHandler();
        $statement = $dbh->query('select * from statuses');
        $initialStatus = $statement->fetchAll();

        return array_map(function($currentStatus){
            $status = new self;
            $status->setId($currentStatus['id']);
            $status->setStatusName($currentStatus['name']);
            return $status;
        }, $initialStatus);
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId(): int
    {
        return $this->id;
    }

    public function setStatusName($name)
    {
        $this->name = $name;
    }
    public function getStatusName(): string
    {
        return $this->name;
    }
}