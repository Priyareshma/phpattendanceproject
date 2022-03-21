
<?php
 include('menu.php');
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
         <center><h4 style=color:blue;><i>Employees Applied for Leave</i></h4></center>
         <form method="post">
     
             <table id="table" class="table table-striped table-bordered" class="text-light">
             <thead><tr>
 <!-- <td>Employee Name</td> -->
 <th>Employee Email</th>
 <th>Leave Starting Date</th>
 <th>Leave Ending Date</th>
 <th>Total Days</th>
 <th>Reason For Leave</th>
 <th>Action</th>
 
                 </tr>
                 </thead>
 <?php
 include('connection.php');
 $sql= "select * from leave_submit where status='Leave Applied'";
 $result=mysqli_query($conn,$sql);
 while($row = mysqli_fetch_array($result))
     {
   echo '
   <tr>
  <td>'.$row["email"].'</td>
   <td>'.$row["start_date"].'</td>
   <td>'.$row["end_date"].'</td>
   <td>'.$row["total_days"].'</td>
   <td>'.$row["reason"].'</td>
   <td><a href="approval.php?approvalid='.$row["id"].'& email='.$row["email"].'" class="btn btn-success" class="text-light" role="button"><i class="fa fa-check"></i></a>
   <a href="rejection.php?rejectionid='.$row["id"].'& email='.$row["email"].'" class="btn btn-danger" class="text-light" role="button"><i class="fa fa-remove"></i></a></td>
   </tr>
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
  <html>
     <head>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
      <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
     <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css"/>
     </head>
     <body>
         <center><h3  style=color:green;><i>Approved Lists</i></h3></center>
         <form method="post">
     
             <table id="emp_table" class="table table-striped table-bordered" class="text-light">
             <thead><tr>
 <th>Employee Email</th>
 <th>Leave Starting Date</th>
 <th>Leave Ending Date</th>
 <th>Total Days</th>
 <th>Reason For Leave</th>
 
                 </tr>
                 </thead>
 <?php
 include('connection.php');
 $sql= "select * from leave_submit where status='Approved'";
 $result=mysqli_query($conn,$sql);
 while($row = mysqli_fetch_array($result))
     {
   echo '
   <tr>
  <td>'.$row["email"].'</td>
   <td>'.$row["start_date"].'</td>
   <td>'.$row["end_date"].'</td>
   <td>'.$row["total_days"].'</td>
   <td>'.$row["reason"].'</td>
   </tr>
   ';
   }
  ?>        
             </table>
             </form>
     </body>
 </html>
 <script>
 $(document).ready(function(){
                   $('#emp_table').DataTable();
     });
 </script>
 
 <html>
     <head>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
      <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
     <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css"/>
     </head>
     <body>
         <center><h3  style=color:Red;><i>Rejected Lists</i></h3></center>
         <form method="post">
     
             <table id="emp_reject_table" class="table table-striped table-bordered" class="text-light">
             <thead><tr>
 <th>Employee Email</th>
 <th>Leave Starting Date</th>
 <th>Leave Ending Date</th>
 <th>Total Days</th>
 <th>Reason For Leave</th>
                 </tr>
                 </thead>
 <?php
 include('connection.php');
 $sql= "select * from leave_submit where status='Rejected'";
 $result=mysqli_query($conn,$sql);
 while($row = mysqli_fetch_array($result))
     {
   echo '
   <tr>
  <td>'.$row["email"].'</td>
   <td>'.$row["start_date"].'</td>
   <td>'.$row["end_date"].'</td>
   <td>'.$row["total_days"].'</td>
   <td>'.$row["reason"].'</td>
   </tr>
   ';
   }
  ?>        
             </table>
             </form>
     </body>
 </html>
 <script>
 $(document).ready(function(){
                   $('#emp_reject_table').DataTable();
     });
 </script>
 
