
<?php include_once "includes/admin_header.php";?>
<?php include_once "includes/admin_top_nav.php";?>
 <?php include_once "includes/page_header.php";?>
 <?php
    if (isset($_SESSION['user_name'])) {
       $user_name = $_SESSION['user_name'];
       $query = "SELECT * FROM users where user_name = '{$user_name}'";
       $select_user_profile_query = mysqli_query($connection ,$query);
       confirm_query($select_user_profile_query);
       while ($row = mysqli_fetch_array($select_user_profile_query)) {
        $user_id= $row['user_id'];
        $user_name= $row['user_name'];
        $user_password= $row['user_password'];// these data comes from database
        $user_first_name= $row['user_first_name'];
        $user_last_name= $row['user_last_name'];
       // $user_image	= $row['user_image	'];
        $user_email= $row['user_email'];
        $user_image= $row['user_image'];
        $user_role= $row['user_role'];
       }
    }

 ?>
    <div class="row mx-4 my-4">
        
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
                <input class="btn btn-primary my-2" type="submit" name="Edit_user" value="Update Profile">
            </div>
        </form>
    </div>
</div>


    </div>
   <!--

-->
<?php  include_once "includes/admin_footer.php";?>

