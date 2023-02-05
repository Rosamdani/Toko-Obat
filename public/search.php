<?php
include 'koneksi.php';
session_start();

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

<body>
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
            <div class="flex px-2 py-1 hover:text-white hover:bg-gradient-to-br hover:from-sky-500 hover:to-blue-300 rounded-sm text-slate-400"><a href="apotek.php"><i class="fa-solid fa-shop"></i> &nbsp; Apoteker</a></div>
        </div>
        <div class="account text-slate-500">
            <a href="profile.php" class="px-2 py-1 rounded-sm hover:text-slate-700 font-semibold flex items-center relative profil">
                <?php
                    if (isset($_SESSION['user'])) {
                        ?>
                        <div class="group inline-block relative">
                        <button class="hover:bg-gradient-to-br hover:text-white hover:from-sky-500 hover:to-blue-300 text-gray-700 font-semibold py-1 px-2 rounded inline-flex items-center">
                            <div class="rounded-full w-10 h-10 border mr-2 bg-slate-700"></div><?= $_SESSION['user'] ?>
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>

                        </button>
                    <?php
                    } else {
                    ?>
                        <a href="login.php" class="px-2 py-1 rounded-sm hover:text-white  hover:bg-gradient-to-br hover:from-sky-500 hover:to-blue-300 font-semibold">Login</a>
                    <?php
                    }
                    ?>
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

    <section class="w-full px-32 py-8 bg-slate-100">
        <!-- Konten Produk -->
        <div class="flex container justify-between">
            <?php
            if (isset($_GET['cari_produk'])) {
                $nama = $_GET['cari_produk'];
                $query = mysqli_query($con, "SELECT * FROM produk WHERE nama_produk LIKE '%$nama%'");
                if ($query->num_rows > 0) {
            ?>
                    <div class="container max-h-fit items-center justify-between pl-3 flex">
                        <div class="container grid grid-cols-4 gap-4 max-w-fit overflow-y-scroll overflow-x-hidden scrollbar-thin">
                            <?php


                            while ($row = mysqli_fetch_array($query)) {
                                $path = strval($row['gambar']);
                                $id = strval($row['id_produk']);

                            ?>
                                <a href="detail_produk?id=<?php echo $id ?>" class="h-72 w-64 border rounded-md hover:shadow-md relative bg-white">
                                    <div class="container h-44 border flex justify-center items-center mb-3 overflow-hidden">
                                        <img src="<?php echo $path; ?>" alt="" class="bg-contain">
                                    </div>
                                    <div class="container max-h-fit mx-4 font-semibold text-lg text-slate-700">
                                        <p><?php echo (string)$row['nama_produk']; ?></p>
                                    </div>
                                    <div class="container max-h-fit mx-4 text-slate-400 text-sm mb-3"><?php echo (string)$row['satuan']; ?></div>
                                    <div class="container max-h-fit mx-4 font-semibold text-xl text-slate-600">Rp. <?php echo (string)$row['harga']; ?></div>
                                </a>

                            <?php } ?>
                        </div>
                    </div>
                    <div class="w-56 pl-5 ml-2 border-l-4 border-sky-600 h-96">
                        <h3 class="text-xl font-semibold mb-5">Kategori</h3>
                        <ul>
                            <form action="#">
                                <li class="flex"><input class="checked:bg-sky-500" type="checkbox" name="kategori1" id="" value="Vitamin">&nbsp; Vitamin</li>
                                <li class="flex"><input class="checked:bg-sky-500" type="checkbox" name="kategori1" id="" value="Vitamin">&nbsp; Vitamin</li>
                                <li class="flex"><input class="checked:bg-sky-500" type="checkbox" name="kategori1" id="" value="Vitamin">&nbsp; Vitamin</li>
                                <li class="flex"><input class="checked:bg-sky-500" type="checkbox" name="kategori1" id="" value="Vitamin">&nbsp; Vitamin</li>
                                <li class="flex"><input class="checked:bg-sky-500" type="checkbox" name="kategori1" id="" value="Vitamin">&nbsp; Vitamin</li>
                                <li class="flex"><input class="checked:bg-sky-500" type="checkbox" name="kategori1" id="" value="Vitamin">&nbsp; Vitamin</li>
                            </form>
                        </ul>
                    </div>
                <?php
                } else {

                    emptyProduct();
                ?>


                <?php
                }
            } else if (isset($_GET['id_kategori'])) {
                $id = $_GET['id_kategori'];

                $query = mysqli_query($con, "SELECT * FROM produk WHERE id_kategori = '$id'");
                if ($query->num_rows > 0) {
                ?>

                    <div class="container max-h-fit items-center justify-between pl-3">
                        <?php

                        searchBy($_GET['id_kategori']);

                        ?>
                        <div class="container grid grid-cols-4 gap-4 max-w-fit overflow-y-scroll overflow-x-hidden scrollbar-thin">
                            <?php


                            while ($row = mysqli_fetch_array($query)) {
                                $path = strval($row['gambar']);
                                $id = strval($row['id_produk']);

                            ?>
                                <a href="detail_produk?id=<?php echo $id ?>" class="h-72 w-64 border rounded-md hover:shadow-md relative bg-white">
                                    <div class="container h-44 border flex justify-center items-center mb-3 overflow-hidden">
                                        <img src="<?php echo $path; ?>" alt="" class="bg-contain">
                                    </div>
                                    <div class="container max-h-fit mx-4 font-semibold text-lg text-slate-700">
                                        <p><?php echo (string)$row['nama_produk']; ?></p>
                                    </div>
                                    <div class="container max-h-fit mx-4 text-slate-400 text-sm mb-3"><?php echo (string)$row['satuan']; ?></div>
                                    <div class="container max-h-fit mx-4 font-semibold text-xl text-slate-600">Rp. <?php echo (string)$row['harga']; ?></div>
                                </a>

                            <?php } ?>
                        </div>
                    </div>

            <?php
                } else {
                    emptyProduct();
                }
            }

            ?>
        </div>
    </section>


    <section class="footer bg-slate-50 border-sky-600 border-t-4 h-96 text-slate-600">
        <div class="container w-[90%] h-[90%] flex mx-auto items-start pt-20 justify-around">
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

function emptyProduct()
{
?>
    <div class="w-full h-[60vh] flex flex-col justify-center items-center text-slate-400">
        <img src="assets/images/box.png" alt="" class="w-52 h-52 mb-2">
        <h3 class="text-xl font-semibold">Produk yang anda cari tidak ada!</h3>
        <p class="text-sm mt-1">Mohon gunakan kata kunci yang lain</p>
    </div>
<?php
}

function searchBy($id)
{
    include 'koneksi.php';
?>

    <div class="w-[100%] h-24 bg-white flex items-center px-4 mb-4 rounded-md">
        <?php
        $kategorinya = mysqli_query($con, "SELECT nama_kategori as nama_kategori FROM kategori WHERE id_kategori = '$id' LIMIT 1");
        $data = mysqli_fetch_array($kategorinya);
        echo 'Pencarian kategori :  <span class=" font-bold">  ' . $data['nama_kategori'] . '</span>';
        ?>
    </div>

<?php
}
