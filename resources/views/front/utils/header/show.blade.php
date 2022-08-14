<head>
@foreach ($default_items as $item)
    @include('front.utils.header.item', [
        'value' => $item->value,
        'value1' => $item->value1,
        'value2' => $item->value2,
        'type' => $item->type,
    ])
@endforeach
</head>
