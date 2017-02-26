<?php
include "./function.php";
global $con;

if(isset($_GET['p_id'])){
    $post_id=$_GET['p_id'];

$query="SELECT * FROM posts WHERE post_id=$post_id";
$result=mysqli_query($con,$query);
while ($row=mysqli_fetch_assoc($result)) {
    $post_id=$row['post_id'];
    $post_author=$row['post_author'];
    $post_title=$row['post_title'];
    $post_category_id=$row['post_category_id'];
    $post_status=$row['post_status'];
    $post_image=$row['post_image'];
    $post_comment_count=$row['post_comment_count'];
    $post_tags=$row['post_tags'];
    $post_date=$row['post_date'];
    $post_content=$row['post_content'];
}}?>

<?php
if (isset($_POST['edit_post'])){
    $post_id=$_GET['p_id'];
    $post_title =$_POST['title'];
    $post_author =$_POST['author'];
    $post_status =$_POST['post_status'];
    $post_category_id=$_POST['post_category_id'];
    $post_image =$_FILES['post_image']['name'];
    $post_image_temp =$_FILES['post_image']['tmp_name'];
    $post_tags =$_POST['post_tags'];
    $post_content =$_POST['post_content'];
    $post_date =date('d-m-y');
    $post_comment_count =4;
    move_uploaded_file("$post_image_temp","../images/$post_image");

//    To display the image on each update
    if(empty($post_image)){

        $sql = "SELECT * FROM posts WHERE  post_id=$post_id";

        $result = mysqli_query($con, $sql);
        while ($row=mysqli_fetch_assoc($result)){



            $post_image=$row['post_image'];
        }
    }




    $sql = "UPDATE posts SET post_title='$post_title',post_author='$post_author',post_status='$post_status',
            post_image='$post_image',
            post_tags='$post_tags',post_content='$post_content',post_category_id=$post_category_id,post_date=now(),post_comment_count='$post_comment_count' 
            WHERE post_id='$post_id'";
            $result = mysqli_query($con, $sql);
            confirm($result);
}


?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" VALUE="<?php echo $post_title; ?>" name="title">
    </div>
    <div class="form-group">
        <select class="form-control" style="width: 20%"  name="post_category_id">
            <?php
            $query="SELECT * FROM categories";
            $result=mysqli_query($con,$query);
            while ($row=mysqli_fetch_assoc($result)){
                    $cat_title=$row['cat_title'];
                    $cat_id=$row['cat_id'];
                    echo "<option value='$cat_id'>$cat_title</option>";
            };
            ?>

        </select>
    </div>
    <div class="form-group">
        <label for="title">Post Author</label>
        <input type="text" class="form-control" VALUE="<?php echo $post_author; ?>" name="author">
    </div>
    <div class="form-group">
        <label for="post_status">Post status</label>
        <select class="form-control" style="width: 20%"  name="post_status">
            <option value='Draft'>Draft</option>";
            <option value='Publish'>Publish</option>";

        </select>


    </div>


    <div class="form-group">
        <img width="100" src="../Images/<?php echo $post_image;?>"><br><br>
<!--        <label for="exampleInputFile">File input</label>-->
 <input type="file" name="post_image" class="form-control-file">
    </div>

    <div class="form-group">
        <label for="title">Post Tags</label>
        <input type="text" VALUE="<?php echo $post_tags; ?>" class="form-control"  name="post_tags">
    </div>

    <div class="form-group">
        <label for="exampleTextarea">Post Content</label>
        <textarea class="form-control" name="post_content" id="exampleTextarea" cols="30" rows="10"><?php echo $post_content; ?></textarea>
    </div>

    <button type="submit" name="edit_post" class="btn btn-primary">Submit</button>
</form>