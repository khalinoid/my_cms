    <!DOCTYPE html>
<html lang="en">
<?php include "includes/header.php" ?>

<body>

    <?php include "includes/navigation.php" ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <?php

                if(isset($_GET['p_id'])){
                    $the_post_id = $_GET['p_id'];
                }

                $query = "SELECT * FROM posts WHERE post_id = $the_post_id";
                $post_query = mysqli_query($connect,$query);

                while($row = mysqli_fetch_assoc($post_query)){
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = $row['post_content'];
                    ?>


                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title; ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author;?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                <hr>
                <p><?php echo $post_content; ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                <?php } ?>

                

                    <!-- Comments Form -->

<?php
if(isset($_POST['submit_comment'])){
   
   $the_post_id = $_GET['p_id'];
   $comment_author = $_POST['comment_author'];
   $comment_email = $_POST['comment_email'];
   $comment_content = $_POST['comment_content'];

   $query = "INSERT INTO comments (comment_post_id,comment_author,comment_email,comment_content,comment_status,comment_date) ";
   $query .= "VALUES  ($the_post_id,'{$comment_author}','{$comment_email}','{$comment_content}','unapproved',now()) ";
   $submit_comment_query = mysqli_query($connect,$query);
   if(!$submit_comment_query){
    die("QUERY FAILD : " . mysqli_error($connect));
   }
}
?>



                <div class="well">
                    <h3>Comment Area:</h3>
                    <form action="" method="post" role="form">
                        <div class="form-group">
                            <label for="author">Commenter name</label>
                            <input type="text" class="form-control" name="comment_author">
                        </div>
                        <div class="form-group">
                            <label for="author">Email</label>
                            <input type="email" class="form-control" name="comment_email">
                        </div>
                        <div class="form-group">
                            <label for="author">Leave your comment here:</label>
                            <textarea class="form-control" name="comment_content" rows="3"></textarea>
                        </div>
                        <button type="submit" name="submit_comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->


                <?php

                $query = "SELECT * FROM comments WHERE comment_post_id =  $the_post_id ";
                $query .= "AND comment_status = 'approved' ORDER BY comment_id DESC";
                $disply_comment = mysqli_query($connect,$query);
                while($row = mysqli_fetch_assoc($disply_comment)){
                    $comment_author = $row['comment_author'];
                    $comment_date = $row['comment_date'];
                    $comment_content = $row['comment_content'];
                }
                $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 ";
                $query .= "WHERE post_id = $the_post_id";
                $update_com_count = mysqli_query($connect,$query);
                ?>



                <!-- Comment -->
            <div class="well">
                <label for="author"><h3>Approved Comments</h3></label>
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">
                        <?php echo $comment_author ; ?> <small><?php echo $comment_date;?>
                        </small>
                        </h4>
                        <?php echo $comment_content ;?> 
                    </div>
                </div>
            </div>
                <!-- Comment 
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        Nested Comment 
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Nested Start Bootstrap
                                    <small>August 25, 2014 at 9:30 PM</small>
                                </h4>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </div>
                        End Nested Comment 
                    </div>
                </div>-->

            </div>

<?php include "includes/sidebar.php" ?>

            </div>

           
        </div>
        <!-- /.row -->

        <hr>

        <?php include "includes/footer.php" ?>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
