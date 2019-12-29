@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Jadwal Kegiatan
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($jadwalKegiatan, ['route' => ['jadwalKegiatans.update', $jadwalKegiatan->id], 'method' => 'patch']) !!}

                        @include('jadwal_kegiatans.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
