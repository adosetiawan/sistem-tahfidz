<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use App\Models\Tahfid;
use App\Models\Pengajar;
use App\Models\Kelas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    //
    public function index()
    {
        $begin = new \DateTime();
        $end = new \DateTime();
        $end->modify('+ 1 year');

        $daterange = new \DatePeriod($begin, new \DateInterval('P1M'), $end);
        $poinBulanan = array();
        foreach ($daterange as $date) {
            $poinBulanan[] = array('bulan' => $date->format('M'),
                'putra' => Tahfid::select(DB::raw('(IFNULL(SUM(skor_hafalan),0)) AS total'))->join('santri', function ($join) {
                    $join->on('santri.id', '=', 'tahfid.santri_id');
                })->where('jenis_kelamin', 'laki-laki')->whereMonth('tanggal', $date->format('m'))->first()->total,
                'putri' => Tahfid::select(DB::raw('(IFNULL(SUM(skor_hafalan),0)) AS total'))->join('santri', function ($join) {
                    $join->on('santri.id', '=', 'tahfid.santri_id');
                })->where(['jenis_kelamin' => 'perempuan'])->whereMonth('tanggal', $date->format('m'))->first()->total
            );
        }
        // $data['poinBulanan'] = json_encode($poinBulanan,JSON_PRETTY_PRINT);
        // dd($data['poinBulanan'] );
        // exit;
        $data['santri'] = array(
            'putra' =>  Santri::select(DB::raw('(COUNT(*)) AS total'))->where('jenis_kelamin', 'laki-laki')->first(),
            'putri' =>  Santri::select(DB::raw('(COUNT(*)) AS total'))->where('jenis_kelamin', 'perempuan')->first(),
            'putraputri' =>  Santri::select(DB::raw('(COUNT(*)) AS total'))->first(),
        );
        $data['pengajar'] = array(
            'putra' =>  Pengajar::select(DB::raw('(COUNT(*)) AS total'))->where('jenis_kelamin', 'laki-laki')->first(),
            'putri' =>  Pengajar::select(DB::raw('(COUNT(*)) AS total'))->where('jenis_kelamin', 'perempuan')->first(),
        );
        $data['nama'] = Auth::user()->username;
        $data['absensi'] = Santri::select('kehadiran', 'nama_lengkap', 'kategori', 'jml_halaman', 'skor_hafalan', 'tanggal', 'tanggal')
            ->join('tahfid', function ($join) {
                $join->on('tahfid.santri_id', '=', 'santri.id');
            })->limit(7)->get();
        $data['hafalan'] = Santri::select(
            'program_nama',
            'program_satuan',
            'program_durasi',
            'tanggal_daftar',
            'nama_lengkap',
            DB::raw('(SELECT IFNULL(sum(jml_halaman),0) FROM tahfid WHERE tahfid.santri_id = santri.id ) as totalPoin')
        )
            ->join('program_tahfidz', function ($join) {
                $join->on('program_tahfidz.id', '=', 'santri.program_id');
            })->limit(4)->get();
        return view('dashboard', $data);
    }

}
