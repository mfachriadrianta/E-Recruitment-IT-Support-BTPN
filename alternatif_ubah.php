<?php
$row = $db->get_row("SELECT * FROM tb_alternatif WHERE kode_alternatif='$_GET[ID]'");
?>
<div class="page-header">
    <h1>Ubah Alternatif</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if ($_POST) include 'aksi.php' ?>
        <form method="post">
            <div class="form-group content-sign-in">
                        <label class="title-input-type-primary-seruput">Code</label>
                        <input class="form-control input-type-primary-seruput" type="text" name="kode_alternatif" readonly="readonly" value="<?= $row->kode_alternatif ?>"
                        required autofocus></input>
                </div>
            <div class="form-group content-sign-in">
                        <label class="title-input-type-primary-seruput">Name Alternative</label>
                        <input class="form-control input-type-primary-seruput" type="text" name="nama_alternatif" value="<?= set_value('nama_alternatif', $row->nama_alternatif) ?>"
                        required autofocus></input>
                </div>   
            <div class="form-group content-sign-in">
                        <label class="title-input-type-primary-seruput">Gender</label>
                        <select class="form-control input-type-primary-seruput" name="keterangan">
                        <option><?= set_value('keterangan', $row->keterangan) ?></option>
                        <option><?= set_value('keterangan') ?>Male</option>
                        <option><?= set_value('keterangan') ?>Female</option>
                </select>
                </div>      
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Save</button>
                <a class="btn btn-success" href="?m=alternatif"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
            </div>
        </form>
    </div>
</div>