<?php  
 if(isset($_POST["employee_email"]))  
 {  
      $email=$_POST["employee_email"];
      $output = '';  
      include('connection.php');  
    //   $query = "SELECT * FROM employee_details WHERE email = '".$_POST["employee_email"]."'";  
      $query="select count(email) as working_days,email from attendance where email='$email'";
      $sql="select count(email) as leave_days from leave_submit where email='$email' and status='Approved';";
      $result = mysqli_query($conn, $query);
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td width="50%"><label>Email</label></td>  
                     <td width="70%">'.$row["email"].'</td>  
                </tr>  
                <tr>  
                     <td width="50%"><label>Total working days</label></td>  
                     <td width="70%">'.$row["working_days"].'</td>  
                </tr> 
                
                 
           ';  
      } 
      
    
      $output .= '  
           </table>  
      </div>  
      ';  
      echo $output;  
 }  
 ?>
 