@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="clearfix"></div>
        @include('adminlte-templates::common.errors')
        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Komplain</h3>
                        <hr>
                    </div>
                    <div class="col-md-12">
                        <form action="" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Isi Komplain</label>
                                <textarea name="isi" class="form-control" rows="10"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Kirim</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="box box-success">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <h3>List komplain</h3>
                        <hr>
                    </div>

                    <div class="col-md-12">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>Isi</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($komplain as $data)
                                <tr>
                                    <td>{{$data->isi}}</td>
                                    <td>{{date('Y-m-d', strtotime($data->created_at))}}</td>
                                    <td>
                                        @if($data->status == 0)
                                            <span class="btn btn-danger">Ditolak</span>
                                        @elseif($data->status == 1)
                                            <span class="btn btn-success">Diterima</span>
                                        @elseif($data->status == 2)
                                            <span class="btn btn-warning">Masih diproses</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        {{$komplain->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
