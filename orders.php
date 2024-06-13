<?php
session_start();
include('config.php');

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

// Ambil ID pengguna dari parameter URL
if(isset($_GET['user'])) {
    $username = $_GET['user'];
    $stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($user_id);
    $stmt->fetch();
    $stmt->close();
} else {
    // Tindakan yang akan diambil jika tidak ada parameter URL
    // Misalnya, mungkin kembali ke halaman sebelumnya atau menampilkan pesan kesalahan.
}

// Ambil pesanan dari database
$orders = [];
$stmt = $conn->prepare("SELECT p.name, p.price, o.quantity, o.order_date FROM orders o JOIN products p ON o.product_id = p.id WHERE o.user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $orders[] = $row;
    }
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Saya - Toko Baju</title>

    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <h1>Pesanan Saya</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="visimisi.php">Visi dan Misi</a></li>
                <li><a href="orders.php">Pemesanan</a></li>
                <li><a href="tampil.php">Daftar Pemesanan</a></li>
                <li><a href="kontak.php">Kontak</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="orders">
            <h2>Daftar Pesanan</h2>
            <?php if (count($orders) > 0): ?>
                <table>
                    <thead>
                        <tr>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Tanggal Pesan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orders as $order): ?>
                            <tr>
                                <td><?php echo $order['name']; ?></td>
                                <td>Rp <?php echo number_format($order['price'], 0, ',', '.'); ?></td>
                                <td><?php echo $order['quantity']; ?></td>
                                <td><?php echo $order['order_date']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>Anda belum memiliki pesanan.</p>
            <?php endif; ?>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Toko Baju. All rights reserved.</p>
    </footer>
</body>

</html>
