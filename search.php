<?php  include "includes/header.php"        ?>
    <!-- Navigation -->
<?php  include "includes/navigation.php"        ?>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <?php
                    if (isset($_POST['submit'])){
                        $search=$_POST['search'];
                        $query="SELECT * FROM posts WHERE post_tags LIKE '%$search%'";
                        $result=mysqli_query($con,$query);
                        $count=mysqli_num_rows($result);
                        if($count==0){
                            echo "<h3>NO RESULT FOUND</h3>";
                        }else{
                            $result=mysqli_query($con,$query);
                                while($row=mysqli_fetch_assoc($result)){
                                $post_title=$row['post_title'];
                                $post_author=$row['post_author'];
                                $post_date=$row['post_date'];
                                $post_image=$row['post_image'];
                                $post_content=$row['post_content'];


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
                    by <a href="index.php"><?php echo $post_author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?></p>
                <hr>
                <img class="img-responsive" src="Images/<?php  echo $post_image; ?>" alt="">
                <hr>
                <p><?php echo $post_content; ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>


            <?php   };       };

            };


                  ?>


            </div>
            <!-- Blog Sidebar Widgets Column -->
            <?php  include "includes/sidebar.php"        ?>
        </div>
        <!-- /.row -->

        <hr>

<?php  include "includes/footer.php"        ?>