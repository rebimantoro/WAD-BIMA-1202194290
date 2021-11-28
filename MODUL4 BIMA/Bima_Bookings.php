<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>Bima_Bookings</title>
</head>

<body style="background-color:#FDF6E5">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <?php
    session_start();
    require 'Bima_Controller.php';
    if (!$_SESSION['id']) {
        header('location:Bima_Login.php');
        exit();
    } else {
        $id = $_SESSION['id'];
        $query = "SELECT * FROM users WHERE id = '$id'";
        $select = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($select);
    }
    ?>

    <?php
    if (isset($_POST['logout'])) {
        session_destroy();
        header('location:Bima_Login.php');
    }
    ?>

    <?php
    $id = $_SESSION['id'];
    $query = "SELECT * FROM bookings WHERE user_id = '$id'";
    $select_booking = mysqli_query($conn, $query);
    $batas = mysqli_num_rows($select_booking);
    ?>


    <nav class="navbar navbar-expand-lg navbar-light " style="background-color:<?php
                                                                                if (isset($_COOKIE['warna'])) {
                                                                                    echo $_COOKIE['warna'];
                                                                                } else {
                                                                                    echo "#8AB5F2";
                                                                                }
                                                                                ?>">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarNav" style="justify-content: space-between">
                <a href="Bima_Index.php" class="navbar-brand"><b style="color:#FDF6E5">EAD Travel</b></a>
                <ul class="navbar-nav d-flex flex-row-reverse">
                    <li class="nav-item">
                        <div class="dropdown">
                            <a class="btn btn-secondary dropdown-toggle" style="background-color:<?php
                                                                                                    if (isset($_COOKIE['warna'])) {
                                                                                                        echo $_COOKIE['warna'];
                                                                                                    } else {
                                                                                                        echo "#8AB5F2";
                                                                                                    }
                                                                                                    ?>;border:0;color:black;color:#FDF6E5;" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                <b style="color:#FDF6E5"><?= $row['nama']; ?></b>
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="Bima_Profile.php">Edit Profile</a></li>
                                <li>
                                    <form action="" method="post"> <button class="btn btn-primary ms-2" type="submit" name="logout" value="logout" style="width: 100px;">
                                            Logout
                                        </button> </form>
                                </li>

                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="Bima_Bookings.php" class="nav-link active" href="#"><i class="material-icons" style="color:#FDF6E5">shopping_cart</i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <?php
    if (isset($_POST['hapus'])) {
        $hapus = $_POST['hapus'];
        $delete_query = "DELETE FROM bookings WHERE id= '$hapus'";
        $delete = mysqli_query($conn, $delete_query);
        echo "<div class='alert alert-success alert-dismissible fade show fade in' role='alert'>";
        echo 'Hapus Booking Berhasil';
        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
        echo '</button>';
        echo '</div>';
    } ?>
    <br><br>

    <div class="container " style="background-color:white">
        <table class="table table-striped">

            <tr>
                <th>No</th>
                <th>Nama Tempat</th>
                <th>Lokasi</th>
                <th>Tanggal</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
            <?php
            if ($batas == 0) :
            ?>
                <tr>
                    <td colspan="6">
                        <p align="center">Tidak Ada Data</p>
                    </td>
                </tr>
            <?php else : ?>
                <?php
                $i = 1;
                $harga = 0;
                while ($row_booking = mysqli_fetch_assoc($select_booking)) : ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $row_booking['nama_tempat'] ?></td>
                        <td><?= $row_booking['lokasi'] ?></td>
                        <td><?= $row_booking['tanggal'] ?></td>
                        <td>Rp.<?= $row_booking['harga'] ?></td>
                        <td>
                            <form action="" method="post"><button type="submit" name="hapus" value="<?= $row_booking['id'] ?>" class="btn btn-danger">Hapus</button></form>
                        </td>
                        <?php
                        $i = $i + 1;
                        $harga = $harga + $row_booking['harga']; ?>
                    </tr>
                <?php endwhile ?>
                <tr>
                    <td><b>Total</b></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Rp.<?= $harga ?></td>
                    <td></td>
                </tr>
            <?php endif ?>
        </table>
    </div>


    <footer style="background-color:<?php
                                    if (isset($_COOKIE['warna'])) {
                                        echo $_COOKIE['warna'];
                                    } else {
                                        echo "#8AB5F2";
                                    }
                                    ?>;position:absolute; bottom:0;width:100%;">
        <p class="p-2 mt-2" align="center"><a data-bs-toggle="modal" data-bs-target="#exampleModal"> <b style="color:#FDF6E5">&copy; Copyright Muhammad Rizal Bimantoro_1202194290</b></a></p>
    </footer>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Created By</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table>
                        <tr>
                            <td>
                                <p class="me-5">Nama</p>
                            </td>
                            <td>
                                <p>:</p>
                            </td>
                            <td>
                                <p>Muhammad Rizal Bimantoro</p>
                            </td>
                        </tr>
                        <tr>
                        <tr>
                            <td>
                                <p class="me-5">NIM</p>
                            </td>
                            <td>
                                <p>:</p>
                            </td>
                            <td>
                                <p>1202194290</p>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>