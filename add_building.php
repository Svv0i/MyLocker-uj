<?php
include "connection.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$buildingName =stripcslashes($_POST['building_name']);
 
$sql = "select * from build where Name='$buildingName'";  
$res = mysqli_query($conn, $sql) or die("error occurs");
if (mysqli_num_rows($res) == 0) {
    $sql = "insert into `build`(`Name`) values('$buildingName')";
    $result = mysqli_query($conn, $sql);
    if ($result) {

        header("location: newbuild.php");
    }

       
      }

}else{
    echo "<div >
    <p>This build is fount enter another One Please!</p>
    </div><br>";


}




// Perform necessary operations to add the building to the database
// Custom function to add the building to the database

// Redirect back to the index page
// header("Location: index.php");
// exit();
?>