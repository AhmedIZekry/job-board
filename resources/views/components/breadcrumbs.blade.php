<nav {{$attributes}}>
    <ul class="flex space-x-2">
        <li>
            <a href="/">Home</a>
        </li>
        @foreach($links as $label=>$value)
            <li>→</li>
            <li>
                <a href="{{$value}}">
                    {{$label}}
                </a>
            </li>
        @endforeach
    </ul>
</nav>
