<div style="text-align: center;">
    <img src="images/logo_btpn_two.png" height="80" style="float: left;" />
    <b><th style="text-align:center;" class="title-input-type-primary-seruput col-sm-1"></th>LAPORAN RANGKING HASIL PERHITUNGAN</b><br />
    <b>E-RECRUITMENT UNTUK PEMILIHAN IT SUPPORT</b><br />
    <b>BANK BTPN WILAYAH SUMATERA 1</b><br />
    Jl. Putri Hijau No.20, Kesawan, Kec. Medan Bar., Kota Medan, Sumatera Utara 20235<br />
    Telepon: (061) 4151655</br>
</div>
<hr size="10" color="#00482F" border-color="#C4D900"></hr>

<?php
$rel_alternatif = get_rel_alternatif();
foreach ($rel_alternatif as $key => $val) {
    foreach ($val as $k => $v) {
        $data[$key][$k] = $CRIPS[$v]->nilai;
    }
}
foreach ($KRITERIA as $key => $val) {
    $atribut[$key] = $val->atribut;
}

$psi = new PSI($data, $atribut);
//echo '<pre>' . print_r($psi, 1) . '</pre>';
?>
<div class="table-responsive">
<table class="table table-bordered"  style="width: 100%">
    <thead>
        <tr>
            <th style="text-align:center;" class="title-input-type-primary-seruput col-sm-12">Rank</th>
            <th style="text-align:center;" class="title-input-type-primary-seruput col-sm-12">Code</th>
            <th style="text-align:left;" class="title-input-type-primary-seruput col-sm-12">Name</th>
            <th style="text-align:center;" class="title-input-type-primary-seruput col-sm-1">Total Value</th>
    </tr>    
    </thead>
    <?php
    $rank = get_rank($psi->total);
    foreach ($rank as $key => $val) : ?>
        <tr>
            <td style="text-align:center;"><?= $val ?></td>
            <td style="text-align:center;"><?= $key ?></td>
            <td style="text-align:left;"><?= $ALTERNATIF[$key] ?></td>
            <td style="text-align:center;"><?= round($psi->total[$key], 4) ?></td>
        </tr>
    <?php endforeach ?>
</table>
</div>
<hr size="10" color="#FF7E2D" border-color="#C4D900"></hr>
<p style="float: right; text-align: left;">
    Medan, <?= tgl_indo(date('Y-m-d')) ?><br />
    Manager Information Of Technology Support<br />
    Bank BTPN Wilayah Sumatera 1<br />
    <br />
    <br />
    <br />
    Muhammad Arif Munandar
</p>
