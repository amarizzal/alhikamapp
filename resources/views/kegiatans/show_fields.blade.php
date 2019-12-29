<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $kegiatan->name }}</p>
</div>

<!-- Harga Denda Field -->
<div class="form-group">
    {!! Form::label('harga_denda', 'Harga Denda:') !!}
    <p>{{ $kegiatan->harga_denda }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $kegiatan->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $kegiatan->updated_at }}</p>
</div>

