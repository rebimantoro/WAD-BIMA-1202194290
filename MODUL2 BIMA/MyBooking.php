    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MyBooking</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>

    <body>
        <?php
        $name = $_POST['Name'];
        $date = $_POST['Date'];
        $start = $_POST['Start'];
        $duration = $_POST['Duration'];
        $type = $_POST['Type'];
        $phone = $_POST['Phone'];
        ?>

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
            <h4 align="center">Thank you <?php echo $name . " " ?> for Reserving</h4>
            <p align="center">Please double check your reservation details</p>
            <table class="table">
                <tr>
                    <td>
                        <b>Booking Number</b>
                    </td>
                    <td>
                        <b>Nama</b>
                    </td>
                    <td>
                        <b>Check-In</b>
                    </td>
                    <td>
                        <b>Check-Out</b>
                    </td>
                    <td>
                        <b>Building Type</b>
                    </td>
                    <td>
                        <b>Phone Number</b>
                    </td>
                    <td>
                        <b>Service</b>
                    </td>
                    <td>
                        <b>Total Price</b>
                    </td>
                </tr>

                <tr class="bg-light">
                    <td>
                        <?php
                        echo rand();
                        ?>
                    </td>
                    <td>
                        <?php echo $name ?> <br>
                    </td>
                    <td>
                        <?php
                        $date = $date . " " . $start;
                        $date = "ini tanggal";
                        echo $date
                        ?>
                    </td>
                    <td>
                        <?php
                        echo date("d-m-Y H:i", strtotime($duration . " " . "hours", strtotime($date))) ?>
                    </td>
                    <td>
                        <?php echo $type ?> <br>
                    </td>
                    <td>
                        <?php echo $phone ?> <br>
                    </td>
                    <td>
                        <ul>
                            <?php


                            ?>

                    </td>
                    <td>
                        <?php
                        $price = 0;
                        if ($type == "Nusantara Hall") {
                            $price = 2000;
                        } else if ($type = "Garuda Hall") {
                            $price = 1000;
                        } else {
                            $price = 500;
                        }

                        $price = $price * $duration;
                        if (isset($_POST['checkbox'])) {
                            foreach ($_POST['checkbox'] as $checkbox) {
                                if ($checkbox == "Catering") {
                                    $price += 700;
                                } else if ($checkbox == "Decoration") {
                                    $price += 450;
                                } else if ($checkbox == "Sound System") {
                                    $price += 250;
                                }
                            }
                        }
                        echo "$" . $price;

                        ?>
                    </td>
                </tr>
            </table>


        </div>

    </body>

    </html>