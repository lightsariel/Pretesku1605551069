<?php

namespace App\Http\Controllers;

use App\mktawar;
use App\matakuliah;
use App\dosen;
use Illuminate\Http\Request;

class MktawarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tahun = $request->tahun;
        $semester = $request->semester;
        $mktawars = mktawar::all();
        if(!empty($tahun) && !empty($semester))
        $mktawars = mktawar::where([
            ['tahun_ajaran', '=', \Request::input('tahun_ajaran')],
            ['semester', '=', \Request::input('semester')]
        ])->get();
        else if(!empty($tahun))
        $mktawars = mktawar::where([
            ['tahun_ajaran', '=', \Request::input('tahun_ajaran')]
        ])->get();
        else if(!empty($semester))
        $mktawars = mktawar::where([
            ['semester', '=', \Request::input('semester')]
        ])->get(); 
        $matakuliah = matakuliah::all();
        $dosen = dosen::all();
        $tahuns = mktawar::groupBy('tahun_ajaran')->pluck('tahun_ajaran');
        return view('view_mktawar', compact('mktawars', 'matakuliah', 'dosen', 'tahuns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mktawars = mktawar::all();
        $matakuliahs = matakuliah::all();
        $dosens = dosen::all();
        return view('create_mktawar', compact('mktawars', 'matakuliahs', 'dosens'));
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
            'id_mk' => 'required',
            'id_dosenpengampu' => 'required',
            'kelas' => 'required',
            'semester' => 'required',
            'tahun_ajaran' => 'required'
        ]);
        
        $mktawar = new mktawar();
        $mktawar->id_mk = $request->id_mk;
        $mktawar->id_dosenpengampu = $request->id_dosenpengampu;
        $mktawar->kelas = $request->kelas;
        $mktawar->semester = $request->semester;
        $mktawar->tahun_ajaran = $request->tahun_ajaran;
        $mktawar->save();
        return redirect('mktawar');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\mktawar  $mktawar
     * @return \Illuminate\Http\Response
     */
    public function show(mktawar $mktawar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\mktawar  $mktawar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mktawar = mktawar::find($id);
        $matakuliahs = matakuliah::all();
        $dosens = dosen::all();
        return view('edit_mktawar', compact('mktawar', 'matakuliahs', 'dosens'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\mktawar  $mktawar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'id_mk' => 'required',
            'id_dosenpengampu' => 'required',
            'kelas' => 'required',
            'semester' => 'required',
            'tahun_ajaran' => 'required'
        ]);
        $mktawar = mktawar::find($id);
        $mktawar->id_mk = $request->id_mk;
        $mktawar->id_dosenpengampu = $request->id_dosenpengampu;
        $mktawar->kelas = $request->kelas;
        $mktawar->semester = $request->semester;
        $mktawar->tahun_ajaran = $request->tahun_ajaran;
        $mktawar->save();
        return redirect('mktawar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\mktawar  $mktawar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mktawar = mktawar::find($id);
        $mktawar->delete();
        return redirect('mktawar');
    }
}
