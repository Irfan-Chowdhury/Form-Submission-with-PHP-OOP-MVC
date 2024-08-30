<?php

namespace App\Controllers;

use App\Models\Journal;
use App\Controller;
use App\Models\Order;
use App\Validation\ValidationManager;
use DateTime;
use Exception;

class HomeController extends Controller
{
    public static $validation;

    public static $orderModel;

    public function __construct()
    {
        $this->validation = new ValidationManager();
        $this->orderModel = new Order();
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

    // public function json(array|string $message=null, array|string $data='')
    // {
    //     // Set the content type to JSON
    //     header('Content-Type: application/json');

    //     if ($_SERVER['REQUEST_METHOD'] == 'POST' || $_SERVER['REQUEST_METHOD'] == 'GET') {
    //         // Prepare the response data
    //         $response = [
    //             'status' => 'ok',
    //             'message' => $message,
    //             'data' => $data // You can include query parameters or other data here
    //         ];
    //     }

    //     echo json_encode($response);
    //     exit;
    // }
            
    // return  self::json('Data received successfully');


    public function store()
    {
        try {
    
            $this->validation->isRequired('Amount', $_POST['amount']);
            $this->validation->isNumberCheck('Amount', $_POST['amount']);


            $this->validation->isRequired('Buyer', $_POST['buyer']);
            $this->validation->isTextSpaceNumberCheck('Buyer', $_POST['buyer']);
            $this->validation->isWordLimit('Buyer', $_POST['buyer'], 20);


            $this->validation->isRequired('Receipt Id', $_POST['receipt_id']);
            $this->validation->isStringWithNoSpace('Receipt Id', $_POST['receipt_id']);

            
            $this->validation->isRequired('Buyer Email', $_POST['buyer_email']);
            $this->validation->isMail('Buyer Email', $_POST['buyer_email']);


            $this->validation->isRequired('Note', $_POST['note']);
            $this->validation->isWordLimit('Note', $_POST['note'], 30);
            $this->validation->isUnicodeString('Note', $_POST['note']);


            $this->validation->isRequired('City', $_POST['city']);
            $this->validation->isStringWithSpace('City', $_POST['city']);


            $this->validation->isRequired('Phone', $_POST['phone']);
            $this->validation->isPhoneNumber('Phone', $_POST['phone']);


            $this->validation->isRequired('Entry_by', $_POST['entry_by']);
            $this->validation->isPhoneNumber('Entry by', $_POST['entry_by']);


            $data = [
                'amount'  => self::requestSanitize($_POST['amount']),
                'buyer'  => self::requestSanitize($_POST['buyer']),
                'receipt_id'  => self::requestSanitize($_POST['receipt_id']),
                'items'  => implode(', ', $_POST['items']),
                'buyer_email'  => self::requestSanitize($_POST['buyer_email']),
                'note'  => self::requestSanitize($_POST['note']),
                'city'  => self::requestSanitize($_POST['city']),
                'phone'  => self::requestSanitize($_POST['phone']),
                'entry_by'  => self::requestSanitize($_POST['entry_by'])
            ];
            $data['buyer_ip'] = $_SERVER['REMOTE_ADDR']; 
            $data['hash_key'] = self::generateHashkey($data);
            $data['entry_at'] = self::generateTimezone($data);
    

            $dbArr = [];
            foreach ($data as $key => $value) {
                $dbArr[$key] = $this->orderModel->mysqliRealEscapeString($value);
            }

            $this->orderModel->insert($dbArr);

            // Send the JSON response
            return $this->sendResponse([],'Data submitted successfully');

        } catch (Exception $exception) {
            return $this->sendError($exception->getMessage(), $exception->getCode());
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

    // public function requestSanitize(string $value) : string
    public function requestSanitize(string $value) 
    {
        // Step 1: Trim whitespace from the beginning and end
        $inputData = trim($value);
        
        // Step 2: Remove backslashes
        $inputData = stripcslashes($inputData);
        
        // Step 3: Convert special characters to HTML entities
        $result = htmlspecialchars($inputData);
        
        return $result;
    }
}


    /**
     * mysqli_real_escape_string
     * 
     * prevent SQL Injection & This function is used to create a legal SQL string that you can use in an SQL statement. 
     * The given string is encoded to an escaped SQL string, taking into account the current character set of the connection.
     * 
     */


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