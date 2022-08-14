<body>
    @foreach ($pageComponents as $pageComponent)
        @include('front.utils.body.component', ['component' => $pageComponent->component])
    @endforeach
</body>