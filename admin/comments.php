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
                    <h1 class="page-header">
                        Welcom to Admin
                        <small>Author</small>
                    </h1>


                    <?php

                    if(isset($_GET['source'])){
                        $source = $_GET['source'];
                    }
                    else{
                        $source = '';
                    }
                    switch ($source) {
                        case 'add_post':
                            include 'add_post.php';
                            break;
                        case 'edit_post':
                            include 'edit_post.php';
                            break;
                        default:
                            // code...
                        include 'view_all_comments.php';
                            break;
                    }

                    ?>



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