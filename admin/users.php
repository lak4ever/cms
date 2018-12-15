
<?php include_once "includes/admin_header.php";?>
<?php include_once "includes/admin_top_nav.php";?>
 <?php include_once "includes/page_header.php";?>
    <div class="row mx-4 my-4">
        <!-- admin Post table starts here -->
        <?php
            if(isset($_GET['source'])){
                $source = $_GET['source']; 
            }else{
                // due to all cases false we get undefine error to patch it up we use this code section
                $source = '';
            }

            // use the switch statement multiple conditions
            switch ($source) {// we need a condition to compare it with below cases
                case 'add_user';
                    include "includes/add_user.php"; 
                    //code will be right here get method eken use karane source=add_comment url type karapn
                    break;
                    /* create a another page and include in the switch statement  */
                 case 'edit_user';
                    include "includes/edit_user.php"; //code will be right here=
                    break;

                
                default:
                    include_once "includes/view_all_users.php"; // to display table all the time
                    break;
            }
        
        ?>
    
    <!--admin Post table end  here -->
    </div>
    <hr >


   <!--

-->
<?php  include_once "includes/admin_footer.php";?>

