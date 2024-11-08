<?php
namespace App;

use App\Models\Bulan;
use App\Models\MdHari;

class Helper
{
  public static function tanggal($tgl)
  {
    if ($tgl == null) {
      return '';
    }
    $bulan = date('n',strtotime($tgl));
    $b = Bulan::where('id',$bulan)->pluck('nama')->first();
    $t = date('j',strtotime($tgl));
    $ta = date('Y',strtotime($tgl));
    return $t.' '.$b.' '.$ta;
  }

  public static function haritanggal($tgl)
  {
    if ($tgl == null) {
      return '';
    }
    $hari = date('w',strtotime($tgl));
    $bulan = date('n',strtotime($tgl));
    $h = MdHari::where('id',$hari)->pluck('nama')->first();
    $b = Bulan::where('id',$bulan)->pluck('nama')->first();
    $t = date('j',strtotime($tgl));
    $ta = date('Y',strtotime($tgl));
    return $h.', '.$t.' '.$b.' '.$ta;
  }
}
?>


