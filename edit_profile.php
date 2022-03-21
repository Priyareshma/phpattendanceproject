<?php
include('connection.php');
if(!empty($_POST))
{
   $name=$_POST['name'];
   $address=$_POST['address'];
   $email=$_POST['email'];
   $date_of_birth=$_POST['date_of_birth'];
   $date_of_joining=$_POST['date_of_joining'];
   $phone=$_POST['phone'];
}
$sql="update employee_details set address='$address',date_of_birth='$date_of_birth',date_of_joining='$date_of_joining',phone=$phone where email='$email'";
mysqli_query($conn,$sql);
$query="update register set name='$name' where email='$email'";
mysqli_query($conn,$query);
echo "<div class='alert alert-success'>Updating, Wait for few Seconds</div>";
?>



