<?php
include('connection.php');
if(!empty($_POST))
{
    $start_date=$_POST['start_date'];
    $start_time=$_POST['start_time'];
    $email=$_POST['email'];
}
$query="select email,start_date from attendance where email='$email'and start_date='$start_date'";
$result=mysqli_query($conn,$query);
$rows=mysqli_num_rows($result);
if($rows==0)
{
$sql="insert into attendance(email,start_date,start_time)values('$email','$start_date','$start_time')";
mysqli_query($conn,$sql);
echo "<div class='alert alert-success'>Attendance Reported</div>";
}
else{
    $sql1="update attendance set start_time='$start_time' where email='$email' and start_date='$start_date'";
    mysqli_query($conn,$sql1);
    echo "<div class='alert alert-success'>Attendance Updated</div>";
}
?>