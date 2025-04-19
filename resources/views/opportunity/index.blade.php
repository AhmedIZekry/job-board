@php use App\Models\Opportunity; @endphp
<x-nav-bar></x-nav-bar>
<x-layout>
    <x-breadcrumbs class="mb-4" :links="['Jobs' => route('jobs.index')]"/>
    <x-card class="mb-4 text-sm" x-data="">
        <form x-ref="filters" method="GET" action="{{route('jobs.index')}}" id="filtering-form">
            <div class="mb-4 grid grid-cols-2 gap-4 ">
                <div>
                    <div class="mb-1">
                        <div><p>Search</p></div>
                        <div>
                            <x-text-input name="search" value="" placeholder="Search for any text" form-ref="filters"/>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="mb-1">
                        <div><p>Salary</p></div>
                        <div class="flex space-x-2">
                            <x-text-input name="minSalary" value="{{request('minSalary')}}" placeholder="From" form-ref="filters"/>
                            <x-text-input name="maxSalary" value="{{request('maxSalary')}}" placeholder="To" form-ref="filters"/>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="mb-4 font-bold">Experience</div>
                    <x-radio-group name="experience" :options="Opportunity::$experience"/>
                </div>
                <div>
                    <div class="mb-4 font-bold">Category</div>
                    <x-radio-group name="category" :options="Opportunity::$category"/>
                </div>

            </div>
            <x-primary-button type="submit" class="w-full">Filter</x-primary-button>
        </form>
    </x-card>
    @foreach($jobs as $job)
        <x-job-card :$job class="mb-4">
            <x-link-button :href="route('jobs.show',$job)">
                Show
            </x-link-button>
        </x-job-card>
    @endforeach
</x-layout>
