<?php

include ('../config/connection.php');

class Messages {
    public $fields;
    public $message;
    
    public function __construct($postData) {
        $this->fields = $postData;  // gets the post data from the form and assign it to $fields.
    }

    public function message($key, $val) {
        $this->message[$key] = $val;
    }

    
}

class Account extends Messages {

    public function validateStudent() {     // checks if student id exists
        global $con;
        $studentID = $this->fields['studentID'];

        $query1 = mysqli_query($con, "SELECT * FROM accounts WHERE studentID = '$studentID'");
        $count = mysqli_num_rows($query1);
        if ($count === 0) {
            $this->add();
        }
        else {
            $this->message('error', 'Student ID already registered.');
        }
        
        return $this->message;   
    }
    
    public function add() {
        global $con;    // connection to db

        // assigns each post array
        $studentID = $this->fields['studentID'];
        $password = $this->fields['password'];
        $userType = $this->fields['userType'];
        $firstname = $this->fields['firstname'];
        $lastname = $this->fields['lastname'];

        $sql = "INSERT INTO accounts (studentID, password, userType, firstname, lastname) 
                    VALUES('$studentID', '$password', '$userType', '$firstname', '$lastname')";
        $query = mysqli_query($con, $sql);
        
        $this->message('success', 'Account successfully registered.');
        return $this->message;
    }
}

class Partylist extends Messages {

    public function validatePartylist() {
        global $con;

        $key = $this->fields['partylist'];
        $query = mysqli_query($con, "SELECT * FROM partylist WHERE name = '$key'");
        $count = mysqli_num_rows($query);
        if ($count === 0) {
            $this->add();
        }
        else {
            $this->message('error', 'PartyList already registered');
        }
        return $this->message;
    }

    public function add() {
        $key = $this->fields['partylist'];
        global $con;
        $sql = "INSERT INTO partylist (name) VALUES('$key')";
        $query = mysqli_query($con, $sql);
        
        $this->message('success', 'Partylist successfully registered.');
        return $this->message;
    }
}

class Position extends Messages {

    public function validatePosition() {
        global $con;

        $key = $this->fields['position'];
        $query = mysqli_query($con, "SELECT * FROM positions WHERE position = '$key'");
        $count = mysqli_num_rows($query);
        if ($count === 0) {
            $this->add();
        }
        else {
            $this->message('error', 'Position already added.');
        }
        return $this->message;
    }

    public function add() {
        global $con;
        $key = $this->fields['position'];
        $available = $this->fields['available'];
        $sql = "INSERT INTO positions (position, available) VALUES('$key', '$available')";
        $query = mysqli_query($con, $sql);
        
        $this->message('success', 'Position successfully added.');
        return $this->message;
    }
}


class Candidate extends Messages {

    public function validateForm() {
        foreach($this->fields as $field) {
            if (empty($field)) {
                $this->message('error', 'Please fill out all fields.');
            }
        }

        $this->validateCandidate();

        return $this->message;
        // print_r($this->fields);
    }

    public function validateCandidate() {
        global $con;

        $firstname = $this->fields['firstname'];
        $lastname = $this->fields['lastname'];
        $query = mysqli_query($con, "SELECT * FROM candidates WHERE firstname = '$firstname' AND lastname = '$lastname'");
        $count = mysqli_num_rows($query);
        if ($count === 0) {
            $this->add();
        }
        else {
            $this->message('error', 'Candidate already registered.');
        }
        
    }

    public function add() {
        global $con;

        $firstname = $this->fields['firstname'];
        $lastname = $this->fields['lastname'];
        $positionID = $this->fields['position'];
        $partylist = $this->fields['partylist'];
        $yearLevel = $this->fields['yearLevel'];
        $photo = $this->fields['photo'];

        $add = mysqli_query($con, "INSERT INTO candidates (firstname, lastname, positionID, partylist, yearLevel, photo) VALUES('$firstname', '$lastname', '$positionID', '$partylist', '$yearLevel', '$photo')");

        $this->message('success', 'Candidate successfully added!');
        
    }
}