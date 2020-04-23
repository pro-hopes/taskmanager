<?php
namespace application\system;

/**
 *
 */
class Model
{
    public function count()
    {
        $this->sql = "SELECT COUNT(*) AS count FROM $this->tableName";
        $this->executeParams = [];
        return $this;
    }
    public function select($value='*')
    {
        $this->sql = "SELECT $value FROM $this->tableName";
        return $this;
    }
    public function where($clause=[])
    {
        $this->sql .= ' WHERE ';
        $counter = 0;
        foreach ($clause as $key => $value) {
            if ($counter == 0) {
                $this->sql .= "$key = :$key ";
                $counter++;
            } else {
                $this->sql .= "AND $key = :$key";
            }
        }
        $this->executeParams = $clause;
        return $this;
    }
    public function order($key, $type = "ASC")
    {
        $this->sql .= " ORDER BY `$key` $type";
        return $this;
    }
    public function limit($from, $limit = 3)
    {
        $from = intval($from);
        $this->sql .= " LIMIT $from, $limit";
        return $this;
    }
    public function take()
    {
        $result = $this->db->getAll($this->sql, $this->executeParams);
        return $result;
    }
    public function insert($values=[])
    {
        $this->sql = "INSERT INTO $this->tableName";
        $counter = 0;
        $keys = [];
        $vals = [];
        foreach ($values as $key => $value) {
            array_push($keys, $key);
            array_push($vals, '"' . $value . '"');
        }
        $this->sql .= " (" . implode(', ', $keys) . ") values";
        $this->sql .= " (" . implode(', ', $vals) . ")";
        return $this;
    }
    public function run()
    {
        $result = $this->db->db->query($this->sql);
        return $result;
    }
    public function delete($clause=[])
    {
        $this->sql = "DELETE FROM $this->tableName WHERE ";
        $counter = 0;
        foreach ($clause as $key => $value) {
            if ($counter == 0) {
                $this->sql .= "$key = :$key ";
                $counter++;
            } else {
                $this->sql .= "AND $key = :$key";
            }
        }
        $this->executeParams = $clause;
        $result = $this->db->mainQuery($this->sql, $this->executeParams);
        return $result;
    }
    public function update($id, $params)
    {
        $this->sql = "UPDATE $this->tableName SET";
        $i = 0;
        foreach ($params as $key => $value) {
            if ($i === 0) {
                $this->sql .= " $key = :$key";
                $i++;
            } else {
                $this->sql .= ", $key = :$key ";
            }
        }
        $this->sql .= " WHERE id = :id";
        $params['id'] = $id;
        $this->executeParams = $params;
        // var_dump($params);
        // debug($this->sql);
        $result = $this->db->mainQuery($this->sql, $this->executeParams);
        return $result;

    }
}
