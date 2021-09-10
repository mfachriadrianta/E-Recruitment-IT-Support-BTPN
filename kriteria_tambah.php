<div class="page-header">
    <h1>Add Criteria</h1>
</div>

<div class="row">
    <div class="col-sm-6">
        <?php if ($_POST) include 'aksi.php' ?>
        <form method="post">
            <div class="form-group content-sign-in">
                        <label class="title-input-type-primary-seruput" required autofocus>Code</label>
                        <input type="text" name="kode_kriteria" value="<?= set_value('kode_kriteria', kode_oto('kode_kriteria', 'tb_kriteria', 'C', 2)) ?>"class="form-control input-type-primary-seruput"
                        required autofocus></input>
                </div>
            <div class="form-group content-sign-in">
                        <label class="title-input-type-primary-seruput" required autofocus>Name Criteria</label>
                        <input type="text" name="nama_kriteria" value="<?= set_value('nama_kriteria') ?>" class="form-control input-type-primary-seruput"
                        required autofocus></input>
                </div>   
            <div class="form-group content-sign-in">
                        <label class="title-input-type-primary-seruput" required autofocus>Type</label>
                        <select class="form-control input-type-primary-seruput" name="atribut">
                        <?= get_atribut_option(set_value('atribut')) ?>
                </select>
                </div>      
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Save</button>
                <a class="btn btn-success" href="?m=kriteria"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
            </div>
        </form>
    </div>
</div>