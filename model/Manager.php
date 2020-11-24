<?php


namespace OpenClassrooms\Blog\Model;


class Manager
{
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=mvcocr;charset=utf8', 'root', '5MichelAnnecy');
        return $db;
    }
}