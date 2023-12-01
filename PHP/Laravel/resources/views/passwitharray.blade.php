<html>

<body>
    @foreach ($users as $key => $val)
        <h3>{{ $key }}. {{ $val['name'] }} - {{ $val['city'] }} - <a
                href="{{ route('printuser', $key) }}">Show</a>
        </h3>
    @endforeach
</body>

</html>
