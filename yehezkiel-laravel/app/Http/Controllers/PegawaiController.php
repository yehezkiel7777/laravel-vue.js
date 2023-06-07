<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;

use App\Exports\PegawaiExport;
use App\Imports\PegawaiImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pegawai = Pegawai::all();
        // dd($pegawai);
        return view('Halaman.Halaman-dua',compact('pegawai'));
    }

    public function pegawaiexport(){
        return Excel::download(new PegawaiExport,'pegawai.xlsx');
    }

    public function pegawaiimportexcel(Request $request){
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('DataPegawai', $namaFile);

        Excel::import(new PegawaiImport, public_path('/DataPegawai/'.$namaFile));
        return redirect('halaman-dua');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
