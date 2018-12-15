            <!-- update categories form starts here -->
            <form action="" method="post">
                <div class="form-group my-4">
                    <label for="cat_title"> <strong> Update Category </strong> </label>

                    <?php
                    //update query first part
                    //-----------------------------
                    if (isset($_GET['edit'])) { // key of the tr= php?edit
                        $categories_id = $_GET['edit'];//$cat_ID goes bottom from here  to line 12 in editor

                        $query = "SELECT * FROM categories WHERE  cat_id =  $categories_id";//cat id come from db //$cat_ID comes from top here line 10 in editor
                        $select_categories_id = mysqli_query($connection, $query);
      
                        while ($row = mysqli_fetch_assoc($select_categories_id)) {
                            //names of the rows cat _title according the db
                          $categories_id =  $row['cat_id'];//comes out like associative //comes from data base
                          $categories_title =  $row['cat_title']; ?>
                    <input  value ="<?php if (isset($categories_title)) {echo  $categories_title;} ?>"type="text" class="form-control" name="cat_title" placeholder="Type category here">
                      <!-- input field value php tag help us to display selected category inside the box -->
                      <?php
                        }

                        // this value we gonna put echo value from the table
                    }
                       ?>

                       <?php
                       //update query second part
                       //-------------------------
                        if (isset($_POST['update_category'])) {// that have on the form's name button name
                        $the_cat_title = $_POST['cat_title'];//we are getting from field from top
                        $query  = "UPDATE categories SET cat_title ='{$the_cat_title}' WHERE cat_id = {$cat_id}";
                            $update_query = mysqli_query($connection, $query);
                            if (!$update_query) {
                                die("query failed"). mysqli_error($connection);
                            } else {
                                echo "success";
                            }
                            
                             // Redirect to another page
                                header('location: index.php');
                        }
                        
                       ?>

                </div>

                <div class="form-group">
                    <input class="btn btn-primary form-control"type="submit" name="update_category" value="Update Category">
                </div>

            </form>
            <!-- update  categories form ends here -->
