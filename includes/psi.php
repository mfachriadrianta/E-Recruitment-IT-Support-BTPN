<?php
class PSI
{
    public $rel_alternatif;
    public $atribut;

    public $minmax;
    public $normal;
    public $mean;
    public $phi;
    public $phi_total;
    public $penyimpangan;
    public $bobot;
    public $terbobot;
    public $total;

    function __construct($rel_alternatif, $atribut)
    {
        $this->rel_alternatif = $rel_alternatif;
        $this->atribut = $atribut;
        $this->normal();
        $this->mean();
        $this->phi();
        $this->phi_total();
        $this->penyimpangan();
        $this->bobot();
        $this->terbobot();
        $this->total();
    }
    function total()
    {
        foreach ($this->terbobot as $key => $val) {
            $this->total[$key] = array_sum($val);
        }
    }
    function terbobot()
    {
        foreach ($this->normal as $key => $val) {
            foreach ($val as $k => $v) {
                $this->terbobot[$key][$k] = $v * $this->bobot[$k];
            }
        }
    }
    function bobot()
    {
        foreach ($this->penyimpangan as $key => $val) {
            $this->bobot[$key] = $val / array_sum($this->penyimpangan);
        }
    }
    function penyimpangan()
    {
        foreach ($this->phi_total as $key => $val) {
            $this->penyimpangan[$key] = 1 - $val;
        }
    }
    function phi_total()
    {
        $arr = array();
        foreach ($this->phi as $key => $val) {
            foreach ($val as $k => $v) {
                $arr[$k][$key] = $v;
            }
        }
        foreach ($arr as $key => $val) {
            $this->phi_total[$key] = array_sum($val);
        }
    }
    function phi()
    {
        foreach ($this->normal as $key => $val) {
            foreach ($val as $k => $v) {
                $this->phi[$key][$k] = pow($v - $this->mean[$k], 2);
            }
        }
    }
    function mean()
    {
        $arr = array();
        foreach ($this->normal as $key => $val) {
            foreach ($val as $k => $v) {
                $arr[$k][$key] = $v;
            }
        }
        foreach ($arr as $key => $val) {
            $this->mean[$key] = array_sum($val) / count($val);
        }
    }
    function normal()
    {
        $arr = array();
        foreach ($this->rel_alternatif as $key => $val) {
            $temp = array();
            foreach ($val as $k => $v) {
                $arr[$k][$key] = $v;
            }
        }
        $this->minmax = array();
        foreach ($arr as $key => $val) {
            $this->minmax[$key]['min'] = min($val);
            $this->minmax[$key]['max'] = max($val);
        }
        $this->normal = array();
        foreach ($this->rel_alternatif as $key => $val) {
            foreach ($val as $k => $v) {
                if (strtolower($this->atribut[$k]) == 'benefit')
                    $this->normal[$key][$k] = $v / $this->minmax[$k]['max'];
                else
                    $this->normal[$key][$k] = $this->minmax[$k]['min'] / $v;
            }
        }
    }
}
