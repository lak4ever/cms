<?php
    if (isset($_POST['create_post'])) {
        $post_title = $_POST['title']; // these are come from the below form fields
        $post_heading = $_POST['post_heading'];
        $secondary_text = $_POST['secondary_text'];
        $post_author = $_POST['author'];
        $post_category_id = $_POST['post_category'];// we have added the post_category from the select option
        $post_status = $_POST['post_status'];

        

        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];
        /*


        after image uploaded it saved into forms temp location of the server
        from there we have to send it sever, to our data base this can also called reference to image

        we need to tell it where to send this image

ddd
        */
        $post_tags = $_POST['post_tags'];
        $post_content = $_POST['post_content'];
        $post_date = date('d-m-y'); //used a function plenty more there you can search online
        $post_comment_count = 1;// hard code later we will add dynamically not getting from form



        //function for the images
        move_uploaded_file($post_image_temp, "../images/{$post_image}");

        //adding add_post form data into data base
        //add post query

        $query = "INSERT INTO posts(post_category_id,post_heading,Secondary_Text,post_title,post_author,post_date,post_image,post_content,post_tags,post_comment_count,post_status) ";
        /* these are fields of our database columns data base eke piliwlata liyna columns*/

        $query.= "VALUES({$post_category_id},'{$post_heading}','{$secondary_text}','{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_comment_count}','{$post_status}')";
        /* form captured data assigned to variables those variables comes here 
        for strings we have to use single quotes
        for others donot
            now() = we are sending value as a function 
        */

        //sending data to the data base
     $create_post_query = mysqli_query($connection, $query);

        //checking the query 
        confirm_query($create_post_query );
        
        echo "<p class='bg-success d-inline-flex'> Post added . <a href='./posts.php'> view post </a></p>";
    }

?>



<!--add post form start here-->
    <div class="col-lg-10">
    <div class="container mx-0">
    <h3> Add Post </h3>
        <form action="" method="post" enctype="multipart/form-data"> <!-- enctype for picture uploading incharge of sending difference form data  -->

            <div class="form-group">
                <label for="title"> <strong> Post Title </strong></label>
                <input type="text" class="form-control" name="title">
            </div>

            <div class="form-group">
                <label for="post_category_id"> <strong>  Post Category Id :-</strong></label>
                <select class="form-control" name="post_category" id=""><!-- now the post_category need to go create_post-->
                    <!--options display dynamically -->
                   <?php
                         $query = "SELECT * FROM categories";
                         $select_categories = mysqli_query($connection, $query);
                         confirm_query($select_categories);
                         echo "Post created successfully";

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
                <input type="text" class="form-control" name="post_heading">
            </div>

            <div class="form-group">
                <label for="secondary_text"> <strong> Secondary Text </strong></label>
                <input type="text" class="form-control" name="secondary_text">
            </div>

            <div class="form-group">
                <label for="author"> <strong> Post Author </strong>  </label>
                <input type="text" class="form-control" name="author">
            </div>

            <div class="form-group">
                <label for="post_status"> <strong> Post status </strong></label>
                <select name="post_status" id="" class="form-control">
                    <option value="draft"> Select Post status </option>
                    <option value="published"> Published </option>
                    <option value="draft"> Draft </option>
                </select>
            </div>

            <div class="form-group">
                <label for="image"> <strong> Post Image </strong>  </label><br>
                <input type="file"  name="image">   <!--different super global called file -->
            </div>
            
            <div class="form-group">
                <label for="post_tags"> <strong> Post Tags </strong>  </label>
                <input type="text" class="form-control" name="post_tags">
            </div>

            <div class="form-group">
                <label for="post_content"> <strong> Post Content  </strong> </label>
                <textarea class="form-control" name="post_content" id="" cols="30" rows="10"></textarea>
                <script>
			    CKEDITOR.replace( 'post_content' );
		        </script>
            </div>

            <div class="form-group">
                <input class="btn btn-primary my-2" type="submit" name="create_post" value="Publish Post">
            </div>
        </form>
    </div>
</div>
<!--add post form end here-->