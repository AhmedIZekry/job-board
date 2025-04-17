@php use Illuminate\Support\Facades\Auth; @endphp
<x-nav-bar></x-nav-bar>
<x-layout>
    <x-breadcrumbs class="mb-4" :links="['Jobs' => route('jobs.index'), $job->title => '#']"/>
    <div class="flex space-x-4">
        <div>
            <x-job-card :$job class="mb-4">
                <div class="mb-4">
                    {!! nl2br(e($job->description)) !!}
                </div>
            </x-job-card>
            <x-card>
                @can('apply',$job)
                    <form method="POST" action="{{route('applications.store')}}" enctype="multipart/form-data">
                        @csrf
                        <x-text-input type="hidden" name="opportunity_id" value="{{$job->id}}" ></x-text-input>
                        <x-label for="expected_salary" :required="true">Expected Salary</x-label>
                        <x-text-input id="expected_salary" class="mb-2" name="expected_salary" value="{{old('expected_salary')}}" ></x-text-input>
                        <x-input-error :messages="$errors->get('expected_salary')"></x-input-error>

                        <div class="mb-8">
                            <x-label for="cv_file" :required="true">CV</x-label>
                            <x-text-input id="cv_file" name="cv_file" type="file"></x-text-input>
                            <x-input-error :messages="$errors->get('cv_file')"/>
                        </div>
                        <x-primary-button>Apply</x-primary-button>
                    </form>
                @else
                    @if(!Auth::user())
                        <div>
                            <p>You should <a href="{{route('login')}}" class="font-bold text-emerald-600">Sign In</a> to apply</p>
                        </div>
                    @else
                        <div>
                            <div class="flex justify-between">
                                <div>
                                    @foreach($job->opportunity_applications as $applications)
                                        @if($applications->user_id === Auth::user()->id)
                                            <p>Your Salary: {{number_format($applications->expected_salary)}}</p>
                                        @endif
                                    @endforeach
                                    <p>Average salary: {{number_format($job->opportunity_applications_avg_expected_salary,0)}}</p>
                                </div>
                                <div>
                                    @foreach($job->opportunity_applications as $applications)
                                        @if($applications->user_id === Auth::user()->id)
                                            <p>Applied {{$applications->created_at->diffForHumans()}}</p>
                                        @endif
                                    @endforeach
                                </div>

                            </div>
                            <p class="text-center text-black font-bold font-medium mb-2">You Have Applied</p>
                            <form method="POST" action="{{route('applications.withdraw',$job->id)}}">
                                @csrf
                                <x-primary-button>Withdraw Application</x-primary-button>
                            </form>
                        </div>
                    @endif
                    @endcanany
            </x-card>
        </div>
        <div>
            <x-employer-jobs :job="$job" class="mb-4">

            </x-employer-jobs>
        </div>
    </div>
</x-layout>
