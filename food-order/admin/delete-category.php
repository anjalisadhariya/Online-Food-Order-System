<?php
    //include constant file
    include('../config/constants.php');

    //echo "Delete page";
    //check whether id and image_name value is set or not
    if(isset($_GET['id']) AND isset($_GET['image_name']))
    {
        //get the value and delete
        //echo "Get Value And Delete";
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        //remove the physical image file is available
        if($image_name !="")
        {
            //image is available. so remove it
            $path = "../images/category/".$image_name;
            //remove the image
            $remove = unlink($path);

            //if failed to remove image then add an error message and stope the process
            if($remove==false)
            {
                //set the session message
                $_SESSION['remove']="<div class='error'> failed to remove category image.</div>";
                //redirect to manage category page
                header('location:'.SITEURL.'admin/manage-category.php');
                //stop the process
                die();
            }
        }

        //delete data from database
        //sql query to delete
        $sql="DELETE FROM tbl_category WHERE id=$id";

        //execute the query
        $res = mysqli_query($conn,$sql);

        //check whether the data is delete from database or not
        if($res==true)
        {
            //set success message and redirect
            $_SESSION['delete']="<div class='success'>Category Delete Successfully.</div>";
            //redirect to manage category
            header('location:'.SITEURL.'admin/manage-category.php');
        }
        else
        {
            //set fail message and redirect
            $_SESSION['delete']="<div class='error'>Failed to Delete Category.</div>";
            //redirect to manage category
            header('location:'.SITEURL.'admin/manage-category.php');
        }

        //redirect to manage category page eith message
    }
    else
    {
        //redirect to manage category page
        header('location:'.SITEURL.'admin/manage-category.php');
    }
?>