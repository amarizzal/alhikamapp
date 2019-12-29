@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Komplain
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($komplain, ['route' => ['komplains.update', $komplain->id], 'method' => 'patch']) !!}

                        @include('komplains.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection