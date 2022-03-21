<?php
if(isset($_GET['email']))
{
  $email=$_GET['email'];
}
include('employee_menu.php');
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
<table id="table" class="table table-striped table-bordered" class="text-light">
             <thead><tr>
 <td>Employee Email</td>
 <td>Leave Starting Date</td>
 <td>Leave Ending Date</td>
 <td>Total Days</td>
 <td>Reason For Leave</td>
 <td>Status</td>
 
                 </tr>
                 </thead>
 <?php
 include('connection.php');
 $sql= "select * from leave_submit where email='$email'";
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
   <td>'.$row["status"].'</td>
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
  <body>
    <div id="message"></div>
<form id="insert_form" method="post" >
  <div class="container">
  <div class="row">
  <div class="col-md-3 mb-4">
  <label class="form-label" for="">Start Date</label>
  <input type="date" id="start_date" name="start_date" class="form-control form-control" required/>
  </div>
  <div class="col-md-3 mb-4">
  <label class="form-label" for="">End Date</label>
  <input type="date" id="end_date" name="end_date" class="form-control form-control" required />
  </div>
  <div class="col-md-3 mb-4">
  <label class="form-label" for="">Number of Days</label>
  <input type="number"  id="total_days" name="total_days" class="form-control form-control" required/>
  </div>
</div>
  <div class="col-md-6 mb-4">
  <label class="form-label" for="">Reason for Leave</label>
  <input type="text" id="reason" name="reason" class="form-control form-control" required/>
  </div>
</div>
  <input type="hidden" name="email" id="email" value="<?php echo $email; ?>" >
  <center><input type="submit" class="btn btn-success" name="submit" id="submit" value="Apply Leave"></center> 
  </form>
</body>
</html>
<script>
  $(document).ready(function(){
    $('#insert_form').on('submit',function(event){
      event.preventDefault();
      $.ajax({
        url:"employee_leave_register.php",
        method:"POST",
        data:$("#insert_form").serialize(),
        success:function(data)
        {
          
           $("#message").html(data);
        },
      });
      setTimeout(function(){
       location.reload();
   },10000);
      });
    });
</script>





