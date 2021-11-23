<?php ob_start(); ?>
<?php include "includes/header.php" ?>

<body>

    <div id="wrapper">





        <!-- Navigation -->
        <?php include "includes/navigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcom to Admin
                            <small>Author</small>
                        </h1>
                       
                       <div class="col-xs-6">

                        <?php 
                        if(isset($_POST['submit'])){
                            $cat_title =$_POST['cat_title']; 
                            $my_query = "INSERT INTO category(cat_title) VALUE('$cat_title')";
                            $insert_cat = mysqli_query($connect, $my_query);

                            if(!$insert_cat){
                                die("QUERY FAILD " . mysqli_error($connect));
                            }

                            
                        }
                         ?>
                           <form action="" method="post">
                               <div class="form-group">
                                Add Category
                                   <input type="text" class="form-control" name="cat_title" required>
                               </div>
                               <div class="form-group">
                                   <input class="btn btn-primary" type="submit" class="form-control" name="submit">
                               </div>
                           </form>

                           <?php
                           if(isset($_GET['edit'])){
                            include "edit.php";
                           }
                           ?>


                       </div>
                       <div class="col-xs-6">
                           <?php 
                   $query = "SELECT * FROM category";
                   $cat_list = mysqli_query($connect,$query);
                   ?>

                           <table class="table table-bordered table-hover">
                               <thead>
                                   <tr>
                                       <th>Id</th>
                                       <th>Category Title</th>
                                       <th>Delete Category</th>
                                       <th>Edit Category</th>
                                   </tr>
                               </thead>
                               <tbody>
                                <?php 
                                $count = 1;
                                   while ($row = mysqli_fetch_assoc($cat_list)) {
                                    $cat_id = $row['cat_id'];
                                    $cat_title = $row['cat_title'];

                                    echo "<tr>";
                                    echo "<td>$count($cat_id)</td>";
                                    echo "<td>$cat_title</td>";
                                    echo "<td><a href='category.php?delete={$cat_id}'>Delete</a></td>";
                                    echo "<td><a href='category.php?edit={$cat_id}'>Edit</a></td>";
                                    echo "</tr>";
                                    $count+=1;
                                   }
                                ?>
                                <?php 
                                if(isset($_GET['delete'])){
                                    $delete_cat = $_GET['delete'];
                                    $query = "DELETE FROM category WHERE cat_id = {$delete_cat}";
                                    $delete_query = mysqli_query($connect,$query);
                                    header("Location:category.php");
                                }
                                ?>
                               </tbody>
                           </table>
                       </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
