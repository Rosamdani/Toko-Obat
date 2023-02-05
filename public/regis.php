<?php
include 'koneksi.php';
session_start();
if (isset($_POST['submit-regis'])) {
    $ada = false;
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $repass = $_POST['re-pass'];



    $query1 = mysqli_query($con, "SELECT * FROM user WHERE username = '$username'");

    if ($query1->num_rows > 0) {
        echo "Username sudah ada, silahkan Login";
    } else {
        if ($pass == $repass) {
            $pass = md5($pass);
            $query2 = mysqli_query($con, "INSERT INTO user (`nama`, `alamat`, `email`, `username`, `password`) VALUES ('$nama','$alamat','$email','$username','$pass')");
            if ($query2) {
                $query1 = mysqli_query($con, "SELECT * FROM user WHERE email = '$email' AND `password` = '$pass'");

                if ($query1->num_rows > 0) {
                    $data = mysqli_fetch_array($query1);
                    $_SESSION['id_user'] = $data['id_user'];
                    $_SESSION['user'] = $data['username'];
                    header("Location:index.php");
                }
            } else {
                echo "Gagal menambahkan";
            }
        } else {
            echo $pass;
            echo "<br>";
            echo $repass;
            echo "Password tidak sama!";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/tailwindStyle.css">
    <script src="https://kit.fontawesome.com/18d10060f1.js" crossorigin="anonymous"></script>
    <title>Regis</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,600;0,700;0,800;1,400&display=swap');

        * {
            font-family: Poppins;
        }

        .hero::before {
            content: '';
            position: absolute;
            bottom: -10px;
            background-color: transparent;
            right: 50px;
            background-image: url("assets/images/hero.png");
            width: 350px;
            height: 350px;
            z-index: 0;
            background-size: cover;
        }
    </style>
</head>

<body class="h-[100vh] bg-sky-400 overflow-hidden">
    <div class="w-full h-[100vh] flex justify-start pl-44 items-center">
        <form method="post" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="nama">
                    Nama
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nama" type="text" placeholder="Nama" name="nama" />
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="alamat">
                    Alamat
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="alamat" type="text" placeholder="Masukkan alamatmu" name="alamat" />
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="text">
                    Email
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" placeholder="Email" name="email" />
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                    Username
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Username" name="username" />
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Password
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="********" name="pass" />
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Ulangi Password
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="********" name="re-pass" />
            </div>
            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="submit-regis">
                    Daftar
                </button>
            </div>
            <div class="flex items-center justify-center mt-3">
                Sudah punya akun?<a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="login.php">
                    &nbsp; Login sekarang
                </a>
            </div>
        </form>
    </div>
</body>

</html>