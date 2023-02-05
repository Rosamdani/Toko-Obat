<?php
include 'koneksi.php';
session_start();


if (!cekUser()) {
    header("Location:login.php");
} else {
    $id = $_SESSION['id_user'];
    $apoteker = cekProfilApotek($id);
    $select = mysqli_query($con, "SELECT * FROM apotek WHERE id_user = '$id'");
    if ($select->num_rows > 0) {
        $data = mysqli_fetch_array($select);
        $nama = $data['nama_apotek'];
        $alamat = $data['alamat'];
        $no_telp = $data['no_telp'];
    }
}


if (isset($_POST['submit-apotek'])) {
    $error = "";
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    $id_user = $_SESSION['id_user'];
    if ($_POST['captcha'] == $_SESSION['captcha_code']) {
        if (!$apoteker) {
            $insert = mysqli_query($con, "INSERT INTO apotek (`id_user`, `nama_apotek`, `alamat`, `no_telp`) VALUE ('$id_user', '$nama', '$alamat', '$no_telp')");
            if (!$insert) {
                echo "Gagal menambahkan";
            }
        } else {
            $update = mysqli_query($con, "UPDATE apotek SET nama = '$nama', alamat = '$alamat', no_telp = '$no_telp' WHERE id_apotek = ");
        }
    }else{
        $error = "*Captcha salah!";
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
    <title>Beranda</title>
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

<body class="bg-gray-200 relative">
    <nav class="h-20 bg-slate-50 border-b-2 flex items-center justify-between px-20">
        <div class="logo w-2 mr-3 font-semibold text-xl text-slate-700"><a href="index.php">Toko<span class="text-sky-500">Obat</span></a></div>
        <div class="search-box w-[40%] -m-10">
            <div class="relative bg-white overflow-hidden rounded-sm h-[35px]">
                <form action="search.php" class="h-full">
                    <input type="text" placeholder="Cari obat..." class="bg-white text-sm rounded border w-[100%] h-full focus:border-slate-400 px-4 pl-8 py-1 focus:outline-none focus:shadow-outline-blue" name="cari_produk">
                    <button type="submit" class="absolute -right-[20px] -top-1 mt-1 mr-4 h-full w-10 bg-slate-400  hover:bg-gradient-to-br hover:from-sky-500 hover:to-blue-300">
                        <i class="fa-solid fa-magnifying-glass text-white"></i>
                    </button>
                </form>
            </div>

        </div>
        <div class="icon w-[250px] flex justify-between">
            <div class="flex px-2 py-1 hover:text-white hover:bg-gradient-to-br hover:from-sky-500 hover:to-blue-300 text-slate-400 rounded-sm"><a href=""><i class="fa-solid fa-cart-shopping"></i></a></div>
            <div class="flex px-2 py-1 hover:text-white hover:bg-gradient-to-br hover:from-sky-500 hover:to-blue-300 text-slate-400 rounded-sm"><a href=""><i class="fa-sharp fa-solid fa-bell"></i></a></div>
            <div class="flex px-2 py-1 hover:text-white hover:bg-gradient-to-br hover:from-sky-500 hover:to-blue-300 text-slate-400 rounded-sm"><a href=""><i class="fa-solid fa-envelope"></i></a></div>
            <div class="h-8 w-[1px] bg-slate-400"></div>
            <div class="flex px-2 py-1 text-white bg-gradient-to-br from-sky-500 to-blue-300 rounded-sm"><a href="apotek.php"><i class="fa-solid fa-shop"></i> &nbsp; Apoteker</a></div>
        </div>
        <div class="account text-slate-500">
            <a href="profile.php" class="px-2 py-1 rounded-sm hover:text-slate-700 font-semibold flex items-center relative profil">
                <div class="group inline-block relative">
                    <button class="hover:bg-gradient-to-br hover:text-white hover:from-sky-500 hover:to-blue-300 text-gray-700 font-semibold py-1 px-2 rounded inline-flex items-center">
                        <div class="rounded-full w-10 h-10 border mr-2 bg-slate-700"></div><?= $_SESSION['user'] ?>
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                        </svg>
                    </button>
                    <ul class="absolute hidden text-gray-700 pt-1 group-hover:block">
                        <li class="">
                            <a class="rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-4 pr-[120px] block whitespace-no-wrap hover:bg-gradient-to-br hover:from-sky-500 hover:to-blue-300 hover:text-white" href="#">Profilku</a>
                        </li>
                        <li class="">
                            <a class="rounded-b bg-gray-200 hover:bg-gray-400 py-2 px-4 pr-[120px] block whitespace-no-wrap hover:bg-gradient-to-br hover:from-sky-500 hover:to-blue-300 hover:text-white" href="logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </a>
        </div>
    </nav>
    <section class="container bg-slate-100 pb-10">
        <div class="container px-20 pt-10 h flex">

            <!-- Kiri -->
            <div class="w-[15%] mr-10">
                <div class="flex w-full justify-between items-end">
                    <div class="foto rounded-full w-24 h-24 border bg-slate-700 flex justify-center items-center"><i class="fa-solid fa-user text-5xl text-white"></i></div>
                    <div class="Ubah Foto">
                        <p class="font-semibold text-lg"><?= $_SESSION['user'] ?></p>
                        <p>Ubah<i class="fa-solid fa-pen-to-square"></i></p>
                    </div>
                </div>
            </div>
            <!-- End Kiri -->
            <!-- Kanan -->
            <div class="w-[70%] bg-white rounded-md shadow-sm px-5 py-3 max-h-fit pb-5 flex flex-col">
                <?php
                if ($apoteker) {

                ?>

                    <div class="w-[100%] flex h-10 border-b-2">
                        <a href="apotek.php" class="px-3 mr-3 bg-sky-500 text-white font-semibold rounded-lg mb-2 py-1 hover:bg-sky-400 border-r-2">EDIT PROFIL</a>
                        <a href="tambah_produk.php" class="px-3 mr-3 bg-sky-500 text-white font-semibold rounded-lg mb-2 py-1 hover:bg-sky-400 border-r-2">TAMBAH PRODUK</a>
                        <a href="daftar_produk.php" class="px-3 mr-3 bg-sky-500 text-white font-semibold rounded-lg mb-2 py-1 hover:bg-sky-400 border-r-2">DAFTAR PRODUK</a>
                    </div>


                <?php
                }

                ?>

                <p class="font-semibold text-lg text-sky-600">Daftarkan Apotekmu</p>
                <p class="text-sky-500">Kelola penjualan apotekmu disini</p>
                <hr class="my-3">
                <div class="w-[100%] mx-5 flex">
                    <div class="w-[50%] mr-5 h-[100%]">
                        <form method="POST">
                            <div class="flex mr-6 mb-10 items-center">
                                <label for="nama" class="flex text-slate-600 justify-end text-sm font-normal mb-2">
                                    Nama
                                </label>
                                <input type="nama" id="nama" name="nama" class="border-2 ml-5 w-full py-2 px-3 text-slate-600 leading-tight rounded-md focus:outline-none focus:shadow-outline-blue-500" placeholder="<?= @$nama ?>" />
                            </div>
                            <div class="flex mr-6 mb-10 items-center">
                                <label for="email" class="flex text-slate-600 justify-end text-sm font-normal mb-2">
                                    Alamat
                                </label>
                                <input type="text" id="email" name="alamat" class="border-2 ml-5 w-full py-2 px-3 text-slate-600 leading-tight rounded-md focus:outline-none focus:shadow-outline-blue-500" placeholder="<?= @$alamat ?>" />
                            </div>
                            <div class="flex mr-6 mb-10 items-center">
                                <label for="email" class="flex text-slate-600 justify-end text-sm font-normal mb-2">
                                    Nomor Telepon
                                </label>
                                <input type="text" id="email" name="no_telp" class="border-2 ml-5 w-full py-2 px-3 text-slate-600 leading-tight rounded-md focus:outline-none focus:shadow-outline-blue-500" placeholder="<?= @$no_telp ?>" />
                            </div>
                            <div class="flex mr-6 items-center">
                                <label for="email" class="text-slate-600 justify-end text-sm font-normal mb-2 ">
                                    <div>
                                        Captcha
                                    </div>
                                    <div>
                                        <img src="captcha.php" alt="">
                                    </div>
                                </label>
                                <input type="text" id="email" value="<?php echo $_SESSION['captcha_code']?>" name="captcha" class="border-2 ml-5 w-full py-2 px-3 text-slate-600 leading-tight rounded-md focus:outline-none focus:shadow-outline-blue-500" placeholder="Masukkan captcha disamping" />
                            </div>
                            <div class="mr-6 mb-2 items-center">
                                <p class="text-red-500"><?=@$error?></p>
                            </div>
                            <div class="mr-6 mb-10 items-center">
                                <button class="px-3 py-1 rounded-md text-white font-semibold bg-sky-500" name="submit-apotek">Simpan</button>
                            </div>

                        </form>
                    </div>
                    <div class="w-[40%] h-[300px]"></div>
                </div>
            </div>
            <!-- End Kanan -->
        </div>

    </section>


    <section class="footer bg-slate-50 border-sky-600 border-t-4 h-96 text-slate-600">
        <div class="container w-[90%] h-[90%] flex mx-auto items-start pt-10 justify-around">
            <div class="w-[280px]">
                <div class="logo w-2 mr-3 font-semibold text-xl text-slate-700 mb-6"><a href="#">Toko<span class="text-sky-500">Obat</span></a></div>
                <p class="mb-3">Jaga kesehatanmu dengan satu kali klik saja</p>
                <p class="text-[12px]">Aplikasi untuk menjaga kesehatan anda dan keluarga tercinta</p>
            </div>
            <div>
                <h3 class="text-xl mb-3 font-bold">Lebih dekat dengan TokoObat</h3>
                <ul>
                    <li><a href="#" class="hover:text-sky-500 ease-in-out duration-300">Tentang Holadoc</a></li>
                    <li><a href="#" class="hover:text-sky-500 ease-in-out duration-300">Hubungi Kami</a></li>
                    <li><a href="#" class="hover:text-sky-500 ease-in-out duration-300">Kebijakan Privasi</a></li>
                    <li><a href="#" class="hover:text-sky-500 ease-in-out duration-300">FAQ</a></li>
                    <li><a href="#" class="hover:text-sky-500 ease-in-out duration-300">Syarat dan Ketentuan</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-xl mb-3 font-bold">Layanan</h3>
                <ul>
                    <li><a href="#" class="hover:text-sky-500 ease-in-out duration-300">Beranda</a></li>
                    <li><a href="#" class="hover:text-sky-500 ease-in-out duration-300">Beli Obat</a></li>
                    <li><a href="#" class="hover:text-sky-500 ease-in-out duration-300">Riwayat</a></li>
                    <li><a href="#" class="hover:text-sky-500 ease-in-out duration-300">Tanya dokter</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-xl mb-3 font-bold">Kolaborasi dengan kami</h3>
                <ul>
                    <li><a href="#" class="hover:text-sky-500 ease-in-out duration-300">Korporasi</a></li>
                    <li><a href="#" class="hover:text-sky-500 ease-in-out duration-300">Tenaga Kesehatan</a></li>
                    <li><a href="#" class="hover:text-sky-500 ease-in-out duration-300">Fasilitas Kesehatan</a></li>
                    <li class="flex flex-col justify-end font-semibold mt-8">Kamu Dokter? <div class="account text-slate-500 mt-1"><a href="#" class="px-2 py-1 rounded-sm text-white  bg-gradient-to-br from-sky-600 to-blue-500 hover:from-sky-800 hover:to-blue-700 font-semibold">Daftar</a></div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="container h-[10%] items-center flex justify-between px-10 bg-sky-300">
            <span>&copy;Rosyamdani, <?= date("Y") ?>. All Right Reserved</span>
            <div class="flex ">
                <p>Follow me : </p>
                <a href="" class="ml-3 hover:text-pink-500"><i class="fa-brands fa-instagram"></i></a>
                <a href="" class="ml-3 hover:text-blue-800"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="" class="ml-3 hover:text-sky-500"><i class="fa-brands fa-twitter"></i></a>
            </div>
        </div>
    </section>

</body>

</html>


<?php


function cekUser()
{
    if (isset($_SESSION['user'])) {
        return true;
    }
    return false;
}

function cekProfilApotek($id)
{
    include "koneksi.php";
    $cekIT = mysqli_query($con, "SELECT * FROM apotek");

    if ($cekIT->num_rows > 0) {
        while ($row = mysqli_fetch_array($cekIT)) {
            if ($row['id_user'] == $id) {
                return true;
            }
        }
    } else {
        return false;
    }
}
