<div class="container-fluid px-5">
    <div class="row">
        <div class="row shadow p-5 rounded-4">
            <div class="row border-bottom border-bottom-4 pb-4 mb-5">
                <div class="col">
                    <div class="col">
                        <h5 class="fs-4 badge text-bg-secondary">Project Description</h5>
                    </div>
                </div>
                <div class="col ">
                    <div class="d-flex flex-row justify-content-end align-items-center gap-2 h-100">
                        <button class="btn btn-warning" data-bs-target="#editProject" data-bs-toggle="modal"><i
                                class="bi bi-pencil-fill me-2"></i>Edit Project</button>
                        <button class="btn btn-danger" data-bs-target="#deleteProject" data-bs-toggle="modal"><i
                                class="bi bi-trash-fill me-2"></i>Delete Project</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="row mb-4">
                        <div class="form-group">
                            <label for="project_name" class="fs-5 mb-2">Project Name</label>
                            <input type="text" name="project_name" id="project_name" value="{{ $projectName }}"
                                class="form-control fs-6" disabled>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="form-group">
                            <label for="project_desc" class="fs-5 mb-2">Project Description</label>
                            <textarea name="project_desc" maxlength="720" style="max-height: 15rem; overflow:hidden; min-height: 15rem;"
                                class="form-control h-100 fs-6" disabled>{{ $projectDesc }}</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="project_desc" class="fs-5 mb-2">Created at</label>
                            <input type="text" name="project_name" id="project_name"
                                value="{{ $projectCreatedDate }}" class="form-control fs-6" disabled>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <p for="business_process_model" class="fs-5 mb-1">Business Process Model</p>
                            <div class="ratio ratio-1x1 w-100">
                                <img src="{{ route("images", $bpmImage) }}" id="bpm_preview"
                                    class="img-thumbnail object-fit-cover" data-bs-toggle="modal"
                                    data-bs-target="#bpmPreview" style="cursor: pointer;">
                            </div>
                        </div>
                        <div class="col">
                            <p for="problem_root_cause" class="fs-5 mb-1">Problem Root Cause</p>
                            <div class="ratio ratio-1x1 w-100">
                                <img src="{{ route("images", $prcImage) }}" id="prc_preview" style="cursor: pointer;"
                                    class="img-thumbnail object-fit-cover" data-bs-toggle="modal"
                                    data-bs-target="#prcPreview">
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Modal Preview BPM Image --}}
                <x-modal-popup title="Preview Image" modalName="bpmPreview"
                    customClass="modal-lg">
                    <x-slot name="modalIcon"></x-slot>
                    <div class="modal-body">
                        <div class="row">
                            <img src="{{ route("images", $bpmImage) }}">
                        </div>
                    </div>
                </x-modal-popup>

                {{-- Modal Preview PRC Image --}}
                <x-modal-popup title="Preview Image" modalName="prcPreview"
                    customClass="modal-lg   ">
                    <x-slot name="modalIcon"></x-slot>
                    <div class="modal-body">
                        <div class="row">
                            <img src="{{ route("images", $prcImage) }}">
                        </div>
                    </div>
                </x-modal-popup>

                {{-- Modal Edit Project Description --}}
                <x-modal-popup title="Preview Image" modalName="editProject"    >
                    <x-slot name="modalIcon"><i class="bi bi-pencil-fill me-2"></i></x-slot>
                    <form action="{{ route('project.edit', $idProject) }}" method="POST"
                        class="form-control border border-0 shadow p-5 rounded-4" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
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
                                        accept="image/*">
                                </div>
                                <div class="col">
                                    <label for="problem_root_cause" class="form-label mb-1">Problem Root Cause</label>
                                    <input type="file" name="problem_root_cause" class="form-control"
                                        accept="image/*">
                                </div>
                            </div>
                        </div>
                        <div class="row py-4 text-center">
                            <div class="col">
                                <button type="submit" class="btn btn-warning"><i class="bi bi-pencil-fill me-2"></i>Edit Project</button>
                            </div>
                        </div>
                    </form>
                </x-modal-popup>

                {{-- Modal Delete Project Description --}}
                <x-modal-popup title="Delete Project Apps" modalName="deleteProject">
                    <x-slot name="modalIcon"><i class="bi bi-trash-fill me-2"></i></x-slot>
                    <div class="modal-body">
                        <div class="row text-center">
                            <div class="col">
                                <div class="p-5">
                                    <p>Are you sure you want to delete this project?</p>
                                    <a href="" class="btn btn-danger" type="submit" >Yes. I'm sure.</a>
                                    <button class="btn btn-primary" type="submit" data-bs-dismiss="modal">No. I'm not sure.</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </x-modal-popup>
            </div>
        </div>
    </div>
</div>
