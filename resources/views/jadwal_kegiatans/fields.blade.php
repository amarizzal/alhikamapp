<!-- Tanggal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanggal', 'Tanggal:') !!}
    {!! Form::date('tanggal', null, ['class' => 'form-control','id'=>'tanggal']) !!}
</div>

<!-- Kegiatan Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kegiatan_id', 'Kegiatan Id:') !!}
    {!! Form::select('kegiatan_id', $kegiatan, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('jadwalKegiatans.index') }}" class="btn btn-default">Cancel</a>
</div>


@section('scripts')
    <script type="text/javascript">
        $('#tanggal').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: false
        })
    </script>
@endsection
