<?php
function get_crisp_option($kode_kriteria, $selected = 0)
{
    global $CRIPS;
    $a = '';
    foreach ($CRIPS as $key => $val) {
        if ($val->kode_kriteria == $kode_kriteria) {
            if ($val->kode_crisp == $selected)
                $a .= "<option value='$val->kode_crisp' selected>$val->nama_crisp</option>";
            else
                $a .= "<option value='$val->kode_crisp'>$val->nama_crisp</option>";
        }
    }
    return $a;
}
$row = $db->get_row("SELECT * FROM tb_alternatif WHERE kode_alternatif='$_GET[ID]'");
?>
<div class="page-header">
    <h1>Change Value Weight &raquo; <small><?= $row->nama_alternatif ?></small></h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <form method="post" action="aksi.php?act=nilai_alternatif_ubah&ID=<?= $row->kode_alternatif ?>">
        <?php
            $rows = $db->get_results("SELECT ra.ID, k.kode_kriteria, k.nama_kriteria, ra.kode_crisp FROM tb_nilai_alternatif ra INNER JOIN tb_kriteria k ON k.kode_kriteria=ra.kode_kriteria  WHERE kode_alternatif='$_GET[ID]' ORDER BY kode_kriteria");
            foreach ($rows as $row) : ?>  
            <div class="form-group content-sign-in">
                        <label class="title-input-type-primary-seruput"><?= $row->nama_kriteria ?></label>
                        <select class="form-control input-type-primary-seruput" name="kode_crisp[<?= $row->ID ?>]"><?= get_crisp_option($row->kode_kriteria, $row->kode_crisp)?>
</select>
                </div>
                <?php endforeach ?>        
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Save</button>
                <a class="btn btn-success" href="?m=rel_alternatif"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
            </div>
        </form>
    </div>
</div>