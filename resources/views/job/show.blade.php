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
</x-layout>