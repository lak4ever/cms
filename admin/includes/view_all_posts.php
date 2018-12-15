<div class="row mx-4 my-4">
    <div class="col-md-12 " id="view_posts"> 
<table class="table table-bordered table-hover">
<h3> View all Post </h3>
                <thead>
                    <tr>
                        <th> Post ID </th>
                        <th> Post Author </th>
                        <th> Post Title </th>
                        <th> Post Category</th>
                        <th> Post Status </th>
                        <th> Post Image</th>
                        <!--<th> Post content </th>-->
                        <th> Post tags </th>
                        <th> Post comments </th>
                        <th> Post Date </th>
                        <th> Post Edit </th>
                        <th> Post Delete </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
            <?php
                    $query = "SELECT * FROM posts";
                    $select_all_from_posts = mysqli_query($connection, $query);
                        while ($row = mysqli_fetch_assoc($select_all_from_posts)) {
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


                            //all this data comes into single post so we use loop to get all these
                            echo "<tr>";
                            echo "<td>{$post_id}</td>";
                            echo "<td>{$post_author}</td>";
                            echo "<td>{$post_title}</td>";

                            // displaying category dynamically starts here
                            
                        $query = "SELECT * FROM categories WHERE  cat_id = {$post_category_id} ";//cat id come from db // relational data base karane mehemi||to relate the other table
                        $select_categories_id = mysqli_query($connection, $query);
      
                        while ($row = mysqli_fetch_assoc($select_categories_id)) {
                            //names of the rows cat _title according the db
                          $categories_id =  $row['cat_id'];//comes out like associative //comes from data base
                          $categories_title =  $row['cat_title'];

                            echo "<td>{$categories_title}</td>";
                        }
                         // displaying category dynamically ends here


                            echo "<td>{$post_status}</td>";
                            echo "<td><img width='100' src ='../images/$post_image' alt ='$post_image'></td>";
                            //echo "<td>{$post_content}</td>";
                            echo "<td>{$post_tags}</td>";
                            echo "<td>{$post_comment_count}</td>";
                            echo "<td>{$post_date}</td>";

                            echo "<td> <a href='posts.php?source=edit_post&p_id={$post_id}'> Edit </a> </td>";
                            /* & -- with amp sign we divided the parameters
                            here we are passing two para meters
                            source - is the key
                            source=edit_post --- is the one parameter change to that page
                            &-- use to put second parameter
                            p_id - new variable and it equals to the {$post_id} comes from data base */

                            echo "<td> <a href='posts.php?delete={$post_id}'> Delete </a> </td>";
                            /* we are deleting from view all post page a article
                            for that delete we need and post id that comes from data base */

                            echo "</tr>";
                            /* make sure to always use {} when we using inside php and echo */
                        }
            ?>
                </tbody>
            </table>

            <?php
                if (isset($_GET['delete'])) {
                    $the_post_id = $_GET['delete'];

                    $query  = "DELETE FROM posts WHERE post_id ={$the_post_id} ";
                    /*
                        WHERE post_id ----- cat_id comes from the the data base
                        {$the_post_id}------ is the variable that comes 56 line in view_all_posts. php
                        it is the id of the delete post  we have capture by get method and assign it to {$the_post_id} variable.

                    */
                    $delete_query = mysqli_query($connection, $query);

                    confirm_query($delete_query);
        
                    // Redirect to another page aniwa if eka athulee darpn hodee
                    header('location: posts.php');
                }
            
            
            
            ?> 

            </div>
        </div>
