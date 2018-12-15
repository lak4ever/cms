
<?php include_once("includes/db.php") ;?>
<?php include "includes/header.php";?>


    <!-- Navigation -->
    <?php include "includes/navigation.php";?>
    <!-- Page Content -->
    <div class="container">

      <div class="row">

            <!-- Blog Entries Column -->
            <!-- Blog Entries Column stars here -->

            <div class="col-md-8">
            <!-- grabbing data from data base -->
            <?php
            if (isset($_GET['category'])) {
               $the_categories_id = $_GET['category'];
            }
            
              $query = "SELECT * FROM posts WHERE post_category_id	 = $the_categories_id ";
              $select_all_from_posts = mysqli_query($connection,$query);
              while ($row = mysqli_fetch_assoc($select_all_from_posts)) {
                $post_id= $row['post_id'];
                $post_heading= $row['post_heading'];
                $post_Secondary_Text= $row['Secondary_Text'];
                $post_title= $row['post_title'];
                $post_image= $row['post_image'];
                $post_date= $row['post_date'];
                $post_author= $row['post_author'];
                $post_content= substr($row['post_content'],0,250);
                /* we are going to minimize the content display in the front-end
                parameters 0 characters to 200  */

            ?>

              <h1 class="my-4"><?php echo  $post_heading ;?>
                <small><?php echo  $post_Secondary_Text;?></small>
             </h1>

              <!-- Blog Post1 -->
              <!-- fetch array assoc data will be added using php tag here -->
            <div class="card mb-4">
      <!-- adding data base reference to the image like normal image we need to give image location but give the location and reference name that stored in data base -->
      <a href="post.php?p_id=<?php echo $post_id;?>"> <img class="card-img-top" src="images/<?php echo $post_image ;?>" alt="Card image cap">  </a>

              <div class="card-body">
                  <h2 class="card-title"><?php echo $post_title;?></h2>
                  <p class="card-text"><?php echo $post_content;?></p>

                  <a href="post.php?p_id=<?php echo $post_id;?>" class="btn btn-primary"> <span>   Read More  <i class="fas fa-arrow-circle-right mx-1"> </i></span> </a>

                </div>
                
              <div class="card-footer text-muted">
                <span> <i class="far fa-calendar"></i>  <?php echo $post_date;?> </span><a href="#"> <?php echo $post_author;?></a>
              </div>
            </div>


           <?php } ?>

            </div>
        <!-- Blog Entries Column ends here -->


           
        <!-- Sidebar Widgets Column -->
        <?php include "includes/sidebar.php";?>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->
    <?php include "includes/footer.php";?>