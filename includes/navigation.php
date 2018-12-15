<?php include_once("includes/db.php") ;?>
<?php session_start();?>

 <!-- Navigation starts here -->
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">

      <!--Brand and toggle get grouped for better mobile display-->
        <a class="navbar-brand" href="index.php">Design Lady </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
              <?php
                  //getting data from data base and display dynamically
                  $query = "SELECT * FROM categories LIMIT 3";
                  $select_all_from_categories_query = mysqli_query($connection,$query);
                  //fetch the query results into array to display those values for that we use while
                  //and assign to an variable called row
                  while ($row = mysqli_fetch_assoc( $select_all_from_categories_query)) {
                    //names of the rows cat _title according the db
                    $categories_title =  $row['cat_title'];//comes out like associative //comes from data base
                    //we are inside ul tag and we want display like li so we need "" 
                    //the reason we use "" we cannot display li and that double quotes allow us separate from html using {}
                    echo "<li> <a class='nav-link' href='#'>{$categories_title} </a> </li>" ;
                  }
              ?>
              
              <!--Adding the admin link for more convenience after php closing tag -->
              <li class="nav-item">
              <a class="nav-link" href="admin">Admin</a>
              </li>
        
              <?php
                    if (isset($_SESSION['user_role'])) {
                      if (isset($_GET['p_id'])) {
                        $the_post_id = $_GET['p_id'];
                        echo "<li> <a class='nav-link' href='admin/posts.php?source=edit_post&p_id={$the_post_id}'> Edit post </a> </li>" ;
                      }
                    }
              ?>
            <!-- <li class="nav-item active">
              <a class="nav-link" href="#">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
            -->


          </ul>
        </div>
      </div>
    </nav>
     <!-- Navigation ends here -->

 