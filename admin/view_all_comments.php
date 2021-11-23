      <table class="table table-bordered table-hover">
          <thead>
              <tr>
                  <th>Id</th>
                  <th>Author</th>
                  <th>Comment</th>
                  <th>Email</th>
                  <th>Status</th>
                  <th>In responce to</th>
                  <th>Date</th>
                  <th>Approved</th>
                  <th>Unapproved</th>
                  <th>Delete</th>
              </tr>
          </thead>
          <tbody>
        <?php
        $query = "SELECT * FROM comments";
        $comments_query = mysqli_query($connect,$query);

        while($row = mysqli_fetch_assoc($comments_query)){

            $comment_id = $row['comment_id'];
            $comment_post_id = $row['comment_post_id'];
            $comment_author = $row['comment_author'];
            $comment_content = $row['comment_content'];
            $comment_email = $row['comment_email'];
            $comment_status = $row['comment_status'];
            $comment_date = $row['comment_date'];

            echo "<tr>";
            echo "<td>$comment_id</td>";
            echo "<td>$comment_author</td>";
            echo "<td>$comment_content</td>";

            // $query = "SELECT * FROM category WHERE cat_id = {$post_category_id}";
            // $category_query = mysqli_query($connect,$query);
            // while($row = mysqli_fetch_assoc($category_query)){
            //   $cat_id = $row['cat_id'];
            //   $cat_title = $row['cat_title'];
            
            //   echo "<td>{$cat_title}</td>";
            // }

            echo "<td>$comment_email</td>";
            echo "<td>$comment_status</td>";

            // this is in responce to
            $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
            $view_post_title = mysqli_query($connect,$query);
            while($row = mysqli_fetch_assoc($view_post_title)){
              $post_id = $row['post_id'];
              $post_title = $row['post_title'];
            }
            echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";


            echo "<td>$comment_date</td>";
            echo "<td><a href = 'comments.php?approved=$comment_id'>Approved</a></td>";
            echo "<td><a href = 'comments.php?unapproved=$comment_id'>Unapproved</a></td>";
            echo "<td><a href = 'comments.php?delete=$comment_id'>Delete</a></td>";
            echo "</tr>";

        }

        if(isset($_GET['approved'])){
          $approve_comment = $_GET['approved'];

$query = "UPDATE comments SET comment_status = 'Approved' WHERE comment_id =$approve_comment";

          $approve_comment_query = mysqli_query($connect,$query);
          header("Location: comments.php");
        }

        if(isset($_GET['unapproved'])){
          $unapprove_comment = $_GET['unapproved'];

          $query = "UPDATE comments SET comment_status = 'Unapproved' WHERE comment_id =$unapprove_comment";

          $unapprove_comment_query = mysqli_query($connect,$query);
          header("Location: comments.php");
        }
        if(isset($_GET['delete'])){
          $delete_comment = $_GET['delete'];

          $query = "DELETE FROM comments WHERE comment_id = {$delete_comment}";

          $delete_comment_query = mysqli_query($connect,$query);
          header("Location: comments.php");
          // if(!$delete_comment_query){
          //   die("QUERY FAILD :" . mysqli_error($connect));
          // }
        }
        ?>
          </tbody>
      </table>
