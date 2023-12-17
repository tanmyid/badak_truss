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
    <title>Laporan Stok</title>
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= $baseurl; ?>/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
</head>

<body>

    <div class="container">
        <h2 class="text-center"><b>Laporan Stok</b></h2>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Kategori</th>
                    <th class="text-center">Nama Barang</th>
                    <th class="text-center">Tanggal Masuk</th>
                    <th class="text-center">Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                mysqli_data_seek($get_stok_barang, 0);
                while ($data = mysqli_fetch_array($get_stok_barang)) :
                    $id_stok_barang = $data['id_stok_barang'];
                    $id_kategori0 = $data['id_kategori'];
                    $id_nama_barang0 = $data['id_nama_barang'];
                    $nama_kategori = $data['nama_kategori'];
                    $nama_barang = $data['nama_barang'];
                    $qty = $data['qty'];
                    $tgl_masuk = $data['tgl_masuk'];
                ?>
                    <tr>
                        <td class="text-center"><?= $no++; ?></td>
                        <td class="text-center"><?= $nama_kategori; ?></td>
                        <td class="text-center"><?= $nama_barang; ?></td>
                        <td class="text-center"><?= $tgl_masuk; ?></td>
                        <td class="text-center"><?= $qty; ?></td>
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