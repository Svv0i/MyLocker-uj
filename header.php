<?php
session_start();

include("connection.php");

if (!isset($_SESSION['username'])) {
    header("location:login.php");
}




?>
   <!-- يوزر عمل لوق ان ويبا يحجز  -->
<!DOCTYPE html>
<html lang="en">

<!-- only users have acces   -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="css/style.css">
    <style>
footer{

    position: fixed;
    bottom: 0;
    width:100%;
    height: 120px;
}
.container{
    max-width: 100% !important;
}
.hero-section{

height: 1000px;
}
.form-control{
    border-radius: 0 !important;
    border: 1px solid #dee2e6 !important;
    background: #fff !important;
    height: 40px ;
}
</style>
</head>

<body>

    <!-- navbar section   -->

    <header class="navbar-section" >
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="#" ><img height="60" src="images/111.svg"/> MY LOCKER</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav" >
                    <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="homepage.php">Home</a>
                        </li>
                       
                        <li class="nav-item">
                            <a class="nav-link" href="mybookings.php">My Bookings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="newbook.php">New Booking</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="aboutus.php">about us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">contact</a>
                        </li>
                        <li class="nav-item"> <!-- توديه ع بيج edit.php   -->
                                        <?php 
                                        //  <!-- هتاخد داتا اليوز وتعرضها بالليست   -->

                                        $id = $_SESSION['id'];
                                        $query = mysqli_query($conn, "SELECT * FROM users WHERE id = $id");

                                        while ($result = mysqli_fetch_assoc($query)) {
                                            $res_username = $result['username'];
                                            $res_email = $result['email'];
                                            $res_id = $result['id'];
                                        }


                                        echo "<a class='nav-link' href='edit.php?id=$res_id'>Profile</a>";


                                        ?>

                        </li>
                          
                        <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                      



                    </ul>
                </div>
            </div>
        </nav>
    </header>