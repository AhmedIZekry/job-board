<label {{$attributes->merge(['class'=>'m-2 block font-medium text-sm text-slate-900'])}} for="{{$for}}">
    @if($required)
        {{$slot}} <span>*</span>
    @else
        {{$slot}}
    @endif
</label>
