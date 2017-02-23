


<?php

if(isset($_POST['submit'])){
    $cat_id=$_GET['Edit'];
    $cat_title=$_POST['new_title'];
    $sql = "UPDATE categories SET cat_title='$cat_title' WHERE cat_id='$cat_id'";
    $result=mysqli_query($con,$sql);
    if(!$result){die("Error:".myqli_error($con));}


    header("location:category.php");
}
?>

<?php

if(isset($_POST['submit'])){
    if (empty($_POST['category'])) {
        echo "<h4>The field should not be empty.</h4>";}else{
        $category=$_POST['category'];
        $sql = "INSERT INTO categories (cat_title) VALUES ('$category')";
        $result=mysqli_query($con,$sql);
        if(!$result) {die ("QUERY FAILED".mysqli_error($con));};
    };};
?>


<form method="post" action="">
    <div class="form-group">
        <label for="category">Add Category</label>
        <input type="text" class="form-control" name="category" id="category">
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
</br>
<?php

if (isset($_GET['Edit'])){
    $cat_id=$_GET['Edit'];
    $query="SELECT * FROM categories WHERE cat_id='$cat_id'";
    $result=mysqli_query($con,$query);
    $row=mysqli_fetch_assoc($result);
    if($result){
        ?>

        <form method="post" action="">
            <div class="form-group">
                <label for="category">Edit Category</label>
                <input type="text" class="form-control" value="<?php echo $row['cat_title'];?>" name="new_title" id="category">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>

        <?php
    }};
?>


