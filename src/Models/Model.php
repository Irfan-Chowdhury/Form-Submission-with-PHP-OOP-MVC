<?php

namespace App\Models;

use App\Database\DatabaseManager;

abstract class Model
{
    protected $table;  
    protected $db;

    
    public function __construct()
    {
        $this->db = new DatabaseManager();
    }


    public function insert(array $data) : bool
    {
        $keys = self::getKeys($data);

        $vaues = self::getValues($data);

        $query = "INSERT INTO $this->table ($keys) VALUES('$vaues')";

        $this->db->insert($query);

        return true; 
    }

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