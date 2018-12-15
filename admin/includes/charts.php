<?php
     $query = "SELECT * FROM posts WHERE post_status = 'published'";
     $select_all_published_post = mysqli_query($connection,$query);
     $published_counts = mysqli_num_rows($select_all_published_post);
     confirm_query( $select_all_published_post);

     $query = "SELECT * FROM posts WHERE post_status = 'draft'";
     $select_all_draft_post = mysqli_query($connection,$query);
     $draft_counts = mysqli_num_rows($select_all_draft_post);
     confirm_query( $select_all_draft_post);

     $query = "SELECT * FROM comments WHERE comment_status = 'discard'";
     $select_all_discard_comments = mysqli_query($connection,$query);
     $discard_comments_counts = mysqli_num_rows($select_all_discard_comments);
     confirm_query( $select_all_discard_comments);

     $query = "SELECT * FROM users WHERE user_role = 'Subscriber'";
     $select_all_Subs_user = mysqli_query($connection,$query);
     $Subs_user_counts = mysqli_num_rows($select_all_Subs_user);
     confirm_query( $select_all_Subs_user);








?>



<script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Count'],
          <?php
          $element_text = ['All Post', 'Active Posts', 'Draft Posts',  'Comments', 'Discard Comments', 'Users', 'Subscribers', 'Categories'];
          $element_count = [$post_counts, $published_counts, $draft_counts, $comments_counts, $discard_comments_counts, $users_counts, $Subs_user_counts, $categories_counts];

          for ($i=0; $i < 8; $i++) {
              echo "['{$element_text[$i]}' "." , "." {$element_count[$i]}],";
          }
          ?>
         // ['Posts', 1030],
         /*
         1. we add two arrays which is names of columns that show in draft and values both should be dynamic
         2.spaces matters otherwise it wan't work
         3.['Posts', 1030] align to this and we build the dynamic one
         4.due to reason we have use array to get data we need loop through it
         5. 4 is number of column names
         6.normal echo like ==== echo "";
         7.inside that we have create like this == ['Posts', 1030],
         8.first array is text so we need to get this like ==['']
         9.we using for loop to get array elements so we have $i
         10.then we need  concatenate two arrays
         11.use coma to separate two arrays
         12.use second variable and array $i to get loop through
         13. no need of double quotation as it is integer
         14.finally  inside echo array finished we add coma again
         15.$post_counts, $comments_counts, $users_counts, $categories_counts these comes form card_deck.php
          */
        ]);

        var options = {
          chart: {
            title: 'Design Lady blog statistics',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>