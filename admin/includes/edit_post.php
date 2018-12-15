<?php
//catch the get request
if (isset($_GET['p_id'])) {
    $the_post_id = $_GET['p_id']; // ${the}_post_id we have use to not confuse with data base variables below

}

/* pull out from the data base post details and need to display in the edit form */
$query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
$select_all_from_posts_by_id = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($select_all_from_posts_by_id)) {
        $post_id= $row['post_id'];
        $post_author= $row['post_author'];// these data comes from database
        $post_title= $row['post_title'];
        $post_category_id= $row['post_category_id'];
        $post_heading= $row['post_heading'];
        $Secondary_Text= $row['Secondary_Text'];
        $post_status= $row['post_status'];
        $post_image= $row['post_image'];
        $post_tags= $row['post_tags'];
        $post_content= $row['post_content'];
        $post_comment_count= $row['post_comment_count'];
        $post_date= $row['post_date'];
    }

    if (isset($_POST['update_post'])) {// capture by post method from the edit form
        
        $post_title = $_POST['post_title']; // these are come from the below form fields form that is edit

        $post_heading = $_POST['post_heading'];
        $secondary_text = $_POST['secondary_text'];
        $post_author = $_POST['author'];

        $post_category_id = $_POST['post_category'];
        $post_status = $_POST['post_status'];

        $post_image = $_FILES['image']['name']; 
        $post_image_temp = $_FILES['image']['tmp_name'];

        $post_tags = $_POST['post_tags'];
        $post_content = $_POST['post_content'];

        
        //images send to temp location to permenant location data base
        move_uploaded_file($post_image_temp, "../images/{$post_image}");

       

         //update query easy to debug
        //=======================================
        $query = "UPDATE posts SET ";
        $query .="post_title = '{$post_title}', ";/* post_title -- is column name in data base.|| $post_title -- is edit form input fields name */
        $query .="post_heading = '{$post_heading}', ";
        $query .="Secondary_Text = '{$secondary_text}', ";
        $query .="post_author = '{$post_author}', ";
        $query .="post_category_id = '{$post_category_id }', ";
        $query .="post_status = '{$post_status}', ";
        $query .="post_tags = '{$post_tags}', ";
        $query .="post_content = '{$post_content}', ";
        $query .="post_image = '{$post_image}', ";
        $query .="post_date = now() "; //one before the last one take the {,} out other wise query failed
        $query .= "WHERE post_id = {$the_post_id} ";

         //fixing  image issue
         if (empty($post_image)) {
            $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
            $select_post_image = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_array($select_post_image)) {
                $post_image = $row['post_image'];
            }
        }

        //send the update query
        $update_post = mysqli_query($connection, $query);
        confirm_query($update_post);

        echo "<p class='bg-success'> Post Updated . <a href='../post.php?p_id={$the_post_id}'> view post </a></p>";
    }
?>
 

<!-- we are using same add post form to edit also -->
<!--edit post form start here-->
<div class="col-lg-10">
    <div class="container mx-5">
    <h3>Edit Post </h3>
        <form action="" method="post" enctype="multipart/form-data"> <!-- enctype for picture uploading incharge of sending difference form data  -->

            <div class="form-group">
                <label for="title"> <strong> Post Title </strong></label>
                <input value="<?php echo $post_title;?>" type="text" class="form-control" name="post_title">
                <!-- value="<?php //echo $post_id?> display the values from the data base inside the form when we edit-->
            </div>

            <div class="form-group">
                <label for="post_category_id"> <strong>  Post Category Id :-</strong></label>
                <select class="form-control" name="post_category" id="">
                    <!--options display dynamically due another function ntnm edit user wge drop down eka select karana dena tiba -->
                    <?php
                         $query = "SELECT * FROM categories";
                         $select_categories = mysqli_query($connection, $query);
                         confirm_query($select_categories);

                         while ($row = mysqli_fetch_assoc($select_categories)) {
                             $categories_id =  $row['cat_id'];
                             $categories_title =  $row['cat_title'];

                             echo "<option value='$categories_id'> {$categories_title} </option>";
                             /*we display the category title  by this --  {$categories_title}
                                and that value's id is -- $categories_id comes form data base
                                carried by this guy that option value -- post_category

                             */
                         }

                    ?>

                </select>
            </div>

            <div class="form-group">
                <label for="post_heading"> <strong> Post Heading </strong></label>
                <input value="<?php echo $post_heading ;?>" type="text" class="form-control" name="post_heading">
            </div>

            <div class="form-group">
                <label for="secondary_text"> <strong> Secondary Text </strong></label>
                <input value="<?php echo $Secondary_Text;?>" type="text" class="form-control" name="secondary_text">
            </div>

            <div class="form-group">
                <label for="author"> <strong> Post Author </strong>  </label>
                <input value="<?php echo  $post_author;?>" type="text" class="form-control" name="author">
            </div>


             <div class="form-group">
                <label for="post_status"> <strong> Post status </strong></label>
                <select name="post_status" id="" class="form-control">
                    <option value='<?php echo $post_status;?>'> <?php echo $post_status;?></option>
                   <?php
                        if ($post_status == 'published') {
                         echo "<option value='draft'> Draft </option>";
                        }else{
                        echo "<option value='published'> Published </option>";
                        }
                   
                   
                   ?>
                </select>
            </div>


            <div class="form-group">
                <img  width="100" src="../images/<?php echo $post_image;?>" alt="image">
              <!--  <img width="100" src="../images/<?php //echo $post_image;?>" name="image" alt="image from update folder">-->
                <!--
                post image  we fix  by replacing the input field to image src -->
            </div>
            
            <div class="form-group">
                <label for="post_tags"> <strong> Post Tags </strong>  </label>
                <input value="<?php echo $post_tags;?>" type="text" class="form-control" name="post_tags">
            </div>

            <div class="form-group">
                <label for="post_content"> <strong> Post Content  </strong> </label>
                <textarea class="form-control" name="post_content" id="" cols="30" rows="10"><?php echo $post_content;?>
                </textarea><!--we should add php tag between the textarea  and
                one more wiswig editor should come form after the textarea tag over-->
                <script>
			    CKEDITOR.replace( 'post_content' );
		        </script>
            </div>

            <div class="form-group">
                <input class="btn btn-primary my-2" type="submit" name="update_post" value="Update Post">
            </div>
        </form>
    </div>
</div>
<!--edit post form end here-->


