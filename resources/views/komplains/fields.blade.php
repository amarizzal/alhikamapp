<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('nama_santri', 'Nama Santri:') !!}
    <input type="text" name="santri_id" id="" class="form-control" value="{{$komplain->santri->nama}}" disabled>
</div>

<!-- Isi Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('isi', 'Isi:') !!}
    {!! Form::textarea('isi', null, ['class' => 'form-control']) !!}
</div>

<!-- Tanggal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanggal', 'Tanggal:') !!}
    <input type="date" name="tanggal" class="form-control" id="tanggal" value="{{date('Y-m-d', strtotime($komplain->created_at))}}">
</div>

<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    <select name="status" class="form-control">
        <option value="1" {{$komplain->status == 1 ? 'selected' : ''}}>Diterima</option>
        <option value="0" {{$komplain->status == 0 ? 'selected' : ''}}>Ditolak</option>
        <option value="2" {{$komplain->status == 2 ? 'selected' : ''}}>Proses</option>
    </select>
</div>

@section('scripts')
    <script type="text/javascript">
        $('#tanggal').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: false
        })
    </script>
@endsection

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('komplains.index') }}" class="btn btn-default">Cancel</a>
</div>
