 <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

               

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="post">
                    <div class="input-group">
                        
                            <input class="form-control" name="search" type="text" >
                            <span class="input-group-btn">
                                <button class="btn btn-default" name="submit" type="submit">
                                    <span class="glyphicon glyphicon-search"></span>
                            </button>
                            </span>
                        
                    </div>
                    </form>
                    <!-- /.input-group -->
                </div>


         <!-- Login from -->
        <div class="well">
            <h4>Login</h4>
            <form action="includes/login.php" method="post">
                <div class="form-group">
                    <input class="form-control" name="username" type="text" placeholder="Enter your username">
                </div>

                <div class="input-group">
                    <input class="form-control" name="password" type="text" placeholder="Enter your passwrod">
                    <span class="input-group-btn">
                        <button class="btn btn-primary" name="login" type="submit">
                        Login</button>
                    </span>
                </div>
            </form>
            <!-- /.input-group -->
        </div>
        <!-- End of login form -->


                <?php

                $query = "SELECT * FROM category";
                $home_cat = mysqli_query($connect,$query);

                ?>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">

                        <?php
                        while($row=mysqli_fetch_assoc($home_cat)){
                            $cat_id = $row['cat_id'];
                            echo "<li><a href='category.php?goto_cat=$cat_id'>{$row['cat_title']}</a></li>";
                        }
                        ?>

                                <!-- <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li> -->
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->                        
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>
