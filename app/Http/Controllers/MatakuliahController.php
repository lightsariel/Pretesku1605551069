<?php

namespace App\Http\Controllers;

use App\matakuliah;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matakuliahs = matakuliah::all();
        return view('view_matakuliah', compact('matakuliahs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_matakuliah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'kode_mk' => 'required',
            'nama_mk' => 'required',
            'sks' => 'required'
        ]);
        
        $matakuliah = new matakuliah();
        $matakuliah->kode_mk = $request->kode_mk;
        $matakuliah->nama_mk = $request->nama_mk;
        $matakuliah->sks = $request->sks;
        $matakuliah->save();
        return redirect('matakuliah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\matakuliah  $matakuliah
     * @return \Illuminate\Http\Response
     */
    public function show(matakuliah $matakuliah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\matakuliah  $matakuliah
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $matakuliah = matakuliah::find($id);
        return view('edit_matakuliah', compact('matakuliah'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\matakuliah  $matakuliah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'kode_mk' => 'required',
            'nama_mk' => 'required',
            'sks' => 'required'
        ]);
        $matakuliah = matakuliah::find($id);
        $matakuliah->kode_mk = $request->kode_mk;
        $matakuliah->nama_mk = $request->nama_mk;
        $matakuliah->sks = $request->sks;
        $matakuliah->save();
        return redirect('matakuliah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\matakuliah  $matakuliah
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $matakuliah = matakuliah::find($id);
        $matakuliah->delete();
        return redirect('matakuliah');
    }
}
