<!-- Nik Field -->
<div class="form-group">
    {!! Form::label('nik', 'Nik:') !!}
    <p>{{ $santri->nik }}</p>
</div>

<!-- Nama Field -->
<div class="form-group">
    {!! Form::label('nama', 'Nama:') !!}
    <p>{{ $santri->nama }}</p>
</div>

<!-- Kelamin Field -->
<div class="form-group">
    {!! Form::label('kelamin', 'Kelamin:') !!}
    <p>{{ $santri->kelamin }}</p>
</div>

<!-- Kategori Field -->
<div class="form-group">
    {!! Form::label('kategori', 'Kategori:') !!}
    <p>{{ $santri->kategori }}</p>
</div>

<!-- Angkatan Field -->
<div class="form-group">
    {!! Form::label('angkatan', 'Angkatan:') !!}
    <p>{{ $santri->angkatan }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $santri->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $santri->updated_at }}</p>
</div>

