<?php

namespace App\Http\Controllers;

use App\Models\Tahfid;
use App\Models\Santri;
use App\Models\Pengajar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class TahfidController extends Controller
{
    public function index()
    {
        $userinfo = Auth::user();
        if($userinfo->level == 'pengajar'){
            $pengajarkelas = Pengajar::select('kelas_id')->where('user_id',$userinfo->id)->first()->kelas_id;
        }else{
            $pengajarkelas = null;
        }
        //dd($pengajarkelas->kelas_id);
        //exit;
        $items =  Santri::select('nama_lengkap','santri.id AS santri_id')->join('program_tahfidz', function ($join) {
                $join->on('santri.program_id', '=', 'program_tahfidz.id');
            })->join('kelas',function($join){
                $join->on('kelas.id','=','santri.kelas_id');
            })->join('user',function($join){
                $join->on('user.id','=','santri.user_id');
            })->when($pengajarkelas,function($where)use($pengajarkelas){
                $where->where('kelas.id','=',$pengajarkelas);
            })->get();
        return view('tahfid/home',[
            'items' => $items
        ]);
    }

    public function detail(Request $request,$id)
    {
        $items =  DB::table('tahfid')->join('santri', function ($join) use ($id) {
                $join->on('tahfid.santri_id', '=', 'santri.id')
                ->where('santri.id', '=', $id);
            })->get();
        return view('tahfid/detail',[
            'items' => $items
        ]);
    }

    public function create(){
        return view('tahfid.create');
    }
    
    public function store(Request $request){
        $data = $request->all();
        $this->validate($request,[
            'santri_id'=>'required',
            'kehadiran'=>'required',
            'kategori' => 'required',
            'halaman' => 'required',
            'halaman' => 'required',
        ],[
            'required'=>':attribute Harus di isi!!'
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
        return redirect()->route('tahfid.index')->with(['success'=>'Poin berhasil ditambahkan']);
    }

    public function edit($id){
        $items = DB::table('tahfid')->where('id',$id)->get(); //Santri::findOrFail($id);
        return view('tahfid.edit', compact('items'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $item = Tahfid::findOrFail($id);
        $item->update($data);
        return redirect()->route('tahfid.index');
    }

    public function destroy($id){
        $item = Tahfid::findOrFail($id);
        $item->delete();
        return redirect()->route('tahfid.index');
    }
}