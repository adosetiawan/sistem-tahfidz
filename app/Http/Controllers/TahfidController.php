<?php

namespace App\Http\Controllers;

use App\Models\Tahfid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TahfidController extends Controller
{
    public function index()
    {
        $items =  DB::table('santri')->select('nama_lengkap','santri.id AS santri_id')->join('program_tahfidz', function ($join) {
            $join->on('santri.program_id', '=', 'program_tahfidz.id');
            })->get();
        return view('tahfid/home',[
            'items' => $items
        ]);
    }

    public function detail(Request $request)
    {
        $req = $request->all();
        $items =  DB::table('tahfid')->join('santri', function ($join) use ($req) {
                $join->on('tahfid.santri_id', '=', 'santri.id')
                ->where('santri.id', '=', $req['id']);
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
        return redirect()->route('tahfid.index');
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