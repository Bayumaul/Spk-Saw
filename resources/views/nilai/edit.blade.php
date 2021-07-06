@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2 class="float-left">Tambah Alternatif</h2>
                        </form>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <form action="{{route('nilai.update',['id' => Request::segment(3)])}}" method="POST" class="col-md-12">
                                @csrf
                                @php
                                    $no = 1;
                                @endphp
                                @foreach($master_kriteria as $kriteria)
                                    <div class="form-group">
                                        <label for="{{$kriteria->kode}}">{{$kriteria->nama}}</label>
                                        <select name="{{$kriteria->kode}}" class="form-control js-example-basic-single-{{$no}}">
                                            <option value="">-- Pilih {{$kriteria->nama}}--</option>
                                            @foreach($kriteria->crip as $crip)
                                                <option value="{{$crip->id}}" {{(in_array($crip->id,$selected_crip))?'selected':''}}>{{$crip->nama_crip}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @php
                                    $no++;
                                @endphp
                                @endforeach
                                <div class="float-right">
                                    <button type="submit" class="btn btn-success">Tambah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.js-example-basic-single-1').select2();
            $('.js-example-basic-single-2').select2();
            $('.js-example-basic-single-3').select2();
            $('.js-example-basic-single-4').select2();
            $('.js-example-basic-single-5').select2();
            $('.js-example-basic-single-6').select2();
            $('.js-example-basic-single-7').select2();
        });
    </script>
@endsection