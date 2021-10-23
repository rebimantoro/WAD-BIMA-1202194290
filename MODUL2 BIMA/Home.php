<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
        <h4 align=" center">WELCOME TO ESD VENUE RESERVATION</h4>
        <br>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container d-flex justify-content-center">
                <ul class="navbar-nav">
                    <li class=" nav-item">
                        <a class="nav-link" href="#">Find your best deal for your event,here!</a>
                    </li>
                </ul>
            </div>
        </nav>
        <br>
        <div class="row">
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="img/1.jpg" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Nusantara Hall</h5>
                        <p class="card-text">$2000 / Hour <br> 5000 Capacity </p>
                        <ul class="list-group list-group-flush" style="text-align :center;">
                            <li class="list-group-item text-success">Free Parking</li>
                            <li class="list-group-item text-success">Full AC</li>
                            <li class="list-group-item text-success">Cleaning Service</li>
                            <li class="list-group-item text-success">Covid-19 Health Protocol</li>
                        </ul>
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                        <form action="Booking.php" method="post">
                            <button class="btn btn-primary" name="img" type="submit" value="img/1.jpg">Booking Now</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="img/2.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Garuda Hall</h5>
                        <p class="card-text">$1000 / Hour <br> 2000 Capacity </p>
                        <ul class="list-group list-group-flush" style="text-align :center;">
                            <li class="list-group-item text-success">Free Parking</li>
                            <li class="list-group-item text-success">Full AC</li>
                            <li class="list-group-item text-danger">No Cleaning Service</li>
                            <li class="list-group-item text-success">Covid-19 Health Protocol</li>
                        </ul>
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                        <form action="Booking.php" method="post">
                            <button class="btn btn-primary" name="img" type="submit" value="img/2.jpg">Booking Now</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="img/3.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Gedung Serba Guna</h5>
                        <p class="card-text">$500 / Hour <br> 500 Capacity </p>
                        <ul class="list-group list-group-flush" style="text-align :center;">
                            <li class="list-group-item text-danger">No Free Parking</li>
                            <li class="list-group-item text-danger">No Full AC</li>
                            <li class="list-group-item text-danger">No Cleaning Service</li>
                            <li class="list-group-item text-success">Covid-19 Health Protocol</li>
                        </ul>
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                        <form action="Booking.php" method="post">
                            <button class="btn btn-primary" name="img" type="submit" value="img/3.jpg">Booking Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br><br>

    </div>
    <footer align="center" class="bg-light p-2">
        <p>Bima_1202194290</p>
    </footer>
</body>

</html>