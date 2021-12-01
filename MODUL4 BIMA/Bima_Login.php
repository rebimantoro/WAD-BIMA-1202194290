<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Bima_Register</title>
</head>

<body style="background-color:#FDF6E5">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <?php
    session_start();
    require 'Bima_Controller.php';
    if (isset($_POST['login'])) {
        if (isset($_POST['ingat'])) {
            ('ingat', $_POST['ingat'], time() + 3600);
            ('email', $_POST['email'], time() + 3600);
            ('password', $_POST['password'], time() + 3600);
        }
        login($_POST);
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

    <?php if (isset($_SESSION['message'])) : ?>
        <div class='alert alert-warning alert-dismissible fade show fade in' role='alert'>
            <?= $_SESSION['message']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </button>
        </div>

    <?php
        unset($_SESSION['message']);
    endif;
    ?>

    <?php if (isset($_SESSION['registered'])) : ?>
        <div class='alert alert-success alert-dismissible fade show fade in' role='alert'>
            <?= $_SESSION['registered']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </button>
        </div>
    <?php
        unset($_SESSION['registered']);
    endif;
    ?>
    <br><br>

    <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
            <div class="container" style="background-color:white">
                <br>
                <h3 align="center">Login</h3>
                <br>
                <div class="row">
                    <div class="col-1"></div>

                    <div class="col-10">
                        <hr>
                        <form action="" method="post">
                            <?php if (isset($_COOKIE['ingat'])) : ?>
                                <b><label for="email">Email</label></b> <br>
                                <input class="form-control mt-1 mb-2" type="email" name="email" id="email" value="<?= $_COOKIE['email'] ?>" required>
                                <b><label for="password">Kata Sandi</label></b> <br>
                                <input class="form-control mt-1 mb-2" type="password" name="password" id="password" value="<?= $_COOKIE['password'] ?>" placeholder="Kata Sandi Anda" required>
                                <div class="form-check mt-1 mb-2">
                                    <input class="form-check-input" type="checkbox" name="ingat" value="ingat" id="ingat" checked="checked">
                                    <label class="form-check-label" for="ingat">
                                        Remember Me
                                    </label>
                                <?php else : ?>
                                    <b><label for="email">Email</label></b> <br>
                                    <input class="form-control mt-1 mb-2" type="email" name="email" id="email" placeholder="Masukan Alamat E-Mail" required>
                                    <b><label for="password">Kata Sandi</label></b> <br>
                                    <input class="form-control mt-1 mb-2" type="password" name="password" id="password" placeholder="Kata Sandi Anda" required>
                                    <div class="form-check mt-1 mb-2">
                                        <input class="form-check-input" type="checkbox" name="ingat" value="ingat">
                                        <label class="form-check-label" for="ingat">
                                            Remember Me
                                        </label>
                                    <?php endif; ?>
                                    </div>
                                    <p align="center"><button type="submit" class="btn btn-primary mt-1 mb-2" style="width:150px;padding:1%;" name="login" value="login">Login</button></p>
                                    <p class=" mt-1 mb-2" align="center">Anda belum punya akun? <a href="Bima_Register.php">Register</a> </p>
                                    <br>
                        </form>

                    </div>
                    <div class=" col-1"></div>
                </div>

            </div>
        </div>
        <div class="col-4"></div>
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