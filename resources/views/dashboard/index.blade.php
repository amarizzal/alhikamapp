@extends('layouts.app')

@section('content')
     <section class="content-header">
        <h1 class="pull-left">Dashboard</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>
        <br>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="icon ion-ios-people-outline"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Jumlah Santri</span>
                  <span class="info-box-number">{{$santri}}</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-red"><i class="icon ion-ios-gear-outline"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Jumlah Kegiatan</span>
                  <span class="info-box-number">{{$kegiatan}}</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
        </div>
    </div>
@endsection
