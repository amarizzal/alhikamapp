@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Data Santri
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <h4>Input Manual</h4>
                <hr>
                <div class="row">
                    {!! Form::open(['route' => 'santris.store']) !!}

                        @include('santris.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>

        <div class="box box-primary">
            <div class="box-body">
                <h4>Input dengan file excel</h4>
                <hr>
                <div class="row">
                    <form action="{{route('santri.upload')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="">Upload File excel</label>
                            <input type="file" name="file" id="" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Upload</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
