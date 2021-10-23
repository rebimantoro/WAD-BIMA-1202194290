<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container d-flex justify-content-center">
            <ul class="navbar-nav">
                <li class=" nav-item">
                    <a class="nav-link" href="Home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Booking.php">Booking</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <br>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container d-flex justify-content-center">
                <ul class="navbar-nav">
                    <li class=" nav-item">
                        <a class="nav-link" href="#">Reserve your venue now!</a>
                    </li>

                </ul>
            </div>
        </nav>

        <div class="row">
            <div class="col">
                <br><br><br><br><br>
                <p align="center" class="mt-5"><img src="<?php
                                                            if (isset($_POST['img'])) {
                                                                $img = $_POST['img'];
                                                                echo $img;
                                                            } else {
                                                                echo "img/1.jpg";
                                                            }
                                                            ?>" width="85%" alt=""></p>
            </div>

            <div class="col mb-3">
                <br>
                <form action="MyBooking.php" method="post">
                    <div class="mb-3">
                        <label for="Nama">Name</label>
                        <input type="text" class="form-control bg-light" id="Name" readonly="readonly" value="Bima_1202194290" name="Name" required>
                    </div>

                    <div class="mb-3">
                        <label for="Date">Date</label>
                        <input type="date" class="form-control" id="Date" name="Date" required>
                    </div>

                    <div class="mb-3">
                        <label for="Start">Start Time</label>
                        <input type="time" class="form-control" id="Start" name="Start" required>
                    </div>

                    <div class="mb-3">
                        <label for="Duration">Duration</label>
                        <input type="number" class="form-control" id="Duration" name="Duration" required>
                    </div>

                    <div class="mb-3">
                        <label for="Type">Building Type</label>
                        <select class="form-control" name="Type" id="Type" required>
                            <option value="<?php
                                            if (isset($_POST['img'])) {
                                                $img = $_POST['img'];
                                                if ($img == "img/1.jpg") {
                                                    echo "Nusantara Hall";
                                                } else if ($img == "img/2.jpg") {
                                                    echo "Garuda Hall";
                                                } else if ($img == "img/3.jpg") {
                                                    echo "Gedung Serba Guna";
                                                }
                                            } else {
                                                echo "";
                                            }
                                            ?>"><?php
                                                if (isset($_POST['img'])) {
                                                    $img = $_POST['img'];
                                                    if ($img == "img/1.jpg") {
                                                        echo "Nusantara Hall";
                                                    } else if ($img == "img/2.jpg") {
                                                        echo "Garuda Hall";
                                                    } else if ($img == "img/3.jpg") {
                                                        echo "Gedung Serba Guna";
                                                    }
                                                } else {
                                                    echo "Chosee...";
                                                }
                                                ?>
                            </option>
                            <option value="Nusantara Hall">Nusantara Hall</option>
                            <option value="Garuda Hall">Garuda Hall</option>
                            <option value="Gedung Serba Guna">Gedung Serba Guna</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="Phone">Phone Number</label>
                        <input type="number" class="form-control" id="Phone" name="Phone" required>
                    </div>

                    <div class="mb-3">
                        <label for="Status">Status</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="checkbox[]" value="Catering" id="Catering">
                            <label class="form-check-label" for="Catering">
                                Catering / $700
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="checkbox[]" value="Decoration" id="Decoration">
                            <label class="form-check-label" for="Decoration">
                                Decoration / $450
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="checkbox[]" value="Sound System" id="Sound">
                            <label class="form-check-label" for="Sound">
                                Sound System / $250
                            </label>
                        </div>
                    </div>

                    <div class="mb-3 d-grid gap-2">
                        <button class="btn btn-primary btn-block" type="submit">Book</button>
                    </div>
                </form>
            </div>

        </div>

    </div>
    <footer align="center" class="bg-light p-2">
        <p>Bima_1202194290</p>
    </footer>
</body>

</html>