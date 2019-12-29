<!-- Isi Field -->
<div class="form-group">
    {!! Form::label('isi', 'Isi:') !!}
    <p>{{ $pengumuman->isi }}</p>
</div>

<!-- Tanggal Field -->
<div class="form-group">
    {!! Form::label('tanggal', 'Tanggal:') !!}
    <p>{{ $pengumuman->tanggal }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $pengumuman->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $pengumuman->updated_at }}</p>
</div>

