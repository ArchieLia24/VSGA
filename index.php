<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Baju</title>

    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <img src="images/header.jpg" alt="">
        <h1>Selamat Datang di Toko Busana Terpelajar</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="visimisi.php">Visi dan Misi</a></li>
                <li><a href="input.php">Pemesanan</a></li>
                <li><a href="tampil.php">Daftar Pemesanan</a></li>
                <li><a href="kontak.php">Kontak</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="products">
            <h2>Produk Kami</h2>
            <div class="product-item">
                <img src="images/baju1.jpg" alt="Item 1">
                <h3>Gamis Hitam</h3>
                <p>Rp 150,000</p>
                <a href="orders.php">Pilih</a>
            </div>

            <div class="product-item">
                <img src="images/baju2.jpg" alt="Item 2">
                <h3>Gamis Biru Putih</h3>
                <p>Rp 200,000</p>
                <a href="orders.php">Pilih</a>
            </div>

            <div class="product-item">
                <img src="images/baju3.jpg" alt="Item 3">
                <h3>Gamis Coklat</h3>
                <p>Rp 250,000</p>
                <a href="orders.php">Pilih</a>
            </div>

            <div class="product-item">
                <img src="images/baju4.jpg" alt="Item 4">
                <h3>Gamis Beige</h3>
                <p>Rp 250,000</p>
                <a href="orders.php">Pilih</a>
            </div>

            <div class="product-item">
                <img src="images/celana1.jpg" alt="Item 5">
                <h3>Celana Asoka</h3>
                <p>Rp 150,000</p>
                <a href="orders.php">Pilih</a>
            </div>

            <div class="product-item">
                <img src="images/celana2.jpg" alt="Item 6">
                <h3>Celana Cargo</h3>
                <p>Rp 200,000</p>
                <a href="orders.php">Pilih</a>
            </div>

            <div class="product-item">
                <img src="images/celana3.jpg" alt="Item 7">
                <h3>Celana Kulot</h3>
                <p>Rp 250,000</p>
                <a href="orders.php">Pilih</a>
            </div>

            <div class="product-item">
                <img src="images/celana4.jpg" alt="Item 8">
                <h3>Celana Formal</h3>
                <p>Rp 250,000</p>
                <a href="orders.php">Pilih</a>
            </div>

            <div class="product-item">
                <img src="images/jilbab1.jpg" alt="Item 9">
                <h3>Jilbab Anak</h3>
                <p>Rp 50,000</p>
                <a href="orders.php">Pilih</a>
            </div>

            <div class="product-item">
                <img src="images/jilbab2.jpg" alt="Item 10">
                <h3>Jilbab Dewasa</h3>
                <p>Rp 50,000</p>
                <a href="orders.php">Pilih</a>
            </div>
        </section>

        <section>
            <div class="video">
                <iframe width="100%" height="200" src="https://www.youtube.com/embed/eSDqWgeArf0" title="THRIFTING BAJU BEKAS DI KOREA 🇰🇷 MULAI DARI 10 RIBU RUPIAH 😱 HARGA 1 JUTA JADI CUMA 50 RIBUAN 😭" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                <iframe width="100%" height="200" src="https://www.youtube.com/embed/s_oZfGNTGiw" title="SHOPEE HAUL BAJU KEKINIAN &amp; AESTHETIC 😍 | Mulai dari 10ribu!!😳" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                <iframe width="100%" height="200" src="https://www.youtube.com/embed/LTFVmTqoWiY" title="TOKO BAJU BRANDED SISA EXPORT MURAH | H&amp;M, ZARA LACOSTE OBRAL" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                <iframe width="100%" height="200" src="https://www.youtube.com/embed/GWPyybYHfCI" title="REKOMENDASI SUPPLIER BAJU DAN CELANA JEANS LANGSUNG DARI PABRIKNYA DI JAKARTA. BISA RESI OTOMATIS..!" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Toko Baju. All rights reserved.</p>
    </footer>
</body>

</html>