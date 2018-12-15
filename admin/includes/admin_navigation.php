
<?php
if (!isset($_SESSION['user_role'])) {
    header("Location: ../index.php");
  //checking user role assign  welada kiyla
}else if(isset($_SESSION['user_role'])){
  if ($_SESSION['user_role'] !== 'Admin') {
    header("Location: ../index.php");
    // assign una user role eka admin da kiyla chek karnwa
  }

}
  
?>
 <!--navigation starts here-->
 
  <!--top navigation starts here-->
  <?php include_once "admin_top_nav.php";?>

<!--top navigation ends here-->



<!--div id wrapper starts here-->
<div id="wrapper">
      <div id="wrapper-sidebar">
          
      <!-- Sidebar -->
      <!-- Sidebar navigation stars here -->

      <?php include_once "admin_side_nav.php";?>

      </div>
       <!-- Sidebar navigation ends here -->
       <!--navigation ends here-->

        <div id="content-wrapper">
        <?php include_once "includes/page_header.php";?>
        <div class="container">
          <?php include_once "includes/card_deck.php";?>
        </div>
        <div class="row ">
          <div class="container mt-3 ml-5 mr-5">
          <?php include_once "includes/charts.php";?>
          <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>
          <hr>
          </div>
         
        </div>


        

  <!-- /.container-fluid -->


  </div>
<!-- /.content-wrapper -->





    </div>
    <!--div id wrapper ends here-->
    <!-- /#wrapper -->