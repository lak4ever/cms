<?php

//catch the get request
if (isset($_GET['edit_user'])) {
 $the_user_id = $_GET['edit_user']; // ${the}_post_id we have use to not confuse with data base variables below

//pulling all these data out
 $query = "SELECT * FROM users WHERE user_id ={$the_user_id} ";
 $select_all_users_query = mysqli_query($connection, $query);
     while ($row = mysqli_fetch_assoc($select_all_users_query)) {
         $user_name= $row['user_name'];
         $user_id= $row['user_id'];
         $user_password= $row['user_password'];// these data comes from database
         $user_first_name= $row['user_first_name'];
         $user_last_name= $row['user_last_name'];
         // $user_image	= $row['user_image	'];
         $user_email= $row['user_email'];
         $user_image= $row['user_image'];
         $user_role= $row['user_role'];
     }







}












    if (isset($_POST['Edit_user'])) {
        
        // these are come from the below form fields
       $user_first_name= $_POST['user_first_name'];
       $user_last_name= $_POST['user_last_name'];
       $user_role= $_POST['user_role'];// we have added the post_category from the select option
       $user_name= $_POST['user_name'];
       $user_email= $_POST['user_email'];
       $user_password= $_POST['user_password'];
       $randSalt	 = 1;


    //$user_image = $_FILES['user_image']['name'];
    //$user_image_temp = $_FILES['user_image']['tmp_name'];
        /*
        after image uploaded it saved into forms temp location of the server
        from there we have to send it sever, to our data base this can also called reference to image
        we need to tell it where to send this image
        */
        



        
 //update query easy to debug
        //=======================================
        $query = "UPDATE users SET ";
        $query .="user_first_name = '{$user_first_name}', ";/* user_first_name -- is column name in data base.|| $user_first_name -- is user edit form input fields name */
        $query .="user_last_name = '{$user_last_name}', ";
        $query .="user_role = '{$user_role}', ";
        $query .="user_name = '{$user_name}', ";
        $query .="user_email = '{$user_email }', ";
        $query .="user_password = '{$user_password}' ";//one before the last one take the {,} out other wise query failed
        $query .= "WHERE user_id = {$the_user_id} ";

        //send the update query
        $Edit_user_query = mysqli_query($connection, $query);
        confirm_query($Edit_user_query);
    }

?>



<!--add post form start here-->
    <div class="col-lg-10">
    <div class="container mx-5">
    <h3> Edit User </h3>
        <form action="" method="post" enctype="multipart/form-data"> <!-- enctype for picture uploading incharge of sending difference form data  -->

            <div class="form-group">
                <label for="user_first_name"> <strong> First Name </strong></label>
                <input type="text"  value ="<?php echo $user_first_name ?>"   class="form-control" name="user_first_name">
            </div>

            <div class="form-group">
                <label for="user_last_name"> <strong> Last Name </strong></label>
                <input type="text"  value ="<?php echo $user_last_name ?>"  class="form-control" name="user_last_name">
            </div>
            
            
            <div class="form-group">
                <label for="user_image"> <strong> User Image </strong>  </label><br>
                <input type="file"  value ="<?php echo $user_image ?>"  name="user_image">  <!-- different super global called file -->
            </div>
            

             <!-- going to user role here -->
           
           <div class="form-group">
                <label for="user_role"> <strong> User Role </strong></label>
                <select name="user_role" id=""   class="form-control">
                    <option value="Subscriber"> <?php echo $user_role ?> </option>
                    <!-- first show default values then use on/off switch-->
                    <?php
                        if ($user_role == 'Admin') {
                            echo "<option value='Subscriber'> Subscriber </option> ";
                        } else {
                            echo "<option value='Admin'> Admin </option> ";
                        }

                    ?>
                </select>
            </div>


            <div class="form-group">
                <label for="user_name"> <strong> user name </strong>  </label>
                <input type="text" value ="<?php echo $user_name ?>" class="form-control" name="user_name">
            </div>

            <div class="form-group">
                <label for="user_email"> <strong> user email </strong></label>
                <input type="email" value ="<?php echo $user_email ?>" class="form-control" name="user_email">
            </div>

            
            
            <div class="form-group">
                <label for="user_password"> <strong> user password </strong>  </label>
                <input type="password" value ="<?php echo $user_password?>" class="form-control" name="user_password">
            </div>


            <div class="form-group">
                <input class="btn btn-primary my-2" type="submit" name="Edit_user" value="Update User">
            </div>
        </form>
    </div>
</div>
<!--add post form end here-->

