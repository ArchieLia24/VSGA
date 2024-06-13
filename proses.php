<?php

// Panggil koneksi ke database
require_once "koneksi.php";

if (isset($_POST["b_proses"])) {
    $nama = $_POST["nama"];
    $no_hp = $_POST["hp"];
    $tgl_pesan = $_POST["tgl"];
    $paket = $_POST["penginapan"];
    $paket = $_POST["transportasi"];
    $paket = $_POST["konsumsi"];
    $wkt_jalan = $_POST["waktu"];
    $jlh_peserta = $_POST["jumlah"];
    $hrg_paket = $_POST["harga"];
    $ttl_tagihan = $_POST["total"];

    // SQL untuk input data 
    $sql = "INSERT INTO tb_pesan SET
    nama=:nama, no_hp=:hp, tgl_pesan=:tgl,
    paket=:penginapan, paket=:transportasi, paket=:konsumsi,
    wkt_jalan=:waktu, jlh_peserta=:jumlah, hrg_paket=:harga, ttl_tagihan=:total";

    $stmt = $koneksi->prepare($sql);

    $stmt->bindParam(":nama", $nama);
    $stmt->bindParam(":hp", $no_hp);
    $stmt->bindParam(":tgl", $tgl_pesan);
    $stmt->bindParam(":penginapan", $paket);
    $stmt->bindParam(":transportasi", $paket);
    $stmt->bindParam(":konsumsi", $paket);
    $stmt->bindParam(":waktu", $wkt_jalan);
    $stmt->bindParam(":jumlah", $jlh_peserta);
    $stmt->bindParam(":harga", $hrg_paket);
    $stmt->bindParam(":total", $ttl_tagihan);

    $stmt->execute([$nama, $no_hp, $tgl_pesan, $wkt_jalan, $jlh_peserta, $hrg_paket, $ttl_tagihan]);

    // Redirect ke tampil 
    header("location:order_tampil.php");
} else {
    return;
}