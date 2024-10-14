<x-layout title="Dashboard">
    <x-navbar />
    <div class="container-fluid p-5">
        {{-- Header dashboard --}}
        <div class="row mb-5">
            <div class="col">
                <div class="card border border-0 rounded-4">
                    <div class="row p-3">
                        <div class="col">
                            <h1 class="fs-1 fw-bolder">Dashboard</h1>
                            <p class="fs-6">Welcome to dashboard mgt tools</p>
                        </div>
                        <div class="col text-end">
                            <div class="d-flex justify-content-end align-items-center h-100"
                                data-bs-target="#addProject" data-bs-toggle="modal">
                                <button class="fs-4 btn btn-primary ">
                                    <i class="bi bi-plus-circle-fill me-2"></i>New Request App</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Content Dashboard --}}
        <div class="row">
            <div class="d-flex justify-content-center align-items-start flex-wrap">
                @if($allProjects->count())
                    @foreach ($allProjects as $project)
                        <div class="col-2 m-3">
                            <div class="card border shadow rounded-4">
                                <a href="{{ route('project.show', $project->id_project) }}"
                                    class="link-underline link-underline-opacity-0 text-dark">
                                    <div class="ratio ratio-1x1">
                                        <img src="{{ route("images", $project->business_process_model) }}"
                                            class="card-img-top object-fit-cover rounded-top-4" />
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title py-3 fs-3">{{ $project->project_name }}</h1>
                                            <p class="card-text fs-6">
                                                {{ Str::words($project->project_desc, 15, '...') }}
                                            </p>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col">
                                                <p>Updated at : {{ $project->updated_at->diffForHumans() }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <h1 class="fs-1 fw-bolder">No project found.</h1>
                @endif
            </div>
        </div>

        {{-- Modal Add New Project --}}
        <x-modal-popup title="Add Request App" modalName="addProject">
            <x-slot name="modalIcon"><i class="bi bi-plus-circle me-2"></i></x-slot>
            <form action="{{ route('newProject.submit') }}" class="form-control border border-0 shadow p-5 rounded-4"
                method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="row">
                        <div class="col">
                            <label for="project_name" class="form-label mb-1">Project Name</label>
                            <input type="text" name="project_name" class="form-control"
                                value="{{ old('project_name') }}">
                        </div>
                    </div>
                    <div class="row py-3">
                        <div class="col">
                            <label for="project_desc" class="form-label mb-1">Project Description</label>
                            <textarea name="project_desc" maxlength="720" style="max-height: 15rem" class="form-control">{{ old('project_desc') }}</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="business_process_model" class="form-label mb-1">Business Process
                                Model</label>
                            <input type="file" name="business_process_model" class="form-control "
                                onchange="PreviewImage(event, 'bpm_preview')" accept="image/*">
                            <img src="" id="bpm_preview" class="d-none">
                        </div>
                        <div class="col">
                            <label for="problem_root_cause" class="form-label mb-1">Problem Root Cause</label>
                            <input type="file" name="problem_root_cause" class="form-control"
                                onchange="PreviewImage(event, 'prc_preview')" accept="image/*">
                            <img src="" id="prc_preview" class="d-none">
                        </div>
                    </div>
                </div>
                <div class="row py-4 text-center">
                    <div class="col">
                        <input type="submit" value="Create Project" class="btn btn-primary me-4">
                    </div>
                </div>
            </form>
        </x-modal-popup>
    </div>
</x-layout>
