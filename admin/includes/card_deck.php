
          <!-- Icon Cards-->
          <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-60">
                <div class="card-body">
                  <div class="card-body-icon">
                  <i class="fas fa-file-signature fa-1x"></i>
                  </div>
                  <div class="mr-5">
                  <?php
                  $query = "SELECT * FROM posts";
                  $select_all_post = mysqli_query($connection,$query);
                  $post_counts = mysqli_num_rows($select_all_post);
                  confirm_query( $select_all_post);

                 echo " <h2 class='card-subtitle mb-2 text-white'> {$post_counts} </h2>";
                  ?>
                  <div class='card-title'> Posts </div>
                   </div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="./posts.php">
                 
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>

            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-warning o-hidden h-60">
                <div class="card-body mr-3">
                  <div class="card-body-icon">
                     <i class="fas fa-comments"></i>
                  </div>

                  <div class="mr-5">
                  <div class="mr-5">
                  <?php
                  $query = "SELECT * FROM comments";
                  $select_all_comments = mysqli_query($connection,$query);
                  $comments_counts = mysqli_num_rows($select_all_comments);
                  confirm_query( $select_all_comments);

                 echo " <h2 class='card-subtitle mb-2 text-white'> {$comments_counts}</h2>";
                  ?>
                  <div class='card-title'>Comment</div>
                   </div>
                  </div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="./comments.php">
                
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>

            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-success o-hidden h-60">
                <div class="card-body">
                  <div class="card-body-icon">
                  <i class="fas fa-users"></i>
                  </div>
                  <?php
                  $query = "SELECT * FROM users";
                  $select_all_users = mysqli_query($connection,$query);
                  $users_counts = mysqli_num_rows($select_all_users);
                  confirm_query( $select_all_users);

                 echo " <h2 class='card-subtitle mb-2 text-white'> {$users_counts} </h2>";
                  ?>
                  <div class="card-title"> Users </div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="./users.php">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>

            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-danger o-hidden h-60">
                <div class="card-body">
                  <div class="card-body-icon">

                   <i class="fa fa-list-alt"></i>
                  </div>
                  <div class="mr-5">
                  <?php
                  $query = "SELECT * FROM categories";
                  $select_all_categories = mysqli_query($connection,$query);
                  $categories_counts = mysqli_num_rows($select_all_categories);
                  confirm_query( $select_all_categories);

                 echo " <h2 class='card-subtitle mb-2 text-white'> {$categories_counts} </h2>";
                  ?>
                  <div class="card-title"> Categories </div>
                  </div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="./admin_categories.php">

                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
          </div>
          <hr>