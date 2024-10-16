<x-layout title="{{ $project->project_name }}">
    <x-navbar />
    <x-project-header :projectApp="$project" :projectMenu="$projectMenu" :selectedMenu="$selectedMenu"/>
    <x-project :project='$project' :menu='$selectedMenu'/>
</x-layout>