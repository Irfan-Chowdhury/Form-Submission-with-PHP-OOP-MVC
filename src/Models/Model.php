<?php

namespace App\Models;

use App\Database\DatabaseManager;
use Exception;

abstract class Model
{
    protected $table;  
    protected $db;

    
    public function __construct()
    {
        $this->db = new DatabaseManager();
    }


    public function insert(array $data) 
    {
        $keys = self::getKeys($data);

        $vaues = self::getValues($data);

        $query = "INSERT INTO $this->table ($keys) VALUES('$vaues')";

        $result = $this->db->insert($query);

        if(!$result) {
            throw new Exception("Internal Server Error", 500);
        } 
    }

    // public function exists(string $key, string|int|float $value) 
    // public function exists($key, $value) 
    // {
    //     $query = "SELECT EXISTS (SELECT 1 FROM $this->table WHERE $key = $value)";

    //     return $this->db->isExists($query);
    // }

    protected static function getKeys(array $data) : string
    {
        $arrayKeys = array_keys($data);
        $arrayKeysData = implode(', ', $arrayKeys);

        return $arrayKeysData;
    }


    protected static function getValues(array $data) : string
    {
        $arrayValues = array_values($data);
        $arrayValuesData = implode("', '", array_map('addslashes', $arrayValues));

        return $arrayValuesData;
    }



}