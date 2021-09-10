<?php
require_once 'functions.php';
/** LOGIN **/
if ($act == 'login') {
    $user = esc_field($_POST['user']);
    $pass = esc_field($_POST['pass']);
    
    $row = $db->get_row("SELECT * FROM tb_user WHERE user='$user' AND pass='$pass'");
    if ($row) {
        $_SESSION['login'] = $row->user;
        $_SESSION['level'] = $row->level;
       
        redirect_js("index.php");
    } else {
        print_msg("Salah kombinasi username dan password.");
    }
} else if ($mod == 'password') {
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    $pass3 = $_POST['pass3'];

    $row = $db->get_row("SELECT * FROM tb_user WHERE user='$_SESSION[login]' AND pass='$pass1'");

    if ($pass1 == '' || $pass2 == '' || $pass3 == '')
        print_msg('Field bertanda * harus diisi.');
    elseif (!$row)
        print_msg('Password lama salah.');
    elseif ($pass2 != $pass3)
        print_msg('Password baru dan konfirmasi password baru tidak sama.');
    else {
        $db->query("UPDATE tb_user SET pass='$pass2' WHERE user='$_SESSION[login]'");
        print_msg('Password berhasil diubah.', 'success');
    }
} elseif ($act == 'logout') {
    unset($_SESSION['login'], $_SESSION['level']);
    header("location:login.php");
}
/** alternatif */
elseif ($mod == 'alternatif_tambah') {
    $kode_alternatif = $_POST['kode_alternatif'];
    $nama_alternatif = $_POST['nama_alternatif'];
    $keterangan = $_POST['keterangan'];
    if ($kode_alternatif == '' || $nama_alternatif == '')
        print_msg("Field bertanda * tidak boleh kosong!");
    elseif ($db->get_results("SELECT * FROM tb_alternatif WHERE kode_alternatif='$kode_alternatif'"))
        print_msg("Kode sudah ada!");
    else {
        $db->query("INSERT INTO tb_alternatif (kode_alternatif, nama_alternatif, keterangan) VALUES ('$kode_alternatif', '$nama_alternatif', '$keterangan')");

        $db->query("INSERT INTO tb_nilai_alternatif(kode_alternatif, kode_kriteria, kode_crisp) SELECT '$kode_alternatif', kode_kriteria, 0 FROM tb_kriteria");
        redirect_js("index.php?m=alternatif");
    }
} else if ($mod == 'alternatif_ubah') {
    $kode_alternatif = $_POST['kode_alternatif'];
    $nama_alternatif = $_POST['nama_alternatif'];
    $keterangan = $_POST['keterangan'];
    if ($kode_alternatif == '' || $nama_alternatif == '')
        print_msg("Field bertanda * tidak boleh kosong!");
    else {
        $db->query("UPDATE tb_alternatif SET nama_alternatif='$nama_alternatif', keterangan='$keterangan' WHERE kode_alternatif='$_GET[ID]'");
        redirect_js("index.php?m=alternatif");
    }
} else if ($act == 'alternatif_hapus') {
    $db->query("DELETE FROM tb_alternatif WHERE kode_alternatif='$_GET[ID]'");
    $db->query("DELETE FROM tb_nilai_alternatif WHERE kode_alternatif='$_GET[ID]'");
    header("location:index.php?m=alternatif");
}

/** KRITERIA */
elseif ($mod == 'kriteria_tambah') {
    $kode_kriteria = $_POST['kode_kriteria'];
    $nama_kriteria = $_POST['nama_kriteria'];
    $atribut = $_POST['atribut'];

    if ($kode_kriteria == '' || $nama_kriteria == '' || $atribut == '')
        print_msg("Field bertanda * tidak boleh kosong!");
    elseif ($db->get_results("SELECT * FROM tb_kriteria WHERE kode_kriteria='$kode_kriteria'"))
        print_msg("Kode sudah ada!");
    else {
        $db->query("INSERT INTO tb_kriteria (kode_kriteria, nama_kriteria, atribut) VALUES ('$kode_kriteria', '$nama_kriteria', '$atribut')");
        $db->query("INSERT INTO tb_nilai_alternatif(kode_alternatif, kode_kriteria, kode_crisp) SELECT kode_alternatif, '$kode_kriteria', 0  FROM tb_alternatif");
        redirect_js("index.php?m=kriteria");
    }
} else if ($mod == 'kriteria_ubah') {
    $nama_kriteria = $_POST['nama_kriteria'];
    $atribut = $_POST['atribut'];

    if ($nama_kriteria == '' || $atribut == '')
        print_msg("Field bertanda * tidak boleh kosong!");
    elseif ($db->get_results("SELECT * FROM tb_kriteria WHERE kode_kriteria='$kode_kriteria'"))
        print_msg("Kode sudah ada!");
    else {
        $db->query("UPDATE tb_kriteria SET nama_kriteria='$nama_kriteria', atribut='$atribut' WHERE kode_kriteria='$_GET[ID]'");
        redirect_js("index.php?m=kriteria");
    }
} else if ($act == 'kriteria_hapus') {
    $db->query("DELETE FROM tb_kriteria WHERE kode_kriteria='$_GET[ID]'");
    $db->query("DELETE FROM tb_nilai_kriteria WHERE kode_kriteria='$_GET[ID]'");
    $db->query("DELETE FROM tb_nilai_alternatif WHERE kode_kriteria='$_GET[ID]'");
    header("location:index.php?m=kriteria");
}

/** crisp */
elseif ($mod == 'nilai_kriteria_tambah') {
    $kode_kriteria = $_POST['kode_kriteria'];
    $nama_crisp = $_POST['nama_crisp'];
    $nilai = $_POST['nilai'];

    if ($kode_kriteria == '' || $nama_crisp == '' || $nilai == '')
        print_msg("Field bertanda * tidak boleh kosong!");
    else {
        $db->query("INSERT INTO tb_nilai_kriteria (kode_kriteria, nama_crisp, nilai) VALUES ('$kode_kriteria', '$nama_crisp', '$nilai')");
        redirect_js("index.php?m=nilai_kriteria&kode_kriteria");
    }
} else if ($mod == 'nilai_kriteria_ubah') {
    $kode_kriteria = $_POST['kode_kriteria'];
    $nama_crisp = $_POST['nama_crisp'];
    $nilai = $_POST['nilai'];

    if ($kode_kriteria == '' || $nama_crisp == '' || $nilai == '')
        print_msg("Field bertanda * tidak boleh kosong!");
    else {
        $db->query("UPDATE tb_nilai_kriteria SET kode_kriteria='$kode_kriteria', nama_crisp='$nama_crisp', nilai='$nilai' WHERE kode_crisp='$_GET[ID]'");
        redirect_js("index.php?m=nilai_kriteria&kode_kriteria");
    }
} else if ($act == 'nilai_kriteria_hapus') {
    $db->query("DELETE FROM tb_nilai_kriteria WHERE kode_crisp='$_GET[ID]'");
    header("location:index.php?m=nilai_kriteria&kode_kriteria");
}

/** RELASI ALTERNATIF */
else if ($act == 'nilai_alternatif_ubah') {
    foreach ($_POST['kode_crisp'] as $key => $val) {
        $db->query("UPDATE tb_nilai_alternatif SET kode_crisp='$val' WHERE ID='$key'");
    }
    header("location:index.php?m=nilai_alternatif");
}
