<?php

namespace App\Database;

use mysqli;

$filepath = realpath(dirname(__FILE__));

include_once ($filepath.'/../../config/config.php');

class DatabaseManager
{
    public $host   = DB_HOST;
    public $user   = DB_USER;
    public $pass   = DB_PASS;
    public $dbname = DB_NAME;

    
    public $link;
    public $error;
    
    public function __construct(){
      $this->connectDB();
    }
    
    private function connectDB()
    {
        $this->link = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
        if(!$this->link) {
          $this->error ="Connection fail".$this->link->connect_error;
          return false;
        }
    }
    
    // Select or Read data
    public function select($query)
    {
        $result = $this->link->query($query) or 
        die($this->link->error.__LINE__);
        
        if($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }

    // public function isExists($query)
    // {
    //   $query = "SELECT COUNT(*) FROM orders WHERE orders = 'user@example.com'";
      
    //   $result = $this->link->query($query) or 
    //   die($this->link->error.__LINE__);

    //   if($result->num_rows > 0) {

    //     var_dump(1);
    //     die();
    //       return $result;
    //   } else {
    //     var_dump(2);
    //     die();
    //       return false;
    //   }







    //     // Execute the query
    //     $result = $this->link->query($query);
    //     if (!$result) {
    //         // Handle query error
    //         die('Query failed: ' . $this->link->error . ' Line: ' . __LINE__);
    //     }

    //     // Fetch the result
    //     $exists = $result->fetch_row();

    //     var_dump($exists);
    //     die();

    //     // Check if the result is not empty and the first column is '1'
    //     return $exists[0] == 1;
    // }
    
    // Insert data
    public function insert($query) {
        $insert_row = $this->link->query($query) or 
        die($this->link->error.__LINE__);

        if($insert_row) {
          return $insert_row;
        } 
        else {
            return false;
        }
    }
      
    // Update data
    public function update($query)
    {
        $update_row = $this->link->query($query) or 
        die($this->link->error.__LINE__);

        if($update_row) {
          return $update_row;
        } 
        else {
          return false;
        }
    }
      
    // Delete data
    public function delete($query)
    {
        $delete_row = $this->link->query($query) or 
        die($this->link->error.__LINE__);

        if($delete_row) {
          return $delete_row;
        } 
        else {
          return false;
        }
    }
 
}