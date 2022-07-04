<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Santri;
use App\Models\Presensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $hafalan = Santri::select('kehadiran','nama_lengkap', 'kategori', 'jml_halaman', 'skor_hafalan', 'tanggal', 'tanggal')
            ->join('tahfid', function ($join) use ($request) {
                $join->on('tahfid.santri_id', '=', 'santri.id');
            })->when($request->tanggal_mulai, function ($item) use ($request) {
                return $item->whereDate('tanggal', '>=', $request->tanggal_mulai);
            })->when($request->tanggal_selesai, function ($item) use ($request) {
                return $item->whereDate('tanggal', '<=', $request->tanggal_selesai);
            })->when($request->kelas, function ($item) use ($request) {
                return $item->where('kelas_id', '=', $request->kelas);
            })->when($request->kategori, function ($item) use ($request) {
                return $item->where('kategori', '=', $request->kategori);
            })->get();
        $kelas = Kelas::select('*')->get();
        return view('laporan/home', [
            'kelas' => $kelas,
            'hafalan' => $hafalan,
        ]);
    }

    public function absensisantri(Request $request)
    {
        $hafalan = Santri::select('kehadiran','nama_lengkap', 'kategori', 'jml_halaman', 'skor_hafalan', 'tanggal', 'tanggal')
            ->join('tahfid', function ($join) use ($request) {
                $join->on('tahfid.santri_id', '=', 'santri.id');
            })->when($request->tanggal_mulai, function ($item) use ($request) {
                return $item->whereDate('tanggal', '>=', $request->tanggal_mulai);
            })->when($request->tanggal_selesai, function ($item) use ($request) {
                return $item->whereDate('tanggal', '<=', $request->tanggal_selesai);
            })->when($request->kelas, function ($item) use ($request) {
                return $item->where('kelas_id', '=', $request->kelas);
            })->when($request->kategori, function ($item) use ($request) {
                return $item->where('kategori', '=', $request->kategori);
            })->get();
        $kelas = Kelas::select('*')->get();
        return view('laporan/absensantri', [
            'kelas' => $kelas,
            'hafalan' => $hafalan,
        ]);
    }
    public function absensipengajar(Request $request)
    {
        $presensi = Presensi::join('pengajar', function ($join) {
                $join->on('pengajar.id', '=', 'presensi.pengajar_id');
            })->when($request->tanggal_mulai, function ($item) use ($request) {
                return $item->whereDate('tanggal', '>=', $request->tanggal_mulai);
            })->when($request->tanggal_selesai, function ($item) use ($request) {
                return $item->whereDate('tanggal', '<=', $request->tanggal_selesai);
            })->when($request->kehadiran, function ($item) use ($request) {
                return $item->where('kehadiran', '=', $request->kehadiran);
            })->get();

        return view('laporan/absensipengajar',[
            'presensi' => $presensi
        ]);
    }
    public function ketercapaiansantri(Request $request)
    {

        $hafalan = Santri::select('program_nama','program_satuan','program_durasi','tanggal_daftar','nama_lengkap',
        DB::raw('(SELECT IFNULL(sum(jml_halaman),0) FROM tahfid WHERE tahfid.santri_id = santri.id ) as totalPoin'))
            // ->join('tahfid', function ($join) use ($request) {
            //     $join->on('tahfid.santri_id', '=', 'santri.id');
            // })
            ->join('program_tahfidz',function($join){
                $join->on('program_tahfidz.id','=','santri.program_id');
            })->when($request->tanggal_mulai, function ($item) use ($request) {
                return $item->whereDate('tanggal', '>=', $request->tanggal_mulai);
            })->when($request->tanggal_selesai, function ($item) use ($request) {
                return $item->whereDate('tanggal', '<=', $request->tanggal_selesai);
            })->when($request->kelas, function ($item) use ($request) {
                return $item->where('kelas_id', '=', $request->kelas);
            })->when($request->kategori, function ($item) use ($request) {
                return $item->where('kategori', '=', $request->kategori);
            })->get();
        $kelas = Kelas::select('*')->get();
        return view('laporan/ketercapaiansantri',[
            'kelas' => $kelas,
            'hafalan' => $hafalan
        ]);
    }
}
