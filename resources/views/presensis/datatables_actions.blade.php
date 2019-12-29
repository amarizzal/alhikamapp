{!! Form::open(['route' => ['presensis.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
{{--    <a href="{{ route('presensis.show', $id) }}" class='btn btn-default btn-xs'>--}}
{{--        <i class="glyphicon glyphicon-eye-open"></i>--}}
{{--    </a>--}}
    <a href="{{ route('presensis.edit', [$tanggal, $nik]) }}" class='btn btn-warning'>
        <i class="glyphicon glyphicon-edit"></i> Edit
    </a>
{{--    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [--}}
{{--        'type' => 'submit',--}}
{{--        'class' => 'btn btn-danger btn-xs',--}}
{{--        'onclick' => "return confirm('Are you sure?')"--}}
{{--    ]) !!}--}}
</div>
{!! Form::close() !!}
