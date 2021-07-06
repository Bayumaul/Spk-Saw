@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="float-left">Alternatif</h2>
                        {{--<form action="" class="form-inline float-right">--}}
                        {{--<div class="form-group">--}}
                        {{--<input type="text" name="q" placeholder="Carilah sesuatu" class="form-control" value="{{request('q')?request('q'):''}}">--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                        {{--<button type="refresh" class="btn btn-danger">Refresh</button>--}}
                        {{--</div>--}}
                        <div class="float-right">
                            <a href="{{route('alternatif.tambah')}}" class="btn btn-success">Tambah</a>
                        </div>
                        {{--</form>--}}
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th class="text-center">Kode</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Keterangan</th>
                                    <th class="text-center" style="width:20%">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(!empty($alternatif))
                                    @foreach($alternatif as $data)
                                        <tr>
                                            <td>{{$data->kode_alternatif}}</td>
                                            <td>{{$data->nama_alternatif}}</td>
                                            <td>{{$data->keterangan}}</td>
                                            <td class="text-center">
                                                <form action="{{route('alternatif.hapus',['id' => $data->id])}}" method="POST">
                                                    @csrf
                                                    <a href="{{route('nilai')."?a=".$data->id}}" class="btn btn-sm btn-info">Crip</a>
                                                    <a href="{{route('alternatif.edit',['id' => $data->id])}}" class="btn btn-sm btn-warning">Edit</a>
                                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5" class="text-center">Data tidak ditemukan</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
