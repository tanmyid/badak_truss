<!-- Header -->
<?php
include 'layouts/header.php';
include 'layouts/sidebar.php';
?>
<!-- Content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Stok Barang</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <a href="<?= $baseurl; ?>/laporan/cetak_stok.php" class="btn btn-primary" target="_blank"><i class="fa fa-print"></i> Print</a>
                <div class="box-body">
                    <table id="tabel" class="table table-bordered table-hover">
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
            </div>
        </div>
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Pengiriman</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <a href="<?= $baseurl; ?>/laporan/cetak_pengiriman.php" class="btn btn-primary" target="_blank"><i class="fa fa-print"></i> Print</a>
                <div class="box-body">
                    <table id="tabel2" class="table table-bordered table-hover">
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
            </div>
        </div>

    </section>
</div>
<?php
include 'layouts/footer.php';
?>