@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Presensi
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    <form action="{{route('presensis.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Pilih Tgl</label>
                                <select name="jadwalKegiatan_id" class="form-control select">
                                    <option selected disabled>-Pilih Kegiatan-</option>
                                    @foreach($jadwalKegiatan as $data)
                                        <option value="{{$data->id}}">{{$data->tanggal . ' (' .$data->kegiatan->name.')'}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">File excel presensi</label>
                                <input type="file" name="file" id="" class="form-control">
                            </div>
                        </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Save</button>
                            <a href="{{ route('presensis.index') }}" class="btn btn-default">Cancel</a>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/css/select2.min.css">
@endsection

@section('scripts')
    <script type="text/javascript">
         $(document).ready(function() { $(".select").select2(); });
    </script>
@endsection
