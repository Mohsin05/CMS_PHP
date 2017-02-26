<?php
            include "./function.php";
            global $con;
        if(isset($_POST['create_post'])) {
            $i=0;
            $post_title =$_POST['title'];
            $post_category_id =$_POST['post_category_id'];
            $post_author =$_POST['author'];
            $post_status =$_POST['post_status'];
            $post_image =$_FILES['post_image']['name'];
            $post_image_temp =$_FILES['post_image']['tmp_name'];
            $post_tags =$_POST['post_tags'];
            $post_content =$_POST['post_content'];
            $post_date =date('d-m-y');
            move_uploaded_file("$post_image_temp","../images/$post_image");
            $sql = "INSERT INTO posts (post_category_id,post_title,post_author,post_date,post_image,post_content,post_tags,post_status)
                    VALUES ($post_category_id,'$post_title','$post_author',now(),'$post_image','$post_content','$post_tags','$post_status ')";
            $result=mysqli_query($con,$sql);
            confirm($result);
        }
?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control"  name="title">
    </div>

    <div class="form-group">
        <label for="post_category_id">Category</label>
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
        <input type="text" class="form-control"  name="author">
    </div>

    <div class="form-group">
        <label for="post_status">Post status</label>
            <select class="form-control" style="width: 20%"  name="post_status">
            <option value='Draft'>Draft</option>";
            <option value='Publish'>Publish</option>";

        </select>


    </div>


    <div class="form-group">
        <label for="exampleInputFile">File input</label>
        <input type="file" name="post_image" class="form-control-file">
    </div>

    <div class="form-group">
        <label for="title">Post Tags</label>
        <input type="text" class="form-control"  name="post_tags">
    </div>

    <div class="form-group">
        <label for="exampleTextarea">Post Content</label>
        <textarea class="form-control" name="post_content" id="exampleTextarea" cols="30" rows="10"></textarea>
    </div>

    <button type="submit" name="create_post" class="btn btn-primary">Submit</button>
</form>