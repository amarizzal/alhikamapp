<!-- Tanggal Field -->
<div class="form-group">
    {!! Form::label('tanggal', 'Tanggal:') !!}
    <p>{{ $jadwalKegiatan->tanggal }}</p>
</div>

<!-- Kegiatan Id Field -->
<div class="form-group">
    {!! Form::label('kegiatan_id', 'Kegiatan Id:') !!}
    <p>{{ $jadwalKegiatan->kegiatan->name }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $jadwalKegiatan->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $jadwalKegiatan->updated_at }}</p>
</div>

