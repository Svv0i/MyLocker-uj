<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="css/style1.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
  <div class="container">
    <div class="form-box box">

      <?php
      include "connection.php";
      include "generate.php";
      if (isset($_POST['login'])) {


        $email = stripcslashes($_POST['email']);
        $pass = stripcslashes($_POST['password']);

        $sql = "select * from users where email='$email'";

        $res = mysqli_query($conn, $sql);

        if (mysqli_num_rows($res) > 0) {

          $row = mysqli_fetch_assoc($res);

          $password = $row['password'];
          $active= $row['active'];
          $decrypt = password_verify($pass, $password);

          
            if ($decrypt) {            
              $_SESSION['id'] = $row['id'];
              $_SESSION['username'] = $row['username'];
              $_SESSION['email'] = $row['email'];
              if($active==1){
              $sql = "update  users set active=0, otpcode=null where email='$email'";
              $result = mysqli_query($conn, $sql);
              if ($result){
                if($row['admin']==1)
                header("location: control.php");
                else
                header("location: homepage.php");
                
              }else{
                echo "<div class='message'>
                <p>Wrong confirmation code</p>
                </div><br>";
    
              }
  
            }else{

              $subject = "Confirm your login to My Locker website";
              $sender = "mylocker079@gmail.com";
              $otp =generateNumericOTP();
              $body = "your email verivcation code is: ". $otp;
              if(mail($email, $subject, $body, $sender)){
                $sql = "update  users set active=0, otpcode=$otp where email='$email'";
                $result = mysqli_query($conn, $sql);
                if ($result){
                  $_SESSION['email'] = $email;
                  header("location: login_otp-confirmation.php");
                }else{
                  echo "<div class='message'>
                  <p>try agin cannot send email confirmation code</p>
                  </div><br>";
      
                }
    
              }
  
            }
            } else {
              echo "<div class='message'>
                      <p>Wrong Password</p>
                      </div><br>";
  
              echo "<a href='login.php'><button class='btn'>Go Back</button></a>";
            }

          
         
        } else {
          echo "<div class='message'>
                    <p>Wrong Email or Password</p>
                    </div><br>";

          echo "<a href='login.php'><button class='btn'>Go Back</button></a>";

        }


      } else {


        ?>

        <header>Login</header>
        <hr>
        <form action="#" method="POST">

          <div class="form-box">


            <div class="input-container">
              <i class="fa fa-envelope icon"></i>
              <input class="input-field" type="email" placeholder="Email Address" name="email">
            </div>

            <div class="input-container">
              <i class="fa fa-lock icon"></i>
              <input class="input-field password" type="password" placeholder="Password" name="password">
              <i class="fa fa-eye toggle icon"></i>
            </div>
            

          </div>



          <center><input type="submit" name="login" id="submit" value="Login" class="btn">  </center>

          <div class="links">
            Don't have an account? <a href="signup.php">Signup Now</a>
          </div>

        </form>
      </div>
      <?php
      }
      ?>
  </div>
  <script>
    const toggle = document.querySelector(".toggle"),
      input = document.querySelector(".password");
    toggle.addEventListener("click", () => {
      if (input.type === "password") {
        input.type = "text";
        toggle.classList.replace("fa-eye-slash", "fa-eye");
      } else {
        input.type = "password";
      }
    })
  </script>
</body>

</html>