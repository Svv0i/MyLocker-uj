<?php
// دي البيج بس لعرض الليست 
include("connection.php");
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Get the selected option from the AJAX request موجوده ب footer
  $selectedOption = $_POST['selectedOption'];
  $selected = $_POST['select'];
  $sql="";
// echo $selectedOption;
  // Query to retrieve options for the second select list based on the selected option
  if($selected==1){
  $sql = "SELECT  id, `No` FROM `floor` WHERE `build_id` = '$selectedOption'";
   // Execute the query
   $result = mysqli_query($conn, $sql);

   // Check if any options were returned
   if (mysqli_num_rows($result) > 0) {
     // Loop through each row and create an option element for the select list
     echo "<option value=''>--select--</option>"; //خيار فارغ إلى القائمة لإجبار المستخدم على اختيار قيمة
     while ($row = mysqli_fetch_assoc($result)) {
       echo "<option value='" . $row['id'] . "'>" . $row['No'] . "</option>";
     }
   } else {
     echo "<option value=''>No options found</option>";
   }}
else{
  $sql = "SELECT  id, `No` FROM drawer WHERE `Floor_id` = '$selectedOption'";
   // Execute the query
   $result = mysqli_query($conn, $sql);

   // Check if any options were returned
   if (mysqli_num_rows($result) > 0) {
     // Loop through each row and create an option element for the select list
     echo "<option value=''>--select--</option>";
     while ($row = mysqli_fetch_assoc($result)) {
       echo "<option value='" . $row['No'] . "'>" . $row['No'] . "</option>";
     }
   } else {
     echo "<option value=''>No options found</option>";
   }
}

 

  // Close the connection
  mysqli_close($conn);
?>