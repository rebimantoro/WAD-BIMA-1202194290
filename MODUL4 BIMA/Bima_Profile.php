<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>Bima_Profile</title>
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
    if (isset($_POST['warna'])) {
        setcookie("warna", $_POST['warna'], time() + 3600);
    }
    ?>

    <?php
    $id = $_SESSION['id'];
    $query = "SELECT * FROM users WHERE id = '$id'";
    $select = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($select);
    ?>

    <?php
    if (isset($_POST['logout'])) {
        session_destroy();
        header('location:Bima_Login.php');
    }
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
    if (isset($_POST['simpan'])) {
        if ($_POST['konfirmasi'] == $_POST['password']) {
            $id = $_SESSION['id'];
            $nama = $_POST['nama'];
            $no_hp = $_POST['no_hp'];
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $password = password_hash($password, PASSWORD_DEFAULT);
            $update_query = "UPDATE users SET nama='$nama',no_hp='$no_hp',password='$password' WHERE id='$id'";
            $update = mysqli_query($conn, $update_query);
            echo "<div class='alert alert-success alert-dismissible fade show fade in' role='alert'>";
            echo 'Update Profile Berhasil';
            echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
            echo '</button>';
            echo '</div>';
        } else {
            echo "<div class='alert alert-warning alert-dismissible fade show fade in' role='alert'>";
            echo 'Konfirmasi Kata Sandi tidak cocok,coba lagi';
            echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
            echo '</button>';
            echo '</div>';
        }
    }
    ?>

    <br><br>

    <div class="container" style="background-color:white">
        <br>
        <h3 align="center">Profile</h3>
        <br>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10">
                <form action="" method="post">
                    <table>
                        <tr>
                            <td><b><label for="email">Email</label></b></td>
                            <td>
                                <p class="ms-5 mb-3"><?= $row['email']; ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td><b><label for="nama">Nama</label></b></td>
                            <td><input class="form-control ms-5 mb-3" type="text" name="nama" id="nama" placeholder="<?= $row['nama']; ?>" required></td>
                        </tr>
                        <tr>
                            <td><b><label for="no_hp">Nomor Handphone</label></b></td>
                            <td><input class="form-control ms-5 mb-3" type="no_hp" name="no_hp" id="no_hp" placeholder="<?= $row['no_hp']; ?>" required></td>
                        </tr>
                    </table>
                    <hr>
                    <table>
                        <tr>
                            <td><b><label for="password">Kata Sandi</label></b></td>
                            <td><input class="form-control ms-4 mb-3" type="password" name="password" id="password" placeholder="Kata Sandi Anda" required></td>
                        </tr>
                        <tr>
                            <td><b><label for="konfirmasi">Konfirmasi Kata Sandi</label></b></td>
                            <td><input class="form-control ms-4 mb-3" type="password" name="konfirmasi" id="konfirmasi" placeholder="Konfirmasi Kata Sandi Anda" required></td>
                        </tr>
                        <tr>
                            <td><b><label for="navbar">Warna Navbar</label></b></td>
                            <td>
                                <select class="form-select ms-4 mb-3" aria-label="Default select example" name="warna" id="warna">
                                    <option value="#8AB5F2">Default</option>
                                    <option value="black">Hitam</option>
                                    <option value="grey">Abu-Abu</option>
                                </select>
                            </td>
                        </tr>
                    </table>

                    <div class="d-flex justify-content-center mt-2">
                        <p align="center"><button type="submit" class="btn btn-primary m-2" style="width:150px;padding:1%;" name="simpan" value="simpan">Simpan</button></p>
                        <p align="center"><a href="Bima_Index.php"><button type="button" class="btn btn-warning m-2" style="width:150px;padding:1%;" name="cancel" value="cancel">Cancel</button></a></p>
                    </div>

            </div>


            </form>
        </div>
        <div class="col-1"></div>
    </div>

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