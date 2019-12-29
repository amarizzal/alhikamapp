@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Jadwal Kegiatan
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('jadwal_kegiatans.show_fields')
                    <a href="{{ route('jadwalKegiatans.index') }}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
