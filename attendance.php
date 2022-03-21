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
         <center><h3  style=color:green;><i><b>Attendance Details</b></i></h3></center>
         <form method="post"> 
         <?php
 include('connection.php');
 $query="select email from attendance group by email";
 $result=mysqli_query($conn,$query);
 foreach($result as $res)
 {
     $email= $res['email'];
         
        echo ' <table class="table table-striped table-bordered" class="text-light">
        <thead><tr>
<th>Employee Name</th>
<th>Employee Email</th>
<th>Attendance Date</th>
<th>Start Time</th>
<th>End Time</th>

            </tr>
            </thead> ';
 $sql= "select r.name,a.email,a.start_date,a.start_time,a.end_time from register r inner join attendance a on r.email=a.email where a.email='$email'";
 $result=mysqli_query($conn,$sql);
 while($row =mysqli_fetch_array($result))
     {
   echo '
   <tr>
   <td>'.$row["name"].'</td>
  <td>'.$row["email"].'</td>
   <td>'.$row["start_date"].'</td>
   <td>'.$row["start_time"].'</td>
   <td>'.$row["end_time"].'</td>
   </tr>
   ';
   }
}


  ?>        
             </table>
             </form>
     </body>
 </html>
 <script>
 $(document).ready(function(){
        $('table').DataTable();
     });
 </script>