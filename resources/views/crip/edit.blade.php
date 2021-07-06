@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2 class="float-left">Tambah Nilai Kriteria</h2>
                    </form>
                </div>

                <div class="card-body">
                    <div class="row">
                        <form action="{{route('crip.update',['id' => Request::segment(3)])}}" method="POST"
                            class="col-md-12">
                            @csrf
                            <div class="form-group">
                                <label for="kriteria">Kriteria <span class="text-danger">*</span></label>
                                <select name="kriteria" class="form-control">
                                    <option value="">-- Pilih Kriteria --</option>
                                    @foreach($kriteria as $k)
                                    <option value="{{$k->id}}" {{$crip->kriteria_id==$k->id?'selected':''}}>
                                        {{$k->kode." - ".$k->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nama_crip">Nama <span class="text-danger">*</span></label>
                                <input type="text" name="nama_crip" class="form-control" value="{{$crip->nama_crip}}">
                            </div>
                            <div class="form-group">
                                <label for="nilai_crip">Nilai <span class="text-danger">*</span></label>
                                <input type="text" name="nilai_crip" class="form-control" value="{{$crip->nilai_crip}}">
                            </div>
                            <div class="float-right">
                                <button type="submit" class="btn btn-success">Edit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection