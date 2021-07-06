@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2 class="float-left">Tambah Kriteria</h2>
                        </form>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <form action="{{route('kriteria.update',['id' => Request::segment(3)])}}" method="POST" class="col-md-12">
                                @csrf
                                <div class="form-group">
                                    <label for="kode">Kode <span class="text-danger">*</span></label>
                                    <input type="text" name="kode" class="form-control" value="{{$data->kode}}">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama Kriteria <span class="text-danger">*</span></label>
                                    <input type="text" name="nama" class="form-control" value="{{$data->nama}}">
                                </div>
                                <div class="form-group">
                                    <label for="atribut">Atribut <span class="text-danger">*</span></label>
                                    <select name="atribut" class="form-control">
                                        <option value="">-- Pilih Atribut --</option>
                                        <option value="cost" {{($data->atribut=='cost')?'selected':''}}>Cost</option>
                                        <option value="benefit" {{($data->atribut=='benefit')?'selected':''}}>Benefit</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="bobot">Bobot <span class="text-danger">*</span></label>
                                    <input type="text" name="bobot" class="form-control" value="{{$data->bobot}}">
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
