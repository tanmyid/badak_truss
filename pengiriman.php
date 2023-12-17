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
                <h3 class="box-title">Pengiriman</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahPengiriman"><i class="fa fa-plus"></i> Tambah</button>
                <a href="<?= $baseurl; ?>/laporan/cetak_pengiriman.php" class="btn btn-primary" target="_blank"><i class="fa fa-print"></i> Print</a>
                <!-- Modal Add Pengiriman -->
                <div class="modal fade" id="tambahPengiriman">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Tambah Pengiriman</h4>
                            </div>
                            <form action="" method="post">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Nota</label>
                                        <select class="form-control" name="nota_keluar" id="mySelect" onchange="getSelectedOption()">
                                            <option selected>Pilih...</option>
                                            <?php
                                            while ($data1 = mysqli_fetch_array($get_barang_keluar)) :
                                                $id_barang_keluar = $data1['id_barang_keluar'];
                                                $nama_barang = $data1['nama_barang'];
                                                $nama_kategori = $data1['nama_kategori'];
                                                $qty = $data1['qty'];
                                                $nama_pelanggan = $data1['nama_pelanggan'];
                                                $tgl_keluar = $data1['tgl_keluar'];
                                                $id_nama_barang = $data1['id_nama_barang'];
                                                $id_pelanggan = $data1['id_pelanggan'];

                                            ?>
                                                <option value="<?= $id_barang_keluar; ?>" data-id_pelanggan="<?= $id_pelanggan; ?>" data-pelanggan="<?= $nama_pelanggan; ?>" data-id_barang="<?= $id_nama_barang; ?>" data-nama_barang="<?= $nama_barang; ?>" data-qty="<?= $qty; ?>"><?= $id_barang_keluar; ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Pelanggan</label>
                                        <input type="hidden" class="form-control" id="selected_id_pelanggan" name="selected_id_pelanggan" readonly>
                                        <input type="text" class="form-control" id="selected_pelanggan" name="selected_pelanggan" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Barang</label>
                                        <input type="hidden" class="form-control" id="selected_id_barang" name="selected_id_barang" readonly>
                                        <input type="text" class="form-control" id="selected_nama_barang" name="selected_nama_barang" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Jumlah</label>
                                        <input type="number" class="form-control" name="selected_qty" id="selected_qty" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Supir</label>
                                        <input type="text" class="form-control" name="supir" placeholder="Nama Supir ...">
                                    </div>
                                    <div class="form-group">
                                        <label>No Kendaraan</label>
                                        <input type="text" class="form-control" name="no_ken" placeholder="NO Kendaraan ...">
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Pengiriman</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right" id="datepicker_stok" name="tgl_pengiriman">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="addPengiriman"><i class="fa fa-save"></i> Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- ./Modal Add Pengiriman -->
                <div class="box-body">
                    <table id="tabel" class="table table-bordered table-hover">
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
                                <th class="text-center">Opsi</th>
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
                                    <td class="text-center">
                                        <button class="btn btn-warning" data-toggle="modal" data-target="#editPengiriman<?= $id_pengiriman; ?>" onclick="dp_edit(<?= $id_pengiriman; ?>)"><i class="fa fa-edit"></i> Edit</button>
                                        <button class="btn btn-danger" data-toggle="modal" data-target="#hapusPengiriman<?= $id_pengiriman; ?>"><i class="fa fa-trash"></i> Hapus</button>
                                    </td>
                                </tr>
                                <!-- Modal Edit Pengiriman -->
                                <div class="modal fade" id="editPengiriman<?= $id_pengiriman; ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">Edit Pengiriman</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form action="" method="post">
                                                    <div class="form-group">
                                                        <label>Pelanggan</label>
                                                        <input type="hidden" class="form-control" value="<?= $id_pengiriman; ?>" name="id_pengiriman" readonly>
                                                        <input type="text" class="form-control" value="<?= $nama_pelanggan; ?>" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Nama Barang</label>
                                                        <input type="text" class="form-control" value="<?= $nama_barang; ?>" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Jumlah</label>
                                                        <input type="number" class="form-control" value="<?= $qty; ?>" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Supir</label>
                                                        <input type="text" class="form-control" name="supir" placeholder="Nama Supir ..." value="<?= $supir; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>No Kendaraan</label>
                                                        <input type="text" class="form-control" name="no_ken" placeholder="NO Kendaraan ..." value="<?= $no_kendaraan; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Tanggal Pengiriman</label>
                                                        <div class="input-group date">
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                            </div>
                                                            <input type="text" class="form-control pull-right" id="tgl<?= $id_pengiriman; ?>" name="tgl_pengiriman" value="<?= $tgl_pengiriman; ?>">
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary" name="editPengiriman"><i class="fa fa-save"></i> Simpan</button>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- ./Modal Edit Pengiriman -->
                                <!-- Modal Hapus Kategori -->
                                <div class="modal fade" id="hapusPengiriman<?= $id_pengiriman; ?>">
                                    <div class="modal-dialog modal-danger">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">Hapus Barang Keluar</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form action="" method="post">
                                                    <div class="form-group">
                                                        <input type="hidden" class="form-control" name="id_barang_keluar" value="<?= $id_barang_keluar; ?>">
                                                        <?php
                                                        $get_id_in = mysqli_fetch_array(mysqli_query($koneksi, "SELECT id_stok_barang FROM stok_barang WHERE id_stok_barang='$id_stok_barang'"))['id_stok_barang'];
                                                        ?>
                                                        <input type="hidden" class="form-control" name="id_in" value="<?= $get_id_in; ?>">
                                                        <input type="hidden" class="form-control" name="jumlah" value="<?= $qty; ?>">
                                                        <span>Anda yakin ingin menghapus pesanan : <b><?= $id_barang_keluar; ?></b> ?</span>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary" name="hapusBarangKeluar"><i class="fa fa-save"></i> Simpan</button>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- ./Modal Hapus Kategori -->
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
<script type="text/javascript">
    function getSelectedOption() {
        var select = document.getElementById("mySelect");

        var selectedIdPelanggan = document.getElementById("selected_id_pelanggan");
        var selectedPelanggan = document.getElementById("selected_pelanggan");
        var selectedIdBarang = document.getElementById("selected_id_barang");
        var selectedNamaBarang = document.getElementById("selected_nama_barang");
        var selectedQtyBarang = document.getElementById("selected_qty");


        var selectedOption = select.options[select.selectedIndex];
        var idPelanggan = selectedOption.getAttribute("data-id_pelanggan");
        var NamaPelanggan = selectedOption.getAttribute("data-pelanggan");
        var IdBarang = selectedOption.getAttribute("data-id_barang");
        var NamaBarang = selectedOption.getAttribute("data-nama_barang");
        var QtyBarang = selectedOption.getAttribute("data-qty");

        // Set nilai input sesuai dengan variabel
        selectedIdPelanggan.value = idPelanggan;
        selectedPelanggan.value = NamaPelanggan;
        selectedIdBarang.value = IdBarang;
        selectedNamaBarang.value = NamaBarang;
        selectedQtyBarang.value = QtyBarang;
    }
</script>
<?php
include 'layouts/footer.php';
?>