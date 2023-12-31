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
                <h3 class="box-title">Barang Masuk</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="box-header with-border">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahBarangIn"><i class="fa fa-plus"></i> Tambah Barang</button>
                    <a href="<?= $baseurl; ?>/laporan/cetak_stok.php" class="btn btn-primary" target="_blank"><i class="fa fa-print"></i> Print</a>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#updateStok"><i class="fa fa-plus"></i> Update Stok</button>
                    </div>
                </div>
                <!-- Modal Add Stok Barang -->
                <div class="modal fade" id="tambahBarangIn">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Tambah Barang</h4>
                            </div>
                            <form action="" method="post">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Nama Barang</label>
                                        <select name="nama_barang" class="form-control" id="SelectKategori" onclick="getSelectedOption2()">
                                            <option selected>Pilih...</option>
                                            <?php
                                            while ($data = mysqli_fetch_array($get_nama_barang)) :
                                                $id_nama_barang = $data['id_nama_barang'];
                                                $nama_barang = $data['nama_barang'];
                                                $id_kategori = $data['id_kategori'];
                                                $kategori = $data['nama_kategori'];
                                            ?>
                                                <option value="<?= $id_nama_barang; ?>" data-id_kategori="<?= $id_kategori; ?>" data-kategori="<?= $kategori; ?>"><?= $nama_barang; ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Kategori</label>
                                        <input type="hidden" class="form-control" id="selected_id_kategori" name="id_kategori" readonly>
                                        <input type="text" class="form-control" id="selected_kategori" name="kategori" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Jumlah</label>
                                        <input type="number" class="form-control" placeholder="Jumlah Barang" name="qty">
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Masuk</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right" id="datepicker" name="tgl_masuk">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="addBarangIn"><i class="fa fa-save"></i> Simpan</button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Modal Add Stok Barang -->
                <!-- Modal Tambah Stok -->
                <div class="modal fade" id="updateStok">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Update Stok</h4>
                            </div>
                            <form action="" method="post">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Nama Barang</label>
                                        <select class="form-control" name="id_stok_barang" id="mySelect" onchange="getSelectedOption()">
                                            <option selected>Pilih...</option>
                                            <?php
                                            while ($data3 = mysqli_fetch_array($get_stok_barang)) :
                                                $id_stok_barang = $data3['id_stok_barang'];
                                                $nama_barang = $data3['nama_barang'];
                                                $qty_awal = $data3['qty'];
                                                $tgl_masuk = $data3['tgl_masuk'];
                                            ?>
                                                <option value="<?= $id_stok_barang; ?>" data-idnamset="<?= $qty_awal; ?>"><?= $nama_barang; ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Stok Awal</label>
                                        <input type="number" class="form-control" placeholder="Stock Awal" id="selected_stok_awal" name="selected_stok_awal" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Tambah Stok</label>
                                        <input type="number" class="form-control" placeholder="Jumlah" name="add_qty">
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Masuk</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right" id="datepicker_stok" name="tgl_masuk">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="updateStok"><i class="fa fa-save"></i> Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- ./Modal Add Barang Masuk -->
                <div class="box-body">
                    <table id="tabel" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Nama Barang</th>
                                <th class="text-center">Kategori</th>
                                <th class="text-center">Tanggal Masuk</th>
                                <th class="text-center">Jumlah</th>
                                <th class="text-center">Opsi</th>

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
                                    <td class="text-center"><?= $nama_barang; ?></td>
                                    <td class="text-center"><?= $nama_kategori; ?></td>
                                    <td class="text-center"><?= $tgl_masuk; ?></td>
                                    <td class="text-center"><?= $qty; ?></td>
                                    <td class="text-center">
                                        <button class="btn btn-danger" data-toggle="modal" data-target="#hapusStokBarang<?= $id_stok_barang; ?>"><i class="fa fa-trash"></i> Hapus</button>
                                    </td>

                                </tr>
                                <!-- Modal Hapus Kategori -->
                                <div class="modal fade" id="hapusStokBarang<?= $id_stok_barang; ?>">
                                    <div class="modal-dialog modal-danger">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">Hapus Barang Masuk</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form action="" method="post">
                                                    <div class="form-group">
                                                        <input type="hidden" class="form-control" name="id_stok_barang" value="<?= $id_stok_barang; ?>">
                                                        <span>Anda yakin ingin menghapus Data : <?= $nama_barang; ?> ?</span>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary" name="hapusStokBarang"><i class="fa fa-save"></i> Simpan</button>
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

        var selectedIdNamsetInput = document.getElementById("selected_stok_awal");

        var selectedOption = select.options[select.selectedIndex];
        var idNamset = selectedOption.getAttribute("data-idnamset");

        // Set nilai input sesuai dengan variabel
        selectedIdNamsetInput.value = idNamset;
    }
</script>
<script type="text/javascript">
    function getSelectedOption2() {
        var select = document.getElementById("SelectKategori");

        var selectedIdKategori = document.getElementById("selected_id_kategori");
        var selectedKategori = document.getElementById("selected_kategori");

        var selectedOption = select.options[select.selectedIndex];
        var idKategori = selectedOption.getAttribute("data-id_kategori");
        var namaKategori = selectedOption.getAttribute("data-kategori");

        // Set nilai input sesuai dengan variabel
        selectedIdKategori.value = idKategori;
        selectedKategori.value = namaKategori;
    }
</script>
<?php
include 'layouts/footer.php';
?>