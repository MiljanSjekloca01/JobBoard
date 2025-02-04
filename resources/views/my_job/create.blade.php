<x-layout>
    <x-breadcrumbs :links="[ 'My Jobs' => route('my-jobs.index'), 'Create' => '#', ]"  class="mb-4" />
    <x-card class="mb-8">
        <form action="{{ route('my-jobs.store') }}" method="POST">
        @csrf
            <div class="container m-auto grid grid-cols-2 gap-4 mb-4">
                <div>
                    <x-label for="title" :required="true">Job Title</x-label>
                    <x-text-input name="title" />
                </div>
                <div>
                    <x-label for="location" :required="true">Location</x-label>
                    <x-text-input name="location" />
                </div>
                <div class="col-span-2">
                    <x-label for="salary" :required="true">Salary</x-label>
                    <x-text-input name="salary" type="number"/>
                </div>
                <div class="col-span-2">
                    <x-label for="description" :required="true">Description</x-label>
                    <x-text-input name="description" type="textarea"/>
                </div>

                <div>
                    <x-label for="experience" :required="true">Experience</x-label>
                    <x-radio-group name="experience" :value="old('experience')" :options="$experience" :showAllOption="false"/>
                </div>

                <div>
                    <x-label for="category" :required="true">Category</x-label>
                    <x-radio-group name="category" :value="old('category')" :options="$category" :show-all-option="false"/>
                </div>
                
                <div class="col-span-2">
                    <x-button>Create Job</x-button>
                </div>
            </div>
        </form>
    </x-card>
</x-layout>