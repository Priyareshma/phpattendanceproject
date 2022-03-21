<?php 
  include('connection.php');
  if(!empty($_POST))
  {
      $start_date=$_POST['start_date'];
      $end_date=$_POST['end_date'];
      $total_days=$_POST['total_days'];
      $reason=$_POST['reason'];
      $email=$_POST['email'];
      $status='Leave Applied';
  $sql="Insert into leave_submit(email,start_date,end_date,total_days,reason,status)values('$email','$start_date','$end_date',$total_days,'$reason','$status')";
  echo $sql;
  mysqli_query($conn,$sql);
  echo "<div class='alert alert-success'>Leave Record had been submitted</div>";
}
  ?>  
