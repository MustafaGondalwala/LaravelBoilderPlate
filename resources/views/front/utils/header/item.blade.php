@switch($type)
    @case('html')
        {!! $value !!}
    @break

    @case('title')
        <title>{{ $value }}</title>
    @break

    @case('css_file')
        <link rel="stylesheet" href="{{ $value }}" rel="stylesheet">
    @break
@endswitch
