<?php

namespace App\Controllers;

use App\Models\Journal;
use App\Controller;
use App\Models\Order;
use Exception;

class HomeController extends Controller
{
    public static $order;

    public function __construct()
    {
        $this->order = new Order();
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

        // $data = [
        //     'amount'  => mysqli_real_escape_string($this->db->link, $_POST['amount']),
        //     'buyer'  => mysqli_real_escape_string($this->db->link, $_POST['buyer']),
        //     'receipt_id'  => mysqli_real_escape_string($this->db->link, $_POST['receipt_id']),
        //     'items'  => mysqli_real_escape_string($this->db->link, $_POST['items']),
        //     'buyer_email'  => mysqli_real_escape_string($this->db->link, $_POST['buyer_email']),
        //     'note'  => mysqli_real_escape_string($this->db->link, $_POST['note']),
        //     'city'  => mysqli_real_escape_string($this->db->link, $_POST['city']),
        //     'phone'  => mysqli_real_escape_string($this->db->link, $_POST['phone']),
        //     'entry_by'  => mysqli_real_escape_string($this->db->link, $_POST['entry_by']),    
        // ];

        foreach ($_POST as $key => $value) {
            $data[$key] = $this->order->mysqliRealEscapeString($value);
        }

        try {
            $insertedRow = $this->order->insert($data);

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
