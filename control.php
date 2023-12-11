<?php include "include/header2.php";?>


    <div class="name">
        <center>Welcome
                        <!-- نجيب اسم اليوزر  -->
            <?php
            // echo $_SESSION['valid'];
            
            echo $_SESSION['username'];

            ?>
            !
        </center>
    </div>

    <!-- hero section  -->

    <section id="home" class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12 text-content">
                    <h1>My locker service you really want</h1>
                    <p class="text-dark">Private space in (university of Jeddah) to store your stuff within easy and simple way to book
                    </p>
                    <button class="btn"><a href="login.html">Book now</a></button>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <img src="images/1101.svg" alt="" class="img-fluid">
                </div>

            </div>
        </div>
    </section>


  
    <!-- footer section  -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12 col-sm-12">
                    <p class="logo"><img height="60" src="images/111.svg"/> MY LOCKER</p>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <ul class="d-flex">
                        <li><a href="#">Home</a></li>
                        <li><a href="#services">services</a></li>
                        <li><a href=#aboutus">about us</a></li>
                        <li><a href="#contact">contact</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-12 col-sm-12">
                    <p>&copy;MY_LOCKERS</p>
                </div>

                <div class="col-lg-1 col-md-12 col-sm-12">
                    <!-- back to top  -->

                    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                            class="bi bi-arrow-up-short"></i></a>
                </div>

            </div>

        </div>

    </footer>

<?php include "include/footer.php";?>