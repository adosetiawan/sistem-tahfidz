<?php

namespace App\Http\Controllers;

use App\Models\Tahfid;
use App\Models\Santri;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardsantriController extends Controller
{
    public function index()
    {
        $userinfo = Auth::user();
           // $pengajarkelas = Pengajar::select('kelas_id')->where('user_id', $userinfo->id)->first()->kelas_id;
        //dd($pengajarkelas->kelas_id);
        //exit;
    
        $absensi = Santri::select('kehadiran', 'nama_lengkap', 'kategori', 'jml_halaman', 'skor_hafalan', 'tanggal', 'tanggal')
            ->join('tahfid', function ($join) {
                $join->on('tahfid.santri_id', '=', 'santri.id');
            })->where('santri.user_id',$userinfo->id)->limit(7)->get();
        $hafalan = Santri::select(
            'nama_lengkap',
            'program_nama',
            'program_satuan',
            'program_durasi',
            'tanggal_daftar',
            'nama_lengkap',
            DB::raw('(SELECT IFNULL(sum(jml_halaman),0) FROM tahfid WHERE tahfid.santri_id = santri.id ) as totalPoin')
        )
            ->join('program_tahfidz', function ($join) {
                $join->on('program_tahfidz.id', '=', 'santri.program_id');
            })->where('santri.user_id',$userinfo->id)->limit(4)->get();
        $nama = Auth::user()->username;
        return view('dashboardsantri/home', [
            'nama' => $nama,
            'absensi' => $absensi,
            'hafalan' => $hafalan
        ]);
    }

    public function detail(Request $request, $id)
    {
        $items =  DB::table('tahfid')->join('santri', function ($join) use ($id) {
            $join->on('tahfid.santri_id', '=', 'santri.id')
                ->where('santri.id', '=', $id);
        })->get();
        return view('dashboardsantri/detail', [
            'items' => $items
        ]);
    }

    public function create()
    {
        return view('tahfid.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $this->validate($request, [
            'santri_id' => 'required',
            'kehadiran' => 'required',
            'kategori' => 'required',
            'halaman' => 'required',
            'halaman' => 'required',
        ], [
            'required' => ':attribute Harus di isi!!'
        ]);
        DB::table('tahfid')->insert([
            'santri_id' => $data['santri_id'],
            'kehadiran' => $data['kehadiran'],
            'kategori' => $data['kategori'],
            'jml_halaman' => $data['halaman'],
            'skor_hafalan' => $data['halaman'],
            'tanggal' => date('Y-m-d H:i:s'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        return redirect()->route('dashboardsantri.index')->with(['success' => 'Poin berhasil ditambahkan']);
    }

    public function edit($id)
    {
        $items = DB::table('tahfid')->where('id', $id)->get(); //Santri::findOrFail($id);
        return view('dashboardsantri.edit', compact('items'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $item = Tahfid::findOrFail($id);
        $item->update($data);
        return redirect()->route('dashboardsantri.index');
    }

    public function destroy($id)
    {
        $item = Tahfid::findOrFail($id);
        $item->delete();
        return redirect()->route('dashboardsantri.index');
    }
    public function absensisantri(Request $request)
    {
        $userinfo = Auth::user();
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
            })->where('santri.user_id', '=', $userinfo->id)->get();
        $kelas = Kelas::select('*')->get();
        return view('laporan/absensantri', [
            'kelas' => $kelas,
            'hafalan' => $hafalan,
        ]);
    }
}
