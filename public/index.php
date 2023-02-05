<?php
include 'koneksi.php';
session_start();

$id_akun = @$_SESSION['id_user'];

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
                    <ul class="absolute hidden z-10 text-gray-700 pt-1 group-hover:block">
                        <li class="">
                            <a class="rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-4 pr-[120px] block whitespace-no-wrap hover:bg-gradient-to-br hover:from-sky-500 hover:to-blue-300 hover:text-white" href="#">Profilku</a>
                        </li>
                        <li class="">
                            <a class="rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-4 pr-[120px] block whitespace-no-wrap hover:bg-gradient-to-br hover:from-sky-500 hover:to-blue-300 hover:text-white" href="hapus_akun.php?id=$id_akun">Hapus Akun</a>
                        </li>
                        <li class="">
                            <a class="rounded-b bg-gray-200 hover:bg-gray-400 py-2 px-4 pr-[120px] block whitespace-no-wrap hover:bg-gradient-to-br hover:from-sky-500 hover:to-blue-300 hover:text-white" href="logout.php">Logout</a>
                        </li>
                    </ul>
                    </div>
            </a>
        </div>
    </nav>

    <div class="container h-96 flex items-center bg-gradient-to-br from-blue-200 to-sky-400 hero relative overflow-hidden">
        <div class="h-64 min-w-[80%] mx-auto">
            <h1 class="text-3xl font-semibold z-10 text-slate-600 mb-3">Solusi kesehatan terlengkap</h1>
            <p class="max-w-screen-sm z-10">Chat dokter, kunjungi rumah sakit, beli obat, cek lab dan update informasi
                seputar kesehatan, semua bisa di Halodoc!</p>
            <div class="flex mt-8 items-center">
                <a href="#" class="flex flex-col z-10 text-sm items-center justify-center h-32 w-28 mr-3 bg-white shadow-sm rounded-md hover:shadow-xl"><img src="assets/icon/doctor.png" alt="gambar" class="py-2  rounded-full w-[67px] h-[80px] mx-auto">
                    <p class="mx-auto">Tanya Dokter</p>
                </a>
                <a href="#" class="flex flex-col z-10 text-sm items-center justify-center h-32 w-28 mr-3 bg-white shadow-sm rounded-md hover:shadow-xl"><img src="assets/icon/dispensary.png" alt="gambar" class="py-2  rounded-full w-[67px] h-[80px] mx-auto">
                    <p class="mx-auto">Beli Obat</p>
                </a>
                <a href="#" class="flex flex-col z-10 text-sm items-center justify-center h-32 w-28 mr-3 bg-white shadow-sm rounded-md hover:shadow-xl"><img src="assets/icon/drugs.png" title="sick icons" alt="gambar" class="py-2  rounded-full w-[67px] h-[80px] mx-auto">
                    <p class="mx-auto">Info Obat</p>
                </a>
                <a href="#" class="flex flex-col z-10 text-sm items-center justify-center h-32 w-28 mr-3 bg-white shadow-sm rounded-md hover:shadow-xl"><img src="assets/icon/sick.png" alt="gambar" class="py-2  rounded-full w-[67px] h-[80px] mx-auto">
                    <p class="mx-auto">Info Penyakit</p>
                </a>
                <a href="#" class="flex flex-col z-10 text-sm w-72 pl-4 pr-4 py-8 bg-white shadow-sm rounded-md hover:shadow-xl">
                    <div class="flex row">
                        <img src="assets/icon/health-insurance.png" alt="gambar" class="py-2 rounded-full w-[67px] h-[80px]">
                        <div class="container pl-2">
                            <div class="flex justify-between items-start">
                                <h2 class="text-lg font-bold">Asuransi</h2>
                                <div class="icon"><i class="fa-solid fa-arrow-right"></i></div>
                            </div>
                            <p>Gunakan asuransimu untuk holadoc</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <section class="container px-32 pb-5 bg-slate-100 text-slate-600 pt-5">
        <!-- Konten -->

        <div class="container mx-3 pt-6 mb-3">
            <h3 class="text-2xl font-semibold text-slate-600">Penawaran Menarik</h3>
        </div>
        <div class="max-w-fit grid grid-flow-col mx-3">
            <a href="#" class="rounded-full px-8 py-[8px] bg-sky-600 text-white duration-300 mr-5 border border-sky-600 flex items-center justify-center">Terbaru</a>
            <a href="#" class="rounded-full px-8 py-[8px] hover:bg-sky-600 hover:text-white duration-300 mr-5 border border-sky-600 text-sky-600 flex items-center justify-center">Populer</a>
            <a href="#" class="rounded-full px-8 py-[8px] hover:bg-sky-600 hover:text-white duration-300 mr-5 border border-sky-600 text-sky-600 flex items-center justify-center">Populer</a>
            <a href="#" class="rounded-full px-8 py-[8px] hover:bg-sky-600 hover:text-white duration-300 mr-5 border border-sky-600 text-sky-600 flex items-center justify-center">Populer</a>
            <a href="#" class="rounded-full px-8 py-[8px] hover:bg-sky-600 hover:text-white duration-300 mr-5 border border-sky-600 text-sky-600 flex items-center justify-center">Populer</a>
        </div>

        <!-- Konten Fitur Slide Scroll -->
        <div class="container h-72 overflow-scroll scrollbar-thin grid grid-flow-col my-3 px-3 py-3">
            <div class="w-80 border h-60 shadow-sm rounded-md hover:shadow-lg mr-3 bg-gradient-to-b from-sky-300 to-sky-500"></div>
            <div class="w-80 border h-60 shadow-sm rounded-md hover:shadow-lg mr-3 bg-gradient-to-b from-sky-300 to-sky-500"></div>
            <div class="w-80 border h-60 shadow-sm rounded-md hover:shadow-lg mr-3 bg-gradient-to-b from-sky-300 to-sky-500"></div>
            <div class="w-80 border h-60 shadow-sm rounded-md hover:shadow-lg mr-3 bg-gradient-to-b from-sky-300 to-sky-500"></div>
            <div class="w-80 border h-60 shadow-sm rounded-md hover:shadow-lg mr-3 bg-gradient-to-b from-sky-300 to-sky-500"></div>
            <div class="w-80 border h-60 shadow-sm rounded-md hover:shadow-lg mr-3 bg-gradient-to-b from-sky-300 to-sky-500"></div>
            <div class="w-80 border h-60 shadow-sm rounded-md hover:shadow-lg mr-3 bg-gradient-to-b from-sky-300 to-sky-500"></div>
            <div class="w-80 border h-60 shadow-sm rounded-md hover:shadow-lg mr-3"></div>
            <div class="w-80 border h-60 shadow-sm rounded-md hover:shadow-lg mr-3"></div>
            <div class="w-80 border h-60 shadow-sm rounded-md hover:shadow-lg mr-3"></div>
            <div class="w-80 border h-60 shadow-sm rounded-md hover:shadow-lg mr-3"></div>
            <div class="w-80 border h-60 shadow-sm rounded-md hover:shadow-lg mr-3"></div>
            <div class="w-80 border h-60 shadow-sm rounded-md hover:shadow-lg mr-3"></div>
        </div>


        <div class="container h-52 px-3">
            <h3 class="font-semibold text-2xl">Fitur Menarik</h3>
            <div class="container max-h-fit flex mt-4">
                <a href="#" class="w-28 max-h-fit border mr-3 bg-white rounded-md hover:shadow-lg p-2">
                    <div class="rounded-full w-full h-20 mb-3 overflow-hidden flex justify-center items-center">
                        <img src="assets/icon/cotton-swab.png" alt="" class="w-14 h-14">
                    </div>
                    <div class="max-w-fit mx-auto">
                        Swab Covid-19
                    </div>
                </a>
                <a href="#" class="w-28 max-h-fit border mr-3 bg-white rounded-md hover:shadow-lg p-2">
                    <div class="rounded-full w-full h-20 mb-3 overflow-hidden flex justify-center items-center">
                        <img src="assets/icon/mask.png" alt="" class="w-14 h-14">
                    </div>
                    <div class="max-w-fit mx-auto">
                        Pelayanan kesehatan
                    </div>
                </a>
                <a href="#" class="w-28 max-h-fit border mr-3 bg-white rounded-md hover:shadow-lg p-2">
                    <div class="rounded-full w-full h-20 mb-3 overflow-hidden flex justify-center items-center">
                        <img src="assets/icon/hospital.png" alt="" class="w-14 h-14">
                    </div>
                    <div class="max-w-fit mx-auto">
                        Cari rumah sakit
                    </div>
                </a>
                <a href="#" class="w-28 max-h-fit border mr-3 bg-white rounded-md hover:shadow-lg p-2">
                    <div class="rounded-full w-full h-20 mb-3 overflow-hidden flex justify-center items-center">
                        <img src="assets/icon/vaccine.png" alt="" class="w-14 h-14">
                    </div>
                    <div class="max-w-fit mx-auto">
                        Hasil test covid-19
                    </div>
                </a>

            </div>
        </div>


        <div class="container h-52 px-3 my-5">
            <h3 class="font-semibold text-2xl">Kategori</h3>
            <div class="container max-h-fit flex mt-4">
                <a href="search.php?id_kategori=3" class="w-28 max-h-fit border mr-3 bg-white rounded-md hover:shadow-lg p-2">
                    <div class="rounded-full w-full h-20 mb-3 overflow-hidden flex justify-center items-center">
                        <img src="assets/icon/vitamin.png" alt="" class="w-14 h-14">
                    </div>
                    <div class="max-w-fit mx-auto">
                        Vitamin & Suplemen
                    </div>
                </a>
                <a href="search.php?id_kategori=2" class="w-28 max-h-fit border mr-3 bg-white rounded-md hover:shadow-lg p-2">
                    <div class="rounded-full w-full h-20 mb-3 overflow-hidden flex justify-center items-center">
                        <img src="assets/icon/sneezing.png" alt="" class="w-14 h-14">
                    </div>
                    <div class="max-w-fit mx-auto">
                        Batuk & Flu
                    </div>
                </a>
                <a href="search.php?id_kategori=1" class="w-28 max-h-fit border mr-3 bg-white rounded-md hover:shadow-lg p-2">
                    <div class="rounded-full w-full h-20 mb-3 overflow-hidden flex justify-center items-center">
                        <img src="assets/icon/fever.png" alt="" class="w-14 h-14">
                    </div>
                    <div class="max-w-fit mx-auto">
                        Demam
                    </div>
                </a>
                <a href="#" class="w-28 max-h-fit border mr-3 bg-white rounded-md hover:shadow-lg p-2">
                    <div class="rounded-full w-full h-20 mb-3 overflow-hidden flex justify-center items-center">
                        <img src="assets/icon/respiratory-system.png" alt="" class="w-14 h-14">
                    </div>
                    <div class="max-w-fit mx-auto">
                        Pernapasan
                    </div>
                </a>
                <a href="#" class="w-28 max-h-fit border mr-3 bg-white rounded-md hover:shadow-lg p-2">
                    <div class="rounded-full w-full h-20 mb-3 overflow-hidden flex justify-center items-center">
                        <img src="assets/icon/heart.png" alt="" class="w-14 h-14">
                    </div>
                    <div class="max-w-fit mx-auto">
                        Jantung
                    </div>
                </a>
                <a href="#" class="w-28 max-h-fit border mr-3 bg-white rounded-md hover:shadow-lg p-2">
                    <div class="rounded-full w-full h-20 mb-3 overflow-hidden flex justify-center items-center">
                        <img src="assets/icon/eye-care.png" alt="" class="w-14 h-14">
                    </div>
                    <div class="max-w-fit mx-auto">
                        Mata
                    </div>
                </a>
                <a href="#" class="w-28 max-h-fit border mr-3 bg-white rounded-md hover:shadow-lg p-2">
                    <div class="rounded-full w-full h-20 mb-3 overflow-hidden flex justify-center items-center">
                        <img src="assets/icon/makeup.png" alt="" class="w-14 h-14">
                    </div>
                    <div class="max-w-fit mx-auto">
                        Kecantikan
                    </div>
                </a>
                <a href="#" class="w-28 max-h-fit border mr-3 bg-white rounded-md hover:shadow-lg p-2">
                    <div class="rounded-full w-full h-20 mb-3 overflow-hidden flex justify-center items-center">
                        <img src="assets/icon/coronavirus.png" alt="" class="w-14 h-14">
                    </div>
                    <div class="max-w-fit mx-auto">
                        COVID 19
                    </div>
                </a>
                <a href="#" class="w-28 max-h-fit border mr-3 bg-white rounded-md hover:shadow-lg p-2">
                    <div class="rounded-full w-full h-20 mb-3 overflow-hidden flex justify-center items-center">
                        <img src="assets/icon/skin.png" alt="" class="w-14 h-14">
                    </div>
                    <div class="max-w-fit mx-auto">
                        Kulit
                    </div>
                </a>
            </div>
        </div>
    </section>

    <section class="w-full px-32 py-8 bg-white">
        <!-- Konten Produk -->
        <div class="container max-h-fit items-center justify-center pl-3">
            <div class="container my-3">
                <h3 class="font-semibold text-2xl">Belanja Obat & Vitamin</h3>
            </div>
            <div class="container grid grid-cols-4 gap-3 pt-4 border-sky-600 border-t-4">
                <?php
                $query = mysqli_query($con, "SELECT * FROM produk LIMIT 100");
                if ($query->num_rows > 0) {
                    while ($row = mysqli_fetch_array($query)) {
                        $path = strval($row['gambar']);
                        $id = strval($row['id_produk']);
                ?>
                        <a href="detail_produk?id=<?php echo $id ?>" class="h-72 w-64 border rounded-md hover:shadow-md relative bg-slate-50">
                            <div class="container h-44 border flex justify-center items-center mb-3 overflow-hidden">
                                <img src="<?php echo $path; ?>" alt="" class="bg-contain">
                            </div>
                            <div class="container max-h-fit mx-4 font-semibold text-lg text-slate-700">
                                <p class="text-ellipsis w-full"><?php echo (string)$row['nama_produk']; ?></p>
                            </div>
                            <div class="container max-h-fit mx-4 text-slate-400 text-sm mb-3"><?php echo (string)$row['satuan']; ?></div>
                            <div class="container max-h-fit mx-4 font-semibold text-xl text-slate-600"><?php echo (string)$row['harga']; ?></div>
                        </a>
                <?php
                    }
                }
                ?>
            </div>
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