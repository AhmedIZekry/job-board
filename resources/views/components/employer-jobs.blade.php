{{--@props(['job'])--}}
<div {{$attributes->merge(['class'=>'round-md border border-slate-300 bg-white p-4 shadow-sm mb-4'])}}>
    <div class="mb-4">
        <h2>{{$job->employer->Company_name}}</h2>
    </div>

        @foreach($job->employer->opportunities as $opportunity)
        <div class="flex justify-between mb-4 space-x-8 items-center">
            <div ><a href="{{route('jobs.show',$opportunity)}}">{{$opportunity->title}}</a></div>
            <div>${{number_format($opportunity->salary)}}</div>
        </div>

        @endforeach

</div>
