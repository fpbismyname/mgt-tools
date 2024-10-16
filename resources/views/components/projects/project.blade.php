@switch($menu)
    @case('Project Description')
        <x-projects.project-description :projectData="$project" />
    @break
    @case('Problem Domain')
        <x-projects.problem-domain/>
    @break
    @case('Solution Domain')
        <x-projects.solution-domain/>
    @break

    @default
        <x-projects.project-description :projectData="$project" />
@endswitch
