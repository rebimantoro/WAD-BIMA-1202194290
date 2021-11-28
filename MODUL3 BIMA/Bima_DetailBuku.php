    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>Bima_DetailBuku</title>
    </head>

    <body>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <!-- Control untuk read -->
        <?php
        require 'Bima_Control.php';
        if (isset($_POST['id_buku'])) {
            $id_buku = $_POST['id_buku'];
            $query = "SELECT * FROM buku_table WHERE id_buku = '$id_buku'";
            $select = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($select);
        } else {
            $id_buku = $_POST['sunting'];
            $query = "SELECT * FROM buku_table WHERE id_buku = '$id_buku'";
            $select = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($select);
        }

        ?>

        <!-- Control untuk update -->
        <?php
        if (isset($_POST['sunting'])) {
            $sunting = $_POST['sunting'];
            $judul_buku = $_POST['judul_buku'];
            $penulis_buku = $_POST['penulis_buku'];
            $tahun_terbit = $_POST['tahun_terbit'];
            $deskripsi = $_POST['deskripsi'];
            $bahasa = $_POST['bahasa'];
            if (isset($_POST['tag'])) {
                $tag = implode(",", $_POST['tag']);
            } else {
                $tag = "NULL";
            }
            $ekstensi_diperbolehkan    = array('png', 'jpg');
            $nama = $_FILES['file']['name'];
            $x = explode('.', $nama);
            $ekstensi = strtolower(end($x));
            $ukuran    = $_FILES['file']['size'];
            $file_tmp = $_FILES['file']['tmp_name'];

            if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
                if ($ukuran < 1044070) {
                    $sunting = $_POST['sunting'];
                    move_uploaded_file($file_tmp, 'file/' . $nama);
                    $update_query = "UPDATE buku_table SET judul_buku='$judul_buku',penulis_buku='$penulis_buku',tahun_terbit='$tahun_terbit',deskripsi='$deskripsi',bahasa='$bahasa',tag='$tag' WHERE id_buku='$sunting'";
                    $update = mysqli_query($conn, $update_query);
                    header('location: Bima_Home.php');
                    if ($update_query) {
                        echo '<script language="javascript">';
                        echo 'alert("Berhasil Upload Buku")';
                        echo '</script>';
                    } else {
                        echo '<script language="javascript">';
                        echo 'alert("Gagal Upload Buku, Coba lagi")';
                        echo '</script>';
                    }
                } else {
                    echo '<script language="javascript">';
                    echo 'alert("Ukuran File Terlalu besar,Ganti file")';
                    echo '</script>';
                }
            } else {
                echo '<script language="javascript">';
                echo 'alert("Gambar yang diupload hanya bisa format png atau jpg, Ganti file")';
                echo '</script>';
            }
        }
        ?>

        <!-- Control untuk delete -->
        <?php
        if (isset($_POST['hapus'])) {
            $hapus = $_POST['hapus'];
            $delete_query = "DELETE FROM buku_table WHERE id_buku = '$hapus'";
            $delete = mysqli_query($delete_query);

            header('location: Bima_Home.php');
        }
        ?>

        <nav class="navbar navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="Bima_Home.php"><img src="logo-ead.png" alt="logo-ead" width="100"></a>
                <form class="d-flex">
                    <a href="Bima_TambahBuku.php"><button type="button" class="btn btn-primary">Tambah Buku</button></a>

                </form>
            </div>
        </nav>

        <div class="container mt-5" style="box-shadow: 0px 0px 5px 5px rgba(0, 0, 0, 0.2);">
            <br>
            <b>
                <h1 align="center">Detail Buku</h1>
            </b>
            <br>
            <p align="center" ">
                <img src=" file/<?= $row['gambar'] ?>" alt="Gambar 1" style="box-shadow: 0px 0px 5px 5px rgba(0, 0, 0, 0.2);" ;>
            </p>
            <br>
            <div class="row">
                <div class="col-1"></div>
                <div class="col-10">
                    <hr style="border : 2px solid blue">
                    <b>
                        <p class="mb-2 mt-2">Judul</p>
                    </b>
                    <p class="mb-2 mt-2"><?= $row['judul_buku'] ?></p>
                    <b>
                        <p class="mb-2 mt-2">Penulis</p>
                    </b>
                    <p class="mb-2 mt-2"><?= $row['penulis_buku'] ?></p>
                    <b>
                        <p class="mb-2 mt-2">Tahun Terbit</p>
                    </b>
                    <p class="mb-2 mt-2"><?= $row['tahun_terbit'] ?></p>
                    <b>
                        <p class="mb-2 mt-2">Deskripsi</p>
                    </b>
                    <p class="mb-2 mt-2"><?= $row['deskripsi'] ?></p>
                    <b>
                        <p class="mb-2 mt-2">Bahasa</p>
                    </b>
                    <p class="mb-2 mt-2"><?= $row['bahasa'] ?></p>
                    <b>
                        <p class="mb-2 mt-2">Tag</p>
                    </b>
                    <p class="mb-2 mt-2"><?= $row['tag'] ?></p>
                    <br>
                    <div class="row">
                        <div class="col">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#sunting" style="width:500px">
                                Sunting
                            </button>
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus" style="width:500px">
                                Hapus
                            </button>
                        </div>
                    </div>
                    <br><br>
                </div>
                <div class="col-1"></div>
            </div>

