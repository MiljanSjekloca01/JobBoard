<x-layout>
    <x-breadcrumbs :$job class="mb-4"
    :links="[
        'Jobs' => route('jobs.index'),
        $job->title => '#'
        ]">
    </x-breadcrumbs>

    <x-job-card :$job :show="true">  <!-- :$job skracena varijanta kad je atribut i ime isto -->
        <!-- Description -->
        <p class="text-sm text-slate-500 mb-4">
            {{ nl2br(e($job->description)) }}
        </p>
    </x-job-card>

    <!-- Other Jobs -->
    <x-card class="mb-4">
        <h2 class="mb-4 text-lg font-medium">
            More {{$job->employer->company_name}} Jobs
        </h2>

        <div class="text-sm text-slate-500">
            @foreach ($job->employer->jobs as $employer_job)    
               <div class="mb-4 flex justify-between">
                    <div>
                        <div class="text-slate-700">
                            <a href="{{route('jobs.show',$employer_job)}}">
                                {{$employer_job->title}}
                            </a>
                        </div>
                        <div class="text-xs">
                            {{ $employer_job->created_at->diffForHumans() }}
                        </div>
                    </div>
                    <div class="text-xs">
                        ${{number_format($employer_job->salary)}}
                    </div>
               </div>
            @endforeach
        </div>
    </x-card>

</x-layout>