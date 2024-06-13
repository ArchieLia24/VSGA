<link rel="stylesheet" href="css/style.css">
<h2>Tampil Data Order</h2>

    <a href="orders.php"INPUT></a>
    
    <?php
        require_once "koneksi.php";

        $sql = "SELECT * FROM orders";
        $stmt = $config->prepare($sql);
        $stmt->execute();

        // Jadikan dalam variabel array
        $rows = $stmt->fetchAll();
    ?>

    <table>
        <tr>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Tanggal Pesan</th>
        </tr>

        <div class="tampil">

        <?php foreach ($rows as $r) { ?>
            <tr>
                <td><?php echo $order['name']; ?></td>
                <td>Rp <?php echo number_format($order['price'], 0, ',', '.'); ?></td>
                <td><?php echo $order['quantity']; ?></td>
                <td><?php echo $order['order_date']; ?></td>
            </tr>
        <?php } ?>
        </div>
    </table>