<!-- this is post front end -->
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

  //catching index.php front end read more  clicked button post id
  if (isset($_GET['p_id'])) {// key get p_id array
    $the_post_id = $_GET['p_id'];
  }



              $query = "SELECT * FROM posts WHERE post_id = {$the_post_id} ";
              $select_all_from_posts = mysqli_query($connection,$query);
              while ($row = mysqli_fetch_assoc($select_all_from_posts)) {
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
              <!-- fetch array assoc data will be added using php tag here -->
            <div class="card mb-4">
                <!-- adding data base reference to the image like normal image we need to give image location but give the location and reference name that stored in data base -->
              <img class="card-img-top" src="images/<?php echo $post_image ;?>" alt="Card image cap">
                <div class="card-body">
                  <h2 class="card-title"><?php echo $post_title;?></h2>
                  <p class="card-text"><?php echo $post_content;?></p>
                  
                </div>
              <div class="card-footer text-muted">
                <span> <i class="far fa-calendar"></i>  <?php echo $post_date;?> </span><a href="#"> <?php echo $post_author;?></a>
              </div>
            </div>


           <?php } ?>

           <!--comments section starts here -->

           <?php
            if (isset($_POST['create_comment'])) {

              // get the post id her via get method
              $the_post_id = $_GET['p_id'];

              // this data comes form the comment form
              $comment_author =  $_POST['comment_author'];
              $comment_email = $_POST['comment_email'];
              $comment_content = $_POST['comment'];

              $query ="INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date)";
              $query .="VALUES ( $the_post_id, '{$comment_author}', '{$comment_email}', '{$comment_content}', 'discard', now())";
              

             $create_comment_query = mysqli_query($connection,$query);
                  if (!$create_comment_query) {
                    die("query failed".mysqli_error($connection));
                  }

                  $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 WHERE post_id=$the_post_id ";  
                  $update_comment_count = mysqli_query($connection,$query);
                  if ($update_comment_count) {
                    die("query failed" . mysqli_error($connection));
                  }
            }
           
           ?>

          <!-- Comments Form -->
          <!-- Comments Form starts here -->
          <div class="card my-4">
            <h5 class="card-header">Leave a Comment:</h5>
            <div class="card-body">


              <!-- comment form starts here -->
              <form action="" method ="post">
                    <div class="form-group">
                      <input type="text" name="comment_author" class="form-control" placeholder="Type your name here">
                    </div>

                    <div class="form-group">
                        <input type="email" name="comment_email" class="form-control" placeholder="Type your name email here">
                    </div>


                    <div class="form-group">
                      <textarea name="comment" class="form-control" rows="3" placeholder="We would love to hear from you...."></textarea>
                    </div>

                <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
              </form>
               <!-- comment form ends here -->



            </div>
          </div>
          <!-- Comments Form ends here -->


      <!--comments section starts  here -->

            <?php
            // comments query enabling to display in the front
            $query = "SELECT *  FROM comments WHERE comment_post_id = {$the_post_id} ";//getting it as get request
            $query .= "AND comment_status = 'Approved' ";
            $query .= "ORDER BY comment_id DESC ";

            $select_comment_query =  mysqli_query($connection,$query);
            if(!$select_comment_query){
              die("query failed".mysqli_error($connection));
            }

            while ($row = mysqli_fetch_array( $select_comment_query)) {
             $comment_date =  $row['comment_date'];
             $comment_content =  $row['comment_content'];
             $comment_author =  $row['comment_author'];

              ?><!-- ending php here to get the html code on board -->

          <!-- Single Comment starts here -->
          <div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
            <div class="media-body">
              <h5 class="mt-0"><?php echo $comment_author ;?></h5>
              <small class="float-left"> <?php echo $comment_date ;?> </small>
              <br>
              <?php echo $comment_content;?>
            </div>
          </div>
          <!-- Single Comment ends here  -->


          <?php  } ?>


      <!--comments section ends here -->

            </div>
        <!-- Blog Entries Column ends here -->


           
        <!-- Sidebar Widgets Column -->
        <?php include "includes/sidebar.php";?>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->
    <?php include "includes/footer.php";?>
    