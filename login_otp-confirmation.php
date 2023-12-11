<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>otp confirmation</title>
  <link rel="stylesheet" href="css/style1.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
  <div class="container">
    <div class="form-box box">

      <?php
      include "connection.php";

      if (isset($_POST['confirm'])) {


        $email =  $_SESSION["email"];
        $otp = stripcslashes($_POST['otpcode']);

        $sql = "select * from users where email='$email'";

        $res = mysqli_query($conn, $sql);

        if (mysqli_num_rows($res) > 0) {

          $row = mysqli_fetch_assoc($res);

          $otpcode = $row['otpcode'];

          // $decrypt = password_verify($pass, $password);

          if (filter_var($otp, FILTER_VALIDATE_INT)) {
          if ($otpcode==$otp) {
          
            $sql = "update  users set active=0, otpcode=null where email='$email'";

            $result = mysqli_query($conn, $sql);

            if ($result){
              if($row['admin']==1)
              header("location: control.php");
              else
              header("location: homepage.php");
          }else{
            echo "<div class='message'>
            <p>try confirmation again</p>
            </div><br>";

          }


          } else {
            echo "<div class='message'>
                    <p>Wrong confirmation code</p>
                    </div><br>";

            // echo "<a href='login.php'><button class='btn'>Go Back</button></a>";
          }
        }else{

          echo "<div class='message'>
                    <p>otp must be digits</p>
                    </div><br>";
        }

        } else {
          echo "<div class='message'>
                    <p>Wrong Email</p>
                    </div><br>";

          // echo "<a href='login.php'><button class='btn'>Go Back</button></a>";

        }


      } else {


        ?>

        <header>Cheak your email</header>
        <hr>
        <form action="#" method="POST">

          <div class="form-box">


            <div class="input-container">
              <i class="fa fa-lock icon"></i>
              <input class="input-field password" type="otpcode" placeholder="otpcode" name="otpcode">
              <i class="fa fa-eye toggle icon"></i>
            </div>

            

          </div>



          <center><input type="submit" name="confirm" id="submit" value="confirm" class="btn">  </center>

       

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