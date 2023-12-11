<?php

include "connection.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $build = stripcslashes($_POST['build']);
    $floor = stripcslashes($_POST['floor']);
    $drawer = stripcslashes($_POST['Drawer']);
    $type = stripcslashes($_POST['type']);
    $id = stripcslashes($_SESSION['id']);

        $query = "INSERT INTO `reserve`(`user_id`,build,`floor`,Drawer,`type`) VALUES('$id','$build','$floor','$drawer','$type')";

        $data = mysqli_query($conn, $query); // هتكون مغير لنتيجه الكويري f or t
    
        if ($data) { //هذا الشرط يتحقق من نجاح تنفيذ الاستعلام
          
            header("location: mybookings.php");        
        }
    // }
  
}

?>