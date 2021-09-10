<div class="page-header">
    <h1>Alternative</h1>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <form class="form-inline">
            <input type="hidden" name="m" value="alternatif" />
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Pencarian. . ." name="q" value="<?= $_GET['q'] ?>" />
            </div>
            <div class="form-group">
                <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Refresh</button>
            </div>
            <div class="form-group">
                <a class="btn btn-primary" href="?m=alternatif_tambah"><span class="glyphicon glyphicon-plus"></span> Adding</a>
            </div>
            <div class="form-group">
                <a class="btn btn-default" target="_blank" href="cetak.php?<?= $_SERVER['QUERY_STRING'] ?>"><span class="glyphicon glyphicon-print"></span> Print</a>
            </div>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="text-align:center;" class="title-input-type-primary-seruput col-sm-1">No</th>
                    <th style="text-align:center;" class="title-input-type-primary-seruput col-sm-1">Code</th>
                    <th style="text-align:left;" class="title-input-type-primary-seruput">Name Alternative</th>
                    <th style="text-align:center;" class="title-input-type-primary-seruput col-sm-1">Gender</th>
                    <th style="text-align:center;" class="title-input-type-primary-seruput col-sm-3">Options</th>
                </tr>
            </thead>
            <?php
            $q = esc_field($_GET['q']);
            $rows = $db->get_results("SELECT * FROM tb_alternatif 
                WHERE 
                    kode_alternatif LIKE '%$q%'
                    OR nama_alternatif LIKE '%$q%'
                    OR keterangan LIKE '%$q%'  
                ORDER BY kode_alternatif");
            $no = 0;
            foreach ($rows as $row) : ?>
                <tr>
                    <td style="text-align:center;"><?= ++$no ?></td>
                    <td style="text-align:center;"><?= $row->kode_alternatif ?></td>
                    <td ><?= $row->nama_alternatif ?></td>
                    <td style="text-align:center;"><?= $row->keterangan ?></td>
                    <td style="text-align:center;">
                        <a class="btn btn-primary" href="?m=alternatif_ubah&ID=<?= $row->kode_alternatif ?>"><span class="glyphicon glyphicon-edit"></span> Change</a>
                        <a class="btn btn-success" href="aksi.php?act=alternatif_hapus&ID=<?= $row->kode_alternatif ?>" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</div>