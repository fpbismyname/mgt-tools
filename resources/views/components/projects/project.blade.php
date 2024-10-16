@switch($selectedMenu)
    @case('Project Description')
        <x-projects.project-description :project="$project" />
    @break

    @case('Problem Domain')
        <x-projects.problem-domain />
    @break

    @case('Solution Domain')
        <x-projects.solution-domain />
    @break

    @default
        <x-projects.project-description :project="$project"></x-project-description>
    @endswitch
