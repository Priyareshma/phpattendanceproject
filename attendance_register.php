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
     
     </head>
     <body>
         <form method="post"> 
         <table id="table" class="table table-striped table-bordered" class="text-light">
        <thead><tr>
        <td>Employee Name</td>
        <td>Employee Email</td>
        <td>Employee start date</td>
        <td>Employee start time</td>
        <td>Employee end time</td>

            </tr>
            </thead>            
 <?php
 include('connection.php');
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    </head>
    <body>
    <center><h5>Do you want to start your today attendance?</h5>
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
  Start Attendance
</button>

<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleEndModal">
  End Attendance
</button><center>
  <br>
<div id="message"></div>

<!--  add attendance Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div 
      class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Attendance Register</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form method="post" id="insert_form">
      <?php
          date_default_timezone_set('Asia/Kolkata'); 
          $start_time=date("h:i:sa"); 
          $start_date=date("y-m-d");?>
          <p> If you click start, Your Today attendance starts on <?php echo $start_time; ?></br>
          <input type="hidden" name="start_time" id="start_time" value="<?php echo $start_time?>">
          <input type="hidden" name="start_date" id="start_date" value="<?php echo $start_date?>">
          <input type="hidden" name="email" id="email" value="<?php echo $email?>">
          <center><input type="submit" id="insert" name="insert" class="btn btn-success" value="Start"></center> 
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!--  End attendance Modal -->
<div class="modal fade" id="exampleEndModal" tabindex="-1" role="dialog" aria-labelledby="exampleEndModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div 
      class="modal-header">
        <h5 class="modal-title" id="exampleEndModalLabel">Attendance Register</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form method="post" id="end_form">
      <?php
          date_default_timezone_set('Asia/Kolkata'); 
          $end_time=date("h:i:sa"); 
          $start_date=date("y-m-d");?>
          <p> If you click End, Your Today attendance closes on <?php echo $end_time; ?></br>
          <input type="hidden" name="end_time" id="end_time" value="<?php echo $end_time?>">
          <input type="hidden"  name="start_date" id="start_date" value="<?php echo $start_date?>">
          <input type="hidden"  name="email" id="email" value="<?php echo $email?>">
          <center><input type="submit" id="end" name="end" class="btn btn-secondary" value="End"></center> 
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
    </body>
</html>
<script>
  $(document).ready(function(){
    $('#insert_form').on('submit',function(event){
      event.preventDefault();
      $.ajax({
        url:"attendance_start.php",
        method:"POST",
        data:$("#insert_form").serialize(),
        success:function(data)
        {
           $("#insert_form")[0].reset();
           $("#exampleModal").modal('hide');
           $("#message").html(data);
        },
      });
      setTimeout(function(){
       location.reload();
   },10000);
      });
 
    });
</script>
<script>
  $(document).ready(function(){
    $('#end_form').on('submit',function(event){
      event.preventDefault();
      $.ajax({
        url:"attendance_end.php",
        method:"POST",
        data:$("#end_form").serialize(),
        success:function(data)
        {
           $("#end_form")[0].reset();
           $("#exampleEndModal").modal('hide');
           $("#message").html(data);
        },
      });
      setTimeout(function(){
       location.reload();
   },10000);
      });
    });
</script>


