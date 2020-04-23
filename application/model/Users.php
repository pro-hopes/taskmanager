<?php
namespace application\model;
use application\system\Db;
use application\system\Model;

class Users extends Model
{
    public $tableName;
    public $db;
    public $sql;
    public $executeParams;

    function __construct()
    {
        $this->tableName = 'users';
        $this->db = new Db;
    }

}
