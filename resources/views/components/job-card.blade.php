<div {{$attributes->merge(['class'=>'rounded-md border border-slate-300 bg-white p-4 shadow-sm mb-4'])}}>
    <div class="mb-4 flex justify-between ">
        <h2 class="font-medium text-lg">{{$job->title}}</h2>
        <div>
            ${{number_format($job->salary)}}
        </div>
    </div>
    <div class="mb-4 flex justify-between text-slate-500 items-center">
        <div class="flex space-x-4 items-center">
            <div>Company Name</div>
            <div>{{$job->location}}</div>
        </div>
        <div class="flex space-x-2 text-xs">
            <x-tag>{{Str::ucfirst($job->experience)}}</x-tag>
            <x-tag class="rounded-md border px-2 py-1">{{$job->category}}</x-tag>
        </div>
    </div>
    <div class="mb-4">
        {!! nl2br(e($job->description)) !!}
    </div>
    {{$slot}}
</div>
