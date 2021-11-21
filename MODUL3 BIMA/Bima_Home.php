<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bima_Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <?php
    require 'Bima_Control.php';
    $query = "SELECT * FROM buku_table";
    $select = mysqli_query($conn, $query);
    ?>

    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="Bima_Home.php"><img src="logo-ead.png" alt="logo-ead" width="100"></a>
            <form class="d-flex">
                <a href="Bima_TambahBuku.php"><button type="button" class="btn btn-primary">Tambah Buku</button></a>
            </form>
        </div>
    </nav>

    <div class="container">
        <br><br><br>
        <div class="row">
            <?php
            $loop = 0;
            $batas = mysqli_num_rows($select);
            if ($batas == 0) {
                echo '<h3 align="center" class="mt-5">Belum Ada Buku</h3>';
                echo '<hr style="border : 2px solid blue">';
                echo '<p align="center" class="mt-2">Silahkan Menambahkan Buku</p>';
                echo '<br>';
            } else {
                while ($row = mysqli_fetch_assoc($select)) {
                    echo '<div class="col-4 mb-2">';
                    echo '<div class="card" style="width: 18rem;">';
                    echo '<img src="file/' . $row['gambar'] . '" class="card-img-top" alt="gambar :' . $row['judul_buku'] . '">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $row['judul_buku'] . '</h5>';
                    echo '<p class="card-text">' . $row['deskripsi'] . ' </p>';
                    echo '<form action="Bima_DetailBuku.php" method="post">';
                    echo '<button type="submit" class="btn btn-primary" name="id_buku" value="' . $row['id_buku'] . '" >Tampilkan Lebih Lanjut</button>';
                    echo '</form>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            }
            ?>
        </div>
    </div>

    <div class="footer mt-5 bg-light">
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