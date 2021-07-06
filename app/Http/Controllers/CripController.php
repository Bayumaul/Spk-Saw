<?php

namespace App\Http\Controllers;

use App\Crip;
use App\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $kriteria   = Kriteria::all();
        $crips      = collect([]);
        if ($req->k)
        {
            $crips = Kriteria::find($req->k)->crip;
        }
        return view('crip.index',[
            'kriteria'  => $kriteria,
            'crips'     => $crips,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kriteria = Kriteria::all();
        return view('crip.tambah',['kriteria' => $kriteria]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
        $kriteria = Kriteria::find($request->kriteria);
        $saveCrip = $kriteria->crip()->create($request->except(['_token','kriteria']));
        if (!$saveCrip)
        {
            return back();
        }
        return redirect(route('crip'));
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
        $kriteria   = Kriteria::all();
        $crip       = Crip::find($id);
        return view('crip.edit',[
            'kriteria'  => $kriteria,
            'crip'     => $crip,
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
        $krit = Kriteria::find((int) $request->kriteria);
        $crip = Crip::find($id);
        $updated = $crip->update($request->except(['_token','kriteria']));
        if ($updated)
        {
            $crip->kriteria()->associate($krit)->save();
            return redirect(route('crip')."?k=".$request->kriteria);
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $crip = Crip::destroy($id);
        return back();
    }

    private function validator(array $data)
    {
        return Validator::make($data,[
            'kriteria'      => 'required',
            'nama_crip'     => 'required',
            'nilai_crip'    => 'required'
        ]);
    }
}