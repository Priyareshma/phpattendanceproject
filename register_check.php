<?php
if(isset($_POST['email']))
{
   $email=$_POST['email'];
}
include('connection.php');
$sql="select email from register where email='$email'";
$result=mysqli_query($conn,$sql);
$rows=mysqli_num_rows($result);
echo json_encode($rows);
?>
