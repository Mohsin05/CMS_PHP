<table class="table table-bordered table-hover">
    <thead>
    <tr>

        <th>Id</th>
        <th>Author</th>
        <th>Title</th>
        <th>Category</th>
        <th>Status</th>
        <th>Images</th>
        <th>Tags</th>
        <th>Comments</th>
        <th>Date</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tr>
        <?php
        include "./function.php";
        global $con;
        $query="SELECT * FROM posts";
        $result=mysqli_query($con,$query);
        while ($row=mysqli_fetch_assoc($result)) {
            $post_id=$row['post_id'];
            $post_author=$row['post_author'];
            $post_title=$row['post_title'];

//            Displaying the categories Dynamically

            $cat_id=$row['post_category_id'];
            $query_cat="SELECT * FROM categories WHERE cat_id='$cat_id'";
            $result_cat=mysqli_query($con,$query_cat);
            $row_cat=mysqli_fetch_assoc($result_cat);
            $post_category=$row_cat['cat_title'];

//            Displaying the categories Dynamically  ENDS

            $post_status=$row['post_status'];
            $post_image=$row['post_image'];
            $post_comment_count=$row['post_comment_count'];
            $post_tags=$row['post_tags'];
            $post_date=$row['post_date'];
            echo "<tr>";
            echo "<td>$post_id</td>";
            echo "<td>$post_author</td>";
            echo "<td>$post_title</td>";
            echo "<td>$post_category</td>";
            echo "<td>$post_status</td>";
            echo "<td><img width='100' height='100' src='../Images/$post_image' alt='image'></td>";
            echo "<td>$post_tags</td>";
            echo "<td>$post_comment_count</td>";
            echo "<td>$post_date</td>";
            echo "<td><a href='posts.php?source=edit_posts&p_id=$post_id'>Edit</a></td>";
            echo "<td><a href='posts.php?delete=$post_id'>Delete</a></td>";
            echo "</tr>";


        };



        delete_post();


        ?>

</table>
