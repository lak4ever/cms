<!-- this is frond end -->
<?php include_once("db.php") ;?>
<?php session_start();?>
<?php
    if (isset($_POST['login'])) {
      $user_name= $_POST['user_name'];
      $user_password= $_POST['password'];

      $user_name =  mysqli_real_escape_string($connection,$user_name);//cleaning the user inputs
      $user_password =  mysqli_real_escape_string($connection,$user_password);//cleaning the user inputs

      //to check our column there in out database
      $query = "SELECT * FROM users WHERE user_name = '{$user_name}' ";
      $select_user_query = mysqli_query($connection,$query);
      if (!$select_user_query) {
          die("query failed".mysqli_error($connection));
      }

      while ($row = mysqli_fetch_array($select_user_query)) {
          $db_user_id = $row['user_id'];
          $db_user_name = $row['user_name'];
          $db_user_password = $row['user_password'];
          $db_user_first_name = $row['user_first_name'];
          $db_user_last_name = $row['user_last_name'];
          $db_user_role = $row['user_role'];
         
      }

      /*$db_user_name !== $user_name not equal
      $user_name this comes from login form
       $db_user_name = stored data from data base */

        // doing validation user input
       if ($user_name !==  $db_user_name &&  $user_password !== $db_user_password ) {
           header("Location: ../index.php");
       } else if ($user_name ==  $db_user_name &&  $user_password == $db_user_password ) {
           //when user able to login
        //setting up the session and send it  admin/includes page_header page its like post or get capturing
        $_SESSION['user_name'] = $db_user_name; //db_user_name bring the data form db and assigning to session user name
        $_SESSION['user_first_name'] =  $db_user_first_name;
        $_SESSION['user_last_name'] = $db_user_last_name;
        $_SESSION['user_role'] = $db_user_role;

/* we well able capture $_SESSION['user_name'] which means data base name some where is session on we can use it */



        header("Location: ../admin/index.php");
       }else{
        header("Location: ../index.php");
       }
       

    }
   
?>