<?php

namespace App\Http\Controllers;

use App\Models\Pengajar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class PengajarController extends Controller
{
    public function index()
    {
        $items = Pengajar::select(
            'pengajar.id',
            'nama',
            'jenis_kelamin',
            'alamat_lengkap',
            'email',
        )->join('user',function($join){
            $join->on('user.id','=','pengajar.user_id');
        })->get();
        return view('pengajar/home',[
            'items' => $items
        ]);
    }

    public function create(Request $request){
        $kelas = DB::table('kelas')->get();
        return view('pengajar.create',[
                'kelas' => $kelas
            ]
        );
    }
    
    public function store(Request $request){
        // dd($request->all());
        // exit;
        $this->validate($request,[
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'alamat_lengkap' => 'required',
            'email' => 'required',
            'level' => 'required',
            'username' => 'required',
            'password' => 'required',
        ],[
            'required'=>':attribute Harus di isi!!'
        ]);
        $id = User::insertGetId([
            'email' => $request->email,
            'level' => 'pengajar',
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);
       
        if($id){
            Pengajar::insert([
                'nama' => $request->nama,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tanggal_lahir' => $request->tanggal_lahir,
                'tempat_lahir' => $request->tempat_lahir,
                'alamat_lengkap' => $request->alamat_lengkap,
                'kelas_id' => $request->kelas_id,
                'user_id' => $id,
            ]);
        }
        return redirect()->route('pengajar.index')->with(['success'=>'pengajar berhasil disimpan']);
    }

    public function edit($id){
       
       $items = Pengajar::select(
                'pengajar.id AS id',
                'nama',
                'jenis_kelamin',
                'alamat_lengkap',
                'tempat_lahir',
                'tanggal_lahir',
                'level',
                'email',
            )->join('user',function($join) use ($id){
                $join->on('user.id','=','pengajar.user_id')->where('pengajar.id','=',$id);
            })->first();
        return view('pengajar.edit', compact('items'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama'=>'required',
            'jenis_kelamin'=>'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'alamat_lengkap' => 'required',
        ],[
            'required'=>':attribute Harus di isi!!'
        ]);
        $item = Pengajar::findOrFail($id);
        $item->update([
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            'tempat_lahir' => $request->tempat_lahir,
            'alamat_lengkap' => $request->alamat_lengkap,
        ]);
        return redirect()->route('pengajar.index')->with(['success'=>'pengajar berhasil diupdate']);;
    }

    public function delete($id){
        $item = pengajar::findOrFail($id);
        $item->delete();
        return redirect()->route('pengajar.index')->with(['success'=>'pengajar berhasil dihapus']);;
    }
    
}
