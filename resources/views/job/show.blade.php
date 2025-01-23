<x-layout>
    <x-breadcrumbs :$job class="mb-4"
    :links="[
        'Jobs' => route('jobs.index'),
        $job->title => '#'
        ]">
    </x-breadcrumbs>

    <x-job-card :$job/>  <!-- :$job skracena varijanta kad je atribut i ime isto -->
</x-layout>