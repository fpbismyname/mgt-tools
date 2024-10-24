<div class="container-fluid mb-5">
    <div class="container">
        <div class="row gap-3">
            <div class="col-12">
                <div class="container border rounded-4 p-3 p-sm-4 shadow">
                    <div class="row align-items-center gap-1">
                        <div class="col-12 col-sm text-center text-sm-start">
                            <h1 class="fw-bolder text-primary fs-2" id="projectMenuTitle">Use Case</h1>
                            <p class="fs-6 w-md-50 text-body-secondary">List of use case.</p>
                        </div>
                        <div class="col-12 col-sm text-center text-sm-end">
                            <div class="container">
                                <div class="row justify-content-center justify-content-sm-end gap-2">
                                    <button class="col-auto btn btn-primary fs-6" data-bs-target="#addPopup"
                                        data-bs-toggle="modal"><i class="bi bi-plus-circle-fill me-2"></i>Add Use
                                        Case</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="container border rounded-4 p-5 p-sm-4 shadow">
                    <div class="row">
                        <div class="col">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    {{-- column title --}}
                                    <tbody class="">
                                        <tr class="align-middle">
                                            <th scope="col" class="text-start">UC.ID</th>
                                            <th scope="col">Use Case Name</th>
                                            <th scope="col" class="text-start">Use Case Description</th>
                                            <th scope="col" class="text-end">Action</th>
                                        </tr>
                                    </tbody>
                                    {{-- content table --}}
                                    <tbody>
                                        @php
                                            $useCase = $useCase->where('project_id', $projectId);
                                            $useCaseId = 1;
                                        @endphp
                                        @if ($useCase->count() > 0)
                                            @foreach ($useCase as $uc)
                                                <tr class="align-middle">
                                                    <td class="text-start col-1">{{ $uc->uid_case }}
                                                    </td>
                                                    <td class="col-auto">
                                                        <span class="fs-6">{{ $uc->case_name }}</span>
                                                    </td>
                                                    <td class="col-auto text-start">
                                                        <span
                                                            class="fs-6 d-block d-md-none">{{ Str::words($uc->case_desc, 5, '...') }}</span>
                                                        <span class="fs-6 d-none d-md-block">{{ $uc->case_desc }}</span>
                                                    </td>
                                                    <td class="text-end col-4">
                                                        <button class="btn btn-warning m-1"
                                                            data-bs-target="#editPopup-{{ $uc->id_usecase }}"
                                                            data-bs-toggle="modal"><i
                                                                class="bi bi-pencil-fill"></i><span
                                                                class="d-none d-lg-inline-block ms-2">Edit</span></button>
                                                        <button class="btn btn-danger m-1"
                                                            data-bs-target="#deletePopup-{{ $uc->id_usecase }}"
                                                            data-bs-toggle="modal">
                                                            <i class="bi bi-trash-fill me-lg-2"></i><span
                                                                class="d-none d-lg-inline-block">Delete</span></button>
                                                    </td>
                                                    {{-- //MARK: Edit UC --}}
                                                    <x-modal-popup title="Edit Use Case Description"
                                                        modalName="editPopup-{{ $uc->id_usecase }}">
                                                        <x-slot name="modalIcon"><i
                                                                class="bi bi-pencil-fill me-2"></i></x-slot>
                                                        <form action="{{ route('use-case.edit', $uc->id_usecase) }}"
                                                            method="POST"
                                                            class="form-control border border-0 rounded-4"
                                                            enctype="multipart/form-data" id="inputForm">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="container p-3">
                                                                <div class="row justify-content-center">
                                                                    <div class="container">
                                                                        <div class="row">
                                                                            <div class="col-12 mb-3">
                                                                                <label for="case_name"
                                                                                    class="form-label mb-1">Use case name</label>
                                                                                    <input type="text" name="case_name"
                                                                                    class="form-control"
                                                                                    value="{{ $uc->case_name }}">
                                                                                </div>
                                                                                <div class="col-12 mb-3">
                                                                                <label for="case_desc"
                                                                                    class="form-label mb-1">Use case description</label>
                                                                                <textarea name="case_desc" maxlength="720" style="max-height: 15rem; height:15rem;" class="form-control">{{ $uc->case_desc }}</textarea>
                                                                            </div>
                                                                            <div class="col-12 my-4 text-center">
                                                                                <button
                                                                                    class="col-auto btn btn-warning fs-6"
                                                                                    type="submit" id="btnSubmitForm"><i
                                                                                        class="bi bi-plus-circle-fill me-2"></i>Edit</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </x-modal-popup>
                                                    {{-- //MARK: Delete Solution Description --}}
                                                    <x-modal-popup title="Delete Use Case"
                                                        modalName="deletePopup-{{ $uc->id_usecase }}">
                                                        <x-slot name="modalIcon"><i
                                                                class="bi bi-trash-fill me-2"></i></x-slot>
                                                        <div class="container py-5">
                                                            <div class="container">
                                                                <form class="row text-center justify-content-center"
                                                                    action="{{ route('use-case.delete', $uc->id_usecase) }}"
                                                                    method="POST" id="inputForm">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <div class="row text-center">
                                                                        <div class="col-12">
                                                                            <p>Are you sure you want to delete this
                                                                                use case
                                                                                ?
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="row justify-content-center text-center gap-3">
                                                                        <div class="col-auto">
                                                                            <button type="submit"
                                                                                class="btn btn-danger"
                                                                                id="btnSubmitForm">Yes. I'm
                                                                                sure.</button>
                                                                        </div>
                                                                        <div class="col-auto">
                                                                            <button type="button"
                                                                                class="btn btn-primary"
                                                                                data-bs-dismiss="modal">No. I'm not
                                                                                sure.</button>
                                                                        </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </x-modal-popup>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr class="text-center">
                                                <td colspan="4" text-center> - No solution data- </td>
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
    </div>
    {{-- //MARK: Add Solution --}}
    <x-modal-popup title="Add Use Case" modalName="addPopup">
        <x-slot name="modalIcon"><i class="bi bi-plus-circle-fill me-2"></i></x-slot>
        <form action="{{ route('use-case.add', $projectId) }}" method="POST"
            class="form-control border border-0 rounded-4" enctype="multipart/form-data" id="inputForm">
            @csrf
            <div class="container p-3">
                <div class="row justify-content-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="case_name" class="form-label mb-1">Use case name</label>
                                    <input type="text" name="case_name" class="form-control"
                                    value="">
                                </div>
                                <div class="col-12 mb-3">
                                <label for="case_desc" class="form-label mb-1">Use case description</label>
                                <textarea name="case_desc" maxlength="720" style="max-height: 15rem; height:15rem;" class="form-control"></textarea>
                            </div>
                            <div class="col-12 my-4 text-center">
                                <button class="col-auto btn btn-primary fs-6" type="submit" id="btnSubmitForm"><i
                                        class="bi bi-plus-circle-fill me-2"></i>Add Use Case</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </x-modal-popup>
</div>
