<!-- Tgl Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tgl', 'Tgl:') !!}
    {!! Form::date('tgl', null, ['class' => 'form-control','id'=>'tgl']) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#tgl').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endsection

<!-- Denda Field -->
<div class="form-group col-sm-6">
    {!! Form::label('denda', 'Denda:') !!}
    {!! Form::number('denda', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('dendaDetails.index') }}" class="btn btn-default">Cancel</a>
</div>
