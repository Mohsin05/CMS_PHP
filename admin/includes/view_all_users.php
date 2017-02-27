<table class="table table-bordered table-hover">
    <thead>
    <tr>

        <th>Id</th>
        <th>User name</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Role </th>
        <th>Admin </th>
        <th>Subscriber </th>
        <th>Edit </th>
        <th>Delete </th>
<!--        <th>Date</th>-->

    </tr>
    </thead>
    <tr>
        <?php
        include "./function.php";
        global $con;
        $query="SELECT * FROM users";
        $result=mysqli_query($con,$query);
        while ($row=mysqli_fetch_assoc($result)) {
            $user_id=$row['user_id'];
            $username=$row['username'];
            $user_firstname=$row['user_firstname'];
            $user_lastname=$row['user_lastname'];
            $user_email=$row['user_email'];
            $user_image=$row['user_image'];
            $user_role=$row['user_role'];
           // $comments_date=$row['comments_date'];
            echo "<tr>";
            echo "<td>$user_id</td>";
            echo "<td>$username</td>";
            echo "<td>$user_firstname</td>";
            echo "<td>$user_lastname</td>";
            echo "<td>$user_email</td>";


////             Displaying the cname of the post
//            $query_cat="SELECT * FROM posts WHERE post_id='$comments_post_id'";
//            $result_cat=mysqli_query($con,$query_cat);
//            $row_title=mysqli_fetch_assoc($result_cat);
//            $post_title=$row_title['post_title'];

//            Displaying the categories Dynamically  ENDS

//            echo "<td><a href='../post.php?p_id=$comments_post_id'>$post_title</a></td>";
            echo "<td> $user_role</td>";
            echo "<td><a href='users.php?change_to_admin=$user_id'>Admin</a></td>";
            echo "<td><a href='users.php?change_to_subscribe=$user_id'>Subscriber</a></td>";
            echo "<td><a href='users.php?source=edit_user&user_id=$user_id'>Edit</a></td>";
           echo "<td><a href='users.php?delete_user=$user_id'>Delete</a></td>";
            echo "</tr>";






        };



        delete_user();
        change_to_admin();
        change_to_subscribe();


        ?>

</table>
