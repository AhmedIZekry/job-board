<div>
    @if($allOption)
        <label for="{{$name}}" class="mb-1 flex items-center" >
            <input name="{{$name}}" type="radio" value="" @checked(!request($name))>
            <span class="ml-2">All</span>
        </label>
    @endif

    @foreach($options as $option)
        <label for="{{$name}}" class="mb-1 flex items-center" >
            <input name="{{$name}}" type="radio" value="{{$option}}" @checked($option === request($name) || $option === $value)>
            <label for="{{$name}}"><span class="ml-2" >{{Str::ucfirst($option)}}</span></label>
        </label>
    @endforeach
</div>
