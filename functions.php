<?php
error_reporting(~E_NOTICE);
session_start();
include 'config.php';
include 'includes/db.php';
$db = new DB($config['server'], $config['username'], $config['password'], $config['database_name']);
include 'includes/paging.php';
include 'includes/psi.php';

$mod = $_GET['m'];
$act = $_GET['act'];

$rows = $db->get_results("SELECT kode_alternatif, nama_alternatif FROM tb_alternatif ORDER BY kode_alternatif");
foreach ($rows as $row) {
    $ALTERNATIF[$row->kode_alternatif] = $row->nama_alternatif;
}

$rows = $db->get_results("SELECT * FROM tb_nilai_kriteria ORDER BY kode_crisp");
foreach ($rows as $row) {
    $CRIPS[$row->kode_crisp] = $row;
}

$rows = $db->get_results("SELECT kode_kriteria, nama_kriteria, atribut FROM tb_kriteria ORDER BY kode_kriteria");
foreach ($rows as $row) {
    $KRITERIA[$row->kode_kriteria] = $row;
}

function get_rank($array)
{
    $data = $array;
    arsort($data);
    $no = 1;
    $rank = 0;
    $new = array();
    $temp = null;
    foreach ($data as $key => $val) {
        if ($temp == $val) {
        } else {
            $rank = $no;
        }
        $new[$key] = $rank;
        $temp = $val;
        $no++;
    }
    return $new;
}

function get_rel_alternatif()
{
    global $db;
    $rows = $db->get_results("SELECT * 
        FROM tb_nilai_alternatif 
        ORDER BY kode_alternatif, kode_kriteria");
    $data = array();
    foreach ($rows as $row) {
        $data[$row->kode_alternatif][$row->kode_kriteria] = $row->kode_crisp;
    }
    return $data;
}

function get_kriteria_option($selected = 0)
{
    global $KRITERIA;
    $a = '';
    foreach ($KRITERIA as $key => $val) {
        if ($key == $selected)
            $a .= "<option value='$key' selected>$val->nama_kriteria</option>";
        else
            $a .= "<option value='$key'>$val->nama_kriteria</option>";
    }
    return $a;
}

function get_atribut_option($selected = '')
{
    $atribut = array('benefit' => 'Benefit', 'cost' => 'Cost');
    $a = '';
    foreach ($atribut as $key => $val) {
        if ($selected == $key)
            $a .= "<option value='$key' selected>$val</option>";
        else
            $a .= "<option value='$key'>$val</option>";
    }
    return $a;
}

function kode_oto($field, $table, $prefix, $length)
{
    global $db;
    $var = $db->get_var("SELECT $field FROM $table WHERE $field REGEXP '{$prefix}[0-9]{{$length}}' ORDER BY $field DESC");
    if ($var) {
        return $prefix . substr(str_repeat('0', $length) . (substr($var, -$length) + 1), -$length);
    } else {
        return $prefix . str_repeat('0', $length - 1) . 1;
    }
}

function set_value($key = null, $default = null)
{
    global $_POST;
    if (isset($_POST[$key]))
        return $_POST[$key];

    if (isset($_GET[$key]))
        return $_GET[$key];

    return $default;
}

function esc_field($str)
{
    return addslashes($str);
}

function redirect_js($url)
{
    echo '<script type="text/javascript">window.location.replace("' . $url . '");</script>';
}

function alert($url)
{
    echo '<script type="text/javascript">alert("' . $url . '");</script>';
}

function print_msg($msg, $type = 'danger')
{
    echo ('<div class="alert alert-' . $type . ' alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $msg . '</div>');
}

function tgl_indo($date)
{
    $tanggal = explode('-', $date);

    $array_bulan = array(1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
    $bulan = $array_bulan[$tanggal[1] * 1];

    return $tanggal[2] . ' ' . $bulan . ' ' . $tanggal[0];
}
