<x-layout>
    <x-breadcrumbs class="mb-4" :links="['Jobs' => route('jobs.index'), $job->title => '#']"/>
    <x-job-card :$job class="mb-4">
        <div class="mb-4">
            {!! nl2br(e($job->description)) !!}
            <inpu value="Initializing "></inpu>
        </div>
    </x-job-card>
    <x-employer-jobs :job="$job" class="mb-4">

    </x-employer-jobs>
</x-layout>
