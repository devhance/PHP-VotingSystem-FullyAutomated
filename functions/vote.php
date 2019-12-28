<?php 

include ('config/connection.php');

class Vote {

    public function __construct($postData) {
        global $con;

        foreach($postData as $data) {
            // adds + 1 to votes 
            $query = mysqli_query($con, "UPDATE candidates SET votes = votes + 1 WHERE id = '$data'");
        }

        $this->castVote();
    }

    public function castVote() {
        global $con;

        $user = $_SESSION['user'];
        $query = mysqli_query($con, "UPDATE accounts SET voteCount = 0");   // decrements user's vote count
    }
}