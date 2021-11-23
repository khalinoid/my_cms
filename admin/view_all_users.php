      <table class="table table-bordered table-hover">
          <thead>
              <tr>
                  <th>Id</th>
                  <th>Username</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  <th>Role</th>
                  <th>Admin</th>
                  <th>Subscriber</th>
                  <th>Edit</th>
                  <th>Delete</th>
                  
              </tr>
          </thead>
          <tbody>
        <?php
        $query = "SELECT * FROM users";
        $users_query = mysqli_query($connect,$query);

        while($row = mysqli_fetch_assoc($users_query)){

            $user_id = $row['user_id'];
            $username = $row['username'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_image = $row['user_image'];
            $user_role = $row['user_role'];

            echo "<tr>";
            echo "<td>$user_id</td>";
            echo "<td>$username</td>";
            echo "<td>$user_firstname</td>";
            echo "<td>$user_lastname</td>";
            echo "<td>$user_email</td>";
            echo "<td>$user_role</td>";

            // $query = "SELECT * FROM category WHERE cat_id = {$post_category_id}";
            // $category_query = mysqli_query($connect,$query);
            // while($row = mysqli_fetch_assoc($category_query)){
            //   $cat_id = $row['cat_id'];
            //   $cat_title = $row['cat_title'];
            
            //   echo "<td>{$cat_title}</td>";
            // }

        

            // this is in responce to
            // $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
            // $view_post_title = mysqli_query($connect,$query);
            // while($row = mysqli_fetch_assoc($view_post_title)){
            //   $post_id = $row['post_id'];
            //   $post_title = $row['post_title'];
            // }


      echo "<td><a href = 'users.php?to_admin={$user_id}'>Admin</a></td>";
      echo "<td><a href = 'users.php?to_subscriber={$user_id}'>Subscriber</a></td>";
      echo "<td><a href = 'users.php?source=edit_user&edit_user={$user_id}'>Edit</a></td>";
      echo "<td><a href = 'users.php?delete_user={$user_id}'>Delete</a></td>";

          echo "</tr>";

        }

        if(isset($_GET['to_admin'])){
         echo $to_admin = $_GET['to_admin'];

$query = "UPDATE users SET user_role = 'admin' WHERE user_id =$to_admin";

          $to_admin_query = mysqli_query($connect,$query);
          header("Location: users.php");
        }

        if(isset($_GET['to_subscriber'])){
          $to_subscriber = $_GET['to_subscriber'];

          $query = "UPDATE users SET user_role = 'subscriber' WHERE user_id =$to_subscriber";

          $to_subscriber_query = mysqli_query($connect,$query);
          header("Location: users.php");
        }
        if(isset($_GET['delete_user'])){
          $delete_user = $_GET['delete_user'];

          $query = "DELETE FROM users WHERE user_id = {$delete_user}";

          $delete_user_query = mysqli_query($connect,$query);
          header("Location: users.php");
          // if(!$delete_comment_query){
          //   die("QUERY FAILD :" . mysqli_error($connect));
          // }
        }
        ?>
          </tbody>
      </table>
