<?php

namespace App\Controllers;

use App\Models\Journal;
use App\Controller;
use App\Database\DatabaseManager;
use Exception;

// use DatabaseManager;

class HomeController extends Controller
{
    private $db;

    public function __construct()
    {
        $this->db = new DatabaseManager();
    }

    public function index()
    {
        $journals = [
            new Journal('My Third Journal Entry', '2023'),
            new Journal('My Second Journal Entry', '2022'),
            new Journal('My First Journal Entry', '2021')
        ];

        $this->render('index', ['journals' => $journals]);
    }

    public function store()
    {
        // print_r($_REQUEST);    
        // print_r($_POST['buyer']);    
 
        $data = [
            'amount'  => mysqli_real_escape_string($this->db->link, $_POST['amount']),
            'buyer'  => mysqli_real_escape_string($this->db->link, $_POST['buyer']),
            'receipt_id'  => mysqli_real_escape_string($this->db->link, $_POST['receipt_id']),
            'items'  => mysqli_real_escape_string($this->db->link, $_POST['items']),
            'buyer_email'  => mysqli_real_escape_string($this->db->link, $_POST['buyer_email']),
            'note'  => mysqli_real_escape_string($this->db->link, $_POST['note']),
            'city'  => mysqli_real_escape_string($this->db->link, $_POST['city']),
            'phone'  => mysqli_real_escape_string($this->db->link, $_POST['phone']),
            'entry_by'  => mysqli_real_escape_string($this->db->link, $_POST['entry_by']),    
        ];

        $arrayKeys = array_keys($data);
        $arrayKeysData = implode(', ', $arrayKeys);

        $arrayValues = array_values($data);
        $arrayValuesData = implode("', '", array_map('addslashes', $arrayValues));

        $query = "INSERT INTO orders ($arrayKeysData) VALUES('$arrayValuesData')";

        try {
            $insertedRow = $this->db->insert($query);
            if ($insertedRow) {
                echo 'success';
                return; 
            }
        } catch (Exception $exception) {
            echo $exception->getMessage();
            return;
        }
    }
}
    /**
     * mysqli_real_escape_string
     * 
     * prevent SQL Injection & This function is used to create a legal SQL string that you can use in an SQL statement. 
     * The given string is encoded to an escaped SQL string, taking into account the current character set of the connection.
     * 
     */
