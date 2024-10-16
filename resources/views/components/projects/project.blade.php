@switch($menu)
    @case('Project Description')
        <x-projects.project-description :project="$project" />
    @break
    @case('Problem Domain')
        <x-projects.problem-domain :problemDomain="$problemDomain" :projectId="$project->id_project"/>
    @break
    @case('Solution Domain')
        <x-projects.solution-domain/>
    @break
    @case('Potential Problem')
        <x-projects.potential-problem/>
    @break
    @case('Requirement Revision')
        <x-projects.requirement-revision/>
    @break
    @case('Need vs Feat')
        <x-projects.need-vs-feat/>
    @break
    @case('Priority Clasification')
        <x-projects.priority-clasification/>
    @break
    @case('Feasibility')
        <x-projects.feasibility/>
    @break
    @case('Finalization')
        <x-projects.finalization/>
    @break
    @case('Use Case')
        <x-projects.use-case/>
    @break
    @case('Use Case')       
        <x-projects.use-case/>
    @break
    @case('Use Case vs Actor')       
        <x-projects.use-case-vs-actor/>
    @break
    @case('Use Case vs Feat')       
        <x-projects.use-case-vs-feat/>
    @break
    @default
        <x-projects.project-description :project="$project" />
@endswitch
