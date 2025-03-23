<?php include('../config/constants.php') ?>

<html>
    <head>
        <title>Login - Food Order System</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body>
        
        <div class="login">
            <h1 class="text-center"></h1>
            <br><br>

            <?php 
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }

                if(isset($_SESSION['no-login-message']))
                {
                    {
                        echo $_SESSION['no-login-message'];
                        unset($_SESSION['no-login-message']);
                    }
                }
            ?>
            <br><br>

            <!-- login form starts here-->
            <div class="wrapper">
            <div class="box with-drop-shadow">
            </div>
            </div>
            
            <br><br><br>
            
            <form action="" method="POST" class="text-center">
            <div class="form-box">
            <div class="header-text">
            <h3 class="text-center" >LOGIN</h3>
            </div>
            <input placeholder="Enter Username" type="text" name="username"> <br><br>
            
            <input placeholder="Enter Password" type="password" name="password">
            
            <input type="submit" name="submit" value="Login" class="btn-primary">
            
            <a href="<?php echo SITEURL; ?>">
            <input type="button" value="Back To Home" class="btn-primary">
            </a>
            <br>
            <p class="text-center">Created By - <a href="#">Anjali & Hiral</a></p>
            </div>
            </Form>

        <!-- login form ends here-->

        </div>
        

    </body>
</html>

<?php

    //check whether the submit button is clicked or not
    if(isset($_POST['submit']))
    {
        //process for login
        //1. get the data from login form
        // $username = $_POST['username'];
        // $password = md5($_POST['password']);
        
        $username = mysqli_real_escape_string($conn, $_POST['username']);

        $raw_password = md5($_POST['password']);
        $password=mysqli_real_escape_string($conn, $raw_password);

        //2.sql to check whether the user with username and password exists or not
        $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

        //3.execute the query
        $res = mysqli_query($conn,$sql);

        //4. count rows to check whether the user exists or not
        $count = mysqli_num_rows($res);

        if($count==1)
        {
            //user available and login success and login failed
            $_SESSION['login'] = "<div class='success'>Login Successfully...</div>";
            $_SESSION['user'] = $username; //to check whether the user is logged in or not and logout will unset it

            //redirect to home page/dashboard
            header('location:'.SITEURL.'admin/'); 
        }
        else
        {
            //user not available
            $_SESSION['login'] = "<div class='error text-center'>Username or Password did not match</div>";
            //redirect to home page/dashboard
            header('location:'.SITEURL.'admin/login.php'); 
        }

    }

?>