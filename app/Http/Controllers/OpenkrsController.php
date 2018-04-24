<?php

namespace App\Http\Controllers;

use App\openkrs;
use Illuminate\Http\Request;

class OpenkrsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $openkrs = openkrs::find(1); 
      
        return view('view_openkrs', compact('openkrs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\krs  $krs
     * @return \Illuminate\Http\Response
     */
    public function show(krs $krs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\krs  $krs
     * @return \Illuminate\Http\Response
     */
    public function edit(id $id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\krs  $krs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, openkrs $openkrs)
    {
        $this->validate($request,[
            'semester' => 'required',
            'tahun_ajaran' => 'required',
            'status' => 'required'
        ]);
        $openkrs = openkrs::find(1);
        $openkrs->semester = $request->semester;
        $openkrs->tahun_ajaran = $request->tahun_ajaran;
        $openkrs->status = $request->status;
        $openkrs->save();
        return redirect('openkrs');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\krs  $krs
     * @return \Illuminate\Http\Response
     */
    public function destroy(krs $krs)
    {
        //
    }

    public function profil_admin()
    {
        $nip = '51002309212113';
        $nama = 'admin';
        $alamat = 'Indonesia';
        return view('view_profil_admin', compact('nip', 'nama', 'alamat'));
    }
}
