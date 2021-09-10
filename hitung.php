<div class="page-header">
    <h1>Calculation of Method Preference Selection Index</h1>
</div>
<?php
$c = $db->get_results("SELECT * FROM tb_nilai_alternatif WHERE kode_crisp NOT IN (SELECT kode_crisp FROM tb_nilai_kriteria)");
if (!$ALTERNATIF || !$KRITERIA) :
    echo "It seems that you have not set the alternatives and criteria. Please add at least 3 alternatives and 3 criteria.";
elseif ($c) :
    echo "It seems that you have not set an alternative value. Please set the menu <strong>Value Alternative</strong>.";
else :
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
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title  title-input-type-primary-seruput">Konversi Data Alternatif</h3>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="text-align:center;" class="title-input-type-primary-seruput">Code</th>
                        <th style="text-align:center;" class="title-input-type-primary-seruput col-sm-1">Name</th>
                        <?php foreach ($KRITERIA as $key => $val) : ?>
                            <th style="text-align:center;" class="title-input-type-primary-seruput"><?= $val->nama_kriteria ?></th>
                        <?php endforeach ?>
                    </tr>
                </thead>
                <?php foreach ($rel_alternatif as $key => $value) : ?>
                    <tr>
                        <td style="text-align:center;"><?= $key ?></td>
                        <td style="text-align:center;"><?= $ALTERNATIF[$key] ?></td>
                        <?php foreach ($value as $k => $v) : ?>
                            <td style="text-align:center;"><?= $CRIPS[$v]->nama_crisp ?></td>
                        <?php endforeach ?>
                    </tr>
                <?php endforeach ?>
            </table>
        </div>
    </div>

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title title-input-type-primary-seruput">Matriks (x<sub>ij</sub>)</h3>
        </div>
        <table class="table table-bordered ">
            <thead>
                <tr>
                    <th style="text-align:center;" class="title-input-type-primary-seruput col-sm-1">Code</th>
                    <?php foreach ($KRITERIA as $key => $val) : ?>
                        <th style="text-align:center;" class="title-input-type-primary-seruput col-sm-1"><?= $key ?></th>
                    <?php endforeach ?>
            </thead>
            <?php
            $no = 1;
            foreach ($rel_alternatif as $key => $value) : ?>
                <tr>
                    <td style="text-align:center;"><?= $key ?></td>
                    <?php foreach ($value as $k => $v) : ?>
                        <td style="text-align:center;"><?= $CRIPS[$v]->nilai ?></td>
                    <?php endforeach ?>
                </tr>
            <?php endforeach ?>
            <tfoot>
                <tr>
                    <td style="text-align:center;" class="title-input-type-primary-seruput">Min</td>
                    <?php foreach ($psi->minmax as $key => $val) : ?>
                        <td style="text-align:center;" ><code><?= $val['min'] ?></code></td>
                    <?php endforeach ?>
                </tr>
                <tr>
                    <td style="text-align:center;" class="title-input-type-primary-seruput">Max</td>
                    <?php foreach ($psi->minmax as $key => $val) : ?>
                        <td style="text-align:center;"  class="title-input-type-primary-seruput"><code><?= $val['max'] ?></code></td>
                    <?php endforeach ?>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title title-input-type-primary-seruput">Normalisasi (R<sub>ij</sub>) <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
