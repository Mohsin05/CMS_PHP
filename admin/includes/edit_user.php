<?php
include "./function.php";
global $con;

if(isset($_GET['user_id'])){
    $user_id=$_GET['user_id'];

    $query="SELECT * FROM users WHERE user_id=$user_id";
    $result=mysqli_query($con,$query);
    while ($row=mysqli_fetch_assoc($result)) {
        $user_firstname=$row['user_firstname'];
        $user_lastname=$row['user_lastname'];
        $username=$row['username'];
        $user_email=$row['user_email'];
        $user_role=$row['user_role'];
        //$post_image=$row['post_image'];
        $user_password=$row['user_password'];
//        $post_tags=$row['post_tags'];
//        $post_date=$row['post_date'];
//        $post_content=$row['post_content'];
    }}?>

<?php
if (isset($_POST['create_user'])){
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

    //    To display the image on each update
    //    if(empty($post_image)){
    //
    //        $sql = "SELECT * FROM posts WHERE  post_id=$post_id";
    //
    //        $result = mysqli_query($con, $sql);
    //        while ($row=mysqli_fetch_assoc($result)){
    //
    //
    //
    //            $post_image=$row['post_image'];
    //        }
    //    }


    $sql = "UPDATE users SET user_firstname='$user_firstname',user_lastname='$user_lastname',username='$username',
            user_email='$user_email',user_password='$user_password',user_role='$user_role' 
            WHERE user_id='$user_id'";
    $result = mysqli_query($con, $sql);
    confirm($result);
}


?>
<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="user_firstname">First name</label>
        <input type="text" class="form-control"  value="<?php echo $user_firstname; ?>" name="user_firstname">
    </div>


    <div class="form-group">
        <label for="user_lastname">Last name</label>
        <input type="text" class="form-control" value="<?php echo $user_lastname; ?>" name="user_lastname">
    </div>

    <div class="form-group">
        <select class="form-control" style="width: 15%"  name="user_role">



            <?php

              echo "<option value='$user_role'>$user_role</option>";

            ?>
            <?php

            if($user_role=='Admin'){

                echo "<option value='Subscriber'>Subscriber</option>";

            }else {

                echo "<option value='Admin'>Admin</option>";
            } ?>



        </select>
    </div>

    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" value="<?php echo $username; ?>" name="username">
    </div>

    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="email" class="form-control" value="<?php echo $user_email; ?>" name="user_email">
    </div>

    <div class="form-group">
        <label for="user_password">Password</label>
        <input type="password" class="form-control" value="<?php echo $user_password; ?>" name="user_password">
    </div>




    <button type="submit" name="create_user" class="btn btn-primary">Add User</button>
</form>