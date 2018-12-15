<?php include "includes/header.php";?>

        <!-- Sidebar Widgets Column starts here -->
        <div class="col-md-4">
  
          <!-- Search Widget -->
          <div class="card my-4">
            <h5 class="card-header"> BLOG Search</h5>
            <!-- form starts from here -->
            <!--make sure add submit page these data  to search.php-->
            <form action="search.php" method="post">
            <div class="card-body">
              <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Search for...">
                <span class="input-group-btn">
                <a href=""><button class="btn btn-secondary mx-1" name="submit"  type="submit">Go!</button></a>
                  
                  <!-- make sure to change it to btn type into submit unless it want work-->
                </span>
              </div>
            </div>
          </form>
          </div>
           <!-- form starts ends here -->


           <!-- Search Widget -->
          <div class="card my-4">
            <h5 class="card-header"> Login</h5>
            <!-- form starts from here -->
            <!--make sure add submit page these data  to search.php-->
            <form action="includes/login.php" method="post">
            <div class="card-body">
              <div class="form-group">
                <input type="text" class="form-control" name="user_name" placeholder="Type your User Name">
              </div>

               <div class="input-group">
                <input type="password" class="form-control" name="password" placeholder="Type your Password ">
                <span class="input-group-btn">
                <a href=""><button class="btn btn-primary mx-1" name="login"  type="submit">Submit</button></a>
                  <!-- make sure to change it to btn type into submit unless it want work-->
                </span>

              </div>

             

            </div>
          </form>
          </div>
           <!-- form starts ends here -->





          <!-- Categories Widget -->
          <div class="card my-4">

           <?php

              ?>

            <h5 class="card-header">BLOG Categories</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-12"><!-- md6 tiba eka md 12 kara-->
                  <ul class="list-unstyled mb-0">


                    <?php
                    //getting data from data base and display dynamically
                  $query = "SELECT * FROM categories LIMIT 3";// LIMITING THE OUTPUT RESULT
                  $select_categories_sidebar = mysqli_query($connection,$query);
                    //fetch the query results into array to display those values for that we use while
                    //and assign to an variable called row

                  while ($row = mysqli_fetch_assoc( $select_categories_sidebar)) {
                        //names of the rows cat _title according the db
                  $categories_title =  $row['cat_title'];//comes out like associative //comes from data base
                  $categories_id =  $row['cat_id'];
                        //we are inside ul tag and we want display like li so we need "" 
                        //the reason we use "" we cannot display li and that double quotes allow us separate from html using {}
                  echo "<li> <a class='nav-link' href='category.php?category=$categories_id'>{$categories_title} </a> </li>" ;
                  /* we will be build later still we dont have category.php page for front end */
                          }
                    ?>
                  </ul>
                </div>
                          <!-- md6 tiba dewani part eka deleted if you want later we will add some images 
                          here this side-->

              </div>
            </div>
          </div>






          <!-- Side Widget -->
          <?php include "includes/widgets.php";?>

        

        </div>
        <!-- Sidebar Widgets Column ends here -->