<<<<<<< HEAD
        <div class="modal fade bd-example-modal-lg" id="sunting" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Sunting</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <b><label for="judul_buku">Judul Buku</label></b> <br>
                            <input class="form-control mt-1 mb-2" type="text" name="judul_buku" id="judul_buku" placeholder="<?= $row['judul_buku'] ?>" value="<?= $row['judul_buku'] ?>" required>
                            <b><label for="penulis_buku">Penulis</label></b> <br>
                            <input class="form-control mt-1 mb-2" type="text" name="penulis_buku" id="penulis_buku" readonly="readonly" value="Bima_1202194290" required>
                            <b><label for="tahun_terbit">Tahun Terbit</label></b> <br>
                            <input class="form-control mt-1 mb-2" type="number" name="tahun_terbit" id="tahun_terbit" placeholder="<?= $row['tahun_terbit'] ?>" value="<?= $row['tahun_terbit'] ?>">
                            <b><label for="deskripsi">Deskripsi</label></b> <br>
                            <textarea class=" form-control mt-1 mb-2" name="deskripsi" id="deskripsi" placeholder="<?= $row['deskripsi'] ?>" value="<?= $row['deskripsi'] ?>" style="height:100px" required></textarea>
                            <b><label for="bahasa">Bahasa</label></b> &nbsp;
                            <?php
                            if ($row['bahasa'] == "Indonesia") {
                                echo '<div class="form-check form-check-inline">';
                                echo '<input class="form-check-input" type="radio" name="bahasa" id="Indonesia;" value="Indonesia" required checked="checked">';
                                echo '<label class="form-check-label" for="Indonesia">Indonesia</label>';
                                echo '<div class="form-check form-check-inline"> ';
                                echo '<input class="form-check-input" type="radio" name="bahasa" id="Lainya" value="Lainya" required>';
                                echo '<label class="form-check-label" for="Lainya">Lainya</label>';
                                echo '</div> <br>';
                                echo '</div> <br>';
                            } else {
                                echo '<div class="form-check form-check-inline">';
                                echo '<input class="form-check-input" type="radio" name="bahasa" id="Indonesia;" value="Indonesia" required >';
                                echo '<label class="form-check-label" for="Indonesia">Indonesia</label>';
                                echo '<div class="form-check form-check-inline">';
                                echo '<input class="form-check-input" type="radio" name="bahasa" id="Lainya" value="Lainya" checked="checked" required>';
                                echo '<label class="form-check-label" for="Lainya">Lainya</label>';
                                echo '</div> <br>';
                                echo '</div> <br>';
                            }
                            ?>
                            <b><label for="tag" class="mt-2">Tag</label></b> &nbsp;
                            <?php
                            $array1 = explode(",", $row['tag']);
                            $array2 = array("Pemrograman", "Website", "Java", "OOP", "MVC", "Kalkulus", "Lainya");
                            $number = 0;
                            echo '<br>';
                            $sama = 1;
                            foreach ($array2 as $key) {
                                foreach ($array1 as $cek) {
                                    if ($key == $cek) {
                                        $sama = 1;
                                        echo '<div class="form-check form-check-inline ">';
                                        echo '<input class="form-check-input" type="checkbox" name="tag[]" id="' . $key . '" value="' . $key . '" checked="checked" />';
                                        echo '<label class="form-check-label" for="' . $key . '">' . $key . '</label>';
                                        echo '</div>';
                                        break;
                                    } else {
                                        $sama = 0;
                                    }
                                }
                                if ($sama == 1) {
                                    continue;
                                }
                                echo '<div class="form-check form-check-inline ">';
                                echo '<input class="form-check-input" type="checkbox" name="tag[]" id="' . $key . '" value="' . $key . '">';
                                echo '<label class="form-check-label" for="' . $key . '">' . $key . '</label>';
                                echo '</div>';
                            }
                            ?>
                            <br>
                            <b><label for="gambar" class="mt-2">Gambar</label></b> <br>
                            <div class="mb-3 mt-2">
                                <input class="form-control" type="file" name="file" id="gambar" required>
                            </div>
                            <br>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="submit" name="sunting" value="<?= $row['id_buku'] ?>" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
