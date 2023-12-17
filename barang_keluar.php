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
                <h3 class="box-title">Barang Keluar</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahBarangOut"><i class="fa fa-plus"></i> Tambah</button>
                <!-- Modal Add Barang Keluar -->
                <div class="modal fade" id="tambahBarangOut">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Tambah Barang Keluar</h4>
                            </div>
                            <form action="" method="post">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>NO Nota</label>
                                        <input type="text" class="form-control" name="id_barang_keluar" value="<?= $generate_code_nota; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Barang</label>
                                        <select class="form-control" name="id_stok_barang" id="mySelect" onchange="getSelectedOption()">
                                            <option selected>Pilih...</option>
                                            <?php
                                            while ($data3 = mysqli_fetch_array($get_stok_barang)) :
                                                $id_stok_barang = $data3['id_stok_barang'];
                                                $nama_barang = $data3['nama_barang'];
                                                $qty_awal = $data3['qty'];
                                                $id_nama_barang = $data3['id_nama_barang'];
                                                $id_kategori = $data3['id_kategori'];
                                                $nama_kategori = $data3['nama_kategori'];
                                            ?>
                                                <option value="<?= $id_stok_barang; ?>" data-idnamset="<?= $qty_awal; ?>" data-idnamset2="<?= $id_nama_barang; ?>" data-idnamset3_3="<?= $nama_kategori; ?>" data-idnamset3="<?= $id_kategori; ?>"><?= $nama_barang; ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Kategori</label>
                                        <input type="hidden" class="form-control" id="selected_id_kategori" name="selected_id_kategori" readonly>
                                        <input type="text" class="form-control" id="selected_kategori" name="selected_kategori" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Stok Awal</label>
                                        <input type="number" class="form-control" id="selected_stok_awal" name="selected_stok_awal" readonly>
                                        <input type="hidden" class="form-control" id="selected_id_barang" name="selected_id_barang" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Jumlah Barang Keluar</label>
                                        <input type="number" class="form-control" placeholder="Jumlah Barang" name="jumlah">
                                    </div>
                                    <div class="form-group">
                                        <label>Pelanggan</label>
                                        <select name="pelanggan" class="form-control">
                                            <option selected>Pilih...</option>
                                            <?php
                                            while ($data2 = mysqli_fetch_array($get_pelanggan)) :
                                                $id_pelanggan = $data2['id_pelanggan'];
                                                $nama_pelanggan = $data2['nama_pelanggan'];
                                            ?>
                                                <option value="<?= $id_pelanggan; ?>"><?= $nama_pelanggan; ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Keluar</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" name="tgl_keluar" class="form-control" value="<?= date("Y-m-d"); ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="addBarangOut"><i class="fa fa-save"></i> Simpan</button>
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
                                <th class="text-center">No Nota</th>
                                <th class="text-center">Kategori</th>
                                <th class="text-center">Nama Barang</th>
                                <th class="text-center">Jumlah</th>
                                <th class="text-center">Pelanggan</th>
                                <th class="text-center">Tanggal Keluar</th>
                                <th class="text-center">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            // mysqli_data_seek($get_barang_in, 0);
                            while ($data = mysqli_fetch_array($get_barang_keluar)) :
                                $id_barang_keluar = $data['id_barang_keluar'];
                                $nama_barang = $data['nama_barang'];
                                $nama_kategori = $data['nama_kategori'];
                                $qty = $data['qty'];
                                $pelanggan = $data['nama_pelanggan'];
                                $tgl_keluar = $data['tgl_keluar'];
                            ?>
                                <tr>
                                    <td class="text-center"><?= $no++; ?></td>
                                    <td class="text-center"><?= $id_barang_keluar; ?></td>
                                    <td class="text-center"><?= $nama_kategori; ?></td>
                                    <td class="text-center"><?= $nama_barang; ?></td>
                                    <td class="text-center"><?= $qty; ?></td>
                                    <td class="text-center"><?= $pelanggan; ?></td>
                                    <td class="text-center"><?= $tgl_keluar; ?></td>
                                    <td class="text-center">
                                        <button class="btn btn-danger" data-toggle="modal" data-target="#hapusBarangKeluar<?= $id_barang_keluar; ?>"><i class="fa fa-trash"></i> Hapus</button>
                                    </td>
                                </tr>
                                <!-- Modal Hapus Kategori -->
                                <div class="modal fade" id="hapusBarangKeluar<?= $id_barang_keluar; ?>">
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

        var selectedIdNamsetInput = document.getElementById("selected_stok_awal");
        var selectedIdNamset2Input = document.getElementById("selected_id_barang");
        var selectedIdNamset3Input = document.getElementById("selected_id_kategori");
        var selectedIdNamset3_3Input = document.getElementById("selected_kategori");

        var selectedOption = select.options[select.selectedIndex];
        var idNamset = selectedOption.getAttribute("data-idnamset");
        var idNamset2 = selectedOption.getAttribute("data-idnamset2");
        var idNamset3 = selectedOption.getAttribute("data-idnamset3");
        var idNamset3_3 = selectedOption.getAttribute("data-idnamset3_3");

        // Set nilai input sesuai dengan variabel
        selectedIdNamsetInput.value = idNamset;
        selectedIdNamset2Input.value = idNamset2;
        selectedIdNamset3Input.value = idNamset3;
        selectedIdNamset3_3Input.value = idNamset3_3;
    }
</script>
<?php
include 'layouts/footer.php';
?>