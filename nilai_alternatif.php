<div class="page-header">
    <h1>Value Weight Alternative</h1>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <form class="form-inline">
            <input type="hidden" name="m" value="nilai_alternatif" />
            <div class="form-group">
                <input class="form-control" type="text" name="q" value="<?= $_GET['q'] ?>" placeholder="Pencarian..." />
            </div>
            <div class="form-group">
                <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Refresh</a>
            </div>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr> 
                    <th style="text-align:center;" class="title-input-type-primary-seruput">Code</th>
                    <th style="text-align:left;" class="title-input-type-primary-seruput col-sm-2">Name Alternative</th>
                    <?php
                
                    $rows = $db->get_results("SELECT nama_kriteria FROM tb_kriteria");
                    foreach ($rows as $row) {
                        echo "<th>$row->nama_kriteria</th>";
                    }
                    ?>
                    <th style="text-align:center;" class="title-input-type-primary-seruput col-sm-1">Options</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $q = esc_field($_GET['q']);
                $rows = $db->get_results("SELECT * FROM tb_alternatif 
                WHERE 
                    kode_alternatif LIKE '%$q%'
                    OR nama_alternatif LIKE '%$q%'
                    OR keterangan LIKE '%$q%'  
                ORDER BY kode_alternatif");
                $rel_alternatif = get_rel_alternatif();

                foreach ($rows as $row) : ?>
                    <tr>
                        <td style="text-align:center;"><?= $row->kode_alternatif ?></td>
                        <td style="text-align:left;"><?= $row->nama_alternatif; ?></td>
                        <?php foreach ($rel_alternatif[$row->kode_alternatif] as $k => $v) : ?>
                            <td style="text-align:center;"><?= $CRIPS[$v]->nama_crisp ?></td>
                        <?php endforeach ?>
                        <td style="text-align:center;">
                            <a class="btn btn-primary" href="?m=nilai_alternatif_ubah&ID=<?= $row->kode_alternatif ?>"><span class="glyphicon glyphicon-edit"></span> Change</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>