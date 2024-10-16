<x-layout title="{{ $project->project_name }}">
    <x-navbar />
    <x-projects.project-header :projectApp="$project" :projectMenu="$projectMenu" :selectedMenu="$selectedMenu" />
    @switch($selectedMenu)
        @case('Project Description')
            <x-projects.project-description :project="$project"/>
        @break
        @case('Problem Domain')
            <x-projects.problem-domain/>
        @break
        @case('Solution Domain')
            <x-projects.solution-domain/>
        @break

        @default
            <x-projects.project-description :project="$project"></x-project-description>
    @endswitch
</x-layout>
