@props(['disabled' => false])

<div class="relative">
    @if($formRef)
        <button type="button" id="clear-button" class="absolute top-0 right-0 h-full flex items-center pr-2"
        @click="$refs['input-{{$name}}'].value='';
                $refs['{{$formRef}}'].submit();">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor" class="h-4 w-4 text-slate-500">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    @endif
    <input
         {{ $attributes->merge(['class' => ' w-full pr-8 border-gray-300 focus:border-indigo-500 ring-1 focus:ring-indigo-500 rounded-md shadow-sm']) }}
        x-ref="input-{{$name}}" name="{{$name}}" value="{{$value}}" placeholder="{{$placeholder}}" id="{{$name}}" type="{{ $type }}"/>
    </div>
