@php use App\Models\Opportunity;use Illuminate\Support\Facades\Auth@endphp
<x-layout>
    <x-breadcrumbs :links="['My Jobs' => '#', 'Create' => '#']" class="mb-4"/>

    <x-card class="mb-8">
        <form action="{{route('employer.update',$job->id)}}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="user_id" value="{{Auth::id()}}"/>
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <x-label for="title" :required="true">Job Title</x-label>
                    <x-text-input name="title" value="{{old('title',$job->title)}}"/>
                    <x-input-error :messages="$errors->get('title')" class="mt-2"/>
                </div>
                <div>
                    <x-label for="location" :required="true">Location</x-label>
                    <x-text-input name="location" value="{{old('location',$job->location)}}"/>
                    <x-input-error :messages="$errors->get('location')" class="mt-2"/>
                </div>

                <div class="col-span-2">
                    <x-label for="salary" :required="true">Salary</x-label>
                    <x-text-input name="salary" type="number" value="{{old('salary',$job->salary)}}"/>
                    <x-input-error :messages="$errors->get('salary')" class="mt-2"/>
                </div>

                <div class="col-span-2">
                    <x-label for="description" :required="true">Description</x-label>
                    <textarea
                        class="w-full pr-8 border-gray-300 focus:border-indigo-500 ring-1 focus:ring-indigo-500 rounded-md shadow-sm"
                        name="description" id="" rows="5">{{old('description',$job->description)}}</textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-2"/>
                </div>

                <div>
                    <div class="mb-4 font-bold">Experience</div>
                    <x-radio-group name="experience" :options="Opportunity::$experience" :allOption="false"
                                   :value="old('experience',$job->experience)"/>
                    <x-input-error :messages="$errors->get('experience')" class="mt-2"/>
                </div>
                <div>
                    <div class="mb-4 font-bold">Category</div>
                    <x-radio-group name="category" :options="Opportunity::$category" :allOption="false"
                                   :value="old('category',$job->category)"/>
                    <x-input-error :messages="$errors->get('category')" class="mt-2"/>
                </div>

                <div class="col-span-2">
                    <x-primary-button class="w-full">Update Job</x-primary-button>
                </div>
            </div>
        </form>
    </x-card>
</x-layout>
