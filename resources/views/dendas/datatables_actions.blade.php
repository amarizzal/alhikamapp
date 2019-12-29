{!! Form::open(['route' => ['dendas.destroy', $nik], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('dendas.show', $nik) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i> Detail
    </a>
{{--    <a href="{{ route('dendas.edit', $id) }}" class='btn btn-default btn-xs'>--}}
{{--        <i class="glyphicon glyphicon-edit"></i>--}}
{{--    </a>--}}
{{--    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [--}}
{{--        'type' => 'submit',--}}
{{--        'class' => 'btn btn-danger btn-xs',--}}
{{--        'onclick' => "return confirm('Are you sure?')"--}}
{{--    ]) !!}--}}
</div>
{!! Form::close() !!}
