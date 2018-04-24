<?php

namespace App\Http\Controllers;

use Auth;
use App\krs;
use App\nilai;
use App\mktawar;
use App\matakuliah;
use App\openkrs;
use App\mahasiswa;
use App\dosen;
use Illuminate\Http\Request;

class KrsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $krss = krs::where('id',false);
        $tahuns = mktawar::groupBy('tahun_ajaran')->pluck('tahun_ajaran');
        return view('view_krs', compact('krss', 'mktawar', 'matakuliah', 'tahuns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store_krs(Request $request)
    {
        $krs = new krs();
        $krs->id_mhs = $request->id_mhs;
        $krs->id_mktawar = $request->id_mktawar;
        $krs->status = 0;
        $krs->nilai = 'belum ada';
        $krs->save();
        return redirect('registrasi_krs');
    }

    public function konfirmasi_krs(Request $request)
    {
        $mahasiswa = mahasiswa::where('id_user', Auth::user()->id)->first();
        $id_mhs = $mahasiswa->id;
        $krs = krs::where('status', 0)->where('id_mhs', $id_mhs)->update(['status' => 2]);
        return redirect('registrasi_krs');
    }

    public function view_approve_krs()
    {
        $openkrs = openkrs::find(1);
        $tahun = $openkrs->tahun_ajaran;
        $semester = $openkrs->semester;
        $krss = krs::with('mktawar')
            ->whereHas('mktawar', function($query) use($tahun, $semester){
                $query->where([
                    ['tahun_ajaran', '=', $tahun],
                    ['semester', '=', $semester]
                ]);
            })
            ->get();
        $mahasiswas = mahasiswa::all();
        foreach($mahasiswas as $mahasiswa){
            $krs = $krss->where('id_mhs', $mahasiswa->id)->first();
            if(empty($krs)) $mahasiswa['status'] = 0;
            else if($krs->status == 0) $mahasiswa['status'] = 0;
            else if($krs->status == 2) $mahasiswa['status'] = 1;
            else if($krs->status == 1) $mahasiswa['status'] = 2;
        }
        return view('view_approve_krs', compact('mahasiswas', 'openkrs'));
    }

    public function edit_approve_krs($id_mhs, $status)
    {
        $openkrs = openkrs::find(1);
        $tahun = $openkrs->tahun_ajaran;
        $semester = $openkrs->semester;
        $krss = krs::with('mktawar')->where('id_mhs', $id_mhs)
            ->whereHas('mktawar', function($query) use($tahun, $semester){
                $query->where([
                    ['tahun_ajaran', '=', $tahun],
                    ['semester', '=', $semester]
                ]);
            })
            ->get();
        $mahasiswa = mahasiswa::find($id_mhs);
        return view('edit_approve_krs', compact('krss', 'mahasiswa', 'status'));
    }

    public function approve_krs(Request $request)
    {
        $openkrs = openkrs::find(1);
        $tahun = $openkrs->tahun_ajaran;
        $semester = $openkrs->semester;
        $id_mhs = $request->id_mhs;
        $status = $request->status;
        if($status == 2){
            $krss = krs::with('mktawar')
                ->whereHas('mktawar', function($query) use($id_mhs, $tahun, $semester){
                    $query->where([
                        ['tahun_ajaran', '=', $tahun],
                        ['status', '=', 1],
                        ['id_mhs', '=', $id_mhs],
                        ['semester', '=', $semester]
                    ]);
                })
                ->update(['status' => 0]);
        }
        else $krs = krs::where('status', 2)->where('id_mhs', $id_mhs)
        ->update(['status' => 1]);
        return redirect('view_approve_krs');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mahasiswa = mahasiswa::where('id_user', Auth::user()->id)->first();
        $id_mhs = $mahasiswa->id;
        $mktawar = mktawar::all();
        $matakuliah = matakuliah::all();
        if($request->tahun_ajaran=='all' && $request->semester == 'all') 
        $krss=krs::where('id_mhs', $id_mhs)->get();
        else {
        $krss = krs::with('mktawar')
            ->where('id_mhs',$id_mhs)
            ->where('status', 1)
            ->whereHas('mktawar', function($query){
                if(!empty(\Request::input('tahun_ajaran')) && !empty(\Request::input('semester'))){
                    $query->where([
                        ['tahun_ajaran', '=', \Request::input('tahun_ajaran')],
                        ['semester', '=', \Request::input('semester')]
                    ]);
                }
                else if(!empty(\Request::input('tahun_ajaran'))){
                    $query->where([
                        ['tahun_ajaran', '=', \Request::input('tahun_ajaran')],
                    ]);
                }
                else if(!empty(\Request::input('semester'))){
                    $query->where([
                        ['semester', '=', \Request::input('semester')]
                    ]); 
                }
                else  $query->where('semester', 'false');
            })
            ->get();
        }
        $tahuns = mktawar::groupBy('tahun_ajaran')->pluck('tahun_ajaran');
        return view('view_krs', compact('krss', 'mktawar', 'matakuliah', 'tahuns'));

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
    public function registrasi_krs()
    {
        $mahasiswa = mahasiswa::where('id_user', Auth::user()->id)->first();
        $id_mhs = $mahasiswa->id;
        $openkrs = openkrs::find(1);
        $tahun = $openkrs->tahun_ajaran;
        $semester = $openkrs->semester;
        $krss = krs::with('mktawar')
            ->where('id_mhs',$id_mhs)
            ->whereHas('mktawar', function($query) use($tahun, $semester){
                $query->where([
                    ['tahun_ajaran', '=', $tahun],
                    ['semester', '=', $semester]
                ]);
            })
            ->get();
        $cek_krs = $krss->first();
        $mktawar = mktawar::where('kelas','(ada)')->where('tahun_ajaran', $tahun)->where('semester', $semester);
        foreach ($krss as $krs){
            $mktawar->where('id_mk', '<>', $krs->mktawar->id_mk);
        }
        $mktawar = $mktawar->get();
        $matakuliah = matakuliah::all();
        return view('edit_krs', compact('id_mhs','krss', 'mktawar', 'matakuliah', 'openkrs', 'cek_krs'));
    }

    public function input_nilai($id_mktawar){
        $nilais =  nilai::all();
        $dosen = dosen::where('id_user', Auth::user()->id)->first();
        $id_dosen = $dosen->id;
        $openkrs = openkrs::find(1);
        $tahun = $openkrs->tahun_ajaran;
        $semester = $openkrs->semester;
        $krss = krs::with('mahasiswa')->where('id_mktawar', $id_mktawar)->get();
        return view('view_input_nilai', compact('nilais','krss', 'id_matakuliah', 'mktawars', 'openkrs'));
    }

    public function nilai_mk(){
        $dosen = dosen::where('id_user', Auth::user()->id)->first();
        $id_dosen = $dosen->id;
        $mktawars = mktawar::with('dosen')->whereHas('dosen', function($query) use($id_dosen){
            $query->where('id', $id_dosen);
        })->get();
        foreach($mktawars as $mktawar){
            $jumlah_mhs = krs::where('id_mktawar', $mktawar->id)->count('id');
            $mktawar['jumlah_mhs'] = $jumlah_mhs;
        }
        return view('view_nilai_mk', compact('mktawars'));
    }

    public function edit_nilai(Request $request){
        $this->validate($request,[
            'nilai' => 'required'
        ]);
        $krs = krs::find($request->id_krs);
        $krs->id_nilai = $request->nilai;
        $krs->save();
        $id_mktawar = $krs->id_mktawar;

        return redirect("/input_nilai/".$id_mktawar);
    }

    public function khs(Request $request)
    {
        $mahasiswa = mahasiswa::where('id_user', Auth::user()->id)->first();
        $id_mhs = $mahasiswa->id;
        $tahun = $request->tahun_ajaran;
        $semester =$request->semester;
        $mktawar = mktawar::all();
        $matakuliah = matakuliah::all();
        $krss2=krs::where('id_mhs', $id_mhs)->where('nilai', '<>','belum ada')->get();
        $krss1 = krs::with('mktawar')->where('id_mhs',$id_mhs)->where('nilai', '<>','belum ada')->where('status', 1)
            ->whereHas('mktawar', function($query){
                if(!empty(\Request::input('tahun_ajaran')) && !empty(\Request::input('semester'))){
                    $query->where([
                        ['tahun_ajaran', '=', \Request::input('tahun_ajaran')],
                        ['semester', '=', \Request::input('semester')]
                    ]);
                }
                else if(!empty(\Request::input('tahun_ajaran'))){
                    $query->where([
                        ['tahun_ajaran', '=', \Request::input('tahun_ajaran')],
                    ]);
                }
                else if(!empty(\Request::input('semester'))){
                    $query->where([
                        ['semester', '=', \Request::input('semester')]
                    ]); 
                }
                else  $query->where('semester', 'false');
            })
            ->get();
        if($tahun=='all' && $semester == 'all') $krss=krs::where('id_mhs', $id_mhs)->get();
        else {
        $krss = krs::with('mktawar')->where('id_mhs',$id_mhs)->where('status', 1)
            ->whereHas('mktawar', function($query){
                if(!empty(\Request::input('tahun_ajaran')) && !empty(\Request::input('semester'))){
                    $query->where([
                        ['tahun_ajaran', '=', \Request::input('tahun_ajaran')],
                        ['semester', '=', \Request::input('semester')]
                    ]);
                }
                else if(!empty(\Request::input('tahun_ajaran'))){
                    $query->where([
                        ['tahun_ajaran', '=', \Request::input('tahun_ajaran')],
                    ]);
                }
                else if(!empty(\Request::input('semester'))){
                    $query->where([
                        ['semester', '=', \Request::input('semester')]
                    ]); 
                }
                else  $query->where('semester', 'false');
            })
            ->get();
        }
        $tahuns = mktawar::groupBy('tahun_ajaran')->pluck('tahun_ajaran');
        $jml_nilai = 0;$jml_sks = 0;$jml_nilai2 = 0;$jml_sks2 = 0;$total_sks=0;$total_sn=0;
        foreach($krss as $krs){
            $nilai_huruf = $krs->nilai;
            $sks =  $krs->mktawar->matakuliah->sks;
            if($nilai_huruf == 'A')  $krs['sn'] = 4*$sks;
            else if($nilai_huruf == 'B+')  $krs['sn'] = 3.5*$sks;
            else if($nilai_huruf == 'B') $krs['sn'] = 3*$sks;
            else if($nilai_huruf == 'C+')  $krs['sn'] = 2.5*$sks;
            else if($nilai_huruf == 'C')  $krs['sn'] = 2*$sks;
            else if($nilai_huruf =='D') $krs['sn'] = 1*$sks;
            else if($nilai_huruf == 'E') $krs['sn'] = 0;
            $total_sn = $total_sn + ($krs['sn']);
            $total_sks = $total_sks + $sks;     
        }
        foreach($krss1 as $krs){
            $nilai_huruf = $krs->nilai;
            if($nilai_huruf == 'A')  $nilai_angka = 4;
            else if($nilai_huruf == 'B+')  $nilai_angka = 3.5;
            else if($nilai_huruf == 'B') $nilai_angka = 3;
            else if($nilai_huruf == 'C+')  $nilai_angka = 2.5;
            else if($nilai_huruf == 'C')  $nilai_angka = 2;
            else if($nilai_huruf =='D') $nilai_angka = 1;
            else if($nilai_huruf == 'E') $nilai_angka = 0;
            $jml_nilai = $jml_nilai + ($nilai_angka * $krs->mktawar->matakuliah->sks);
            $jml_sks = $jml_sks + $krs->mktawar->matakuliah->sks;     
        }
        foreach($krss2 as $krs){
            $nilai_huruf = $krs->nilai;
            if($nilai_huruf == 'A')  $nilai_angka = 4;
            else if($nilai_huruf == 'B+')  $nilai_angka = 3.5;
            else if($nilai_huruf == 'B') $nilai_angka = 3;
            else if($nilai_huruf == 'C+')  $nilai_angka = 2.5;
            else if($nilai_huruf == 'C')  $nilai_angka = 2;
            else if($nilai_huruf == 'D') $nilai_angka = 1;
            else if($nilai_huruf == 'E') $nilai_angka = 0;
            $jml_nilai2 = $jml_nilai2 + ($nilai_angka * $krs->mktawar->matakuliah->sks);
            $jml_sks2 = $jml_sks2 + $krs->mktawar->matakuliah->sks;
        }
        if($jml_sks!=0) $ips = ($jml_nilai/$jml_sks);
        else $ips = 0;
        if($jml_sks2!=0) $ipk = ($jml_nilai2/$jml_sks2);
        else $ipk = 0;
        $ips = number_format((float)$ips, 2, '.', '');
        $ipk = number_format((float)$ipk, 2, '.', '');
        if( ($ips == 0) || (empty($tahun)) || (empty($semester)) ) $ips = '-';
        return view('view_khs', 
        compact('krss', 'mktawar', 'matakuliah', 'tahuns','tahun', 'semester', 'ips','ipk','total_sn','total_sks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\krs  $krs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\krs  $krs
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $krs = krs::find($id);
        $krs->delete();
        return redirect('registrasi_krs');
    }

}
