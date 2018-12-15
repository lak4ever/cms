<?php
/* condensing into modular parts */

/* mysqli query connection check function starts here */
    function confirm_query($result){
        global $connection;
        if (!$result) {//$result we going to passing query parameter from somewhere else
            die("query failed. ".mysqli_error($connection));
           }
    }

/* mysqli query connection check function ends here */


/*insert categories function starts here */
function insertCategories(){

    global $connection; // always remember to add global in and every function

    if (isset($_POST['submit'])) {
        //checking the data exist or not
       $cat_title = $_POST['cat_title'];
       //doing some validation
       if ($cat_title == " " || empty($cat_title )) {// we are using empty function
           echo "this field should not be empty";
       } else {
        $query = "INSERT INTO categories(cat_title) ";
        $query.= "VALUES('{$cat_title}') ";

        $create_category_query = mysqli_query($connection,$query);

        //doing some safe net
        if(!$create_category_query){
            die('query failed').mysql_error($connection);
           
        }

       }
       // Redirect to another page
       header('location: admin_categories.php');
       echo "Category created successfully";
    }
}
/*insert categories function ends  here */



/*find categories function starts here */
function findAllCategories(){
    global $connection; // always remember to add global in and every function
                //-------------------------------------------------------------------------------
                  //this is the query to getting data from out side
                  $query = "SELECT * FROM categories";
                  $select_categories = mysqli_query($connection,$query);
                  //fetch the query results into array to display those values for that we use while
                  //and assign to an variable called row


                while ($row = mysqli_fetch_assoc( $select_categories)) {
                        //names of the rows cat _title according the db
                $categories_id =  $row['cat_id'];//comes out like associative //comes from data base
                $categories_title =  $row['cat_title'];//comes out like associative //comes from data base
                        //we are inside ul tag and we want display like li so we need ""
                        //the reason we use "" we cannot display li and that double quotes allow us separate from html using {}
                echo "<tr>";
                    echo " <td>{$categories_id}</td>  " ;
                    echo " <td>{$categories_title}</td>  " ;
                    echo " <td>
                                <a href='admin_categories.php?delete={$categories_id}'>
                                    <span> delete </span>
                                </a>
                            </td>  " ;
                    /*
                    Deleting data via using id
                    -----------------------------------
                    1.create a Get request to access supper global get
                    2. make sure use same page = admin_categories.
                    3.?delete = make key in the array when we using get assoc  array key will delete and value will be the categories_id
                     */
                    echo " <td>
                                <a href='admin_categories.php?edit={$categories_id}'>
                                 <span> Update </span>
                                </a>
                            </td>  " ;
                     /*
                    updating data via using id
                    --------------------------------
                     */
                echo "</tr>";
                    }


}
    /*find categories function ends here */

    /*delete categories function starts here */
   
    function deleteCategories(){

    global $connection; // always remember to add global in and every function

        //checking for delete key first if we see and get request
        if(isset($_GET['delete'])){
            $the_cat_id = $_GET['delete'];//$_GET['delete'] define value of the key
            $query  = "DELETE FROM categories WHERE cat_id ={$the_cat_id} ";
            /*
                WHERE cat_id ----- cat_id comes from the the data base
                {$the_cat_id}------ is the variable that comes 102 line in function php
                it is the id of the delete category  we have capture by get method and assign it to {$the_cat_id} variable
            
            */
            $delete_query = mysqli_query($connection,$query);

            // Redirect to another page aniwa if eka athulee darpn hodee
            header('location: admin_categories.php');
            echo "Category Deleted successfully";

            }
    }

 /*delete categories function ends here */

?>