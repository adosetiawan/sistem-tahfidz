<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class SantriController extends Controller
{
    // public function __construct()
    // {
    //     //$this->middleware('auth');
    // }

    public function index()
    {
        $items = DB::table('santri')->join('program_tahfidz',function($join){
            $join->on('program_tahfidz.id','=','santri.program_id');
        })->join('user',function($join){
            $join->on('user.id','=','santri.user_id');
        })->join('kelas',function($join){
            $join->on('kelas.id','=','santri.kelas_id');
        })->get();
        return view('santri/home',[
            'items' => $items
        ]);
    }

    public function create(){
        $program = DB::table('program_tahfidz')->get();
        $kelas = DB::table('kelas')->get();
        return view('santri.create',[
            'program' => $program,
            'kelas' => $kelas
        ]);
    }
    
    public function store(Request $request){
        //$data = $request->all();
        // echo '<pre>';
        // print_r($request->input('username'));
        // echo '</pre>';
        // exit;
        // 'dd'=>$data['password'],
        // 'jenis_kelamin'=>$data['no_telpon'],
        $saveUser = array(
            'username' => $request->input('username'),  
            'password' => Hash::make($request->input('password')),
            'email' => $request->input('email'),
            'level' => 'santri'
        );
        $id = DB::table('user')->insertGetId($saveUser);
        if($id){
            $saveSantri = array(
                'nama_lengkap' => $request->input('nama_lengkap'),  
                'tempat_lahir' => $request->input('tempat_lahir'),  
                'tanggal_lahir' => $request->input('tanggal_lahir'),  
                'alamat_lengkap' => $request->input('alamat_lengkap'),  
                'jenis_kelamin' => $request->input('jenis_kelamin'),  
                'jenjang_sekolah' => $request->input('jenjang_sekolah'),  
                'nama_ibu' => $request->input('nama_ibu'),  
                'nama_ayah' => $request->input('nama_ayah'),  
                'no_telp_ayah' => $request->input('no_telp_ayah'),  
                'program_id' => $request->input('program_id'),   
                'status' => $request->input('status'),  
                'user_id' => $id,
                'kelas_id' =>  $request->input('kelas_id')
            );
            DB::table('santri')->insert($saveSantri);
        }
        // print_r($data);
        // exit;
        // Santri::create($data);
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
