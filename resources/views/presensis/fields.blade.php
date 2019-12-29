<!-- Nik Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nik', 'Nik:') !!}
    {!! Form::text('nik', null, ['class' => 'form-control']) !!}
</div>

<!-- Tanggal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanggal', 'Tanggal:') !!}
    {!! Form::date('tanggal', null, ['class' => 'form-control','id'=>'tanggal']) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#tanggal').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: false
        })
    </script>
@endsection

<!-- Masuk Field -->
<div class="form-group col-sm-6">
    {!! Form::label('masuk', 'Masuk:') !!}
    {!! Form::text('masuk', null, ['class' => 'form-control']) !!}
</div>

<!-- Keluar Field -->
<div class="form-group col-sm-6">
    {!! Form::label('keluar', 'Keluar:') !!}
    {!! Form::text('keluar', null, ['class' => 'form-control']) !!}
</div>

<!-- Keterangan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    {!! Form::text('keterangan', null, ['class' => 'form-control']) !!}
</div>
<input type="hidden" name="file" value="0">
<!-- Izin -->
<div class="form-group col-sm-6">
    {!! Form::label('izin', 'Izin :') !!}
    <select name="izin" id="" class="form-control">
        <option value="0" {{$presensi->izin == 0 ? 'selected' : ''}}>Hadir</option>
        <option value="1" {{$presensi->izin == 1 ? 'selected' : ''}}>Izin</option>
        <option value="2" {{$presensi->izin == 2 ? 'selected' : ''}}>Tidak Hadir</option>
    </select>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('presensis.index') }}" class="btn btn-default">Cancel</a>
</div>
