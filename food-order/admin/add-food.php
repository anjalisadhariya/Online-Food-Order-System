<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Food</h1>

        <br><br><br><br>

        <?php
            if(isset($_SESSION['upload'])) 
            {
                echo $_SESSION['upload']; 
                unset($_SESSION['upload']);  
            }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="Title of the food.">
                    </td>
                </tr>

                <tr>
                    <td>Description: </td>
                    <td>
                        <textarea name="description" cols="30" rows="5" placeholder="Description of the food."></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Price: </td>
                    <td>
                        <input type="number" name="price" >
                    </td>
                </tr>

                <tr>
                    <td>Select Image: </td>
                    <td>
                        <input type="file" name="image" >
                    </td>
                </tr>

                <tr>
                    <td>Category: </td>
                    <td>
                        <select name="category">

                            <?php
                                //create php code to display category from database
                                //1. create sql to get all active category from database
                                $sql="SELECT * FROM tbl_category WHERE active='Yes'";

                                //executing query
                                $res=mysqli_query($conn,$sql);

                                //count rows to check whether we have category or not
                                $count=mysqli_num_rows($res);

                                //if count is greater than zero, we have category else we do not have category
                                if($count>0)
                                {
                                    //we have category
                                    while($row=mysqli_fetch_assoc($res))
                                    {
                                        //get the detail of category
                                        $id=$row['id'];
                                        $title=$row['title'];

                                        ?>
                                            <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
                                        <?php
                                    }
                                }
                                else
                                {
                                    //we do not have category
                                    ?>
                                    <option value="0">No Category Found</option>
                                    <?php
                                }


                                 //2. display on dropdown
                                
                            ?>
                            
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Featured: </td>
                    <td>
                        <input type="radio" name="featured" value="Yes"> Yes
                        <input type="radio" name="featured" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" value="Yes"> Yes
                        <input type="radio" name="active" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Food" class="btn-secondary">
                    </td>
                </tr>
                
            </table>

        </form>

        <?php
            //check whether the button is clicked or not
            if(isset($_POST['submit'])) 
            {
                //add the food in database
                //echo "clicked";
                
                //1. get the data from form
                $title=$_POST['title'];
                $description=$_POST['description'];
                $price=$_POST['price'];
                $category=$_POST['category'];

                //check whether radio button for featured and active are check or not
                if(isset($_POST['featured']))
                {
                    //get the value from form
                    $featured = $_POST['featured'];
                }
                else
                {
                    //set the default value
                    $featured = "No";
                }

                if(isset($_POST['active']))
                {
                    $active = $_POST['active'];
                }
                else
                {
                    $active = "No";
                }

                //2. upload the image if select
                if(isset($_FILES['image']['name']))
                {
                    //upload the image
                    //to upload image we need image name,source path and destination path
                    $image_name = $_FILES['image']['name'];

                    //upload the image only if image is selected
                    if($image_name != "")
                    {

                    
                        //auto rename our image
                        //get the extension of our image (jpg, png, gif, etc)
                        $ext = end(explode('.',$image_name));

                        //rename the image
                        $image_name="Food-Name-".rand(000,999).'.'.$ext; 
                                            
                        $scr = $_FILES['image']['tmp_name'];

                        $dst = "../images/food/".$image_name;

                        //finally upload the image
                        $upload = move_uploaded_file($scr,$dst);

                        //check whether the image is uploaded or not
                        //and if the image is not uploaded then we will stop the process and redirect with error meassage
                        if($upload==false)
                        {
                            //set meassage
                            $_SESSION['upload'] = "<div class='error'>Failed to Upload Image.</div>";
                            //redirect to add category page
                            header('location:'.SITEURL.'admin/add-food.php');
                            //stop the process 
                            die();
                        }
                    }
                }
                else
                {
                    //don't upload image and set the image_name value as blank
                    $image_name="";
                }

                //3. insert into database

                //create sql query to save or add food
                //for numerical we do not need to pass value inside quotes '' but for string value it is comulsory to add quotes ''
                $sql2= "INSERT INTO tbl_food SET 
                    title ='$title',
                    description ='$description',
                    price = '$price',
                    image_name = '$image_name',
                    category_id='$category',
                    featured='$featured',
                    active='$active'
                    ";

                //execute the query
                $res2=mysqli_query($conn,$sql2);

                //chech whether data is insert or not
                //4. redirect with message to manage food page
                if($res2==true)
                {
                    //query executed and category added
                    $_SESSION['add'] = "<div class='success'>Food Added Successfully.</div>";
                    header('location:'.SITEURL.'admin/manage-food.php');
                }
                else
                {
                    //failed to add category
                    $_SESSION['add'] = "<div class='error'>Failed to Add Category.</div>";
                    header('location:'.SITEURL.'admin/manage-food.php');
                }
            }
        ?>

    </div>
</div>

<?php include('partials/footer.php'); ?>