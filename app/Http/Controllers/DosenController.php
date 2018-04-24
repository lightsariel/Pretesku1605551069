<?php

namespace App\Http\Controllers;

use Auth;
use App\dosen;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dosens = dosen::all();
        return view('view_dosen', compact('dosens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_dosen');
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
            'nip' => 'required',
            'nama' => 'required',
        ]);
        $user = new User();
        $user->username = $request->nip;
        $user->password = Hash::make($request->nip);
        $user->prev = 2; 
        $user->save();
        $dosen = new dosen();
        $dosen->nip = $request->nip;
        $dosen->nama = $request->nama;
        $dosen->save();
        return redirect('dosen');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function show(dosen $dosen)
    {
        //
    }

   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dosen = dosen::find($id);
        return view('edit_dosen', compact('dosen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nip' => 'required',
            'nama' => 'required'
        ]);
        $dosen = dosen::find($id);
        $dosen->nip = $request->nip;
        $dosen->nama = $request->nama;
        $dosen->save();
        return redirect('dosen');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dosen = dosen::find($id);
        $dosen->delete();
        return redirect('dosen');
    }

    public function profil_dosen()
    {
        $dosen = dosen::where('id_user', Auth::user()->id)->first();
        return view('view_profil_dosen', compact('dosen'));
    }
}
