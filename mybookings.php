<?php include "include/header.php";?>

    <div class="container">
        <div class="form-box box">
        <div>
            <h4><small>Review Booking</small></h4>
                <div class="table-responsive ">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="">No</th>
                            <th>Name</th>
                            <th>User Id</th>
                            <th>Builing</th>
                            <th >Floor</th>
                            <th >Drawer</th>
                            <th>Type</th>
                            
                        </tr>
                    </thead>
                    <tbody>
            <?php  
                $query = mysqli_query($conn, "SELECT `reserve`.`type`,`reserve`.`Id`,`reserve`.`drawer`,`reserve`.`user_id`,`reserve`.`floor`,`reserve`.`build`, `users`.`username`
                FROM `reserve` 
                    LEFT JOIN `users` ON `reserve`.`user_id` = `users`.`id` where `users`.`id`=".$_SESSION['id'] ) or die("error occurs");
                while ($row = mysqli_fetch_assoc($query)) {
                    echo "<tr>";
                    echo "<td>" . $row["Id"] . "</td>";
                    echo "<td>" . $row["username"] . "</td>";
                    echo "<td>" . $row["user_id"] . "</td>";
                    echo "<td>" . $row["build"] . "</td>";
                    echo "<td>" . $row["floor"] . "</td>";
                    echo "<td>" . $row["drawer"] . "</td>";
                    echo "<td>" . $row["type"] . "</td>";
                    
                    echo "</tr>";
                }

               ?>
               </tbody>
                </table>
            </div>
            </div>
            </div>
       
    </div>




<?php include "include/footer.php";?>
    