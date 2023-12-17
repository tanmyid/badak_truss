<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MENU</li>
            <li> <a href="<?= $baseurl; ?>"> <i class="fa fa-circle-o"></i> <span>Dashboard</span></a></li>
            <?php
            if ($_SESSION['level'] == 'admin') {
                echo '
                <li><a href="' . $baseurl . '/kategori.php"><i class="fa fa-circle-o"></i> Kategori</a></li>
                <li><a href="' . $baseurl . '/nama_barang.php"><i class="fa fa-circle-o"></i> Nama Barang</a></li>
                <li><a href="' . $baseurl . '/stok_barang.php"><i class="fa fa-circle-o"></i> Stok Barang</a></li>
                <li><a href="' . $baseurl . '/pelanggan.php"><i class="fa fa-circle-o"></i> Pelanggan</a></li>
                <li><a href="' . $baseurl . '/barang_keluar.php"><i class="fa fa-circle-o"></i> Barang Keluar</a></li>
                <li><a href="' . $baseurl . '/pengiriman.php"><i class="fa fa-circle-o"></i> Pengiriman</a></li>
                
                ';
            } else {
                echo '
                <li><a href="' . $baseurl . '/laporan.php"><i class="fa fa-circle-o"></i> Laporan</a></li>
                <li class="header">SETTING</li>
                <li> <a href="' . $baseurl . '/user.php"> <i class="fa fa-gear"></i> <span>User</span> </a> </li>
                ';
            }
            ?>
        </ul>
    </section>
</aside>