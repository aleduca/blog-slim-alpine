<?php

namespace app\database\models;

use PDOException;

class Post extends Base
{
    protected $table = 'posts';

    public function latest($limit)
    {
        try {
            $query = $this->connection->query("select * from {$this->table} inner join users on users.id = posts.user_id order by posts.id desc limit {$limit}");
            return $query->fetchAll();
        } catch (PDOException $e) {
            var_dump($e->getMessage());
        }
    }

    public function findPostBy($field, $value, $fetchAll = false)
    {
        try {
            $prepared = $this->connection->prepare("select * from {$this->table} inner join users on users.id = posts.user_id where {$field} = :{$field} ");
            $prepared->bindValue(":{$field}", $value);
            $prepared->execute();
            return $prepared->fetch();
        } catch (PDOException $e) {
            var_dump($e->getMessage());
        }
    }
}
