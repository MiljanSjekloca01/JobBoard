<x-layout>
    <x-card class="py-8 px-16">
        <form action="{{ route("employer.store") }}" method="POST">
        @csrf
            <div class="mb-8">
                <x-label for="company_name" :required="true">
                    Company Name
                </x-label>
                <x-text-input name="company_name" />
            </div>            
            <x-button class="w-full">Create</x-button>
        </form>
    </x-card>
</x-layout>