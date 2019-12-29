<!-- Isi Field -->
<div class="form-group">
    {!! Form::label('isi', 'Isi:') !!}
    <p>{{ $komplain->isi }}</p>
</div>

<!-- Santri Id Field -->
<div class="form-group">
    {!! Form::label('santri_id', 'Santri Id:') !!}
    <p>{{ $komplain->santri_id }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $komplain->status }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $komplain->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $komplain->updated_at }}</p>
</div>

