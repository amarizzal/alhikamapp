@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Denda
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($denda, ['route' => ['dendas.update', $denda->id], 'method' => 'patch']) !!}

                        @include('dendas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection