<?php
namespace application\model;
use application\system\Db;
use application\system\Model;

class Tokens extends Model
{
    public $tableName;
    public $db;
    public $sql;
    public $executeParams;

    function __construct()
    {
        $this->tableName = 'tokens';
        $this->db = new Db;
    }

}
