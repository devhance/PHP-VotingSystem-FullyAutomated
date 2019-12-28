<?php

include('config/connection.php');

class LoginValidator {

    private $data;
    public $errors = [];
    private static $fields = ['username', 'password'];

    public function __construct($postData) {
        $this->data = $postData;
    }

    public function validateForm() {
        foreach(self::$fields as $field) {
            if(!array_key_exists($field, $this->data)) {
                trigger_error($field .' is not present in the data');
                return;
            }
        }

        $this->validateUsername();
        $this->validatePassword();
        
        return $this->errors;
    }

    public function validateUsername() {

        $val = trim($this->data['username']);     // this removes white spaces

        if (empty($val)) {
            $this->addError('username', 'Username cannot be empty.');
        }
        
    }

    private function validatePassword() {
        $val = trim($this->data['password']);     // this removes white spaces

        if (empty($val)) {
            $this->addError('password', 'Password cannot be empty.');
        }
        else {
            $this->validateLogin();
        }
    }

    private function validateLogin() {
        global $con;
        error_reporting(0);

        $key = $this->data['username'];
        $query = mysqli_query($con, "SELECT * FROM accounts WHERE studentID = '$key'");
        $result = mysqli_fetch_array($query);
        extract($result);
        if ($this->data['password'] === $password) {
            session_start();
            $_SESSION['user'] = $this->data['username'];

            if ($voteCount === 1) {
                
                $userType > 1 ? header('Location: admin/add-accounts.php') : header('Location: voting-page.php');
            } else {
                header('Location: after-vote.php');
            }
            
            
        }
        else {
            $this->addError('login', 'Invalid login. Try again.');
        }
    }


    public function addError($key, $val) {
        $this->errors[$key] = $val;
    }
}