</svg> Matriks (R<sub>ij</sub>)</h3>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="text-align:center;" class="title-input-type-primary-seruput">Code</th>
                        <?php foreach ($KRITERIA as $key => $val) : ?>
                            <th style="text-align:center;" class="title-input-type-primary-seruput"><?= $key ?> (<code><?= $val->atribut ?></code>)</th>
                        <?php endforeach ?>
                    </tr>
                </thead>
                <?php foreach ($psi->normal as $key => $val) : ?>
                    <tr>
                        <td style="text-align:center;"><?= $key ?></td>
                        <?php foreach ($val as $k => $v) : ?>
                            <td style="text-align:center;"><?= round($v, 4) ?></td>
                        <?php endforeach ?>
                    </tr>
                <?php endforeach ?>
                <tr>
                    <td style="text-align:center;" class="title-input-type-primary-seruput">Mean (N)</td>
                    <?php foreach ($psi->mean as $key => $val) : ?>
                        <td style="text-align:center;"><code><?= round($val, 4) ?></code></td>
                    <?php endforeach ?>
                </tr>
            </table>
        </div>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title title-input-type-primary-seruput">Variaton Preference</h3>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="text-align:center;" class="title-input-type-primary-seruput">Code</th>
                        <?php foreach ($KRITERIA as $key => $val) : ?>
                            <th style="text-align:center;" class="title-input-type-primary-seruput"><?= $key ?> (<code><?= $val->atribut ?></code>)</th>
                        <?php endforeach ?>
                    </tr>
                </thead>
                <?php foreach ($psi->phi as $key => $val) : ?>
                    <tr>
                        <td style="text-align:center;"><?= $key ?></td>
                        <?php foreach ($val as $k => $v) : ?>
                            <td style="text-align:center;"><?= round($v, 4) ?></td>
                        <?php endforeach ?>
                    </tr>
                <?php endforeach ?>
                <tfoot>
                    <tr>
                        <td style="text-align:center;" class="title-input-type-primary-seruput">Total (&Phi;<sub>j</sub>)</td>
                        <?php foreach ($psi->phi_total as $key => $val) : ?>
                            <td style="text-align:center;"><code><?= round($val, 4) ?></code></td>
                        <?php endforeach ?>
                    </tr>
                    <tr>
                        <td style="text-align:center;" class="title-input-type-primary-seruput">Value in preference (&Omega;<sub>j</sub>)</td>
                        <?php foreach ($psi->penyimpangan as $key => $val) : ?>
                            <td style="text-align:center;"><code><?= round($val, 4) ?></code></td>
                        <?php endforeach ?>
                    </tr>
                    <tr>
                        <td style="text-align:center;" class="title-input-type-primary-seruput">Criteria Weight(&omega;<sub>j</sub>)</td>
                        <?php foreach ($psi->bobot as $key => $val) : ?>
                            <td style="text-align:center;"><code><?= round($val, 4) ?></code></td>
                        <?php endforeach ?>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title title-input-type-primary-seruput">Calculation Preference Selection Index (&theta;<sub>i</sub>)</h3>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="text-align:center;" class="title-input-type-primary-seruput">Code</th>
                        <?php foreach ($KRITERIA as $key => $val) : ?>
                            <th style="text-align:center;" class="title-input-type-primary-seruput"><?= $key ?> (<code><?= $val->atribut ?></code>)</th>
                        <?php endforeach ?>
                    </tr>
                </thead>
                <?php foreach ($psi->terbobot as $key => $val) : ?>
                    <tr>
                        <td style="text-align:center;"><?= $key ?></td>
                        <?php foreach ($val as $k => $v) : ?>
                            <td style="text-align:center;"><?= round($v, 4) ?></td>
                        <?php endforeach ?>
                    </tr>
                <?php endforeach ?>
            </table>
        </div>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title title-input-type-primary-seruput">Rangking</h3>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="text-align:center;" class="title-input-type-primary-seruput">No</th>
                        <th style="text-align:center;" class="title-input-type-primary-seruput">Code</th>
                        <th style="text-align:left;" class="title-input-type-primary-seruput">Name Alternative</th>
                        <th style="text-align:center;" class="title-input-type-primary-seruput">Value (&theta;<sub>i</sub>)</th>
                </thead>
                <?php
                $rank = get_rank($psi->total);
                // echo '<pre>' . print_r($psi->total, 1) . '</pre>';
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
        <div class="panel-body">
            <a style="posistion:center;" class="btn btn-success" target="_blank" href="cetak.php?m=hitung"><span class="glyphicon glyphicon-print"></span> Print</a>
        </div>
    </div>
<?php endif ?>