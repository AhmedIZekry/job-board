<x-layout>
  <x-breadcrumbs :links="['My Jobs' => '#']" class="mb-4" />

  <div class="mb-8 text-right">
    <x-link-button href="{{route('employer.create')}}">Add New</x-link-button>
  </div>

  @forelse ($jobs as $job)
    <x-job-card :$job>
      <div class="text-xs text-slate-500">
          @forelse ($job->opportunity_applications as $application)
              <div class="mb-4 flex items-center justify-between">
                  <div>
                      <div>{{ $application->user->name }}</div>
                      <div>
                          Applied {{ $application->created_at->diffForHumans() }}
                      </div>
                      <div>
                          Download CV
                      </div>
                  </div>

                  <div>${{ number_format($application->expected_salary) }}</div>
              </div>
          @empty
              <div class="mb-4">No applications yet</div>
          @endforelse

        <div class="flex space-x-2">
          <a href="{{route('employer.edit', $job)}}" class=' inline-flex  justify-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white text-center uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150'>Edit</a>

          <form action="{{route('employer.destroy',$job)}}" method="POST">
            @csrf
            @method('DELETE')
            <x-primary-button>Delete</x-primary-button>
          </form>
        </div>
      </div>
    </x-job-card>
  @empty
    <div class="rounded-md border border-dashed border-slate-300 p-8">
      <div class="text-center font-medium">
        No jobs yet
      </div>
      <div class="text-center">
        Post your first job <a class="text-indigo-500 hover:underline"
          href="#">here!</a>
      </div>
    </div>
  @endforelse
</x-layout>
