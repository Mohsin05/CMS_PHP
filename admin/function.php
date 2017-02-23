
<?php

function display_all_categories(){
    global $con;
    $query="SELECT * FROM categories";
$result=mysqli_query($con,$query);
while ($row=mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $cat_id = $row['cat_id'] . "</td>";
    echo "<td>" . $cat_title = $row['cat_title'] . "</td>";
    echo "<td><a href='category.php?delete={$row['cat_id']}'>Delete</a></td>";
    echo "<td><a href='category.php?Edit={$row['cat_id']}'>Edit</a></td>";
    echo "</tr>";
}};




function delete(){
    global $con;
    if(isset($_GET['delete'])){
        $cat_id=$_GET['delete'];

        $sql="DELETE FROM categories WHERE cat_id = $cat_id";
        $result=mysqli_query($con,$sql);
        header("location:category.php");
    }
};
?>



