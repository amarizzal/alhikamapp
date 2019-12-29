<!-- Nik Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nik', 'Nik:') !!}
    {!! Form::text('nik', null, ['class' => 'form-control']) !!}
</div>

<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
</div>

<!-- Kelamin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kelamin', 'Kelamin:') !!}
    {!! Form::select('kelamin', ['laki-laki' => 'laki-laki', 'perempuan' => 'perempuan'], null, ['class' => 'form-control']) !!}
</div>

<!-- Kategori Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kategori', 'Kategori:') !!}
    {!! Form::text('kategori', null, ['class' => 'form-control']) !!}
</div>

<!-- Angkatan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('angkatan', 'Angkatan:') !!}
    {!! Form::text('angkatan', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('santris.index') }}" class="btn btn-default">Cancel</a>
</div>
