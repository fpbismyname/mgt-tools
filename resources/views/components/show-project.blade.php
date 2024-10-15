<x-layout title="{{ $project->project_name }}">
    <x-navbar />
    <x-header-project :projectMenu="$projectMenu" :projectApp="$project">
        <x-slot name="projectName">{{ $project->project_name }}</x-slot>
        <x-slot name="projectDesc">{{ $project->project_desc }}</x-slot>
    </x-header-project>
    @switch(request()->query('menu'))
        @case('Project Description')
            <x-project-description>
                <x-slot name="projectCreatedDate">{{ $project->created_at->format(' d M Y, H:i A') }}</x-slot>
                <x-slot name="projectUpdatedDate">{{ $project->updated_at }}</x-slot>
                <x-slot name="idProject">{{ $project->id_project }}</x-slot>
                <x-slot name="projectName">{{ $project->project_name }}</x-slot>
                <x-slot name="projectDesc">{{ $project->project_desc }}</x-slot>
                <x-slot name="bpmImage">{{ $project->business_process_model }}</x-slot>
                <x-slot name="prcImage">{{ $project->problem_root_cause }}</x-slot>
            </x-project-description>
        @break
        @case('')
            <x-project-description>
                <x-slot name="projectCreatedDate">{{ $project->created_at->format(' d M Y, H:i A') }}</x-slot>
                <x-slot name="projectUpdatedDate">{{ $project->updated_at }}</x-slot>
                <x-slot name="idProject">{{ $project->id_project }}</x-slot>
                <x-slot name="projectName">{{ $project->project_name }}</x-slot>
                <x-slot name="projectDesc">{{ $project->project_desc }}</x-slot>
                <x-slot name="bpmImage">{{ $project->business_process_model }}</x-slot>
                <x-slot name="prcImage">{{ $project->problem_root_cause }}</x-slot>
            </x-project-description>
            @break
    @endswitch
</x-layout>
