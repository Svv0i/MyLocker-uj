<?php


include "connection.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$floorNo = stripcslashes($_POST['floor_no']);
$buildNo = stripcslashes($_POST['buildno']);

$sql = "select * from floor where No='$floorNo' && build_id='$buildNo'";  
$res = mysqli_query($conn, $sql) or die("error occurs");
if (mysqli_num_rows($res) == 0) {
    $sql = "insert into `floor`(`No`,`build_id`) values('$floorNo','$buildNo')";
    $result = mysqli_query($conn, $sql);
    if ($result) {

        header("location: newbuild.php");
    }
}else{
    echo "<div >
    <p>This floor is fount enter another One Please!</p>
    </div><br>";


}


}

?>