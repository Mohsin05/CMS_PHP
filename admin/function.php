
<?php
        function confirm($result){
            global $con;
         if(!$result)   {
             die("QUERY FAILED.".mysqli_error($con));
         };
        };




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




function delete_cat(){
            global $con;
            if(isset($_GET['delete'])){
                $cat_id=$_GET['delete'];
                $sql="DELETE FROM categories WHERE cat_id = $cat_id";
                $result=mysqli_query($con,$sql);
                header("location:category.php");
            }
                };
function delete_post(){
    global $con;
    if(isset($_GET['delete'])){
        $post_id=$_GET['delete'];
        $sql="DELETE FROM posts WHERE post_id = $post_id";
        $result=mysqli_query($con,$sql);
        header("location:posts.php");
    }
};

function delete_comment(){
    global $con;
    if(isset($_GET['delete_comment'])){
        $comment_id=$_GET['delete_comment'];
        $sql="DELETE FROM comments WHERE comments_id = $comment_id";
        $result=mysqli_query($con,$sql);
        header("location:comments.php");
    }
};

function delete_user(){
    global $con;
    if(isset($_GET['delete_user'])){
        $user_id=$_GET['delete_user'];
        $sql="DELETE FROM users WHERE user_id = $user_id";
        $result=mysqli_query($con,$sql);
        header("location:users.php");
    }
};

function unapprove_comment(){
    global $con;
    if(isset($_GET['unapprove'])){
        $comment_id=$_GET['unapprove'];
        $sql="UPDATE comments SET comments_status= 'Unapprove' WHERE comments_id='$comment_id'";
        $result=mysqli_query($con,$sql);
        header("location:comments.php");
    }
};

function approve_comment(){
    global $con;
    if(isset($_GET['approve'])){
        $comment_id=$_GET['unapprove'];
        $sql="UPDATE comments SET comments_status= 'Unapprove' WHERE comments_id='$comment_id'";
        $result=mysqli_query($con,$sql);
        header("location:comments.php");
    }
};


function change_to_subscribe(){
    global $con;
    if(isset($_GET['change_to_admin'])){
        $user_id=$_GET['change_to_admin'];
        $sql="UPDATE users SET user_role= 'Admin' WHERE user_id='$user_id'";
        $result=mysqli_query($con,$sql);
        header("location:users.php");
    }
};

function change_to_admin(){
    global $con;
    if(isset($_GET['change_to_subscribe'])){
        $user_id=$_GET['change_to_subscribe'];
        $sql="UPDATE users SET user_role= 'Subscribe' WHERE user_id='$user_id'";
        $result=mysqli_query($con,$sql);
        header("location:users.php");
    }
};


?>



