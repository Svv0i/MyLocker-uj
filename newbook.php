<?php include "include/header.php";?>
    <div class="container">
        <div class="form-box box">
        
              <!-- contact section  -->

    <section class="contact-section" id="contact">
        <div class="container">
       
        <form action="submetbooking.php" method="post" >
            <div class="row gy-4">
           
                
                <h3 class="offset-md-4">New Booking</h3>
                <div class="offset-md-2 col-lg-8">

                   <div class="row gy-4">

                            <div class="col-md-6">
                            <label for="build">build</label>
                                <select  type="text" name="build" id="build"  class="form-select" placeholder="Your Name" required>
                                <?php
                            //  $id = $_SESSION['id'];
                             $query = mysqli_query($conn, "SELECT * FROM build ") or die("error occurs");
             
                             while ($result = mysqli_fetch_assoc($query)) {
                                echo "<option value='" . $result['Id'] . "'>" . $result['Name'] . "</option>";
                             }
                                     ?>
                                </select>
                            </div>

                            <div class="col-md-6 ">
                            <label for="floor">floor</label>
                            <select  type="text" name="floor" id="floor"  class="form-select" placeholder="" required>
                                
                                </select>
                            </div>

                            <div class="col-md-6">
                            <label for="Drawer">Drawer</label>
                            <select  type="text" name="Drawer" id="Drawer"  class="form-select" placeholder="" required>
                                
                                </select>
                            </div>

                            <div class="col-md-6">
                            <label for="type">Type</label>
                            <select  type="text" name="type" id="type"  class="form-select" placeholder="" required>
                            <option value="semestr">semestr</option>
                            <option value="year">year</option>
                                </select>
                            </div>

                           

                        </div>

                </div>

                <div class="col-md-12 text-center">
                                <button type="submit">Buy 50 SAR</button>
                            </div>
           
            </div>
            </form>
        </div>
    </section>

        </div>
    </div>
    <?php include "include/footer.php"; ?>