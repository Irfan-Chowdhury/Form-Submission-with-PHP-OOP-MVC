<?php

namespace App\Controllers;

use App\Models\Journal;
use App\Controller;
use App\Models\Order;
use DateTime;
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
        $data = [];
        
        foreach ($_POST as $key => $value) {
            $data[$key] = $this->order->mysqliRealEscapeString($value);
        }
        

        $data['buyer_ip'] = $_SERVER['REMOTE_ADDR']; 
        $data['hash_key'] = self::generateHashkey($data);
        $data['entry_at'] = self::generateTimezone($data);

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

    private static function generateHashkey(array $data) : string 
    {
        $input = $data['receipt_id'] . 'irfan'; 

        return hash('sha512', $input);
    }

    private static function generateTimezone(array $data) : string 
    {
        date_default_timezone_set('Asia/Dhaka');
        $currentDateTime = new DateTime();

        return $currentDateTime->format('Y-m-d H:i:s');
    }
}


    /**
     * mysqli_real_escape_string
     * 
     * prevent SQL Injection & This function is used to create a legal SQL string that you can use in an SQL statement. 
     * The given string is encoded to an escaped SQL string, taking into account the current character set of the connection.
     * 
     */
