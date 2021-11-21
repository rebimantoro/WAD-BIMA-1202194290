<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bima_TambahBuku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <?php
    require 'Bima_Control.php';

    if (isset($_POST['upload'])) {
        if ($_POST['upload']) {
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
                    move_uploaded_file($file_tmp, 'file/' . $nama);
                    $query = "INSERT INTO buku_table (judul_buku,penulis_buku,tahun_terbit,deskripsi,gambar,tag,bahasa) VALUES('$judul_buku','$penulis_buku','$tahun_terbit','$deskripsi','$nama','$tag','$bahasa')";
                    $insert = mysqli_query($conn, $query);
                    if ($query) {
                        echo '<script language="javascript">';
                        echo 'alert("Berhasil Upload Buku")';
                        echo '</script>';
                    } else {
                        echo '<script language="javascript">';
                        echo 'alert("Gagal Upload Buku")';
                        echo '</script>';
                    }
                } else {
                    echo '<script language="javascript">';
                    echo 'alert("Ukuran File Terlalu besar")';
                    echo '</script>';
                }
            } else {
                echo '<script language="javascript">';
                echo 'alert("Gambar yang diupload hanya bisa format png atau jpg")';
                echo '</script>';
            }
        }
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
            <h3 align="center">Tambah Data Buku</h3>
        </b>
        <form action="" method="post" enctype="multipart/form-data">
            <b><label for="judul_buku">Judul Buku</label></b> <br>
            <input class="form-control mt-1 mb-2" type="text" name="judul_buku" id="judul_buku" placeholder="Contoh:Pemrograman Web Bersama EAD" required>
            <b><label for="penulis_buku">Penulis</label></b> <br>
            <input class="form-control mt-1 mb-2" type="text" name="penulis_buku" id="penulis_buku" readonly="readonly" value="Bima_1202194290" required>
            <b><label for="tahun_terbit">Tahun Terbit</label></b> <br>
            <input class="form-control mt-1 mb-2" type="number" name="tahun_terbit" id="tahun_terbit">
            <b><label for="deskripsi">Deskripsi</label></b> <br>
            <textarea class=" form-control mt-1 mb-2" name="deskripsi" id="deskripsi" placeholder="Contoh:Buku ini menjelasakan tentang ...." style="height:100px" required></textarea>
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
            <p align="center"><button type="submit" class="btn btn-primary" style="width:800px;padding:1%;" name="upload" value="upload">+TAMBAH</button></p>
            <br>

        </form>

    </div>

    <br>
    <div class="footer mt-2 bg-light">
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