@extends('layouts.app')

@section('css')
    @include('layouts.datatables_css')
@endsection


@section('content')
    <section class="content-header">
        <h1 class="pull-left">Rekap Presensi</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('presensis.create') }}">Add New</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
{{--                    @include('presensis.table')--}}
                <div class="table-responsive">
                    <table class="table table-hover datatables">
                        <thead>
                        <tr>
                            <th>Tanggal Presensi</th>
                            <th>Kegiatan</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($presensi as $data)
                            <tr>
                                <td>{{$data['tanggal']}}</td>
                                <td>{{$data['jadwalkegiatan']['kegiatan']['name']}}</td>
                                <td>
                                    <form action="{{route('presensis.destroy', $data['tanggal'])}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('presensis.show', $data['tanggal']) }}" class='btn btn-default btn-xs'>
                                            <i class="glyphicon glyphicon-eye-open"></i>
                                        </a>
                                        <button type="submit" class="btn btn-xs btn-danger">
                                            <i class="glyphicon glyphicon-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection

@section('scripts')
    @include('layouts.datatables_js')
    <script>
       $(document).ready(function() {
            $('.datatables').DataTable();
        } );
    </script>
@endsection

