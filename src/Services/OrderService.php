<?php

namespace App\Services;

use App\Validation\ValidationManager;
use DateTime;

class OrderService 
{
    public $validation;

    public function __construct()
    {
        $this->validation = new ValidationManager();
    }

    public function validation(array $data)
    {
        $this->validation->isRequired('Amount', $data['amount']);
        $this->validation->isNumberCheck('Amount', $data['amount']);


        $this->validation->isRequired('Buyer', $data['buyer']);
        $this->validation->isTextSpaceNumberCheck('Buyer', $data['buyer']);
        $this->validation->isWordLimit('Buyer', $data['buyer'], 20);


        $this->validation->isRequired('Receipt Id', $data['receipt_id']);
        $this->validation->isStringWithNoSpace('Receipt Id', $data['receipt_id']);

        
        $this->validation->isRequired('Buyer Email', $data['buyer_email']);
        $this->validation->isMail('Buyer Email', $data['buyer_email']);


        $this->validation->isRequired('Note', $data['note']);
        $this->validation->isWordLimit('Note', $data['note'], 30);
        $this->validation->isUnicodeString('Note', $data['note']);


        $this->validation->isRequired('City', $data['city']);
        $this->validation->isStringWithSpace('City', $data['city']);


        $this->validation->isRequired('Phone', $data['phone']);
        $this->validation->isPhoneNumber('Phone', $data['phone']);


        $this->validation->isRequired('Entry_by', $data['entry_by']);
        $this->validation->isPhoneNumber('Entry by', $data['entry_by']);
    }


    public function requestDataManage(array $data) : array
    {
        $dataArray = [
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
        $dataArray['buyer_ip'] = $_SERVER['REMOTE_ADDR']; 
        $dataArray['hash_key'] = self::generateHashkey($data);
        $dataArray['entry_at'] = self::generateTimezone($data);

        return $dataArray;

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


    /**
     * mysqli_real_escape_string
     * 
     * prevent SQL Injection & This function is used to create a legal SQL string that you can use in an SQL statement. 
     * The given string is encoded to an escaped SQL string, taking into account the current character set of the connection.
     * 
     */

}
