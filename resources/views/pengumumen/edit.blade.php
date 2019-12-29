@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Pengumuman
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($pengumuman, ['route' => ['pengumumen.update', $pengumuman->id], 'method' => 'patch']) !!}

                        @include('pengumumen.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection