<?php
include('connection.php');
if(!empty($_POST))
{
    $start_date=$_POST['start_date'];
    $end_time=$_POST['end_time'];
    $email=$_POST['email'];
}
$query="select email,start_date,start_time from attendance where email='$email'and start_date='$start_date'";
$result=mysqli_query($conn,$query);
while($row = mysqli_fetch_array($result))
{
    $start_time=$row['start_time'];
}
if($start_time==null)
{
    echo "<div class='alert alert-danger'>First Start your attendance for today</div>";
}
else{
    $sql1="update attendance set end_time='$end_time' where email='$email' and start_date='$start_date'";
    mysqli_query($conn,$sql1);
    echo "<div class='alert alert-success'>Attendance closing time Reported</div>";
}

?>