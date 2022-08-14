@switch($type)
    @case('script')
        <script>
            {!! $value !!}
        </script>
    @break

    @case('script_file')
     <script src="{{ $value }}"></script>
    @break
@endswitch
