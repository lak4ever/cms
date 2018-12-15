<?php
    if (isset($_POST['create_user'])) {
        
        // these are come from the below form fields
       $user_first_name= $_POST['user_first_name'];
       $user_last_name= $_POST['user_last_name'];
       $user_role= $_POST['user_role'];// we have added the post_category from the select option
       $user_name= $_POST['user_name'];
       $user_email= $_POST['user_email'];
       $user_password= $_POST['user_password'];
       $randSalt	 = 1;// we hard code this unless it want give to complete the query we have make it nul in data base other wise it want work
    

        

    //$user_image = $_FILES['user_image']['name'];
    //$user_image_temp = $_FILES['user_image']['tmp_name'];
        /*
        after image uploaded it saved into forms temp location of the server
        from there we have to send it sever, to our data base this can also called reference to image
        we need to tell it where to send this image
        */
        
       // $post_date = date('d-m-y'); //used a function plenty more there you can search online



        

        //adding add_post form data into data base
        //add post query

        $query = "INSERT INTO users(user_first_name,user_last_name,user_role,user_name,user_email,user_password) ";
        /* add user form eke piliwlata liwe*/

       $query.= "VALUES('{$user_first_name}','{$user_last_name}','{$user_role}','{$user_name}','{$user_email}','{$user_password}')";
        /* form captured data assigned to variables those variables comes here 
        for strings we have to use single quotes
        */

        //sending data to the data base
     $create_add_query = mysqli_query($connection, $query);

        //checking the query 
        confirm_query($create_add_query);
        echo "User created successfully";
    }

?>



<!--add post form start here-->
    <div class="col-lg-10">
    <div class="container mx-5">
    <h3> Add User </h3>
        <form action="" method="post" enctype="multipart/form-data"> <!-- enctype for picture uploading incharge of sending difference form data  -->

            <div class="form-group">
                <label for="user_first_name"> <strong> First Name </strong></label>
                <input type="text" class="form-control" name="user_first_name">
            </div>

            <div class="form-group">
                <label for="user_last_name"> <strong> Last Name </strong></label>
                <input type="text" class="form-control" name="user_last_name">
            </div>
            
            
                <div class="form-group">
                <label for="user_image"> <strong> User Image </strong>  </label><br>
                <input type="file"  name="user_image">  <!-- different super global called file -->
            </div>
            

             <!-- going to user role here -->
           
           <div class="form-group">
                <label for="user_role"> <strong> User Role </strong></label>
                <select name="user_role" id="" class="form-control">
                    <option value="Subscriber"> Select User </option>
                    <option value="Admin"> Admin </option>
                    <option value="Subscriber"> Subscriber </option>
                </select>
            </div>

            

            <div class="form-group">
                <label for="user_name"> <strong> user name </strong>  </label>
                <input type="text" class="form-control" name="user_name">
            </div>

            <div class="form-group">
                <label for="user_email"> <strong> user email </strong></label>
                <input type="email" class="form-control" name="user_email">
            </div>

            
            
            <div class="form-group">
                <label for="user_password"> <strong> user password </strong>  </label>
                <input type="password" class="form-control" name="user_password">
            </div>


            <div class="form-group">
                <input class="btn btn-primary my-2" type="submit" name="create_user" value="Add User">
            </div>
        </form>
    </div>
</div>
<!--add post form end here-->