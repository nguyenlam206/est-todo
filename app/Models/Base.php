<?php

namespace App\Models;

use App\Core\Database;
use PDO;

class Base
{
    protected $db;
    protected $table;
    protected $primaryKey = 'id';

    public function __construct()
    {
        if (! isset($this->table)) {
            throw \Exception('Must be define table');
        }

        $db = new Database;
        $this->db = $db->connect();
    }

    /**
     * Get current DB connection
     *
     * @return void
     */
    public function open()
    {
        $this->db;
    }

    /**
     * Close DB connection
     *
     * @return void
     */
    public function close()
    {
        $this->db = null;
    }

    /**
     * Find a record by primary key
     *
     * @param Integer $id 
     *
     * @return Object
     */
    public function find($id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE {$this->primaryKey}=:{$this->primaryKey}";
        $result = $this->db->prepare($sql);
        $result->execute([$this->primaryKey => $id]);

        return $result->fetch(PDO::FETCH_ASSOC);
    }

     /**
     * Select all records
     *
     * @param Array $fields Fields list
     *
     * @return Object
     */
    public function all($fields = ['*'])
    {
        $fields = implode(',', $fields);
        $sql = "SELECT {$fields} FROM {$this->table}";
        $result = $this->db->prepare($sql);
        $result->execute();

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Create record
     *
     * @param Array $data
     *
     * @return Boolean
     */
    public function create($data)
    {   
        $keys = array_keys($data);
        $fields = implode(", ", $keys);
        $values = ':' . implode(", :", $keys);

        $sql = "INSERT INTO {$this->table} ({$fields}) VALUES ({$values})";
        $result = $this->db->prepare($sql);

        return $result->execute($data);
    }


    /**
     * Update record by primary key
     *
     * @param int $id
     * @param Array $data
     *
     * @return Boolean
     */
    public function update($data, $id)
    {
        $keys = array_keys($data);

        $values = "";
        foreach ($keys as $field) {
            $values .= $field . '=:' . $field . ', ';
        }

        $values = trim($values, ", ");

        $sql = "UPDATE {$this->table} SET {$values} WHERE {$this->primaryKey}=:{$this->primaryKey}";
        $result = $this->db->prepare($sql);

        $data[$this->primaryKey] = $id;

        return $result->execute($data);
    }

    /**
     * Delete record
     *
     * @param int $id
     *
     * @return Boolean
     */
    public function delete($id)
    {
        $sql = "DELETE FROM {$this->table} WHERE {$this->primaryKey}=:{$this->primaryKey}";
        $result = $this->db->prepare($sql);

        return $result->execute([$this->primaryKey => $id]);
    }
}