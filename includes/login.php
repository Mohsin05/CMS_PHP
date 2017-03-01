<?php
        include "db.php";
        //session_start();

        if (isset($_POST['login'])){
         $username=mysqli_real_escape_string($con,$_POST['username']);
         $password=mysqli_real_escape_string($con,$_POST['password']);
            $query="SELECT * FROM users WHERE username='$username' AND user_password='$password' ";
            $result=mysqli_query($con,$query);
            $row=mysqli_fetch_assoc($result);
            if(!$row){
                $redirect=index.".".php;
            }
            if($row)
            {
                $db_user_id=$row['user_id'];
                $db_username=$row['username'];
                $db_user_password=$row['user_password'];
                $db_user_firstname=$row['user_firstname'];
                $db_user_lastname=$row['user_lastname'];
                $db_user_role=$row['user_role'];

                    $_SESSION['user_id']= $db_user_id;
                   $_SESSION['username']=$db_username;
                   $_SESSION['user_password']=$db_user_password;
                   $_SESSION['user_lastname']=$db_user_lastname;
                   $_SESSION['user_role']=$db_user_role;
                   $_SESSION['user_firstname']=$db_user_firstname;

                    $redirect="admin";





            }
            header("Location:../$redirect");

        }

?>