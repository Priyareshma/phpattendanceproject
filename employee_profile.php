<?php
if(isset($_GET['email']))
{
  $email=$_GET['email'];
}
if(isset($_POST['submit']))
{
  $email=$_POST['email'];
  $date_of_birth=$_POST['date_of_birth'];
  $date_of_joining=$_POST['date_of_joining'];
  $gender=$_POST['gender'];
  $address=$_POST['address'];
  $phone=$_POST['phone'];
  $sql="Insert into employee_details(email,date_of_birth,date_of_joining,gender,address,phone)values('$email','$date_of_birth','$date_of_joining','$gender','$address',$phone)";
  include('connection.php');
  $result=mysqli_query($conn,$sql);
  if($result)
  {
  header('location:index.php?message=success');
  }
}
?>
<html>
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
  </head>
<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Employee Profile Details</h3>
            <form method="POST" action="employee_profile.php" >

              <div class="row">
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <input type="text" id="email" class="form-control form-control" name="email" value="<?php echo $email?>" readonly />
                    <label class="form-label" for="email">Email</label>
                  </div>

                </div>
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <input type="date" id="date_of_birth" class="form-control form-control" name="date_of_birth"  required/>
                    <label class="form-label" for="lastName">Date of Birth</label>
                  </div>

                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4 d-flex align-items-center">

                  <div class="form-outline">
                    <input type="date" id="date_of_joining" class="form-control form-control" name="date_of_joining"  required/> 
                    <label for="date_of_joining" class="form-label">Date of Joining</label>
                  </div>

                </div>
                <div class="col-md-6 mb-4">

                  <h6 class="mb-2 pb-1">Gender: </h6>

                  <div class="form-check form-check-inline">
                    <input
                      class="form-check-input"
                      type="radio"
                      name="gender"
                      id="femaleGender"
                      value="Female"
                      checked
                    />
                    <label class="form-check-label" for="femaleGender">Female</label>
                  </div>

                  <div class="form-check form-check-inline">
                    <input
                      class="form-check-input"
                      type="radio"
                      name="gender"
                      id="maleGender"
                      value="Male"
                    />
                    <label class="form-check-label" for="maleGender">Male</label>
                  </div>

                  <div class="form-check form-check-inline">
                    <input
                      class="form-check-input"
                      type="radio"
                      name="gender"
                      id="otherGender"
                      value="Other"
                    />
                    <label class="form-check-label" for="otherGender">Other</label>
                  </div>

                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4 pb-2">

                  <div class="form-outline">
                    <input type="text" id="address" name="address" class="form-control form-control" required />
                    <label class="form-label" for="Address">Address</label>
                  </div>

                </div>
                <div class="col-md-6 mb-4 pb-2">

                  <div class="form-outline">
                    <input type="text" id="phone" name="phone" class="form-control form-control"  maxlength="10" pattern="\d{10}" required />
                    <label class="form-label" for="phoneNumber">Phone Number</label>
                  </div>

                </div>
              </div>
              <div class="mt-4 pt-2">
                <input class="btn btn-primary btn" type="submit" name="submit" id="register" value="Submit" />
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</html>

