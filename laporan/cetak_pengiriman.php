<?php
include '../backend/function.php';
if (isset($_SESSION['login']) == 'true') {
} else {
    echo '<script>';
    echo ' alert("Anda Belum Login");window.location = "' . $baseurl . '/login.php";';
    echo '</script>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pengiriman</title>
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= $baseurl; ?>/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2 class="text-center"><b>Laporan Pengiriman</b></h2>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nota Keluar</th>
                    <th class="text-center">Nama Pelanggan</th>
                    <th class="text-center">Nama Barang</th>
                    <th class="text-center">Jumlah</th>
                    <th class="text-center">Supir</th>
                    <th class="text-center">No Kendaraan</th>
                    <th class="text-center">Tanggal Pengiriman</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                // mysqli_data_seek($get_barang_in, 0);
                while ($data = mysqli_fetch_array($get_pengiriman)) :
                    $id_pengiriman = $data['id_pengiriman'];
                    $nota_keluar = $data['nota_keluar'];
                    $nama_pelanggan = $data['nama_pelanggan'];
                    $nama_barang = $data['nama_barang'];
                    $qty = $data['qty'];
                    $supir = $data['supir'];
                    $no_kendaraan = $data['no_kendaraan'];
                    $tgl_pengiriman = $data['tgl_pengiriman'];
                ?>
                    <tr>
                        <td class="text-center"><?= $no++; ?></td>
                        <td class="text-center"><?= $nota_keluar; ?></td>
                        <td class="text-center"><?= $nama_pelanggan; ?></td>
                        <td class="text-center"><?= $nama_barang; ?></td>
                        <td class="text-center"><?= $qty; ?></td>
                        <td class="text-center"><?= $supir; ?></td>
                        <td class="text-center"><?= $no_kendaraan; ?></td>
                        <td class="text-center"><?= $tgl_pengiriman; ?></td>
                    </tr>
                <?php
                endwhile;
                ?>
            </tbody>
        </table>
    </div>

</body>
<script>
    window.onload = function() {
        window.print();
    };
</script>

</html>