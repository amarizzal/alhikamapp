@extends('layouts.app')

@section('css')
    @include('layouts.datatables_css')
@endsection


@section('content')
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Data santri</h2>
                        <hr>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-striped table-hover">
                            <tbody>
                            <tr>
                                <td>NIK</td>
                                <td>:</td>
                                <td><b>{{$denda->santri->nik}}</b></td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td><b>{{$denda->santri->nama}}</b></td>
                            </tr>
                            <tr>
                                <td>Kategori</td>
                                <td>:</td>
                                <td><b>{{$denda->santri->kategori}}</b></td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>:</td>
                                <td><b>{{$denda->santri->kelamin}}</b></td>
                            </tr>
                            <tr>
                                <td>Angkatan</td>
                                <td>:</td>
                                <td><b>{{$denda->santri->angkatan}}</b></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="box box-warning">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Data denda</h2>
                        <hr>
                    </div>

                    <div class="col-md-6">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <td>Total Denda</td>
                                <td>:</td>
                                <td><b>{{'Rp. '. number_format($denda->total_denda)}}</b></td>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="col-md-12">
                        @include('flash::message')
                    </div>
                    {{--@include('dendas.show_fields')--}}
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-hover datatables">
                                <thead>
                                <tr>
                                    <th>Kegiatan</th>
                                    <th>Tanggal</th>
                                    <th>Keterangan</th>
                                    <th>Status</th>
                                    <th>Denda yang dikenai</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($denda->denda_detail as $key => $denda_details)
                                    <tr>
                                        <td>{{$denda_details->jadwalkegiatan->kegiatan->name}}</td>
                                        <td>{{$denda_details->jadwalkegiatan->tanggal}}</td>
                                        <td>
                                            @if($denda->presensi[$key]->izin == 0)
                                                <span class="btn btn-xs btn-primary">Hadir</span>
                                            @elseif($denda->presensi[$key]->izin == 1)
                                                <span class="btn btn-xs btn-warning">Izin</span>
                                            @elseif($denda->presensi[$key]->izin == 2)
                                                <span class="btn btn-xs btn-danger">Tidak Hadir</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($denda_details->status == 0)
                                                <span class="btn btn-xs btn-danger">Belum bayar</span>
                                            @elseif($denda_details->status == 1)
                                                <span class="btn btn-xs btn-success">Sudah bayar</span>
                                            @elseif($denda_details->status == 2)
                                                -
                                            @endif
                                        </td>
                                        <td>
                                            @if($denda_details->status != 2)
                                                {{'Rp. '.number_format($denda_details->jadwalkegiatan->kegiatan->harga_denda)}}
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>
                                            @if($denda_details->status != 2)
                                                <form
                                                    action="{{route('dendaDetails.update', [$denda->nik,$denda_details->id])}}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    @if($denda_details->status == 0)
                                                        <input type="hidden" name="status" value="1">
                                                        <button type="submit" class="btn btn-xs btn-primary">Konfirmasi
                                                            pembayaran
                                                        </button>
                                                    @elseif($denda_details->status == 1)
                                                        <input type="hidden" name="status" value="0">
                                                        <button type="submit" class="btn btn-xs btn-danger">Batal
                                                            pembayaran
                                                        </button>
                                                    @endif
                                                </form>
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
                    <div class="col-md-12">
                        <a href="{{ route('dendas.index') }}" class="btn btn-default">Back</a>
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

