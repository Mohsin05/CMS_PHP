<?php
            include "./function.php";
            global $con;
        if(isset($_POST['create_user'])) {
            $user_firstname =$_POST['user_firstname'];
            $user_lastname =$_POST['user_lastname'];
            $username=$_POST['username'];
            $user_email =$_POST['user_email'];
            $user_password =$_POST['user_password'];
            $user_role =$_POST['user_role'];
           // $post_image =$_FILES['post_image']['name'];
           // $post_image_temp =$_FILES['post_image']['tmp_name'];
            //$post_tags =$_POST['post_tags'];
           // $post_content =$_POST['post_content'];
           //   move_uploaded_file("$post_image_temp","../images/$post_image");

            $sql = "INSERT INTO users (username,user_lastname,user_firstname,user_email,user_password,user_role)
                    VALUES ('$username','$user_lastname','$user_firstname','$user_email','$user_password','$user_role')";
            $result=mysqli_query($con,$sql);
            confirm($result);
            if($result)
                echo '<h4>User Created:'." "."<a href='./users.php'> View Users</a></h4>";

        }
?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="user_firstname">First name</label>
        <input type="text" class="form-control"  name="user_firstname">
    </div>


    <div class="form-group">
        <label for="user_lastname">Last name</label>
        <input type="text" class="form-control"  name="user_lastname">
    </div>

    <div class="form-group">
        <select class="form-control" style="width: 15%"  name="user_role">

             <option value='Subscriber'>Select Options</option>";
             <option value='Admin'>Admin</option>";
             <option value='Subscriber'>Subscriber</option>";

            ?>

        </select>
    </div>

    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control"  name="username">
    </div>

    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="email" class="form-control"  name="user_email">
    </div>

    <div class="form-group">
        <label for="user_password">Password</label>
        <input type="password" class="form-control"  name="user_password">
    </div>




    <button type="submit" name="create_user" class="btn btn-primary">Add User</button>
</form>