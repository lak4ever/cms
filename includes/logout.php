<!-- this is frond end -->
<?php session_start();?><!-- similar to cookies but keep that information in the server-->
<?php
     $_SESSION['user_name'] = null;
     $_SESSION['user_first_name'] =  null;
     $_SESSION['user_last_name'] = null;
     $_SESSION['user_role'] = null;

     
     header("Location: ../index.php");