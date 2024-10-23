<div class="container-fluid mb-5">
    <div class="container">
        <div class="row gap-3">
            <div class="col">
                <div class="container border rounded-4 p-3 p-sm-4 shadow">
                    <div class="row align-items-center gap-1">
                        <div class="col-12 col-sm text-center text-sm-start">
                            <h1 class="fw-bolder text-primary fs-2" id="projectMenuTitle">Use Case vs Feat</h1>
                            <p class="fs-6 text-body-secondary">List of use case vs Feat (feature)</p>
                        </div>
                        <div class="col-12 col-sm text-center text-sm-end">
                            <div class="container">
                                <div class="row justify-content-center justify-content-sm-end gap-2">
                                    <button class="col-auto btn btn-primary fs-6"
                                        onclick="toggleView(event,'tbl-uc-act','tbl-act')">Manage Actor</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- MARK:Tabel Use Case --}}
            <div class="col-12" id="tbl-uc-act">
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
                                            <th scope="col" class="text-center">Feature</th>
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
                                                    <td class="text-start col-1">{{ sprintf('UC%03d', $useCaseId++) }}
                                                    </td>
                                                    <td class="col-auto">
                                                        <span class="fs-6">{{ $uc->case_name }}</span>
                                                    </td>
                                                    <td class="col-auto text-start">
                                                        <span
                                                            class="fs-6 d-block d-md-none">{{ Str::words($uc->case_desc, 5, '...') }}</span>
                                                        <span class="fs-6 d-none d-md-block">{{ $uc->case_desc }}</span>
                                                    </td>
                                                    <td class="col-2 text-center">
                                                        {{-- {{ $uc->case_actor ? '' : '-' }} --}}
                                                        @if ($solutionDomain->count() > 0)
                                                            <div class="d-flex flex-wrap justify-content-center gap-1">
                                                                @php
                                                                    $Func = 1;
                                                                    $Usb = 1;
                                                                    $Rlby = 1;
                                                                    $Perform = 1;
                                                                    $Support = 1;
                                                                    $Design = 1;
                                                                @endphp
                                                                @foreach ($solutionDomain as $sd)
                                                                    @switch($sd->type_solution)
                                                                        @case('Functionality')
                                                                            <span class="badge text-bg-primary">REQ{{ $Func++ }}</span>
                                                                        @break
                                                                        @case('Usability')
                                                                        <span class="badge text-bg-info">REQ{{ $Usb++ }}</span>
                                                                        @break
                                                                        @case('Reliability')
                                                                        <span class="badge text-bg-success">REQ{{ $Rlby++ }}</span>
                                                                        @break
                                                                        @case('Performance')
                                                                        <span class="badge text-bg-warning">REQ{{ $Perform++ }}</span>
                                                                        @break
                                                                        @case('Supportability')
                                                                        <span class="badge text-bg-danger">REQ{{ $Support++ }}</span>
                                                                        @break
                                                                        @case('Design & Implementation Constraint')
                                                                        <span class="badge text-bg-secondary">REQ{{ $Design++ }}</span>
                                                                        @break
                                                                    @endswitch
                                                                @endforeach
                                                            </div>
                                                        @endif
                                                    </td>
                                                    <td class="text-end col-2">
                                                        <button class="btn btn-warning m-1"
                                                            data-bs-target="#editPopup-{{ $uc->id_usecase }}"
                                                            data-bs-toggle="modal"><i
                                                                class="bi bi-pencil-fill"></i><span
                                                                class="d-none d-lg-inline-block ms-2">Edit</span></button>
                                                        {{-- <button class="btn btn-danger m-1"
                                                            data-bs-target="#deletePopup-{{ $uc->id_usecase }}"
                                                            data-bs-toggle="modal">
                                                            <i class="bi bi-trash-fill me-lg-2"></i><span
                                                                class="d-none d-lg-inline-block">Delete</span></button> --}}
                                                    </td>
                                                    {{-- //MARK: Edit UC --}}
                                                    <x-modal-popup title="Edit Use Case Actor"
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
                                                                <div class="row">
                                                                    <div class="container">
                                                                        <div class="row justify-content-center">
                                                                            <div
                                                                                class="col-12 mb-3 justify-content-center ">
                                                                                <div
                                                                                    class="d-flex flex-column justify-content-center align-items-center gap-2">
                                                                                    <label for="case_actor"
                                                                                        class="form-label mb-1">Select
                                                                                        the
                                                                                        actor for use case :</label>
                                                                                    {{-- @foreach ($useCaseActor as $uca)
                                                                                        <div class="form-check">
                                                                                            <input
                                                                                                class="form-check-input"
                                                                                                type="checkbox"
                                                                                                name="case_actor[]"
                                                                                                value="{{ $uca->actor_name }}"
                                                                                                {{ Str::of($uc->case_actor)->contains($uca->actor_name) ? 'checked' : '' }}><span
                                                                                                class="badge text-bg-primary border border-4 border-primary-subtle">{{ $uca->actor_name }}</span></input>
                                                                                        </div>
                                                                                    @endforeach --}}
                                                                                </div>
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
    {{-- //MARK: Add Actor --}}
    <x-modal-popup title="Manage Actor" modalName="addActor">
        <x-slot name="modalIcon"><i class="bi bi-list-task me-2"></i></x-slot>
        <form action="{{ route('use-case-actor.add', $projectId) }}" method="post">
            @csrf
            <div class="container p-5">
                <div class="row">
                    <div class="col-12 mb-3">
                        <label for="actor_name">Actor name</label>
                        <input class="form-control" type="text" name="actor_name" value="">
                    </div>
                    <div class="col-12 text-center py-2">
                        <button class="btn btn-primary"><i class="bi bi-plus-circle-fill me-2"></i>Add
                            Actor</button>
                    </div>
                </div>
            </div>
        </form>
    </x-modal-popup>
</div>
