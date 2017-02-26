<table class="table table-bordered table-hover">
    <thead>
    <tr>

        <th>Id</th>
        <th>Author</th>
        <th>Comment</th>
        <th>Email</th>
        <th>Status</th>
        <th>In Response to </th>
        <th>Date</th>
        <th>Approve</th>
        <th>Unapprove</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tr>
        <?php
        include "./function.php";
        global $con;
        $query="SELECT * FROM comments";
        $result=mysqli_query($con,$query);
        while ($row=mysqli_fetch_assoc($result)) {
            $comments_id=$row['comments_id'];
            $comments_post_id=$row['comments_post_id'];
            $comments_author=$row['comments_author'];
            $comments_content=$row['comments_content'];
            $comments_email=$row['comments_email'];
            $comments_status=$row['comments_status'];
            $comments_date=$row['comments_date'];
            echo "<tr>";
            echo "<td>$comments_id</td>";
            echo "<td>$comments_author</td>";
            echo "<td>$comments_content</td>";
            echo "<td>$comments_email</td>";
            echo "<td>$comments_status</td>";


//             Displaying the cname of the post
            $query_cat="SELECT * FROM posts WHERE post_id='$comments_post_id'";
            $result_cat=mysqli_query($con,$query_cat);
            $row_title=mysqli_fetch_assoc($result_cat);
            $post_title=$row_title['post_title'];

//            Displaying the categories Dynamically  ENDS

            echo "<td><a href='../post.php?p_id=$comments_post_id'>$post_title</a></td>";
            echo "<td> $comments_date</td>";
            echo "<td><a href='comments.php?approve=$comments_id'>Approve</a></td>";
            echo "<td><a href='comments.php?unapprove=$comments_id'>Unapprove</a></td>";
            echo "<td><a href='comments.php?delete_comment=$comments_id'>Delete</a></td>";
            echo "</tr>";





        };



        delete_comment();
        approve_comment();
        unapprove_comment();


        ?>

</table>
