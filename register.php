<html>
<head>
    <link rel="stylesheet" href="registerstyle.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<script>
function validate()
            {
                var name = document.getElementById("name");
                var firstregName = /^([a-zA-Z\-\'\.])+$/;
                var email = document.getElementById("email");
                var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                var password = document.getElementById("password");
                var confirmpassword = document.getElementById("confirmpassword")
                if(!firstregName.test(name.value))
                    {
                        alert("Provide valid Name");
                        return false;
                    }               
                if(!filter.test(email.value))
                    {
                        alert("Provide valid EmailID");
                        return false;   
                    }
    
                if(password.value!=confirmpassword.value)
                    {
                        alert("Check the password is matching with confirm password ");
                        return false;
                    }
                else{
                    
                     return true;
                }
                
            }
            </script>
            
<section class="vh-100 gradient-custom">
<div class="container py-5 h-100">
  <div class="row justify-content-center align-items-center h-100">
    <div class="col-12 col-lg-9 col-xl-7">
      <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
        <div class="card-body p-4 p-md-5">
          <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>
          <form method="post" action="insert.php" onsubmit="return validate()">

            <div class="row">
              <div class="col-md-6 mb-4">
                <div class="form-outline">
                  <label class="form-label" for="Name">Name</label>
                  <input type="text" id="name" name="name" class="form-control form-control" />
                </div>

              </div>
              <div class="col-md-6 mb-4">

                <div class="form-outline">
                  <label class="form-label" for="emailAddress">Email</label>
                  <input type="email" id="email"  name="email" class="form-control form-control" required />
                  
                </div>
                <span id="availability"></span>

              </div>
           
            </div>

            <div class="row">
              <div class="col-md-6 mb-4 ">

                <div class="form-outline">
                  <label class="form-label" for="emailAddress">Password</label>
                  <input type="text" id="password"  name="password" class="form-control form-control" required />
                  
                </div>
              </div>
                <div class="col-md-6 mb-4 ">
                <div class="form-outline">
                  <label class="form-label" for="emailAddress"> Confirm Password</label>
                  <input type="text" id="confirmpassword"  name="confirmpassword" class="form-control form-control" required/>
                  
                </div>

              </div>

            </div>

            <div class="row">
              <div class="col-12">
                <label class="form-label select-label">Choose Role</label>
                <select class="select form-control" name="role">
                  <option value="1" disabled>Choose option</option>
                  <option value="Admin">Admin</option>
                  <option value="Employee">Employee</option>
                </select>
              </div>
            </div>

            <div class="mt-4 pt-2">
              <input class="btn btn-primary btn" id="register" type="submit" name="submit" value="Submit" />
              <input class="btn btn-primary btn" id="reset" name="reset" type="reset" value="Reset"/>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
</html>
<script>
$(document).ready(function(){
    $('#email').focusout(function(){
        var email = $("#email").val();
        $.ajax({   
            url:"register_check.php",
            method:"POST",
            data:{email:email},
            success:function(data)
            {
                if(data==0)
                    {  
                      $('#availability').html("<span class=text-success><b>New email</b> </span>"); 
                      $("#register").attr("disabled",false); 
                      $('#register').click(function(){
                        swal({
                        title: "User created!",
                        text: "Suceess message sent!!",
                        icon: "success",
                        button: "Ok",
                        timer: 1000,
                        });
                        });                       
                    }else if(data!=0)
                        {
                         $("#availability").html("<span class=text-danger><b>Email exist</b></span>");
                        $("#register").attr("disabled",true);
                        }
            },
        });
        
    });
    $('#reset').click(function(){
      setTimeout(function(){
       location.reload();
   },1000);

    });
});
</script>