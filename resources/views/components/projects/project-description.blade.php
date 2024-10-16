<div class="container-fluid">
    <div class="container">
        <div class="row gap-5">
            <div class="container border rounded-4 p-3 p-sm-4 shadow">
                <div class="row align-items-center gap-1">
                    <div class="col-12 col-sm-auto text-center text-sm-start">
                        <h1 class="fw-bolder text-primary fs-2" id="projectMenuTitle">Project Description</h1>
                    </div>
                    <div class="col-12 col-sm text-center text-sm-end">
                        <div class="container">
                            <div class="row justify-content-center justify-content-sm-end gap-2">
                                <button class="col-auto btn btn-warning fs-6" data-bs-target="#editProject"
                                    data-bs-toggle="modal"><i class="bi bi-pencil-fill me-2"></i>Edit Project</button>
                                <button class="col-auto btn btn-danger fs-6" data-bs-target="#deleteProject"
                                    data-bs-toggle="modal"><i class="bi bi-trash me-2"></i>Delete Project</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container border p-4 p-sm-5 shadow rounded-4">
                <div class="row gap-4">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="project_name" class="fs-5 mb-2">Project Name</label>
                            <input type="text" name="project_name" id="project_name"
                                value="{{ $project->project_name }}" class="form-control fs-6" disabled>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="project_desc" class="fs-5 mb-2">Project Description</label>
                            <textarea name="project_desc" maxlength="720" style="max-height: 15rem; min-height: 15rem;"
                                class="form-control h-100 fs-6" disabled>{{ $project->project_desc }}</textarea>
                        </div>
                    </div>
                    <div class="col-12 col-sm">
                        <p for="business_process_model" class="fs-5 mb-1">Business Process Model</p>
                        <div class="ratio ratio-1x1 w-100">
                            <img src="{{ route('images', $project->business_process_model) }}" id="bpm_preview"
                                class="img-thumbnail object-fit-cover" data-bs-toggle="modal"
                                data-bs-target="#bpmPreview" style="cursor: pointer;">
                        </div>
                    </div>
                    <div class="col-12 col-sm">
                        <p for="problem_root_cause" class="fs-5 mb-1">Problem Root Cause</p>
                        <div class="ratio ratio-1x1 w-100">
                            <img src="{{ route('images', $project->problem_root_cause) }}" id="prc_preview"
                                style="cursor: pointer;" class="img-thumbnail object-fit-cover" data-bs-toggle="modal"
                                data-bs-target="#prcPreview">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Preview BPM Image --}}
    <x-modal-popup title="Preview Image" modalName="bpmPreview" customClass="modal-lg">
        <x-slot name="modalIcon"></x-slot>
        <div class="modal-body">
            <div class="row">
                <img src="{{ route('images', $project->business_process_model) }}">
            </div>
        </div>
    </x-modal-popup>

    {{-- Modal Preview PRC Image --}}
    <x-modal-popup title="Preview Image" modalName="prcPreview" customClass="modal-lg">
        <x-slot name="modalIcon"></x-slot>
        <div class="modal-body">
            <div class="row">
                <img src="{{ route('images', $project->problem_root_cause) }}">
            </div>
        </div>
    </x-modal-popup>

    {{-- Modal Edit Project Description --}}
    <x-modal-popup title="Edit Project" modalName="editProject">
        <x-slot name="modalIcon"><i class="bi bi-pencil-fill me-2"></i></x-slot>
        <form action="{{ route('project.edit', $project->id_project) }}" method="POST"
            class="form-control border border-0 shadow rounded-4" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="container p-3">
                <div class="row justify-content-center">
                    <div class="container">
                        <div class="col-12 mb-3">
                            <label for="project_name" class="form-label mb-1">Project Name</label>
                            <input type="text" name="project_name" class="form-control"
                                value="{{ old('project_name') ?:$project->project_name }}">
                        </div>
                        <div class="col-12 mb-3">
                            <label for="project_desc" class="form-label mb-1">Project Description</label>
                            <textarea name="project_desc" maxlength="720" style="max-height: 15rem" class="form-control">{{ old('project_desc') ?:$project->project_desc }}</textarea>
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
                                <button class="col-auto btn btn-warning fs-6" type="submit"><i
                                        class="bi bi-pencil-fill me-2"></i>Edit Project</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </x-modal-popup>

    {{-- Modal Delete Project Description --}}
    <x-modal-popup title="Delete Project Apps" modalName="deleteProject">
        <x-slot name="modalIcon"><i class="bi bi-trash-fill me-2"></i></x-slot>
        <div class="container py-5">
            <div class="container">
                <form class="row text-center justify-content-center"
                    action="{{ route('project.delete', $project->id_project) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="row text-center">
                        <div class="col-12">
                            <p>Are you sure you want to delete this project?</p>
                        </div>
                    </div>
                    <div class="row justify-content-center text-center gap-3">
                        <div class="col-auto">
                            <button type="submit" class="btn btn-danger" type="submit">Yes. I'm sure.</button>
                        </div>
                        <div class="col-auto">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">No. I'm not
                                sure.</button>
                        </div>
                </form>
            </div>
        </div>
    </x-modal-popup>
</div>