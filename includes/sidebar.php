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
                    echo "<li><a href='#'>".$cat_title=$row['cat_title']."</a></li>";
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
