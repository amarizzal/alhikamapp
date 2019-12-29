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
                   {!! Form::model($presensi, ['route' => ['presensis.update', $presensi->id], 'method' => 'patch']) !!}

                        @include('presensis.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection