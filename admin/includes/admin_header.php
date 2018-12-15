<?php include_once("/../includes/db.php") ;?>
<!--include the database connection to the header of our document dry practice-->
<?php include_once("function.php") ;?>
<!--include the function.php file to the header of our document dry practice-->

<?php ob_start(); ?> <!-- to redirecting the user's to certain page we need to use 
output buffering so we allowing with this. we cant use header unless we turn  this on manually -->


<?php session_start();?><!-- when we on it this it will allow to access due to all these pages have admin header include-->




<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Dashboard</title>

    <!-- Bootstrap core CSS-->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <!-- Page level plugin CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/css/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

      <!-- google charts script -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

      <!-- ck editor 4 -->
    <script src="https://cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
    <script src="js/scripts.js"></script>

  </head>

  <body id="page-top">