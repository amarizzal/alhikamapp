@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Perizinan
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{route('perizinan.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Cari nama santri</label>
                                <select name="nik[]" id="" class="form-control select" required multiple>
                                    @foreach($santri as $data)
                                        <option value="{{$data['nik']}}">{{$data['nama']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Pilih tanggal kegiatan</label>
                                <select name="tanggal" id="" class="form-control select" required>
                                    <option selected disabled>-Pilih tanggal kegiatan-</option>
                                    @foreach($jadwalKegiatan as $data)
                                        <option value="{{$data['tanggal']}}">{{$data['tanggal'] . '('. $data['kegiatan']['name'] .')'}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Keterangan</label>
                                <select name="izin" id="" class="form-control" required>
                                    <option disabled selected>-Pilih keterangan-</option>
                                    <option value="0">Hadir</option>
                                    <option value="1">Izin</option>
                                    <option value="2">Tidak hadir</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $(".select").select2();
        });
    </script>
@endsection
