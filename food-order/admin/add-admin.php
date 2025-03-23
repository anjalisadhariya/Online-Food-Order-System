<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>

        <br><br>

        <?php
            if(isset($_SESSION['add'])) //checking whether the session is set or not
            {
                echo $_SESSION['add']; //display the session message if set
                unset($_SESSION['add']);  //remove session message
            }
        ?>

        <form action="" method="POST">

        <table class="tbl-30">
            <tr>
                <td>Full Name: </td>
                <td>
                    <input type="text" name="full_name" placeholder="Enter Your Name">
                </td>
            </tr>

            <tr>
                <td>Username: </td>
                <td>
                <input type="text" name="username" placeholder="Your username">
                </td>
            </tr>

            <tr>
                <td>Password: </td>
                <td>
                <input type="password" name="password" placeholder="your password">
                </td>
            </tr>

            <tr>
                <td colspan="2">
                <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
             </td>
            </tr>

        </table>

        </form>


    </div>
</div>

<?php include('partials/footer.php'); ?>


<?php
    //process the value from form and save it in  database

    //check whether the submit button is clicked or not

    if(isset($_POST['submit']))
    {
        // Button Clicked 
        //echo "Button Clicked";

        //1. Get the Data from form
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']); //password Encryption with md5

        //2. SQL Query to save the data into database
        $sql = "INSERT INTO tbl_admin SET 
            full_name='$full_name',
            username='$username',
            password='$password'
        ";

        //3. Executing Query and Saving Data into Database
        $res = mysqli_query($conn, $sql) or die (mysqli_error());

        //4. Check Whether the (Query is Executed) data is inserted or not and display appropriate message
        if($res==TRUE)
        {
            //Data Inserted
            //echo "Data Inserted";
            //create a session variable to display message
            $_SESSION['add'] = "<div class='success'>Admin Added Successfully...</div>";
            //Redirect Page TO Manage Admin
            header("location:".SITEURL.'admin/manage-admin.php');
        }
        else
        {
            //Failed To Insert Data
            //echo "Failed To Insert Data";
            //create a session variable to display message
            $_SESSION['add'] = "<div class='error'>Failed to Add Admin</div>";
            //Redirect Page tO Add Admin
            header("location:".SITEURL.'admin/add-admin.php');
        }

    }
    
?>