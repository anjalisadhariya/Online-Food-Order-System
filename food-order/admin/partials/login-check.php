<?php

    //authorization - access control
    //check whether the user is logged in or not
    if(!isset($_SESSION['user'])) //if user session is not set
    {
        //user is not logged in 
        //redirect to login page with meaassage
        $_SESSION['no-login-message'] = "<div class='error text-center'>Please Login To Access Admin Panel</div>";
        //redirect to login page
        header('location:'.SITEURL.'admin/login.php');
    }

?>