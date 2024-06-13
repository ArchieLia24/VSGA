<?php
session_start();
include('config.php');

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

// Ambil ID pengguna dari sesi
$username = $_SESSION['username'];
$stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->bind_result($user_id);
$stmt->fetch();
$stmt->close();

// Ambil produk dari database
$products = [];
$result = $conn->query("SELECT id, name, price, image FROM products");

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}

// Proses pesanan
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    $stmt = $conn->prepare("INSERT INTO orders (user_id, product_id, quantity) VALUES (?, ?, ?)");
    $stmt->bind_param("iii", $user_id, $product_id, $quantity);

    if ($stmt->execute()) {
        $message = "Pesanan berhasil!";
    } else {
        $message = "Terjadi kesalahan saat memesan: " . $stmt->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk - Toko Baju</title>

    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <h1>Produk Kami</h1>
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

    <!-- Part of products.php -->
    <main>
        <section class="products">
            <h2>Daftar Produk</h2>
            <?php if (isset($message)): ?>
                <p class="message"><?php echo $message; ?></p>
            <?php endif; ?>
            <div class="product-list">
                <?php foreach ($products as $product): ?>
                    <div class="product-item">
                        <img src="images/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
                        <h3><?php echo $product['name']; ?></h3>
                        <p>Rp <?php echo number_format($product['price'], 0, ',', '.'); ?></p>
                        <form method="post" action="">
                            <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                            <div class="form-group">
                                <label for="quantity">Jumlah:</label>
                                <input type="number" id="quantity" name="quantity" min="1" required>
                            </div>
                            <button type="submit">Pesan</button>
                        </form>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Toko Baju. All rights reserved.</p>
    </footer>
</body>

</html>
