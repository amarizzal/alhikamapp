@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Denda Detail
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($dendaDetail, ['route' => ['dendaDetails.update', $dendaDetail->id], 'method' => 'patch']) !!}

                        @include('denda_details.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection