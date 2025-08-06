@php
    $user = 'mandar';
    $skills = ['Android', 'Web', 'DevOps', 'Cloud'];
@endphp

<script>
    var data = @json($skills);
    data.forEach(function(val) {
        console.log(val);
    });

    var data = {{ Js::from($skills) }};
    data.forEach(function(val) {
        console.log(val);
    });
</script>
