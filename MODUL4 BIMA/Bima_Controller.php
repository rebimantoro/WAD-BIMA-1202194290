<?php
$conn = mysqli_connect("localhost", "root", "", "wad_modul4");

if (!$conn) {
    echo "Gagal Konek";
}

#untuk registrasi
function registrasi($request)
{
    global $conn;

    $nama = $request['nama'];
    $email = $request['email'];
    $no_hp = $request['no_hp'];
    $password = mysqli_real_escape_string($conn, $request['password']);
    $konfirmasi = mysqli_real_escape_string($conn, $request['konfirmasi']);

    $emailCek = "SELECT email FROM users WHERE email = '$email'";
    $select = mysqli_query($conn, $emailCek);

    if (!mysqli_fetch_assoc($select)) {
        if ($password == $konfirmasi) {
            $password = password_hash($password, PASSWORD_DEFAULT);

            $query = "INSERT INTO users (nama,email,password,no_hp) VALUES('$nama','$email','$password','$no_hp')";
            $insert = mysqli_query($conn, $query);

            $_SESSION['registered'] = "Berhasil registrasi,silahkan login";

            header("Location:Bima_Login.php");
            exit();
        }
    }

    $_SESSION['message'] = 'Email anda sudah pernah terdaftar!';

    header("Location:Bima_Register.php");
    exit();
}

function login($request)
{
    global $conn;
    $email = $request['email'];
    $password = $request['password'];
    $emailCek = "SELECT * FROM users WHERE email = '$email'";
    $select = mysqli_query($conn, $emailCek);

    if (mysqli_num_rows($select) == 1) {
        $result = mysqli_fetch_array($select);

        if (password_verify($password, $result['password'])) {
            $_SESSION['id'] = $result['id'];
            $_SESSION['nama'] = $result['nama'];
            $_SESSION['email'] = $result['email'];
            $_SESSION['no_hp'] = $result['no_hp'];

            $_SESSION['message'] = 'Berhasil Login';

            header('Location:Bima_Index.php');
            exit();
        } else {
            $_SESSION['message'] = 'Password salah';
            header('Location:Bima_Login.php');
            exit();
        }
    }

    $_SESSION['message'] = 'Email tidak terdaftar';
    header('Location:Bima_Login.php');
    exit();
}
