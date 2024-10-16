<x-layout title="Dashboard">
    <x-navbar />
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                {{-- Header dashboard --}}
                <div class="container py-5">
                    <div class="row align-items-center">
                        <div class="col-12 col-sm text-center text-sm-start">
                            <h1 class="fs-1 fw-bolder">Dashboard</h1>
                            <p class="fs-6 text-body-secondary">Welcome to dashboard Mgt Tools.</p>
                        </div>
                        <div class="col-12 col-sm text-center text-sm-end">
                            <a class="btn btn-primary fs-6" data-bs-target="#addProject" data-bs-toggle="modal">
                                <i class="bi bi-plus-circle-fill me-2"></i>Add Project App
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                {{-- Content Dashboard --}}
                <div class="container">
                    <div class="row">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    @if ($allProjects->count() > 1)
                                        <h1 class="fs-5"><i class="bi bi-file-richtext-fill me-2"></i>All Projects : {{ $allProjects->count() }}</h1>
                                    @else
                                        <h1 class="fs-5"><i class="bi bi-file-richtext-fill me-2"></i>All Project : {{ $allProjects->count() }}</h1>
                                    @endif
                                </div>
                                <div class="col">
                                    <div class="border-bottom border-bottom-4"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row py-5">
                        @if ($allProjects->count())
                            <div class="container">
                                <div class="row justify-content-center gap-4">
                                    @foreach ($allProjects as $project)
                                        <div class="card rounded-4 shadow col-8 col-sm-6 col-md-4 col-lg-4 col-xl-3 h-100">
                                            <a href="{{ route('project', $project->id_project) }}"
                                                class="link-underline link-underline-opacity-0 text-dark">
                                                <div class="row">
                                                    <div class="ratio ratio-1x1">
                                                        <img src="{{ route('images', $project->business_process_model) }}"
                                                            alt="{{ $project->project_name }}"
                                                            class="card-img-top object-fit-cover rounded-top-4">
                                                    </div>
                                                    <div class="card-header border-0">
                                                        <h5 class="card-title fs-6">{{ $project->project_name }}</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <p class="fs-6">
                                                            {{ Str::words($project->project_desc, 10, '...') }}
                                                        </p>
                                                    </div>
                                                    <div class="card-footer border-0">
                                                        <div class="row text-center text-sm-start">
                                                            <p class="fs-6 text-body-secondary">Last update : <span class="badge text-bg-primary">{{ $project->updated_at->diffForHumans() }}</span></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <div class="row justify-content-center">
                                <div class="col text-center">
                                    <h1 class="fs-6">- There is no project app. -</h1>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Modal Add New Project --}}
            <x-modal-popup title="Add Request App" modalName="addProject">
                <x-slot name="modalIcon"><i class="bi bi-plus-circle me-2"></i></x-slot>
                <form action="{{ route('project.add') }}" class="form-control border border-0 shadow rounded-4"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row justify-content-center p-3">
                        <div class="container">
                            <div class="col-12 mb-3">
                                <label for="project_name" class="form-label mb-1">Project Name</label>
                                <input type="text" name="project_name" class="form-control"
                                    value="{{ old('project_name') }}">
                            </div>
                            <div class="col-12 mb-3">
                                <label for="project_desc" class="form-label mb-1">Project Description</label>
                                <textarea name="project_desc" maxlength="720" style="max-height: 15rem" class="form-control">{{ old('project_desc') }}</textarea>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="business_process_model" class="form-label mb-1">Business Process
                                    Model</label>
                                <input type="file" name="business_process_model" class="form-control"
                                    accept="image/*">
                            </div>
                            <div class="col-12 mb-3">
                                <label for="problem_root_cause" class="form-label mb-1">Problem Root Cause</label>
                                <input type="file" name="problem_root_cause" class="form-control" accept="image/*">
                            </div>
                            <div class="row">
                                <div class="col-12 my-4 text-center">
                                    <input type="submit" value="Create Project" class="btn btn-primary">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </x-modal-popup>
        </div>
</x-layout>
