<?php

namespace App\Validation;

use Exception;

class ValidationManager
{
    public function isRequired(string $key, $value)
    {
        if (empty($value)) {
            throw new Exception("$key field is Required", 400);
        }
    }

    public function isNumberCheck(string $key, $value)
    {
        $amount = self::requestSanitize($value);

        $amount = $_POST['amount'];
        $amount = (int)$amount; 

        if (strval($amount) !== $_POST['amount']) {
            throw new Exception("$key field is invalid. Please input a valid number", 400);
        }
    }

    public function isTextSpaceNumberCheck(string $key, string $value)
    {
        $pattern = '/^[a-zA-Z0-9 ]+$/';

        if (!preg_match($pattern, $value)) {
            throw new Exception("$key invalid data input", 400);
        }
    }

    public function isWordLimit(string $key, string $value, $wordLimitMax)
    {
        if (strlen($value) > $wordLimitMax) {
            throw new Exception("$key data must be $wordLimitMax characters or less.", 400);
        }
    }


    public function isStringWithNoSpace(string $key, $value)
    {
        if (!preg_match('/^[a-zA-Z]+$/', $value)) { 
            throw new Exception("$key must be text", 400);
        }
    }

    public function isStringWithSpace(string $key, $value)
    {
        if (!preg_match('/^[a-zA-Z\s]+$/', $value)) { 
            throw new Exception("$key must be text", 400);
        }
    }


    public function isMail(string $key, string $value)
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("$key must be valid email", 400);
        }
    }

    public function isUnicodeString(string $key, string $value)
    {
        if (!preg_match('/^[\p{L}\p{N}\p{P}\p{S}\p{Z}]*$/u', $value)) {
            throw new Exception("$key is invalid data", 400);
        }
    }

    public function isPhoneNumber(string $key, string $value)
    {
        if (!ctype_digit($value)) {
            throw new Exception("$key must be digit", 400);
        }
    }

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