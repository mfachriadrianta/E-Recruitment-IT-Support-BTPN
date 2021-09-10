<h1>Nilai Crisp</h1>
<table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Kriteria</th>
            <th>Nama</th>
            <th>Nilai</th>
        </tr>
    </thead>
    <?php
    $q = esc_field($_GET['q']);
    $rows = $db->get_results("SELECT * FROM tb_nilai_kriteria c INNER JOIN tb_kriteria k ON k.kode_kriteria=c.kode_kriteria WHERE k.nama_kriteria LIKE '%$q%' ORDER BY k.kode_kriteria, nilai");
    $no = 1;
    foreach ($rows as $row) : ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $row->nama_kriteria ?></td>
            <td><?= $row->nama_crisp ?></td>
            <td><?= $row->nilai ?></td>
        </tr>
    <?php endforeach ?>
</table>