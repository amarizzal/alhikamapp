@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Santri
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($santri, ['route' => ['santris.update', $santri->id], 'method' => 'patch']) !!}

                        @include('santris.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection