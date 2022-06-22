<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class KelasController extends Controller
{
    public function index()
    {
        $items = DB::table('kelas')->get();
        return view('kelas/home',[
            'items' => $items
        ]);
    }

    public function create(){
        return view('kelas.create');
    }
    
    public function store(Request $request){
        $data = $request->all();
        print_r($data);
        exit;
        Santri::create($data);
        return redirect()->route('santri.index');
    }

    public function edit($id){
        $items = Santri::findOrFail($id);
        return view('Santri.edit', compact('items'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $item = Santri::findOrFail($id);
        $item->update($data);
        return redirect()->route('santri.index');
    }

    public function destroy($id){
        $item = Santri::findOrFail($id);
        $item->delete();
        return redirect()->route('santri.index');
    }
    
}
