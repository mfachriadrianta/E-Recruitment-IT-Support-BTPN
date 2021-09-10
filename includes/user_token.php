<?php

    if(!isset($_SESSION)){
        session_start();
        if(isset($_SESSION['user'])) {
                 
        }
        else {
            header('location: login.php');
        }
    }
    else {
        session_destroy();
    }
?>