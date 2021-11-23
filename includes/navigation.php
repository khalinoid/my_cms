<!-- Navigation -->
<?php include "includes/db.php" ?>

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Start Bootstrap</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">

                   <?php 
                   $query = "SELECT * FROM category";
                   $all_cats = mysqli_query($connect,$query);

                   while ($row = mysqli_fetch_assoc($all_cats)) {

                    $cat_id = $row['cat_id'];
                    $each_cats = $row['cat_title'];


                    echo "<li><a href='category.php?goto_cat=$cat_id'>$each_cats</a></li>";
                   }
                    ?>

                    <li><a href="admin">Admin</a></li>
                    <li>
                   <!--      <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li> -->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>