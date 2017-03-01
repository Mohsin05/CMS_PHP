<?php  include "includes/header.php"        ?>
    <!-- Navigation -->
<?php  include "includes/navigation.php"        ?>
    <!-- Page Content -->

    <div class="container">
        <div class="row">
            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <?php
                $query="SELECT * FROM posts WHERE  post_status='Publish'";
                $result=mysqli_query($con,$query);
                $query1="SELECT * FROM posts WHERE  post_status='Draft'";
                $result1=mysqli_query($con,$query1);

                if( $row=mysqli_fetch_assoc($result1)){echo "<h2>NO POST SORRY</h2>";};

                while($row=mysqli_fetch_assoc($result)) {

                    $post_title = $row['post_title'];
                    $post_id = $row['post_id'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = substr($row['post_content'], 0, 100);
                    $post_status = $row['post_status'];


               ?>

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?></p>
                <hr>
                <img class="img-responsive" src="Images/<?php  echo $post_image; ?>" alt="">
                <hr>
                <p><?php echo $post_content; ?></p>
                <hr>

                <?php

               };?>

            </div>
            <!-- Blog Sidebar Widgets Column -->
            <?php  include "includes/sidebar.php"?>
        </div>
        <!-- /.row -->

        <hr>

<?php  include "includes/footer.php"?>