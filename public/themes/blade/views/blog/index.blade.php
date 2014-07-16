
{{-- Content --}}
@section('content')
 Blade Content
    <ul>
        @foreach($menu as $item)
            <li>{{$item['name']}}</li>
        @endforeach
    </ul>
@stop
