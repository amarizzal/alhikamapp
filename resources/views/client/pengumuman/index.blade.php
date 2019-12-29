@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="clearfix"></div>
        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Pengumuman terbaru</h2>
                        <hr>
                    </div>
                    <div class="col-md-12">
                        <ul class="timeline">
                        @foreach($pengumuman as $data)

                            <!-- timeline time label -->
                            <li class="time-label">
                                <span class="bg-red">
                                    {{date('d M, Y', strtotime($data->tanggal))}}
                                </span>
                            </li>
                            <!-- /.timeline-label -->

                            <!-- timeline item -->
                            <li>
                                <!-- timeline icon -->
                                <i class="fa fa-envelope bg-blue"></i>
                                <div class="timeline-item">
{{--                                    <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>--}}

{{--                                    <h3 class="timeline-header"><a href="#">Support Team</a> ...</h3>--}}

                                    <div class="timeline-body">
                                        {{$data->isi}}
                                    </div>

                                    <div class="timeline-footer">
                                        <a class="btn btn-primary btn-xs">By Admin</a>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
