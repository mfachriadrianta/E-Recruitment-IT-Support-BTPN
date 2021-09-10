<div class="page-header">
    <h1><p class="title-form">Criteria</p></h1>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <form class="form-inline">
            <input type="hidden" name="m" value="kriteria" />
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Pencarian. . ." name="q" value="<?= $_GET['q'] ?>" />
            </div>
            <div class="form-group">
                <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span>Refresh</button>
            </div>
            <div class="form-group">
                <a class="btn btn-primary" href="?m=kriteria_tambah"><span class="glyphicon glyphicon-plus"></span> Adding</a>
            </div>
            <div class="form-group">
                <a class="btn btn-default" target="_blank" href="cetak.php?<?= $_SERVER['QUERY_STRING'] ?>"><span class="glyphicon glyphicon-print"></span> Print</a>
            </div>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered  table-responsive">
            <thead>
                <tr >
                    <th style="text-align:center;" class="title-input-type-primary-seruput col-sm-1">No</th>
                    <th style="text-align:center;" class="title-input-type-primary-seruput col-sm-1">Code</th>
                    <th style="text-align:left;" class="title-input-type-primary-seruput">Name Criteria</th>
                    <th style="text-align:center;" class="title-input-type-primary-seruput col-sm-1">Type</th>
                    <th style="text-align:center;" class="title-input-type-primary-seruput col-sm-3">Options</th>
                </tr>
            </thead>
            <?php
            $q = esc_field($_GET['q']);
            $rows = $db->get_results("SELECT * FROM tb_kriteria WHERE nama_kriteria LIKE '%$q%' ORDER BY kode_kriteria");
            $no = 0;
            foreach ($rows as $row) : ?>
                <tr>
                    <td style="text-align:center;"><?= ++$no ?></td>
                    <td style="text-align:center;"><?= $row->kode_kriteria ?></td>
                    <td ><?= $row->nama_kriteria ?></td>
                    <td style="text-align:center;"><?= $row->atribut ?></td>
                    <td style="text-align:center;" class="table-responsive">
                        <a class="btn btn-primary" href="?m=kriteria_ubah&ID=<?= $row->kode_kriteria ?>"><span class="glyphicon glyphicon-edit"></span> Change</a>
                        <a class="btn btn-success" href="aksi.php?act=kriteria_hapus&ID=<?= $row->kode_kriteria ?>" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</div>