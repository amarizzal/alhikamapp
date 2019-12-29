<!-- Tgl Field -->
<div class="form-group">
    {!! Form::label('tgl', 'Tgl:') !!}
    <p>{{ $dendaDetail->tgl }}</p>
</div>

<!-- Denda Field -->
<div class="form-group">
    {!! Form::label('denda', 'Denda:') !!}
    <p>{{ $dendaDetail->denda }}</p>
</div>

<!-- Denda Id Field -->
<div class="form-group">
    {!! Form::label('denda_id', 'Denda Id:') !!}
    <p>{{ $dendaDetail->denda_id }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $dendaDetail->status }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $dendaDetail->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $dendaDetail->updated_at }}</p>
</div>

