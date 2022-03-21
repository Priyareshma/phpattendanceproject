
<?php
 include('menu.php');
    //   session_start();  
    //   if(isset($_SESSION["email"]))  
    //   {  
    //        if((time() - $_SESSION['last_login_timestamp']) > 60) // 900 = 15 * 60  
    //        {  
    //             header("location:logout.php");  
    //        }  
    //        else  
    //        {  
    //             $_SESSION['last_login_timestamp'] = time(); 
 ?>

<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
         
        
    </head>
    <body>
        <center><h3  style=color:green;><i><b>Employee Details</b></i></h3></center>
        <form method="post">
    
            <table id="table" class="table table-striped table-bordered" class="text-light">
            <thead><tr>
<th>Employee Name</th>
<th>Employee Email</th>
<th>Employee Date of Birth</th>
<th>Employee Date of Joining</th>
<th>Employee Gender</th>
<th>Employee Address</th>
<th>Employee Phone Number</th>
<!-- <td>Action</td> -->

                </tr>
                </thead>
<?php
include('connection.php');
$sql="select r.name,r.email,e.date_of_birth,e.date_of_joining,e.gender,e.address,e.phone from register r inner join employee_details e on r.email=e.email";
$result=mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result))
    {
  echo '
  <tr>
 <td>'.$row["name"].'</td>
  <td>'.$row["email"].'</td>
  <td>'.$row["date_of_birth"].'</td>
  <td>'.$row["date_of_joining"].'</td>
  <td>'.$row["gender"].'</td>
  <td>'.$row["address"].'</td>
  <td>'.$row["phone"].'</td>
  ';
  }
 ?>        
            </table>
            </form>
    </body>
</html>
<script>
$(document).ready(function(){
                  $('#table').DataTable();
    });
</script>
