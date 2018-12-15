<table class="table table-bordered table-hover">
<h3> View all Users </h3>
                <thead>
                    <tr>
                        <th> user id </th>
                        <th> user name </th>
                        <th> user first name </th>
                        <th> user last name </th>
                       <!-- <th> user image </th> -->
                        <th> user email </th>
                        <th> user role </th>
                        <th> approve </th> 
                        <th> discard </th> 
                        <th> Edit </th> 
                        <th> delete </th> 
                    </tr>
                </thead>
                <tbody>
                    <tr>
            <?php
                   $query = "SELECT * FROM users";
                   $select_all_users = mysqli_query($connection, $query);
                       while ($row = mysqli_fetch_assoc($select_all_users)) {
                           $user_id= $row['user_id'];
                           $user_name= $row['user_name'];
                           $user_password= $row['user_password'];// these data comes from database
                           $user_first_name= $row['user_first_name'];
                           $user_last_name= $row['user_last_name'];
                          // $user_image	= $row['user_image	'];
                           $user_email= $row['user_email'];
                           $user_image= $row['user_image'];
                           $user_role= $row['user_role'];
                           
                           



                            //all this data comes into single user so we use loop to get all these
                            echo "<tr>";
                            echo "<td>{$user_id}</td>";
                            echo "<td>{$user_name}</td>";
                        
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
                    `    // displaying category dynamically ends here
                            
                            */
                            echo "<td>{$user_first_name}</td>";
                            echo "<td>{$user_last_name}</td>";
                            //echo "<td>{$user_image}</td>";
                            echo "<td>{$user_email}</td>";
                            echo "<td>{$user_role}</td>";

      /*
                        $query = "SELECT * FROM posts WHERE post_id = $comment_post_id ";
                        $select_post_id_query = mysqli_query($connection,$query);
                        while ($row = mysqli_fetch_assoc($select_post_id_query)) {
                         $post_id =   $row['post_id'];
                         $post_title =   $row['post_title'];

                         if (!$select_post_id_query) {
                            die("query failed".mysqli_error($connection));
                        }

                        //echo "<td> <a href='../post.php?p_id=$post_id' target='blank'>{$post_title}</a></td>";
                        /* me harakoo balapn name karala haveda kiyla hariyata
                        view all comments page eke in response link eka click karma adala post ekata yana oni

                        target ="blank" dena oni nm single quations walin dena;
                        


                        }
                        */
                        
                        echo "<td> <a href='users.php?change_to_admin={$user_id}'> Admin </a> </td>";
                        echo "<td> <a href='users.php?Change_to_sub={$user_id}'> Subscriber </a> </td>";
                        echo "<td> <a href='users.php?source=edit_user&edit_user={$user_id}'> Edit </a> </td>";
                        echo "<td> <a href='users.php?delete={$user_id}'> Delete </a> </td>";
                        /* we are deleting from view all user page a user
                        for that delete we need and user id that comes from data base */

                        /* make sure to always use {} when we using inside php and echo 
                        passing two paramter
                    1.source=edit_user
                    2.edit user is the key that we recived */                  }
            ?>
                </tbody>
            </table>



            <?php

        //comments approved starts here
        if (isset($_GET['change_to_admin'])) {
            $the_user_id = $_GET['change_to_admin'];

            $query  = "UPDATE users SET user_role = 'Admin' WHERE user_id = {$the_user_id} ";
            /*
                SET user role ----- we update
                subscriber is the the default value
                it is the id of the delete user  we have capture by get method and assign it to {$the_post_id} variable.

            */
            $change_admin_query = mysqli_query($connection, $query);

            confirm_query($change_admin_query);
            // Redirect to another page aniwa if eka athulee darpn hodee
            header('location: users.php');
        }
            //comments approved ends here






            //comments discard starts here
            if (isset($_GET['Change_to_sub'])) {
                $the_user_id = $_GET['Change_to_sub'];

                $query  = "UPDATE users SET user_role = 'Subscriber' WHERE user_id = {$the_user_id} ";
                /*
                SET user role ----- we update
                subscriber is the the default value
                it is the id of the delete user  we have capture by get method and assign it to {$the_post_id} variable.

                */
                $change_subscriber_query = mysqli_query($connection, $query);

                confirm_query( $change_subscriber_query);
                // Redirect to another page aniwa if eka athulee darpn hodee
                header('location: users.php');
            }

            //comments discard ends here

    //<!-- comment delete query starts here -->
                 if (isset($_GET['delete'])) {
                     $the_user_id = $_GET['delete'];

                     $query  = "DELETE FROM users WHERE user_id ={$the_user_id} ";
                     /*
                         WHERE user_id ----- comment_id comes from the the data base
                         {$the_user_id}------ is the variable that comes 91 line in view_all_users. php
                         it is the id of the delete comment  we have capture by get method and assign it to {$the_user_id} variable.

                     */
                     $delete_user_query = mysqli_query($connection, $query);

                     if (!$delete_user_query) {
                         die("query failed ".mysqli_error($connection));
                     }
                     // Redirect to another page aniwa if eka athulee darpn hodee
                     header('location: users.php');
                 }
    //  <!-- comment delete query ends here -->
            ?>
