<?php
session_start();
if (empty($_SESSION['user'])) {
    
} else {
    if ($_SESSION['userType'] > 2) {
        header('Location: index.php');
    }
}