<?php

namespace App\Http\Controllers;

use App\Alternatif;
use App\Crip;
use App\Kriteria;
use Illuminate\Http\Request;
use DB;
class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $kriteria = Kriteria::all();
        $alternatif = Alternatif::all();
        return view('nilai.index',[
            'kriteria'      => $kriteria,
            'alternatif'    => $alternatif
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $kriteria = Kriteria::all();
        return view('nilai.tambah',['master_kriteria' => $kriteria]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $data = array_values($request->except('_token'));
//        $data = Crip::find($data);
        $alternatif = Alternatif::find($id);
        $alternatif->crip()->sync($data);
        return redirect(route('alternatif'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $selectedCrip = DB::table('nilai_alternatif')
                            ->select('crip_id')
                            ->where('alternatif_id',$id)
                            ->get();
        $kriteria = Kriteria::all();
        $arrayCrip = [];
        foreach ($selectedCrip as $a) {
                $arrayCrip[] = $a->crip_id;
        }
        return view('nilai.edit',[
            'master_kriteria'   => $kriteria,
            'selected_crip'     => $arrayCrip
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = array_values($request->except('_token'));
//        $data = Crip::find($data);
        $alternatif = Alternatif::find($id);
        $alternatif->crip()->sync($data);
        return redirect(route('nilai'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
