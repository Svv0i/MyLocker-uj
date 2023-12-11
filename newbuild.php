<?php include "include/header2.php";?>
    <div class="container">
        <div class="form-box box">
        
              <!-- contact section  -->

    <section class="contact-section" id="contact">
        <div class="container" style="max-width: 100%;">
        <div class="row gy-4">

        <div class="col-md-4">
        <form action="add_building.php" method="post" >
           
        <div class="row gy-4">
                
                <h3>New Build</h3>
                   <div class="row gy-4">
                   <div class="col-md-12">
                   <label for="building_name">Building Name:</label>
                    <input type="text" id="building_name" class="form-control" name="building_name" required>
                    </div>
                    <!-- <div class="col-md-12">
                    <label for="building_no">Building No:</label>
                    <input type="text" id="building_no" class="form-control" name="building_no" required>
                    </div> -->

                  </div>
             
                <div class="col-md-12 text-center">
                      <button type="submit">Create</button>
                 </div>
                 </div>
            
            </form>
        </div>
        <div class="col-md-4">
        <form action="add_floor.php" method="post" >
        <div class="row gy-4">
         
                <h3>New Floor</h3>           
                   <div class="row gy-4">
                  
                  
                    <div class="col-md-12">
                    <label for="floor_no">Floor No:</label>
                    <input type="text" id="floor_no" class="form-control" name="floor_no" required>
                 
                    </div>
                    <div class="col-md-12">
                  <label for="buildno">Build No:</label>
                  <select name="buildno" id="buildno"  class="form-select"  required>
                                <?php                           
                             $query = mysqli_query($conn, "SELECT * FROM build ") or die("error occurs");
             
                             while ($result = mysqli_fetch_assoc($query)) {
                                echo "<option value='" . $result['Id'] . "'>" . $result['Name'] . "</option>";
                             }
                                     ?>
                                </select>
                    </div>
                    </div>
                       
             
                <div class="col-md-12 text-center">
                                <button type="submit">Create</button>
                            </div>
                            </div>
            
            </form>
        </div>
        <div class="col-md-4">
        <form action="add_drawer.php" method="post" >
        <div class="row gy-4">
         
                <h3>New Locker</h3>           
                   <div class="row gy-4">
                  
                    <div class="col-md-12">
                        <label for="drawer_no">Locker No:</label>
                        <input type="text" id="drawer_no" class="form-control" name="drawer_no" required>
                 
                    </div>
                    <div class="col-md-12">
                            <label for="build">Build No:</label>
                            <select name="build" id="build"  class="form-select"  required>
                                <?php                           
                             $query = mysqli_query($conn, "SELECT * FROM build ") or die("error occurs");
             
                             while ($result = mysqli_fetch_assoc($query)) {
                                echo "<option value='" . $result['Id'] . "'>" . $result['Name'] . "</option>";
                             }
                                     ?>
                                </select>
                    </div>
                    <div class="col-md-12">
                        <label for="floor">Floor No:</label>
                        <select  type="text" name="floor" id="floor"  class="form-select" placeholder="" required>
                                
                                </select>
                    </div>
                    </div>
             
                <div class="col-md-12 text-center">
                                <button type="submit">Create</button>
                  </div>
                  </div>
            
            </form>
        </div>
     
   
        </div>
     </div>
        
    </section>

        </div>
    </div>
    <?php include "include/footer.php"; ?>