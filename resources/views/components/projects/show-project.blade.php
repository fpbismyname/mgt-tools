<x-layout title="{{ $project->project_name }}">
    <x-navbar />
    <x-projects.project-header :projectApp="$project" :projectMenu="$projectMenu" :selectedMenu="$selectedMenu"/>
    <x-projects.project :project="$project" :menu="$selectedMenu" :problemDomain="$problemDomain"/>
</x-layout>