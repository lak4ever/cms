
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


<!-- custom search engine starts here -->
    <?php
      //related to the sidebar.php search form
        if(isset($_POST['submit'])){
          //this isset function avoid the error when we refresh or enter press it
          $search = $_POST['search']; // always echo and check result before going forward

            //remember to user single quotes coz text coming in from user input
            $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";
            // search query sending to the database
            $search_query =  mysqli_query($connection,$query);

            if (!$search_query) {
              die("query failed".mysqli_error($connection));
            }
          // checking the search query result
            $count =  mysqli_num_rows($search_query);
             if ($count == 0) {
              echo "<h1>No Results</h1>";
            }else{

              
              while ($row = mysqli_fetch_assoc( $search_query )) {
                $post_heading= $row['post_heading'];
                $post_Secondary_Text= $row['Secondary_Text'];
                $post_title= $row['post_title'];
                $post_image= $row['post_image'];
                $post_content= $row['post_content'];
                $post_date= $row['post_date'];
                $post_author= $row['post_author'];

            ?>

              <h1 class="my-4"><?php echo  $post_heading ;?>
                <small><?php echo  $post_Secondary_Text;?></small>
             </h1>

              <!-- Blog Post1 -->
            <div class="card mb-4">
              <img class="card-img-top" src="images/<?php echo $post_image ;?>" alt="Card image cap">
                <div class="card-body">
                  <h2 class="card-title"><?php echo $post_title;?></h2>
                  <p class="card-text"><?php echo $post_content;?></p>
                  <a href="post.php" class="btn btn-primary"> <span>   Read More  <i class="fas fa-arrow-circle-right mx-1"> </i></span> </a>
                </div>
              <div class="card-footer text-muted">
                <span> <i class="far fa-calendar"></i>  <?php echo $post_date;?> </span><a href="#"> <?php echo $post_author;?></a>
              </div>
            </div>


              <?php } /* earlier ?> closing tag was here and it down  */
            }

      }
    ?>
<!-- custom search engine starts here -->


        </div>
        <!-- Blog Entries Column ends here -->


           
        <!-- Sidebar Widgets Column -->
        <?php include "includes/sidebar.php";?>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->
    <?php include "includes/footer.php";?>
    