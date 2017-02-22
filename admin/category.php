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
                    <div class="col-xs-6">
                    <form>
                        <div class="form-group">
                            <label for="category">Add Category</label>
                            <input type="email" class="form-control" name="category" id="category">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <!-- /.row -->
                    <div class="col-xs-6">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Category Title</th>
                        </tr>
                        </thead>
                        <tr>
                            <td>Baseball Category</td>
                            <td>Baseball Category</td>

                        </tr>
                    </table>
                    </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        <?php  include "includes/footer.php"; ?>
