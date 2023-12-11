<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="css/style1.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
  <div class="container">
    <div class="form-box box">


      <header>Sign Up</header>
      <hr>

      <form action="#" method="POST">


        <div class="form-box">

          <?php

          session_start();

          include "connection.php";
          include "generate.php";

          if (isset($_POST['register'])) {

            $name = stripcslashes($_POST['username']);
            $email = stripcslashes($_POST['email']);
            $pass = stripcslashes($_POST['password']);
            $cpass = stripcslashes($_POST['cpass']);


            $check = "select * from users where email='{$email}'";
             // save the result in res
            $res = mysqli_query($conn, $check);
            $subject = "Email vervication code";
            
            $passwd = password_hash($pass, PASSWORD_DEFAULT); 
            // save after encryption
            $sender = "mylocker079@gmail.com"; 
            $key = bin2hex(random_bytes(12));
           
            


            if (mysqli_num_rows($res) > 0) { // ادا كان موجود
              echo "<div class='message'>
        <p>This email is used, Try another One Please!</p>
        </div><br>";
                         // for return
              echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button></a>";


            } else {    // ادا كان الاكاونت مااستخدم من قبل


             if (filter_var($email, FILTER_VALIDATE_EMAIL))  {
              if ($pass === $cpass) {
                $x=1;
                $otp =generateNumericOTP(); //save the result in otp
                $body = "your email verivcation code is: ". $otp; 
                
                if(mail($email, $subject, $body, $sender)){

                  $sql = "insert into users(username,email,password,otpcode) values('$name','$email','$passwd','$otp')"; //store the result

                $result = mysqli_query($conn, $sql);

                if ($result) {
                  $_SESSION['email'] = $email;
                    
                   header("location: login.php");
                  
                } else {
                  echo "<div class='message'>
        <p>This email is used, Try another One Please!</p>
        </div><br>";

                  echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button></a>";
                }
                 
              }else{
                  echo "Sorry, failed while sending mail!";
              }

                

              } else {
                echo "<div class='message'>
      <p>Password does not match.</p>
      </div><br>";

                echo "<a href='signup.php'><button class='btn'>Go Back</button></a>";
              }
            }

            else{
              
              echo "Sorry, invalid mail!";
            }

            }
          } else {

            ?>

            <div class="input-container">
              <i class="fa fa-user icon"></i>
              <input class="input-field" type="text" placeholder="Username" name="username" required>
            </div>

            <div class="input-container">
              <i class="fa fa-envelope icon"></i>
              <input class="input-field" type="email" placeholder="Email Address" name="email" required>
            </div>

            <div class="input-container">
              <i class="fa fa-lock icon"></i>
              <input class="input-field password" type="password" placeholder="Password" name="password" required>
              <i class="fa fa-eye icon toggle"></i>
            </div>

            <div class="input-container">
              <i class="fa fa-lock icon"></i>
              <input class="input-field" type="password" placeholder="Confirm Password" name="cpass" required>
              <i class="fa fa-eye icon"></i>
            </div>

          </div>


          <center><input type="submit" name="register" id="submit" value="Signup" class="btn"></center>


          <div class="links">
            Already have an account? <a href="login.php">Signin Now</a>
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