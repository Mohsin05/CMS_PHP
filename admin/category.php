<?php  include "includes/header.php";
  include "function.php";
?>

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
                        <small>Author</small>
                    </h1>
                    <div class="col-xs-6">
                    <?php
                    include "includes/update_category.php";
                    ?>

                </div>
                <!-- /.row -->
                    <div class="col-xs-6" style="margin-top: 3px">
                        </br>
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>

                            <th>Id</th>
                            <th>Category Title</th>
                        </tr>
                        </thead>
                        <tr>

                            <!--  Diplay all the categories-->

                            <?php  display_all_categories();    ?>

                            <!-- End of  Diplay all the categories-->
                        </tr>
                    </table>


                        <?php
//
//                            if(isset($_GET['delete'])){
//                               $cat_id=$_GET['delete'];
//
//                               $sql="DELETE FROM categories WHERE cat_id = $cat_id";
//                               $result=mysqli_query($con,$sql);
//                                header("location:category.php");
//                        }
//
                        delete();
                                                    ?>
                    </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        <?php  include "includes/footer.php"; ?>
