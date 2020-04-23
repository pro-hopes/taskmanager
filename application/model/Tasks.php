<?php
namespace application\model;
use application\system\Db;
use application\system\Model;

class Tasks extends Model
{
    public $tableName;
    public $db;
    public $sql;
    public $executeParams;

    function __construct()
    {
        $this->tableName = 'tasks';
        $this->db = new Db;
    }

}
