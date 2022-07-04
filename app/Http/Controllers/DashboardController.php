<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Santri;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function index(){
        $data['nama'] = Auth::user()->username;
        $data['absensi'] = Santri::select('kehadiran','nama_lengkap', 'kategori', 'jml_halaman', 'skor_hafalan', 'tanggal', 'tanggal')
            ->join('tahfid', function ($join) {
                $join->on('tahfid.santri_id', '=', 'santri.id');
            })->limit(7)->get();
        return view('dashboard',$data);
    }
}
