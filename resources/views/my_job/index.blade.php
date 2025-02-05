<x-layout>
    <x-breadcrumbs :links="[ 'My Jobs' => '#']"  class="mb-4" />
    <div class="mb-8 text-right">
        <x-link-button href="{{ route('my-jobs.create')}}">
            Add New
        </x-link-button>
    </div>
    @forelse ($jobs as $job)
        <x-job-card :$job>
            <div class="text xs text-slate-500">
                @forelse ($job->jobApplications as $application)
                <h2 class="font-bold text-md mb-2 w-full text-right underline underline-offset-4"> Applicants &#10534 </h2>
                    <div class="mb-4 flex items-center justify-between">
                        <div>
                            <div>{{ $application->user->name }}</div>
                            <div> Applied {{ $application->created_at->diffForHumans() }}</div>
                            <div> Download CV </div>
                        </div>
                        <div>
                            ${{  number_format($application->expected_salary) }}
                        </div>
                    </div>
                    <hr>
                @empty <div>No applications Yet</div>
                @endforelse
            </div>
        </x-job-card>
    @empty
        <div class="rounded-md border border-dashed border-slate-300 p-8">
            <div class="text-center font-medium">
                No Jobs yet
            </div>
            <div class="text-center">
                Post your first job <a class="text-inding-500 hover:underline" 
                href="{{route('my-jobs.create')}}">here !</a>
            </div>
        </div>
    @endforelse

</x-layout>