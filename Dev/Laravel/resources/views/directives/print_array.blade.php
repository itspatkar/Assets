<h3>Fruits:</h3>
<ul>
    @forelse ($fruits as $key=>$val)
        <li>{{ $key . '-' . $val }}</li>
    @empty
        {!! '<script>alert("No Data Found!")</script>' !!}
    @endforelse
</ul>
