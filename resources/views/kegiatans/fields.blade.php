<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Harga Denda Field -->
<div class="form-group col-sm-6">
    {!! Form::label('harga_denda', 'Harga Denda:') !!}
    {!! Form::number('harga_denda', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('kegiatans.index') }}" class="btn btn-default">Cancel</a>
</div>
