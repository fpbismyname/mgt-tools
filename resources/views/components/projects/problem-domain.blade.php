<div class="container-fluid mb-5">
    <div class="container">
        <div class="row gap-3">
            {{-- //MARK:Header --}}
            <div class="container border rounded-4 p-3 p-sm-4 shadow">
                <div class="row align-items-center gap-1">
                    <div class="col-12 col-sm text-center text-sm-start">
                        <h1 class="fw-bolder text-primary fs-2" id="projectMenuTitle">Problem Domain</h1>
                        <p class="fs-6 w-md-50">Requirement Elicitation List of Requirements, Type: Needs</p>
                    </div>
                    <div class="col-12 col-sm text-center text-sm-end">
                        <div class="container">
                            <div class="row justify-content-center justify-content-sm-end gap-2">
                                <button class="col-auto btn btn-primary fs-6" data-bs-target="#addRequest"
                                    data-bs-toggle="modal"><i class="bi bi-plus-circle-fill me-2"></i>Add Problem</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- //MARK:Content --}}
            <div class="container border rounded-4 p-3 p-sm-4 shadow">
                <div class="row">
                    <div class="col">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                {{-- //MARK:header table --}}
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-start">Need.ID</th>
                                        <th scope="col">Request Description</th>
                                        <th scope="col" class="text-end">Action</th>
                                    </tr>
                                </thead>
                                {{-- //MARK:body table --}}
                                <tbody>
                                    @php
                                        $problemDomain = $problemDomain->where('project_id', '=', $projectId);
                                        $i = 1;
                                    @endphp
                                    @if ($problemDomain->count() > 0)
                                        @foreach ($problemDomain as $pd)
                                            <tr class="align-middle text-wrap" id="{{ $pd->id_problem }}">
                                                <td class="text-start col-1">{{ $pd->uid_problem }}</td>
                                                <td class="text-break col-auto">
                                                    {{ $pd->problem_name }}</td>
                                                <td class="text-end col-4">
                                                    {{-- Edit.problem & Delete.problem --}}
                                                    <button class="btn btn-warning m-1"
                                                        data-bs-target="#editRequest-{{ $pd->id_problem }}"
                                                        data-bs-toggle="modal">
                                                        <i class="bi bi-pencil-fill me-lg-2"></i><span
                                                            class="d-none d-lg-inline-block">Edit</span></button>
                                                    <button class="btn btn-danger m-1"
                                                        data-bs-target="#deleteRequest-{{ $pd->id_problem }}"
                                                        data-bs-toggle="modal">
                                                        <i class="bi bi-trash-fill me-lg-2"></i><span
                                                            class="d-none d-lg-inline-block">Delete</span></button>
                                                </td>
                                            </tr>
                                            {{-- Modal edit problem domain --}}
                                            <x-modal-popup title="Edit Request"
                                                modalName="editRequest-{{ $pd->id_problem }}">
                                                <x-slot name="modalIcon"><i class="bi bi-pencil-fill me-2"></i></x-slot>
                                                <form action="{{ route('problem-domain.edit', $pd->id_problem) }}"
                                                    method="POST" class="form-control border border-0 rounded-4"
                                                    enctype="multipart/form-data" id="inputForm">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="container p-3">
                                                        <div class="row justify-content-center">
                                                            <div class="container">
                                                                <div class="col-12 mb-3">
                                                                    <label for="request_desc"
                                                                        class="form-label mb-1">New Request
                                                                        Description</label>
                                                                    <textarea name="problem_name" maxlength="720" style="max-height: 15rem; height:15rem;" class="form-control">{{ $pd->problem_name }}</textarea>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-12 my-4 text-center">
                                                                        <button class="col-auto btn btn-warning fs-6"
                                                                            type="submit" id="btnSubmitForm"><i
                                                                                class="bi bi-pencil-fill me-2"></i>Edit
                                                                            Request</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </x-modal-popup>
                                            {{-- Modal Delete Project Description --}}
                                            <x-modal-popup title="Delete Request"
                                                modalName="deleteRequest-{{ $pd->id_problem }}">
                                                <x-slot name="modalIcon"><i class="bi bi-trash-fill me-2"></i></x-slot>
                                                <div class="container py-5">
                                                    <div class="container">
                                                        <form class="row text-center justify-content-center"
                                                            action="{{ route('problem-domain.delete', ['id_project'=> $projectId, 'id'=> $pd->id_problem]) }}"
                                                            method="POST" id="inputForm">
                                                            @csrf
                                                            @method('DELETE')
                                                            <div class="row text-center">
                                                                <div class="col-12">
                                                                    <p>Are you sure you want to delete this request ?
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="row justify-content-center text-center gap-3">
                                                                <div class="col-auto">
                                                                    <button type="submit" class="btn btn-danger"
                                                                        id="btnSubmitForm">Yes. I'm sure.</button>
                                                                </div>
                                                                <div class="col-auto">
                                                                    <button type="button" class="btn btn-primary"
                                                                        data-bs-dismiss="modal">No. I'm not
                                                                        sure.</button>
                                                                </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </x-modal-popup>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="3" class="text-center">- No request data. -</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- //MARK:Modal add problem domain --}}
    <x-modal-popup title="Add Problem" modalName="addRequest">
        <x-slot name="modalIcon"><i class="bi bi-plus-circle-fill me-2"></i></x-slot>
        <form action="{{ route('problem-domain.add', $projectId) }}" method="POST" class="form-control border border-0 shadow rounded-4" enctype="multipart/form-data" id="inputForm">
            @csrf
            <div class="container p-3">
                <div class="row justify-content-center">
                    <div class="container">
                        <div class="col-12 mb-3">
                            <label for="request_desc" class="form-label mb-1">Request Description</label>
                            <textarea name="request_desc" maxlength="720" style="max-height: 15rem; height:15rem;" class="form-control"
                                placeholder="Type here for add problem..."></textarea>
                        </div>
                        <div class="row">
                            <div class="col-12 my-4 text-center">
                                <button class="col-auto btn btn-primary fs-6" type="submit" id="btnSubmitForm"><i
                                        class="bi bi-plus-circle-fill me-2"></i>Add Problem</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </x-modal-popup>
</div>

