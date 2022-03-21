<?php 
include('employee_menu.php');
if(isset($_GET['email']))
{
  $email=$_GET['email'];
}
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
<td>Employee Date of Birth</td>
<td>Employee Date of Joining</td>
<td>Employee Gender</td>
<td>Employee Address</td>
<td>Employee Phone Number</td>
<td>Action</td>


                </tr>
                </thead>
<?php
include('connection.php');
$sql="select r.name,r.email,e.date_of_birth,e.date_of_joining,e.gender,e.address,e.phone from register r inner join employee_details e on r.email=e.email where e.email='$email'";
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
  <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Edit Profile
</button></td>
  
  ';
    
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
    <div id="message"></div>

<!--  Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div 
      class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Employee Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form method="post" id="insert_form" action="employee_menu.php">
          <div class="form-group">
          <label for="Employee Name" class="col-form-label">Employee Name:</label>
          <input type="text" class="form-control" name="name" id="name" value="<?php echo $row['name']; ?>">
        </div>
        <div class="form-group">
          <label for="Employee date of birth" class="col-form-label">Employee Date of Birth:</label>
          <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" value="<?php echo $row['date_of_birth']; ?>">
        </div>
        <div class="form-group">
          <label for="Employee date of Joining" class="col-form-label">Employee Date of Joining:</label>
          <input type="date" class="form-control" name="date_of_joining" id="date_of_joining" value="<?php echo $row['date_of_joining']; ?>">
        </div>
          <div class="form-group">
          <label for="Employee Address" class="col-form-label">Employee Address:</label>
          <input type="text" class="form-control" name="address" id="address" value="<?php echo $row['address']; ?>">
        </div>
        <div class="form-group">
          <label for="Employee phone" class="col-form-label">Employee Phone :</label>
          <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $row['phone']; ?>">
        </div>
          <input type="hidden" id="email" name="email" value="<?php echo $row['email']; ?>">
          <?php } ?>
          <input type="submit" id="insert" name="insert" class="btn btn-success" value="Update"> 
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
        url:"edit_profile.php",
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






