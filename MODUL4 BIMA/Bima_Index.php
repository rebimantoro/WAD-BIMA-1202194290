    <!doctype html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <title>Bima_Index</title>
    </head>

    <body style="background-color:#FDF6E5">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <?php
        session_start();
        require 'Bima_Controller.php';
        ?>

        <?php if () : ?>
            <nav class="navbar navbar-expand-lg navbar-light " style="background-color:<?php
                                                                                        if (isset($_COOKIE['warna'])) {
                                                                                            echo $_COOKIE['warna'];
                                                                                        } else {
                                                                                            echo "#8AB5F2";
                                                                                        }
                                                                                        ?>">">
                <div class="container">
                    <div class="collapse navbar-collapse" id="navbarNav" style="justify-content: space-between">
                        <a href="Bima_Index.php" class="navbar-brand"><b style="color:#FDF6E5">EAD Travel</b></a>
                        <ul class="navbar-nav d-flex flex-row-reverse">
                            <li class="nav-item">
                                <a href="Bima_Register.php">
                                    <button class="btn btn-secondary ms-2" type="submit" name="logout" value="logout" style="width: 100px;">
                                        Register
                                    </button>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="Bima_Login.php">
                                    <button class="btn btn-primary ms-2" type="submit" name="logout" value="logout" style="width: 100px;">
                                        Login
                                    </button>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <br><br>
            <div class="container" style="background-color:#96C5A5">
                <br><br>
                <h1 align="center">EAD Travel</h1>
                <br><br>
            </div>
            <br>


            <div class="container" style="background-color:white">
                <div class="row">
                    <div class="col-4">
                        <div class="card" style="width: 26rem;">
                            <img src="asset/raja-ampat.jpg" class="card-img-top" alt="asset/raja-ampat.jpeg">
                            <div class="card-body">
                                <h5 class="card-title">Raja Ampat</h5>
                                <p class="card-text">Kepulauan Raja Ampat adalah kepulauan Indonesia di ujung barat laut Semenanjung Kepala Burung di Papua Barat. Terdiri dari ratusan pulau yang tertutup hutan, Raja Ampat dikenal dengan pantai dan terumbu karangnya yang kaya dengan kehidupan laut. Lukisan batu dan gua kuno berada di Pulau Misool, sedangkan cendrawasih merah hidup di Pulau Waigeo.</p>
                                <hr>
                                <b>
                                    <p>Rp.7.000.000</p>
                                </b>
                                <a href="Bima_Login.php">
                                    <button type="button" class="btn btn-primary">
                                        Pesan Tiket
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card" style="width: 26rem;">
                            <img src="asset/gunung-bromo.jpg" class="card-img-top" alt="asset/raja-ampat.jpeg">
                            <div class="card-body">
                                <h5 class="card-title">Gunung Bromo, Malang</h5>
                                <p class="card-text">Gunung Bromo adalah gunung berapi somma aktif dan bagian dari pegunungan Tengger, di Jawa Timur, Indonesia. Pada 2.329 meter itu bukan puncak tertinggi dari massif, tetapi yang paling terkenal. Kawasan tersebut merupakan salah satu destinasi wisata di Jawa Timur yang paling banyak dikunjungi, dan gunung berapi ini termasuk dalam Taman Nasional Bromo Tengger Semeru.</p>
                                <hr>
                                <b>
                                    <p>Rp.2.000.000</p>
                                </b>
                                <a href="Bima_Login.php">
                                    <button type="button" class="btn btn-primary">
                                        Pesan Tiket
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class=" col-4">
                        <div class="card" style="width: 26rem;">
                            <img src="asset/tanah-lot.jpg" class="card-img-top" alt="asset/raja-ampat.jpeg">
                            <div class="card-body">
                                <h5 class="card-title">Tanah Lot, Bali</h5>
                                <p class="card-text">Tanah Lot salah satu pura penting bagi umat Hindu Bali dan lokasi pura terletak di atas batu besar yang berada di lepas pantai. Pura Tanah Lot merupakan ikon pariwisata pulau Bali. Selain itu salah satu obyek wisata terkenal di pulau Bali yang wajib di kunjungi. Karena saking terkenalnya tempat wisata di Bali ini, maka hampir setiap hari, objek wisata ini selalu ramai dengan kunjungan wisatawan.</p>
                                <hr>
                                <b>
                                    <p>Rp.5.000.000</p>
                                </b>
                                <a href="Bima_Login.php">
                                    <button type="button" class="btn btn-primary">
                                        Pesan Tiket
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php else : ?>
            <?php
            $id = $_SESSION['id'];
            $query = "SELECT * FROM users WHERE id = '$id'";
            $select = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($select); ?>
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
            if (isset($_POST['tambah'])) {
                $user_id = $_SESSION['id'];
                $nama_tempat = $_POST['tambah'];
                $lokasi = $_POST['lokasi'];
                $harga = $_POST['harga'];
                $tanggal = $_POST['tanggal'];
                $query = "INSERT INTO bookings (user_id,nama_tempat,lokasi,harga,tanggal) VALUES('$user_id','$nama_tempat','$lokasi','$harga','$tanggal')";
                $insert = mysqli_query($conn, $query);
                echo "<div class='alert alert-success alert-dismissible fade show fade in' role='alert'>";
                echo 'Booking Berhasil';
                echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                echo '</button>';
                echo '</div>';
            }

            ?>
            <?php
            if (isset($_POST['logout'])) {
                session_destroy();
                header('location:Bima_Login.php');
            }
            ?>
            <?php if (isset($_SESSION['message'])) : ?>
                <div class='alert alert-success alert-dismissible fade show fade in' role='alert'>
                    <?= $_SESSION['message']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </button>
                </div>
            <?php
                unset($_SESSION['message']);
            endif;
            ?>
            <br><br>
            <div class="container" style="background-color:#96C5A5">
                <br><br>
                <h1 align="center">EAD Travel</h1>
                <br><br>
            </div>
            <br>


            <div class="container" style="background-color:white">
                <div class="row">
                    <div class="col-4">
                        <div class="card" style="width: 26rem;">
                            <img src="asset/raja-ampat.jpg" class="card-img-top" alt="asset/raja-ampat.jpeg">
                            <div class="card-body">
                                <h5 class="card-title">Raja Ampat</h5>
                                <p class="card-text">Kepulauan Raja Ampat adalah kepulauan Indonesia di ujung barat laut Semenanjung Kepala Burung di Papua Barat. Terdiri dari ratusan pulau yang tertutup hutan, Raja Ampat dikenal dengan pantai dan terumbu karangnya yang kaya dengan kehidupan laut. Lukisan batu dan gua kuno berada di Pulau Misool, sedangkan cendrawasih merah hidup di Pulau Waigeo.</p>
                                <hr>
                                <b>
                                    <p>Rp.7.000.000</p>
                                </b>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#raja-ampat" style="width:380px">
                                    Pesan Tiket
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card" style="width: 26rem;">
                            <img src="asset/gunung-bromo.jpg" class="card-img-top" alt="asset/raja-ampat.jpeg">
                            <div class="card-body">
                                <h5 class="card-title">Gunung Bromo, Malang</h5>
                                <p class="card-text">Gunung Bromo adalah gunung berapi somma aktif dan bagian dari pegunungan Tengger, di Jawa Timur, Indonesia. Pada 2.329 meter itu bukan puncak tertinggi dari massif, tetapi yang paling terkenal. Kawasan tersebut merupakan salah satu destinasi wisata di Jawa Timur yang paling banyak dikunjungi, dan gunung berapi ini termasuk dalam Taman Nasional Bromo Tengger Semeru.</p>
                                <hr>
                                <b>
                                    <p>Rp.2.000.000</p>
                                </b>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bromo" style="width:380px">
                                    Pesan Tiket
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class=" col-4">
                        <div class="card" style="width: 26rem;">
                            <img src="asset/tanah-lot.jpg" class="card-img-top" alt="asset/raja-ampat.jpeg">
                            <div class="card-body">
                                <h5 class="card-title">Tanah Lot, Bali</h5>
                                <p class="card-text">Tanah Lot salah satu pura penting bagi umat Hindu Bali dan lokasi pura terletak di atas batu besar yang berada di lepas pantai. Pura Tanah Lot merupakan ikon pariwisata pulau Bali. Selain itu salah satu obyek wisata terkenal di pulau Bali yang wajib di kunjungi. Karena saking terkenalnya tempat wisata di Bali ini, maka hampir setiap hari, objek wisata ini selalu ramai dengan kunjungan wisatawan.</p>
                                <hr>
                                <b>
                                    <p>Rp.5.000.000</p>
                                </b>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tanah-lot" style="width:380px">
                                    Pesan Tiket
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        endif;
        ?>







        <!-- Modal untuk Raja Ampat-->
        <div class="modal fade" id="raja-ampat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tanggal Perjalanan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="post">
                        <div class="modal-body">
                            <b><label for="tanggal">Tanggal</label></b> <br>
                            <input class="form-control mt-1 mb-2" type="date" name="tanggal" id="tanggal" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="hidden" name="lokasi" value="Papua Barat">
                            <input type="hidden" name="harga" value="7000000">
                            <button type="submit" class="btn btn-primary" name="tambah" value="Raja Ampat">Tambahkan</button>
                        </div>
                    </form>


                </div>
            </div>
        </div>

        <!-- Modal untuk Gunung Bromo-->
        <div class="modal fade" id="bromo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tanggal Perjalanan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="post">
                        <div class="modal-body">
                            <b><label for="tanggal">Tanggal</label></b> <br>
                            <input class="form-control mt-1 mb-2" type="date" name="tanggal" id="tanggal" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="hidden" name="lokasi" value="Malang">
                            <input type="hidden" name="harga" value="2000000">
                            <button type="submit" class="btn btn-primary" name="tambah" value="Gunung Bromo">Tambahkan</button>
                        </div>
                    </form>


                </div>
            </div>
        </div>

        <!-- Modal untuk tanah lot-->
        <div class="modal fade" id="tanah-lot" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tanggal Perjalanan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="post">
                        <div class="modal-body">
                            <b><label for="tanggal">Tanggal</label></b> <br>
                            <input class="form-control mt-1 mb-2" type="date" name="tanggal" id="tanggal" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="hidden" name="lokasi" value="Bali">
                            <input type="hidden" name="harga" value="5000000">
                            <button type="submit" class="btn btn-primary" name="tambah" value="Tanah Lot">Tambahkan</button>
                        </div>
                    </form>


                </div>
            </div>
        </div>

        <br><br>
        <footer style="background-color:<?php
                                        if (isset($_COOKIE['warna'])) {
                                            echo $_COOKIE['warna'];
                                        } else {
                                            echo "#8AB5F2";
                                        }
                                        ?>;">
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