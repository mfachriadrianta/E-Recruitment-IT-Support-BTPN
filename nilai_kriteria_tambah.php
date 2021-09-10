<div class="page-header">
    <h1>Add Value</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if ($_POST) include 'aksi.php' ?>
        <form method="post">
            <div class="form-group content-sign-in">
                        <label class="title-input-type-primary-seruput">Criteria</label>
                        <select class="form-control input-type-primary-seruput"
                        name="kode_kriteria"><?= get_kriteria_option(set_value('kode_kriteria')) ?></select>
                </div>
            <div class="form-group content-sign-in">
                        <label class="title-input-type-primary-seruput">Asumption</label>
                        <input class="form-control input-type-primary-seruput" type="text" name="nama_crisp" value="<?= set_value('nama_crisp') ?>" 
                        required autofocus></input>
                </div>   
            <div class="form-group content-sign-in">
                        <label class="title-input-type-primary-seruput">Value</label>
                        <input class="form-control input-type-primary-seruput" type="text" name="nilai" value="<?= set_value('nilai') ?>"  required autofocus> 
                        </input>
                </div>      
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Save</button>
                <a class="btn btn-success" href="?m=crisp&kode_kriteria"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
            </div>
        </form>
    </div>
</div>