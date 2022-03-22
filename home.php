<?php
include('connection.php');
session_start();
if(isset($_POST['submit']))
 {
     $email=$_POST['email'];
      $_SESSION["email"] =$email;  
      $_SESSION['last_login_timestamp'] = time();  
     $sql="select role from register where email='$email'";
     $result=mysqli_query($conn,$sql);
     $array=mysqli_fetch_assoc($result);
     $role=$array['role'];
        if($role=="Admin")
        {
            header('location:adminpage.php');
        }
        else
        {
            header('location:employeepage.php?email='.$email);
        }
    }
?>
