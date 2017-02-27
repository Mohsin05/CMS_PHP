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
                        <small>Author</small>
                    </h1>

                </div>
                <!-- /.row table for the posts -->
                <?php

                if (isset($_GET['source']) )        {
                    $source = $_GET['source'];
                }else
                    $source='';
                switch ($source) {
                    case "add_user":
                        include "includes/add_user.php";
                        break;
                    case 'edit_user':
                        include "includes/edit_user.php";
                        break;
                    case 'label3':
                        echo "code to be executed if n=label3";
                        break;

                    default:
                        include "includes/view_all_users.php";
                };




                ?>


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        <?php  include "includes/footer.php"; ?>