=======
            <div class="modal fade bd-example-modal-lg" id="sunting" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content ">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Sunting</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <b><label for="judul_buku">Judul Buku</label></b> <br>
                                <input class="form-control mt-1 mb-2" type="text" name="judul_buku" id="judul_buku" placeholder="<?= $row['judul_buku'] ?>" value="<?= $row['judul_buku'] ?>" required>
                                <b><label for="penulis_buku">Penulis</label></b> <br>
                                <input class="form-control mt-1 mb-2" type="text" name="penulis_buku" id="penulis_buku" readonly="readonly" value="Bima_1202194290" required>
                                <b><label for="tahun_terbit">Tahun Terbit</label></b> <br>
                                <input class="form-control mt-1 mb-2" type="number" name="tahun_terbit" id="tahun_terbit" placeholder="<?= $row['tahun_terbit'] ?>" value="<?= $row['tahun_terbit'] ?>">
                                <b><label for="deskripsi">Deskripsi</label></b> <br>
                                <textarea class=" form-control mt-1 mb-2" name="deskripsi" id="deskripsi" placeholder="<?= $row['deskripsi'] ?>" value="<?= $row['deskripsi'] ?>" style="height:100px" required></textarea>
                                <b><label for="bahasa">Bahasa</label></b> &nbsp;
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="bahasa" id="Indonesia" value="Indonesia" required>
                                    <label class="form-check-label" for="Indonesia">Indonesia</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="bahasa" id="Lainya" value="Lainya" required>
                                    <label class="form-check-label" for="Lainya">Lainya</label>
                                </div> <br>
                                <b><label for="tag" class="mt-2">Tag</label></b> &nbsp;
                                <div class="form-check form-check-inline ">
                                    <input class="form-check-input" type="checkbox" name="tag[]" id="Pemrograman" value="Pemrograman">
                                    <label class="form-check-label" for="Pemrograman">Pemrograman</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="tag[]" id="Website" value="Website">
                                    <label class="form-check-label" for="Website">Website</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="tag[]" id="Java" value="Java">
                                    <label class="form-check-label" for="Java">Java</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="tag[]" id="OOP" value="OOP">
                                    <label class="form-check-label" for="OOP">OOP</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="tag[]" id="MVC" value="MVC">
                                    <label class="form-check-label" for="MVC">MVC</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="tag[]" id="Kalkulus" value="Kalkulus">
                                    <label class="form-check-label" for="Kalkulus">Kalkulus</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="tag[]" id="Lainya" value="Lainya">
                                    <label class="form-check-label" for="Lainya">Lainya</label>
                                </div>
                                <br>
                                <b><label for="gambar" class="mt-2">Gambar</label></b> <br>
                                <div class="mb-3 mt-2">
                                    <input class="form-control" type="file" name="file" id="gambar" required>
                                </div>
                                <br>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    <button type="submit" name="sunting" value="<?= $row['id_buku'] ?>" class="btn btn-primary">Simpan Perubahan</button>
                                </div>
                            </form>
                        </div>
>>>>>>> b41c044cccf299308e901c37e937b9dd7c6b9ecc

                    </div>
                </div>
            </div>

            <div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Anda yakin menghapus Buku?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                            <form action="" method="post">
                                <button type="submit" name="hapus" value="<?= $row['id_buku'] ?>" class="btn btn-danger">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <div class=" footer mt-5 bg-light">
            <br><br><br>
            <p align="center"> <img src="logo-ead.png" alt="logo-ead" width="100"></p>
            <b>
                <h3 align="center">Perpustakaan EAD</h3>
            </b>
            <p align="center">&copy; Bima_1202194920</p>
            <br><br><br>
        </div>

    </body>

    </html>