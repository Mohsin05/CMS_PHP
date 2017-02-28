<?php  include "includes/header.php"; ?>
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php  include "includes/navigation.php"; ?>
<!--        Navigation end-->
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to admin
                            <small><?php  echo $_SESSION['username'];?></small>
                        </h1>

                </div>
                <!-- /.row -->

                       <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-file-text fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">

                                            <?php
                                            $query="SELECT * FROM posts";
                                            $result=mysqli_query($con,$query);
                                            //$row=mysqli_fetch_assoc($result);
                                            $count_posts=mysqli_num_rows($result);
                                            echo "<div class='huge'>$count_posts</div>";
                                            ?>



                                            <div>Posts</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="posts.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-comments fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <?php
                                            $query="SELECT * FROM comments";
                                            $result=mysqli_query($con,$query);
                                            //$row=mysqli_fetch_assoc($result);
                                            $count_comments=mysqli_num_rows($result);
                                            echo "<div class='huge'>$count_comments</div>";
                                            ?>

                                            <div>Comments</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="comments.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-yellow">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-user fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <?php
                                            $query="SELECT * FROM users";
                                            $result=mysqli_query($con,$query);
                                            //$row=mysqli_fetch_assoc($result);
                                            $count_user=mysqli_num_rows($result);
                                            echo "<div class='huge'>$count_user</div>";
                                            ?>

                                            <div> Users</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="users.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-red">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-list fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">

                                            <?php
                                            $query="SELECT * FROM categories";
                                            $result=mysqli_query($con,$query);
                                            //$row=mysqli_fetch_assoc($result);
                                            $count_category=mysqli_num_rows($result);
                                            echo "<div class='huge'>$count_category</div>";
                                            ?>

                                            <div>Categories</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="category.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                    <?php
                    $query="SELECT * FROM posts WHERE post_status='Draft'";
                    $result=mysqli_query($con,$query);
                    $count_draft=mysqli_num_rows($result);
                    ?>
                    <?php
                    $query="SELECT * FROM comments WHERE comments_status='Unapprove'";
                    $result=mysqli_query($con,$query);
                    $count_unapprove_comments=mysqli_num_rows($result);
                    ?>

                    <?php
                    $query="SELECT * FROM users WHERE user_role='Subscribe'";
                    $result=mysqli_query($con,$query);
                    $count_subscriber=mysqli_num_rows($result);
                    ?>




                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <script type="text/javascript">
                            google.charts.load('current', {'packages':['bar']});
                            google.charts.setOnLoadCallback(drawChart);

                            function drawChart() {
                                var data = google.visualization.arrayToDataTable([
                                    ['Data', 'Count'],
                                 <?php

                                        $element_text=['Active posts','Draft Posts','Comments','Pending Comments','Users','Subscriber','Categories','Post'];
                                        $element_count=[$count_posts,$count_draft, $count_comments,$count_unapprove_comments,$count_user,$count_subscriber,$count_category];

                                        for($i=0;$i<7;$i++){


                                            echo  "['$element_text[$i]'".","." $element_count[$i]],"  ;
                                        };

                                    ?>


                                ]);





                                var options = {
                                    chart: {
                                        title: '',
                                        subtitle: '',
                                    }
                                };

                                var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                                chart.draw(data, options);
                            }
                        </script>

                    <div id="columnchart_material" style="width: auto; height:400px;"></div>









            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        <?php  include "includes/footer.php"; ?>
