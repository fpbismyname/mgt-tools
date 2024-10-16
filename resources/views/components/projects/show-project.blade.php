<x-layout title="{{ $project->project_name }}">
    <x-navbar />
    <x-projects.project-header :projectApp="$project" :projectMenu="$projectMenu" :selectedMenu="$selectedMenu" />
    <x-projects :project="$project" :menu="$selectedMenu">
</x-layout>
