<link rel="stylesheet" href="css/style.css">
<h2>Input Data Order</h2>

    <form action="proses.php" method="post">
        <table>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="name" required></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td><input type="text" name="price" required></td>
            </tr>
            <tr>
                <td>Paket Perjalanan</td>
                <td>
                    <div><input type="checkbox" name="penginapan" id="penginapan" value="1000000" onclick="hitungHarga()">Penginapan (Rp 1.000.000)</div>
                    <div><input type="checkbox" name="transportasi" id="transportasi" value="1200000" onclick="hitungHarga()">Transportasi (Rp 1.200.000)</div>
                    <div><input type="checkbox" name="konsumsi" id="konsumsi" value="500000" onclick="hitungHarga()">Konsumsi (Rp 500.000)</div>
                </td>
            </tr>

            <tr>
                <td>Tanggal Pemesanan</td>
                <td><input type="date" name="tgl" id=""></td>
            </tr>
            <tr>
                <td>Paket Perjalanan</td>
                <td>
                    <div><input type="checkbox" name="penginapan" id="penginapan" value="1000000" onclick="hitungHarga()">Penginapan (Rp 1.000.000)</div>
                    <div><input type="checkbox" name="transportasi" id="transportasi" value="1200000" onclick="hitungHarga()">Transportasi (Rp 1.200.000)</div>
                    <div><input type="checkbox" name="konsumsi" id="konsumsi" value="500000" onclick="hitungHarga()">Konsumsi (Rp 500.000)</div>
                </td>
            </tr>
            <tr>
                <td>Waktu Pelaksanaan</td>
                <td>
                    <select name="waktu" id="waktu" onchange="hitungHarga()" required>
                        <option value="Paket 1">Paket 1 (4 jam) Rp 1.000.000 /paket</option>
                        <option value="Paket 2">Paket 2 (8 jam) Rp 1.500.000 /paket</option>
                        <option value="Paket 3">Paket 3 (12 jam) Rp 2.000.000 /paket</option>
                        <option value="Paket 4">Paket 4 (Full Day) Rp 2.500.000 /paket</option>
                        <option value="Paket 5">Paket 5 (36 jam) Rp 3.000.000 /paket</option>
                    </select>
                </td>
            </tr>
            <tr>
            <td>Jumlah Peserta</td>
            <td><input type="number" name="jumlah" id="jumlah" onchange="hitungHarga()" required></td>
        </tr>
        <tr>
            <td>Harga Paket Perjalanan</td>
            <td><input type="number" name="harga" id="harga" readonly></td>
        </tr>
        <tr>
            <td>Total Tagihan</td>
            <td><input type="number" name="total" id="total" readonly></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="b_proses" value="Proses"></td>
        </tr>
    </table>
</form>
 
<script>
    function hitungHarga() {
        var paket = document.getElementById("waktu").value;
        var jumlah = document.getElementById("jumlah").value;

        // Harga paket perjalanan
        var hargaPaket = 0;
        switch (paket) {
            case "Paket 1":
                hargaPaket = 1000000; // Harga paket 1 (4 jam)
                break;
            case "Paket 2":
                hargaPaket = 1500000; // Harga paket 2 (8 jam)
                break;
            case "Paket 3":
                hargaPaket = 2000000; // Harga paket 3 (12 jam)
                break;
            case "Paket 4":
                hargaPaket = 2500000; // Harga paket 4 (Full Day)
                break;
            case "Paket 5":
                hargaPaket = 3000000; // Harga paket 5 (36 jam)
                break;
            default:
                hargaPaket = 0;
        }

        // Total tagihan
        var totalTagihan = hargaPaket * jumlah;

        // Menampilkan harga paket dan total tagihan
        document.getElementById("harga").value = hargaPaket;
        document.getElementById("total").value = totalTagihan;
    }
</script>

<script>
    function hitungHarga() {
        var jumlah = 0;
        var hargaPaket = 0;

        // Perhitungan harga paket perjalanan
        var paket = document.getElementById("waktu").value;
        switch (paket) {
            case "Paket 1":
                hargaPaket += 1000000; // Harga paket 1 (4 jam)
                break;
            case "Paket 2":
                hargaPaket += 1500000; // Harga paket 2 (8 jam)
                break;
            case "Paket 3":
                hargaPaket += 2000000; // Harga paket 3 (12 jam)
                break;
            case "Paket 4":
                hargaPaket += 2500000; // Harga paket 4 (Full Day)
                break;
            case "Paket 5":
                hargaPaket += 3000000; // Harga paket 5 (36 jam)
                break;
            default:
                hargaPaket += 0;
        }

        // Perhitungan harga dari checkbox
        if (document.getElementById("penginapan").checked) {
            hargaPaket += parseInt(document.getElementById("penginapan").value);
        }
        if (document.getElementById("transportasi").checked) {
            hargaPaket += parseInt(document.getElementById("transportasi").value);
        }
        if (document.getElementById("konsumsi").checked) {
            hargaPaket += parseInt(document.getElementById("konsumsi").value);
        }

        jumlah = document.getElementById("jumlah").value;

        // Total tagihan
        var totalTagihan = hargaPaket * jumlah;

        // Menampilkan harga paket dan total tagihan
        document.getElementById("harga").value = hargaPaket;
        document.getElementById("total").value = totalTagihan;
    }
</script>
