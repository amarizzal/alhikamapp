<!-- Nik Field -->
<div class="form-group">
    {!! Form::label('nik', 'Nik:') !!}
    <p>{{ $denda->nik }}</p>
</div>

<!-- Total Denda Field -->
<div class="form-group">
    {!! Form::label('total_denda', 'Total Denda:') !!}
    <p>{{ $denda->total_denda }}</p>
</div>

<!-- Kegiatan Id Field -->
<div class="form-group">
    {!! Form::label('kegiatan_id', 'Kegiatan Id:') !!}
    <p>{{ $denda->kegiatan_id }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $denda->status }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $denda->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $denda->updated_at }}</p>
</div>

