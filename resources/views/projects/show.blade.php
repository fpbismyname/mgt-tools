<x-layout title="{{ $project->project_name }}">
    <x-navbar />
    <x-header-project>
        <x-slot name="projectName">{{ Str::words($project->project_name, '25', '...') }}</x-slot>
        <x-slot name="projectDesc">{{ Str::words($project->project_desc, '25', '...') }}</x-slot>
        <x-slot name="projectMenu">
            @foreach ($projectMenu as $menu)
                <option value="{{ $menu->id_menu }}">{{ $menu->menu }}</option>
            @endforeach
        </x-slot>
    </x-header-project>
    <x-project-description>
        <x-slot name="projectCreatedDate">{{ $project->created_at->format(" d M Y, H:i A") }}</x-slot>
        <x-slot name="projectUpdatedDate">{{ $project->updated_at }}</x-slot>
        <x-slot name="idProject">{{ $project->id_project }}</x-slot>
        <x-slot name="projectName">{{ $project->project_name }}</x-slot>
        <x-slot name="projectDesc">{{ $project->project_desc }}</x-slot>
        <x-slot name="bpmImage">{{ $project->business_process_model }}</x-slot>
        <x-slot name="prcImage">{{ $project->problem_root_cause }}</x-slot>
    </x-project-description>
</x-layout>