<?php
if(isset($_POST['email'])&&($_POST['password']))
{
   $email=$_POST['email'];
   $password=$_POST['password'];
}
include('connection.php');
$sql="select email,password from register where email='$email' and password='$password'";
$result=mysqli_query($conn,$sql);
$rows=mysqli_num_rows($result);
echo json_encode($rows);
?>