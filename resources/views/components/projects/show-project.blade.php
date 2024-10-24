<x-layout title="{{ $project->project_name }}">
    <x-navbar />
    <x-projects.project-header :projectApp="$project" :projectMenu="$projectMenu" :selectedMenu="$selectedMenu" />
        <x-projects.project :project="$project" :menu="$selectedMenu" :problemDomain="$problemDomain" :solutionDomain="$solutionDomain" :solutionType="$solutionType"
            :potentialProblem="$potentialProblem" :solutionClasification="$solutionClasification" :solutionFeasibility="$solutionFeasibility" :solutionRisk="$solutionRisk"
            :solutionPriority="$solutionPriority" :solutionRank="$solutionRank" :useCase="$useCase" :useCaseActor="$useCaseActor"/>
</x-layout>
