<x-layout title="{{ $project->project_name }}">
    <x-navbar />
    <x-projects.project-header :projectMenu="$projectMenu" :projectApp="$project" :selectedMenu="$selectedMenu"/>
    <x-projects.project :project="$project" :menu="$selectedMenu"/>
</x-layout>