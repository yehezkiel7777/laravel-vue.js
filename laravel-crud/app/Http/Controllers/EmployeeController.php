<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(){

        $data = Employee::orderBy('id', 'asc')->get();
        return view('datapegawai',compact('data'));
    }

    public function tambahpegawai(){
        return view('tambahdata');
    }

     public function insertdata(Request $request){
    // dd($request->all());
    $nama = $request->input('nama'); // Mendapatkan nilai input 'nama' dari request
    $data = Employee::create($request->all());
    if($request->hasFile('foto')){
        $request->file('foto')->move('fotopegawai/', $request->file('foto')->getClientOriginalName());
        $data->foto = $request-> file('foto')->getClientOriginalName();
        $data->save();
    }
    return redirect()->route('pegawai')->with('success', 'Data "' . $nama . '" Berhasil Di Tambahkan');
    }

    public function tampilkandata($id){
        
        $data = Employee::find($id);
        // dd($data);

        return view('tampildata', compact('data'));
    }

    public function updatedata(Request $request, $id){
        
        $data = Employee::find($id);
        $nama = $request->input('nama'); // Mendapatkan nilai input 'nama' dari request
        $data->update($request->all());
        return redirect()->route('pegawai')->with('success', 'Data "' . $nama . '" Berhasil Di Update');
    }

    public function delete($id){
        
        $data = Employee::find($id);
        $nama = $data->nama; // Mendapatkan nilai input 'nama' dari request
        $data->delete();
        return redirect()->route('pegawai')->with('success', 'Data "' . $nama . '" Berhasil Di Hapus');
    }

}
