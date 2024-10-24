@switch($menu)
    @case('Project Description')
        <x-projects.project-description :project="$project" />
    @break

    @case('Problem Domain')
        <x-projects.problem-domain :problemDomain="$problemDomain" :projectId="$project->id_project" />
    @break

    @case('Solution Domain')
        <x-projects.solution-domain :solutionDomain="$solutionDomain" :projectId="$project->id_project" :solutionType="$solutionType"/>
    @break

    @case('Potential Problem')
        <x-projects.potential-problem :projectId="$project->id_project" :solutionDomain="$solutionDomain" :potentialProblem="$potentialProblem" :solutionType="$solutionType"/>
    @break

    @case('Requirement Revision')
        <x-projects.requirement-revision :solutionDomain="$solutionDomain" :projectId="$project->id_project" :solutionType="$solutionType"/>
    @break

    @case('Need vs Feat')
        <x-projects.need-vs-feat :solutionDomain="$solutionDomain" :projectId="$project->id_project" :solutionType="$solutionType" :problemDomain="$problemDomain" :potentialProblem="$potentialProblem" />
    @break

    @case('Priority Clasification')
        <x-projects.priority-clasification :solutionDomain="$solutionDomain" :projectId="$project->id_project" :solutionType="$solutionType" :solutionClasification="$solutionClasification"/>
    @break

    @case('Feasibility')
        <x-projects.feasibility :solutionDomain="$solutionDomain" :projectId="$project->id_project" :solutionType="$solutionType" :solutionFeasibility="$solutionFeasibility" :solutionRisk="$solutionRisk" :solutionPriority="$solutionPriority"/>
    @break

    @case('Finalization')
        <x-projects.finalization :solutionDomain="$solutionDomain" :projectId="$project->id_project" :solutionType="$solutionType" :solutionRank="$solutionRank"/>
    @break

    @case('Use Case')
        <x-projects.use-case :projectId="$project->id_project" :useCase="$useCase"/>
    @break

    @case('Use Case vs Actor')
        <x-projects.use-case-vs-actor :projectId="$project->id_project" :useCase="$useCase" :useCaseActor="$useCaseActor"/>
    @break

    @case('Use Case vs Feat')
        <x-projects.use-case-vs-feat :useCase="$useCase" :projectId="$project->id_project" :solutionDomain="$solutionDomain" :typeSolution="$solutionType"/>
    @break

    @default
        <x-projects.project-description :project="$project" />
@endswitch
