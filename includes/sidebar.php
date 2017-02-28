<div class="col-md-4">
    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>

        <div class="input-group">
                    <form method="post" action="search.php">
                        <input type="text" name="search" class="form-control">
                        <span class="input-group-btn">
                        <button class="btn btn-default" name="submit" type="submit">
                         <span class="glyphicon glyphicon-search"></span>
                         </button>
                         </span>
                    </form>
        </div>
        <!-- /.input-group -->
    </div>

    <div class="well">
        <h4>User Login</h4>
        <form method="post" action="includes/login.php">
            <div class="form-group">
<!--                <label for="email">Email address:</label>-->
                <input type="text" name="username" class="form-control" placeholder="Enter Username">
            </div>
            <div class="form-group">
<!--                <label for="pwd">Password:</label>-->
                <input type="password" name="password" placeholder="Enter Password" class="form-control" >
            </div>
            <span class="input-group-btn">
            <button type="submit" name="login" class="btn btn-primary">Login</button>
                </span>
        </form>
        <!-- /.input-group -->
    </div>


    <!-- Blog Categories Well -->
    <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-12">

                <ul class="list-unstyled">
                    <?php
                    $query="SELECT * FROM categories";
                    $result=mysqli_query($con,$query);
                    while ($row=mysqli_fetch_assoc($result)){
                        $cat_title=$row['cat_title'];
                        $cat_id=$row['cat_id'];
                    echo "<li><a href='category.php?category=$cat_id'>$cat_title</a></li>";
                    }
                    ?>
                </ul>
            </div>
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
    <?php include "widget.php";    ?>

</div>
