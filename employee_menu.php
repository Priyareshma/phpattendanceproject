<?php
  session_start();  
  if(isset($_SESSION["email"]))  
    {  
       if((time() - $_SESSION['last_login_timestamp']) > 300) 
           {  
               session_unset();
               session_destroy(); 
               header('location:index.php?status=loggedout');
           }  
     }
           else  
           { 
               header('location:index.php?status=loggedout');  
           }
?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {font-family: Arial, Helvetica, sans-serif;}

.navbar {
  width: 100%;
  background-color: #555;
  overflow: auto;
}

.navbar a {
  float: left;
  padding: 12px;
  color: white;
  text-decoration: none;
  font-size: 17px;
}

.navbar a:hover {
  background-color: #000;
}

.active {
  background-color: #04AA6D;
}

@media screen and (max-width: 500px) {
  .navbar a {
    float: none;
    display: block;
  }
}
</style>
<body>

<h4><center>Welcome Employee..!!!<center></h4>


<div class="navbar">
  <?php
  if(isset($_GET['email']))
  {
 echo '<a href="employeepage.php?email='.$_GET["email"].'"><i class="fa fa-fw fa-home"></i>Home</a>';
  // echo '<a href="edit_profile.php?email='.$_GET["email"].'"><i class="fa fa-fw fa-edit"></i>Edit Profile</a>';
  echo '<a href="attendance_register.php?email='.$_GET["email"].'"><i class="fa fa-fw fa-clock-o"></i>Attendance register</a>';
  echo '<a href="employee_leave_submit.php?email='.$_GET["email"].'"><i class="fa fa-fw fa-check"></i>Leave submission</a>';
  echo '<a href="index.php"><i class="fa fa-fw fa-sign-out"></i>Log out</a>';
}
  ?>
</div>

</body>
</html> 