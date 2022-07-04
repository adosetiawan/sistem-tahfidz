<?php

namespace App\Http\Controllers;

use App\Models\Presensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PresensiController extends Controller
{
    public function index()
    {
        $presensi = DB::table('presensi')->join('pengajar', function ($join) {
            $join->on('pengajar.id', '=', 'presensi.pengajar_id');
            })->get();

        return view('presensi/home',[
            'presensi' => $presensi
        ]);
    }

    public function create(){
        $pengajar = DB::table('pengajar')->get();
        return view('presensi.create',[
            'pengajar' => $pengajar
        ]);
    }
    
    public function store(Request $request){
        $this->validate($request,[
            'tanggal' => 'required',
            'pengajar_id' => 'required',
            'status' => 'required',
            'keterangan' => 'required',
        ],[
            'required'=>':attribute Harus di isi!!'
        ]);
    
        Presensi::insert([
            'tanggal'=> date('Y-m-d H:i:s',strtotime($request->tanggal)),
            'pengajar_id'=> (int)$request->pengajar_id,
            'kehadiran'=> $request->status,
            'keterangan'=> $request->keterangan,
        ]);
        return redirect()->route('presensi.index');
    }

    public function edit($id){
        $items = DB::table('presensi')->where('id',$id)->get(); //Santri::findOrFail($id);
        return view('presensi.edit', compact('items'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $item = Presensi::findOrFail($id);
        $item->update($data);
        return redirect()->route('presensi.index');
    }

    public function destroy($id){
        $item = presensi::findOrFail($id);
        $item->delete();
        return redirect()->route('presensi.index');
    }
}
