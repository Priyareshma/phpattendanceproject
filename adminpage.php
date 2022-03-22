
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
<th>View</th>

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
 ?>  <td><input type="button" name="view" value="view" id="<?php echo $row["email"]; ?>" class="btn btn-info btn-xs view_data" /></td> 
 <?php }?>     
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
<div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <h4 class="modal-title">More Information</h4>  
                </div>  
                <div class="modal-body" id="employee_detail">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
</body>
</html>
<script>
    $(document).ready(function(){  
        $(document).on('click', '.view_data', function(){  
           var employee_email = $(this).attr("id");
           console.log(employee_email);
           if(employee_email != '')  
           {  
                $.ajax({  
                     url:"select.php",  
                     method:"POST",  
                     data:{employee_email:employee_email},  
                     success:function(data){  
                          $('#employee_detail').html(data);  
                          $('#dataModal').modal('show');  
                     }  
                });  
           }            
      });  
    }); 
</script>