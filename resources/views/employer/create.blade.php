@php use App\Models\Opportunity@endphp
<x-layout>
    <x-breadcrumbs :links="['My Jobs' => '#', 'Create' => '#']" class="mb-4" />

    <x-card class="mb-8">
        <form action="{{route('employer.store')}}" method="POST">
            @csrf
            <input type="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Auth::id()}}"/>
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <x-label for="title" :required="true">Job Title</x-label>
                    <x-text-input name="title" />
                    <x-input-error :message = "$error->get('title')" class="mt-2"/>
                </div>

                <div>
                    <x-label for="location" :required="true">Location</x-label>
                    <x-text-input name="location" />
                    <x-input-error :message = "$error->get('location')" class="mt-2"/>
                </div>

                <div class="col-span-2">
                    <x-label for="salary" :required="true">Salary</x-label>
                    <x-text-input name="salary" type="number" />
                    <x-input-error :message = "$error->get('salary')" class="mt-2"/>
                </div>

                <div class="col-span-2">
                    <x-label for="description" :required="true">Description</x-label>
                    <textarea class="w-full pr-8 border-gray-300 focus:border-indigo-500 ring-1 focus:ring-indigo-500 rounded-md shadow-sm" name="description" id=""  rows="5"></textarea>
                    <x-input-error :message = "$error->get('description')" class="mt-2"/>
                </div>

                <div>
                    <div class="mb-4 font-bold">Experience</div>
                    <x-radio-group name="experience" :options="Opportunity::$experience"/>
                </div>
                <div>
                    <div class="mb-4 font-bold">Category</div>
                    <x-radio-group name="category" :options="Opportunity::$category"/>
                </div>

                <div class="col-span-2">
                    <x-primary-button class="w-full">Create Job</x-primary-button>
                </div>
            </div>
        </form>
    </x-card>
</x-layout>
