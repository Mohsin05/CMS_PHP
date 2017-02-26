<?php  include "includes/header.php"        ?>
    <!-- Navigation -->
<?php  include "includes/navigation.php"        ?>
    <!-- Page Content -->

    <div class="container">
    <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <?php
            if(isset($_GET['p_id'])){

            $post_id=$_GET['p_id'];
            $query="SELECT * FROM posts WHERE post_id=$post_id";
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

            <?php   }};?>


            <!-- Blog Comments -->


            <?php
            if(isset($_POST['create_comment'])){
            $posts_id=$_GET['p_id'];
            $comments_author=$_POST['comments_author'];
            $comments_email=$_POST['comments_email'];
            $comments_content=$_POST['comments_content'];
            $query="INSERT INTO comments (comments_post_id, comments_author, comments_email,comments_content,comments_status,comments_date)
                      VALUES ('$posts_id','$comments_author','$comments_email','$comments_content','Unapprove',now())";
            $result=mysqli_query($con,$query);


            $query1="UPDATE posts SET post_comment_count=post_comment_count+1 WHERE post_id=$posts_id";
            $result1=mysqli_query($con,$query1);


            } ?>



            <!-- Comments Form -->
            <div class="well">
                <h4>Leave a Comment:</h4>
                <form method="post" action="">

                    <div class="form-group">
                        <label for="comments_author">Author</label>
                        <input type="text" class="form-control" name="comments_author"></input>
                    </div>
                    <div class="form-group">
                        <label for="comments_author">Email</label>
                        <input type="email" class="form-control" name="comments_email"></input>
                    </div>

                    <div class="form-group">
                        <label for="comments">Your comment</label>
                        <textarea class="form-control" name="comments_content" rows="3"></textarea>
                    </div>
                    <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                </form>
            </div>

            <hr>

            <!-- Posted Comments -->

            <?php
                global $con;
            $posts_id=$_GET['p_id'];
        $query="SELECT * FROM comments WHERE comments_post_id='$posts_id'";
        $query.=" AND comments_status='approved'";
        $query.="ORDER BY comments_id DESC";
        $result=mysqli_query($con,$query);

        while ($row=mysqli_fetch_assoc($result)) {
            $comments_date = $row['comments_date'];
            $comments_content = $row['comments_content'];
            $comments_author = $row['comments_author'];


        ?>




            <!-- Comment -->
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading"><?php echo $comments_author ;?>
                        <small><?php echo $comments_date ;?></small>
                    </h4>
                    <?php echo  $comments_content ;?>
                </div>
            </div>


<?php }; ?>



        </div>
        <!-- Blog Sidebar Widgets Column -->
        <?php  include "includes/sidebar.php"?>
    </div>
    <!-- /.row -->

    <hr>

<?php  include "includes/footer.php"?>