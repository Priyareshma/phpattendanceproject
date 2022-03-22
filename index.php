<?php 
   if(!empty($_GET['status'])){
          echo '<center><div>You have been logged out and login again!!!</div></center>';
   }
?>
<html>
<!-- icons  -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
<link rel="stylesheet" href="style.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>

<body>
  <div class=" flex-r container">

    <div class="flex-r login-wrapper">
      <div class="login-text">
        <div class="logo">  
        </div>
        <h1><center>Login Form</center></h1>
        <p>Common Login form for all type of users </p>

        <form class="flex-c" method="post" action="home.php" >
          <div class="input-box">
            <span class="label">E-mail</span>
            <div class=" flex-r input">
              <input type="text" name="email" id="email" placeholder="name@abc.com" required>
              <i class="fas fa-at"></i>
            </div>
          </div>

          <div class="input-box">
            <span class="label">Password</span>
            <div class="flex-r input">
              <input type="password" name="password" id="password" placeholder="8+ (a, A, 1, #)" required>
              <i class="fas fa-lock"></i>
            </div>
            <span id="availability"></span>
          </div>

          <input class="btn" type="submit" name="submit" id="register" value="Login">
          <span class="extra-line">
            <span>Create an new account</span>
            <a href="register.php">Sign Up</a>
          </span>
        </form>

      </div>
    </div>
  </div>
</body>
</html>
<script>
$(document).ready(function(){
    $('#password').focusout(function(){
        var email = $("#email").val();
        var password =$("#password").val();
        $.ajax({    //ajax for checking the email
            url:"check.php",
            method:"POST",
            data:{email:email,password:password},
            success:function(data)
            {
                if(data==0)
                    {  
                      $("#availability").html("<span class=text-danger><b>Wrong Credentials</b></span>");
                        $("#register").attr("disabled",true);
                        
                    }else if(data!=0)
                        {
                         $('#availability').html("<span class=text-success><b>Crendentials matched</b> </span>"); 
                            $("#register").attr("disabled",false);
                        }
            },
        });
        
    });
});
</script>