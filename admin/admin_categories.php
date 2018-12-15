<?php include_once "includes/admin_header.php";?>
<?php include_once "includes/page_header.php";?>


    <div class="row mx-4 my-4">
            <div class="col-md-6 " id="addCategories">
<?php
    //insert categories look in the function.php file in admin
            insertCategories();
?>

           <!-- form to add data to the data base -->
           <!-- forms add categories starts here -->
            <form action="admin_categories.php" method="post" id="#">
                <div class="form-group">
                <label for="cat_title"> <strong> Add Category </strong>  </label>
                    <input type="text" class="form-control" name="cat_title" placeholder="Type category here">
                </div>

                <div class="form-group">
                    <input class="btn btn-primary form-control"type="submit" name="submit" value="Add Category">
                </div>

            </form>
            <!-- add categories form ends here -->



            <!-- update categories form starts here and include query here  -->
            <?php
                if(isset($_GET['edit'])){
                    $cat_id = $_GET['edit']; // $categories_id gets from  update_categories line 33 last one
                    // this comes from the form field
                include_once "includes/update_categories.php";
                }
            ?>

            <!-- update  categories form ends here -->


            </div>
            <div class="col-md-5 mx-2">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th> ID </th>
                            <th> Category Title </th>
                        </tr>
                    </thead>
                    <tbody>

            <?php
                //FIND ALL CATEGORIES QUERY starts here
                findAllCategories();
                //FIND ALL CATEGORIES QUERY ends here
            ?>

            <?php
                //delete query starts here
                deleteCategories();
                //delete query ends here
            ?>
                    </tbody>
                </table>
            </div>
        </div>
        <hr >
        <div class="row mx-4 my-4">
        <div class="col-md-6 " id="view_all_posts">
        

        </div>

        </div>


