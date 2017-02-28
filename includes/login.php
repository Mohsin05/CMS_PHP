<?php
        include "db.php";
        //session_start();

        if (isset($_POST['login'])){
         $username=mysqli_real_escape_string($con,$_POST['username']);
         $password=mysqli_real_escape_string($con,$_POST['password']);
            $query="SELECT * FROM users WHERE username='$username'";
            $result=mysqli_query($con,$query);
            if(!$result){
                echo "Query Failed:".mysqli_error($con);

            }
            while ($row=mysqli_fetch_assoc($result))
            {
                $db_user_id=$row['user_id'];
                $db_username=$row['username'];
                $db_user_password=$row['user_password'];
                $db_user_firstname=$row['user_firstname'];
                $db_user_lastname=$row['user_lastname'];
                $db_user_role=$row['user_role'];



               if ($db_username !== $username && $db_user_password !== $password){
                   header("Location:../index.php");

                }elseif($username == $db_username && $password == $db_user_password){

                    $_SESSION['user_id']= $db_user_id;
                   $_SESSION['username']=$db_username;
                   $_SESSION['user_password']=$db_user_password;
                   $_SESSION['user_lastname']=$db_user_lastname;
                   $_SESSION['user_role']=$db_user_role;
                   $_SESSION['user_firstname']=$db_user_firstname;



                   header("Location:../admin");

               }else{
                   header("Location:../index.php");


               }

            }

        }

?>