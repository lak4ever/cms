<table class="table table-bordered table-hover">
<h3> View all comments </h3>
                <thead>
                    <tr>
                        <th> comment id </th>
                        <th> comment author </th>
                        <th> comment content </th>
                        <th> comment email </th>
                        <th> comment status </th>
                        <th> In response to </th>
                        <th> comment date </th>
                        <th> Approved </th>
                        <th> Discard </th>
                        <th> delete </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
            <?php
                    $query = "SELECT * FROM comments";
                    $select_all_from_comments = mysqli_query($connection, $query);
                        while ($row = mysqli_fetch_assoc($select_all_from_comments)) {
                            $comment_id= $row['comment_id'];
                            $comment_post_id= $row['comment_post_id'];
                            $comment_author= $row['comment_author'];// these data comes from database
                            $comment_content= $row['comment_content'];
                            $comment_email= $row['comment_email'];
                            $comment_status= $row['comment_status'];
                            $comment_date= $row['comment_date'];

                           



                            //all this data comes into single post so we use loop to get all these
                            echo "<tr>";
                            echo "<td>{$comment_id}</td>";
                            echo "<td>{$comment_author}</td>";
                            echo "<td>{$comment_content}</td>";
                            /*
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
                            
                            */
                            echo "<td>{$comment_email}</td>";
                            echo "<td>{$comment_status}</td>";


                            // in  response to code display stars here

                            $query = "SELECT * FROM posts WHERE post_id = $comment_post_id ";
                            /* $query ="INSERT INTO comments (comment_post_id, save in the database
                                $query .="VALUES ( $the_post_id, => find by get method
                            */
                            $select_post_id_query = mysqli_query($connection, $query);
                            while ($row = mysqli_fetch_assoc($select_post_id_query)) {
                                $post_id =   $row['post_id'];
                                $post_title =   $row['post_title'];

                                if (!$select_post_id_query) {
                                    die("query failed".mysqli_error($connection));
                                }

                                echo "<td> <a href='../post.php?p_id=$post_id' target='blank'>{$post_title}</a></td>";
                                /* me harakoo balapn name karala haveda kiyla hariyata
                                view all comments page eke in response link eka click karma adala post ekata yana oni

                                target ="blank" dena oni nm single quations walin dena;
                                */
                            }
                            // in  response to code display ends here


                            echo "<td>{$comment_date}</td>";

                            echo "<td> <a href='comments.php?Approve={$comment_id}'> Approve </a> </td>";
                            /* we use same comment_id for this */
                            echo "<td> <a href='comments.php?Discard={$comment_id}'> Discard </a> </td>";
                            /* we use same comment_id for this */


                            echo "<td> <a href='comments.php?delete={$comment_id}'> Delete </a> </td>";
                            /* we are deleting from view all comment page a comment that have in the post
                            for that delete we need and comment id that comes from data base */
                                /* make sure to always use {} when we using inside php and echo */
                        }
            ?>
                </tbody>
            </table>



            <?php

        //comments approved starts here
        if (isset($_GET['Approve'])) {
            $the_comment_id = $_GET['Approve'];

            $query  = "UPDATE comments SET comment_status = 'Approved' WHERE comment_id = {$the_comment_id} ";
            /*
                SET comment_status ----- we update
                Discard from the get function------ and its a static value
                it is the id of the delete post  we have capture by get method and assign it to {$the_post_id} variable.

            */
            $Approved_comment_query = mysqli_query($connection, $query);

            if (!$Approved_comment_query) {
                die("query failed ".mysqli_error($connection));
            }
            // Redirect to another page aniwa if eka athulee darpn hodee
            header('location: comments.php');
        }
            //comments approved ends here






            //comments discard starts here
            if (isset($_GET['Discard'])) {
                $the_comment_id = $_GET['Discard'];

                $query  = "UPDATE comments SET comment_status = 'Discarded' WHERE comment_id = {$the_comment_id} ";
                /*
                    SET comment_status ----- we update
                    Discard from the get function------ and its a static value
                    it is the id of the delete post  we have capture by get method and assign it to {$the_post_id} variable.

                */
                $discarded_comment_query = mysqli_query($connection, $query);

                if (!$discarded_comment_query) {
                    die("query failed ".mysqli_error($connection));
                }
                // Redirect to another page aniwa if eka athulee darpn hodee
                header('location: comments.php');
            }

            //comments discard ends here
















    //<!-- comment delete query starts here -->
                 if (isset($_GET['delete'])) {
                     $the_comment_id = $_GET['delete'];

                     $query  = "DELETE FROM comments WHERE comment_id ={$the_comment_id} ";
                     /*
                         WHERE comment_id ----- comment_id comes from the the data base
                         {$the_comment_id}------ is the variable that comes 101 line in view_all_comments. php
                         it is the id of the delete comment  we have capture by get method and assign it to {$the_post_id} variable.

                     */
                     $delete_comment_query = mysqli_query($connection, $query);

                     if (!$delete_comment_query) {
                         die("query failed ".mysqli_error($connection));
                     }
                     // Redirect to another page aniwa if eka athulee darpn hodee
                     header('location: comments.php');
                 }
    //  <!-- comment delete query ends here -->
            ?>
