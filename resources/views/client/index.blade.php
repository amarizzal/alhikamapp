@extends('layouts.app')

@section('css')
    @include('layouts.datatables_css')
@endsection

@section('content')
    <div class="content">
        <div class="clearfix"></div>
        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Biodata diri</h3>
                        <hr>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-striped table-hover">
                            <tbody>
                            <tr>
                                <td>NIK</td>
                                <td>:</td>
                                <td><b>{{$user->santri->nik}}</b></td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td><b>{{$user->santri->nama}}</b></td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>:</td>
                                <td><b>{{$user->santri->kelamin}}</b></td>
                            </tr>
                            <tr>
                                <td>Kategori</td>
                                <td>:</td>
                                <td><b>{{$user->santri->kategori}}</b></td>
                            </tr>
                            <tr>
                                <td>Angkatan</td>
                                <td>:</td>
                                <td><b>{{$user->santri->angkatan}}</b></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="box box-danger">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Informasi Denda</h3>
                        <hr>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-striped table-hover">
                            <tbody>
                            <tr>
                                <td>Total Denda</td>
                                <td>:</td>
                                <td><b>Rp. {{number_format($user->denda->total_denda)}}</b></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-striped table-hover datatables">
                            <thead>
                            <tr>
                                <th>Kegiatan</th>
                                <th>Tanggal</th>
                                <th>Keterangan</th>
                                <th>Status</th>
                                <th>Denda yang dikenai</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($user->denda->denda_detail as $key => $data)
                                <tr>
                                    <td>{{$data->jadwalkegiatan->kegiatan->name}}</td>
                                    <td>{{$data->jadwalkegiatan->tanggal}}</td>
                                    <td>
                                        @if($user->denda->presensi[$key]->izin == 0)
                                            <span class="btn btn-xs btn-primary">Hadir</span>
                                        @elseif($user->denda->presensi[$key]->izin == 1)
                                            <span class="btn btn-xs btn-warning">Izin</span>
                                        @elseif($user->denda->presensi[$key]->izin == 2)
                                            <span class="btn btn-xs btn-danger">Tidak Hadir</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($data->status == 0)
                                                <span class="btn btn-xs btn-danger">Belum bayar</span>
                                            @elseif($data->status == 1)
                                                <span class="btn btn-xs btn-success">Sudah bayar</span>
                                            @elseif($data->status == 2)
                                                -
                                            @endif
                                    </td>
                                    <td>
                                        @if($data->status != 2)
                                                {{'Rp. '.number_format($data->jadwalkegiatan->kegiatan->harga_denda)}}
                                            @else
                                                -
                                            @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('layouts.datatables_js')
    <script>
        $(document).ready(function () {
            $('.datatables').DataTable();
        });
    </script>
@endsection
