<x-layout title="{{ $project->project_name }}">
    <x-navbar />
    <x-header-project :projectMenu="$projectMenu" :projectApp="$project" :selectedMenu="$selectedMenu">
    </x-header-project>
    @switch($selectedMenu)
        @case('Project Description')
            {{-- <x-project-description :project='$project'>
            </x-project-description> --}}
        @break
        @case('Project Description')
            {{-- <x-project-description :project='$project'>
            </x-project-description> --}}
        @break
        @default
            <x-project-description :project='$project'>
            </x-project-description>
        @break
    @endswitch
</x-layout>