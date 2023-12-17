<?php
session_start();

$baseurl = 'http://localhost/badak_truss';

// koneksi database
$koneksi = mysqli_connect('localhost', 'root', '', 'badak_truss');

// dinamis title halaman
$dynamic_title = ucwords(str_replace("_", " ", basename(pathinfo($_SERVER['PHP_SELF'])['basename'], ".php")));

// dashboard items
$count_stok_barang = mysqli_fetch_array(mysqli_query($koneksi, "SELECT COUNT(id_stok_barang) as tot_stok FROM stok_barang"))['tot_stok'];
$count_pelanggan = mysqli_fetch_array(mysqli_query($koneksi, "SELECT COUNT(id_pelanggan) as tot_pelanggan FROM pelanggan"))['tot_pelanggan'];
$count_barang_keluar = mysqli_fetch_array(mysqli_query($koneksi, "SELECT COUNT(id_barang_keluar) as tot_barang_keluar FROM barang_keluar"))['tot_barang_keluar'];
$count_pengiriman = mysqli_fetch_array(mysqli_query($koneksi, "SELECT COUNT(id_pengiriman) as tot_pengiriman FROM pengiriman"))['tot_pengiriman'];

// user function
$get_user = mysqli_query($koneksi, "SELECT * FROM user");
/// add user
if (isset($_POST['addUser'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];

    $sql_query = mysqli_query($koneksi, "INSERT INTO user (id_user, username, password, level) VALUES ('', '$username','$password','$level')");

    echo '<script>';
    if ($sql_query == TRUE) {
        echo ' alert("User berhasil di tambah");window.location = "' . $baseurl . '/user.php";';
    } else {
        echo 'alert("User gagal di tambah");window.location = "' . $baseurl . '/user.php";';
    }
    echo '</script>';
}
/// edit user
if (isset($_POST['editUser'])) {
    $id_user = $_POST['id_user'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];

    $sql_query = mysqli_query($koneksi, "UPDATE user SET nama='$nama', username='$username', password='$password', level='$level' WHERE id_user='$id_user'");

    echo '<script>';
    if ($sql_query == TRUE) {
        echo ' alert("Edit Data Berhasil");window.location = "' . $baseurl . '/user.php";';
    } else {
        echo 'alert("Edit Data Gagal!!!");window.location = "' . $baseurl . '/user.php";';
    }
    echo '</script>';
}
/// hapus data user
if (isset($_POST['hapusUser'])) {
    $id_user = $_POST['id_user'];

    $sql_query = mysqli_query($koneksi, "DELETE FROM user WHERE id_user ='$id_user'");

    echo '<script>';
    if ($sql_query == TRUE) {
        echo ' alert("Hapus Data Berhasil");window.location = "' . $baseurl . '/user.php";';
    } else {
        echo 'alert("Hapus Data Gagal!!!");window.location = "' . $baseurl . '/user.php";';
    }
    echo '</script>';
}
/// login user
if (isset($_POST['loginBtn'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $prc = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");
    $get_row = mysqli_num_rows($prc);

    if ($get_row > 0) {
        $data = mysqli_fetch_assoc($prc);
        if ($data['level'] == "admin") {
            $_SESSION['login'] = 'true';
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['level'] = 'admin';
            header('location:index.php');
        } else if ($data['level'] == "pemilik") {
            $_SESSION['login'] = 'true';
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['level'] = 'pemilik';
            header('location:index.php');
        } else {
            echo '
            <script>alert("Username atau Password salah");
            window.location.href="' . $baseurl . '/login.php"
            </script>';
        }
    } else {
        echo '
        <script>alert("Username atau Password salah");
        window.location.href="' . $baseurl . '/login.php"
        </script>';
    }
}
/// logout user
if (isset($_POST['logoutBtn'])) {
    // session_start();
    session_unset();
    session_destroy();
    echo '<script>';
    echo ' alert("Anda Berhasil Logout");window.location = "' . $baseurl . '/login.php";';
    echo '</script>';
}
// end user function 


// function kategori
/// get data
$get_kategori = mysqli_query($koneksi, "SELECT * FROM kategori");
/// tambah data kategori
if (isset($_POST['addKategori'])) {
    $nama_kategori = $_POST['nama_kategori'];

    $sql_query = mysqli_query($koneksi, "INSERT INTO kategori (id_kategori, nama_kategori) VALUES ('', '$nama_kategori')");

    echo '<script>';
    if ($sql_query == TRUE) {
        echo ' alert("Kategori berhasil di tambah");window.location = "' . $baseurl . '/kategori.php";';
    } else {
        echo 'alert("Kategori gagal di tambah");window.location = "' . $baseurl . '/kategori.php";';
    }
    echo '</script>';
}
/// edit data kategori
if (isset($_POST['editKategori'])) {
    $id_kategori = $_POST['id_kategori'];
    $nama_kategori = $_POST['nama_kategori'];

    $sql_query = mysqli_query($koneksi, "UPDATE kategori SET nama_kategori='$nama_kategori' WHERE id_kategori='$id_kategori'");

    echo '<script>';
    if ($sql_query == TRUE) {
        echo ' alert("Edit Data Berhasil");window.location = "' . $baseurl . '/kategori.php";';
    } else {
        echo 'alert("Edit Data Gagal!!!");window.location = "' . $baseurl . '/kategori.php";';
    }
    echo '</script>';
}
/// hapus data kategori
if (isset($_POST['hapusKategori'])) {
    $id_kategori = $_POST['id_kategori'];

    $sql_query = mysqli_query($koneksi, "DELETE FROM kategori WHERE id_kategori ='$id_kategori'");

    echo '<script>';
    if ($sql_query == TRUE) {
        echo ' alert("Hapus Data Berhasil");window.location = "' . $baseurl . '/kategori.php";';
    } else {
        echo 'alert("Hapus Data Gagal!!!");window.location = "' . $baseurl . '/kategori.php";';
    }
    echo '</script>';
}
// end function kategori

// function nama barang
/// get data
$get_nama_barang = mysqli_query($koneksi, "SELECT * FROM nama_barang");
/// tambah data nama barang
if (isset($_POST['addNamaBarang'])) {
    $nama_barang = $_POST['nama_barang'];

    $sql_query = mysqli_query($koneksi, "INSERT INTO nama_barang (id_nama_barang, nama_barang) VALUES ('', '$nama_barang')");

    echo '<script>';
    if ($sql_query == TRUE) {
        echo ' alert("Data berhasil di tambah");window.location = "' . $baseurl . '/nama_barang.php";';
    } else {
        echo 'alert("Data gagal di tambah");window.location = "' . $baseurl . '/nama_barang.php";';
    }
    echo '</script>';
}
/// edit data nama barang
if (isset($_POST['editNamaBarang'])) {
    $id_nama_barang = $_POST['id_nama_barang'];
    $nama_barang = $_POST['nama_barang'];

    $sql_query = mysqli_query($koneksi, "UPDATE nama_barang SET nama_barang='$nama_barang' WHERE id_nama_barang='$id_nama_barang'");

    echo '<script>';
    if ($sql_query == TRUE) {
        echo ' alert("Edit Data Berhasil");window.location = "' . $baseurl . '/nama_barang.php";';
    } else {
        echo 'alert("Edit Data Gagal!!!");window.location = "' . $baseurl . '/nama_barang.php";';
    }
    echo '</script>';
}
/// hapus data nama barang
if (isset($_POST['hapusNamaBarang'])) {
    $id_nama_barang = $_POST['id_nama_barang'];

    $sql_query = mysqli_query($koneksi, "DELETE FROM nama_barang WHERE id_nama_barang='$id_nama_barang'");

    echo '<script>';
    if ($sql_query == TRUE) {
        echo ' alert("Hapus Data Berhasil");window.location = "' . $baseurl . '/nama_barang.php";';
    } else {
        echo 'alert("Hapus Data Gagal!!!");window.location = "' . $baseurl . '/nama_barang.php";';
    }
    echo '</script>';
}
// end function nama barang

// stok barang function
/// get data stok barang
$get_stok_barang = mysqli_query($koneksi, "SELECT stok_barang.id_stok_barang, kategori.id_kategori, kategori.nama_kategori, nama_barang.id_nama_barang, nama_barang.nama_barang, stok_barang.tgl_masuk, stok_barang.qty FROM stok_barang 
                                        INNER JOIN kategori ON stok_barang.kategori = kategori.id_kategori
                                        INNER JOIN nama_barang ON stok_barang.nama_barang = nama_barang.id_nama_barang");
/// tambah data barang masuk
if (isset($_POST['addBarangIn'])) {
    $nama_kategori = $_POST['nama_kategori'];
    $nama_barang = $_POST['nama_barang'];
    $tgl_masuk = $_POST['tgl_masuk'];
    $qty = $_POST['qty'];

    $sql_query = mysqli_query($koneksi, "INSERT INTO stok_barang (id_stok_barang, kategori, nama_barang, qty, tgl_masuk) 
                 VALUES ('','$nama_kategori', '$nama_barang','$qty','$tgl_masuk')");

    echo '<script>';
    if ($sql_query == TRUE) {
        echo ' alert("Data berhasil di tambah");window.location = "' . $baseurl . '/stok_barang.php";';
    } else {
        echo 'alert("Data gagal di tambah");window.location = "' . $baseurl . '/stok_barang.php";';
    }
    echo '</script>';
}

/// update stok
if (isset($_POST['updateStok'])) {
    $id_stok_barang = $_POST['id_stok_barang'];
    $stok_awal = $_POST['selected_stok_awal'];
    $stok_tambah = $_POST['add_qty'];
    $tgl_masuk = $_POST['tgl_masuk'];

    $update_stok = $stok_awal + $stok_tambah;

    $sql_query = mysqli_query($koneksi, "UPDATE stok_barang SET tgl_masuk='$tgl_masuk', qty='$update_stok' WHERE id_stok_barang='$id_stok_barang'");

    echo '<script>';
    if ($sql_query == TRUE) {
        echo ' alert("Data berhasil di tambah");window.location = "' . $baseurl . '/stok_barang.php";';
    } else {
        echo 'alert("Data gagal di tambah");window.location = "' . $baseurl . '/stok_barang.php";';
    }
    echo '</script>';
}

/// hapus stok barang
if (isset($_POST['hapusStokBarang'])) {
    $id_stok_barang = $_POST['id_stok_barang'];

    $sql_query = mysqli_query($koneksi, "DELETE FROM stok_barang WHERE id_stok_barang='$id_stok_barang'");

    echo '<script>';
    if ($sql_query == TRUE) {
        echo ' alert("Hapus Data Berhasil");window.location = "' . $baseurl . '/stok_barang.php";';
    } else {
        echo 'alert("Hapus Data Gagal!!!");window.location = "' . $baseurl . '/stok_barang.php";';
    }
    echo '</script>';
}

// pelanggan function
$get_pelanggan = mysqli_query($koneksi, "SELECT * FROM pelanggan");
/// add pelanggan
if (isset($_POST['addPelanggan'])) {
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $no_tlp = $_POST['no_tlp'];
    $alamat_pelanggan = $_POST['alamat_pelanggan'];

    $sql_query = mysqli_query($koneksi, "INSERT INTO pelanggan (id_pelanggan, nama_pelanggan, no_tlp, alamat_pelanggan) VALUES ('', '$nama_pelanggan','$no_tlp','$alamat_pelanggan')");

    echo '<script>';
    if ($sql_query == TRUE) {
        echo ' alert("Data berhasil di tambah");window.location = "' . $baseurl . '/pelanggan.php";';
    } else {
        echo 'alert("Data gagal di tambah");window.location = "' . $baseurl . '/pelanggan.php";';
    }
    echo '</script>';
}
/// edit pelanggan
if (isset($_POST['editPelanggan'])) {
    $id_pelanggan = $_POST['id_pelanggan'];
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $no_tlp = $_POST['no_tlp'];
    $alamat_pelanggan = $_POST['alamat_pelanggan'];


    if ($_POST['alamat_pelanggan'] !== '') {
        $sql_query = mysqli_query($koneksi, "UPDATE pelanggan SET nama_pelanggan='$nama_pelanggan', no_tlp='$no_tlp', alamat_pelanggan='$alamat_pelanggan' WHERE id_pelanggan='$id_pelanggan'");
        echo '<script> alert("Edit Data Berhasil");window.location = "' . $baseurl . '/pelanggan.php";</script>';
    } elseif ($_POST['alamat_pelanggan'] == '') {
        $sql_query = mysqli_query($koneksi, "UPDATE pelanggan SET nama_pelanggan='$nama_pelanggan', no_tlp='$no_tlp' WHERE id_pelanggan='$id_pelanggan'");
        echo '<script> alert("Edit Data Berhasil");window.location = "' . $baseurl . '/pelanggan.php";</script>';
    } else {
        echo '<script> alert("Edit Data Gagal!!!");window.location = "' . $baseurl . '/pelanggan.php";</script>';
    }
}
/// hapus pelanggan
if (isset($_POST['hapusPelanggan'])) {
    $id_pelanggan = $_POST['id_pelanggan'];

    $sql_query = mysqli_query($koneksi, "DELETE FROM pelanggan WHERE id_pelanggan='$id_pelanggan'");

    echo '<script>';
    if ($sql_query == TRUE) {
        echo ' alert("Hapus Data Berhasil");window.location = "' . $baseurl . '/pelanggan.php";';
    } else {
        echo 'alert("Hapus Data Gagal!!!");window.location = "' . $baseurl . '/pelanggan.php";';
    }
    echo '</script>';
}

// barang keluar function
/// generate nota keluar
$generate_code_nota = "BT-NOTA-" . sprintf("%04d", mysqli_fetch_array(mysqli_query($koneksi, "SELECT COUNT(id_barang_keluar) as KD FROM barang_keluar;"))['KD'] + 1, 3, 3);
$get_barang_keluar = mysqli_query($koneksi, "SELECT barang_keluar.id_barang_keluar, nama_barang.nama_barang, kategori.nama_kategori, barang_keluar.qty, pelanggan.nama_pelanggan, barang_keluar.tgl_keluar, nama_barang.id_nama_barang, pelanggan.id_pelanggan
                                            FROM barang_keluar
                                            JOIN nama_barang ON barang_keluar.nama_barang = nama_barang.id_nama_barang
                                            JOIN kategori ON barang_keluar.kategori = kategori.id_kategori
                                            JOIN pelanggan ON barang_keluar.pelanggan = pelanggan.id_pelanggan");
/// add barang keluar
if (isset($_POST['addBarangOut'])) {
    $id_stok_barang = $_POST['id_stok_barang'];
    $selected_stok_awal = $_POST['selected_stok_awal'];
    $selected_id_barang = $_POST['selected_id_barang'];
    $selected_id_kategori = $_POST['selected_id_kategori'];
    $id_barang_keluar = $_POST['id_barang_keluar'];
    $jumlah = $_POST['jumlah'];
    $pelanggan = $_POST['pelanggan'];
    $tgl_keluar = $_POST['tgl_keluar'];

    $barang_keluar = "INSERT INTO barang_keluar (id_barang_keluar, nama_barang, kategori, qty, pelanggan, tgl_keluar) 
    VALUES ('$id_barang_keluar', '$selected_id_barang', '$selected_id_kategori', '$jumlah','$pelanggan', '$tgl_keluar')";

    $min_stok = "UPDATE stok_barang SET qty=(qty-'$jumlah') WHERE id_stok_barang='$id_stok_barang'";

    echo '<script>';
    if ($selected_stok_awal < $jumlah) {
        echo 'alert("Stok Tidak Mencukupi");window.location = "' . $baseurl . '/barang_keluar.php";';
    } elseif ($koneksi->multi_query("$barang_keluar; $min_stok")) {
        echo ' alert("Data berhasil di tambah");window.location = "' . $baseurl . '/barang_keluar.php";';
    } else {
        echo 'alert("Data gagal di tambah");window.location = "' . $baseurl . '/barang_keluar.php";';
    }
    echo '</script>';
}
/// hapus barang keluar
if (isset($_POST['hapusBarangKeluar'])) {
    $id_barang_keluar = $_POST['id_barang_keluar'];
    $id_in = $_POST['id_in'];
    $jumlah = $_POST['jumlah'];

    $barang_keluar_del = "DELETE FROM barang_keluar WHERE id_barang_keluar='$id_barang_keluar'";
    $back_stok = "UPDATE stok_barang SET qty=(qty+'$jumlah') WHERE id_stok_barang='$id_in'";

    echo '<script>';
    if ($koneksi->multi_query("$barang_keluar_del; $back_stok")) {
        echo ' alert("Data berhasil di Hapus");window.location = "' . $baseurl . '/barang_keluar.php";';
    } else {
        echo 'alert("Data gagal di Hapus");window.location = "' . $baseurl . '/barang_keluar.php";';
    }
    echo '</script>';
}
// end barang keluar function


// function pengiriman
$get_pengiriman = mysqli_query($koneksi, "SELECT pengiriman.id_pengiriman, pengiriman.nota_keluar, pelanggan.nama_pelanggan, nama_barang.nama_barang, pengiriman.qty, pengiriman.supir, pengiriman.no_kendaraan, pengiriman.tgl_pengiriman
FROM pengiriman
JOIN nama_barang ON pengiriman.nama_barang = nama_barang.id_nama_barang
JOIN pelanggan ON pengiriman.pelanggan = pelanggan.id_pelanggan");

/// add pengiriman
if (isset($_POST['addPengiriman'])) {
    $nota_keluar = $_POST['nota_keluar'];
    $selected_id_pelanggan = $_POST['selected_id_pelanggan'];
    $selected_id_barang = $_POST['selected_id_barang'];
    $selected_qty = $_POST['selected_qty'];
    $supir = $_POST['supir'];
    $no_ken = $_POST['no_ken'];
    $tgl_pengiriman = $_POST['tgl_pengiriman'];

    $cek_duplicate_data = mysqli_fetch_array(mysqli_query($koneksi, "SELECT nota_keluar FROM pengiriman WHERE nota_keluar='$nota_keluar'"));

    // $sql_query = mysqli_query($koneksi, "INSERT INTO pengiriman (id_pengiriman, nota_keluar, pelanggan, nama_barang, qty, supir, no_kendaraan, tgl_pengiriman) VALUES ('','$nota_keluar','$selected_id_pelanggan','$selected_id_barang','$selected_qty','$supir','$no_ken','$tgl_pengiriman')");

    if (!is_null($cek_duplicate_data)) {
        echo '<script>alert("Data Sudah Ada!!!");window.location = "' . $baseurl . '/pengiriman.php";</script>';
    } else {
        $sql_query = mysqli_query($koneksi, "INSERT INTO pengiriman (id_pengiriman, nota_keluar, pelanggan, nama_barang, qty, supir, no_kendaraan, tgl_pengiriman) VALUES ('','$nota_keluar','$selected_id_pelanggan','$selected_id_barang','$selected_qty','$supir','$no_ken','$tgl_pengiriman')");
        if ($sql_query == TRUE) {
            echo '<script>alert("Data Berhasil di input");window.location = "' . $baseurl . '/pengiriman.php";</script>';
        } else {
            echo '<script>alert("Data Gagal di input");window.location = "' . $baseurl . '/pengiriman.php";</script>';
        }
    }
}

/// edit pengiriman
if (isset($_POST['editPengiriman'])) {
    $id_pengiriman = $_POST['id_pengiriman'];
    $supir = $_POST['supir'];
    $no_ken = $_POST['no_ken'];
    $tgl_pengiriman = $_POST['tgl_pengiriman'];

    $sql_query = mysqli_query($koneksi, "UPDATE pengiriman SET supir='$supir', no_kendaraan='$no_ken', tgl_pengiriman='$tgl_pengiriman' WHERE id_pengiriman='$id_pengiriman'");

    echo '<script>';
    if ($sql_query == TRUE) {
        echo ' alert("Edit Data Berhasil");window.location = "' . $baseurl . '/pengiriman.php";';
    } else {
        echo 'alert("Edit Data Gagal!!!");window.location = "' . $baseurl . '/pengiriman.php";';
    }
    echo '</script>';
}
