<?php
namespace application\system;

use PDO;

class Db
{
    public $db;

    public function __construct()
    {
        $config = require $_SERVER['DOCUMENT_ROOT'] . '/application/helpers/dbconfig.php';
        $dsn = 'mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'] . ';charset=utf8mb4';
        $this->db = new PDO($dsn, $config['user'], $config['password']);
    }
    public function mainQuery($sql, $params = [])
    {
        $query = $this->db->prepare($sql);
        $query->execute($params);
        return $query;
    }
    public function getAll($sql, $params = [])
    {
        $query = $this->mainQuery($sql, $params);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getOne($sql, $params = [])
    {
        $query = $this->mainQuery($sql, $params);
        return $query->fetchColumn();
    }
}
