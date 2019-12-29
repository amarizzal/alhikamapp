<!-- Nik Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nik', 'Nik:') !!}
    {!! Form::text('nik', null, ['class' => 'form-control']) !!}
</div>

<!-- Total Denda Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_denda', 'Total Denda:') !!}
    {!! Form::number('total_denda', null, ['class' => 'form-control']) !!}
</div>

<!-- Kegiatan Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kegiatan_id', 'Kegiatan Id:') !!}
    {!! Form::select('kegiatan_id', ], null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('dendas.index') }}" class="btn btn-default">Cancel</a>
</div>
