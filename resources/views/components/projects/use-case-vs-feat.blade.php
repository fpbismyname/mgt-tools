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
                                    <button class="col-auto btn btn-primary fs-6" data-bs-toggle="modal"
                                        data-bs-target="#legendaUCvsF"><i
                                            class="bi bi-map-fill me-2"></i>Legenda</button>
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
                                        <tr class="align-middle" rowspan="2">
                                            <th scope="col" class="text-start">UC.ID</th>
                                            <th scope="col">Use Case Name</th>
                                            <th scope="col" class="text-start">Use Case Description</th>
                                            <th scope="col" colspan="1" class="text-center">Feature</th>
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
                                                    {{-- MARK:Feature --}}
                                                    <td class="align-middle">
                                                        <div class="d-flex flex-row flex-wrap justify-content-center">
                                                            @if ($uc->case_for_solution)
                                                                @foreach ($solutionDomain as $sd)
                                                                    <div class="d-flex-flex-column flex-wrap">
                                                                        <span
                                                                            class="m-1 {{ Str::of($uc->case_for_solution)->contains($sd->uid_solution) ? 'd-block' : 'd-none' }} 
                                                                                {{ $sd->type_solution == 'Functionality' ? 'badge rounded-pill text-bg-primary' : '' }}
                                                                                {{ $sd->type_solution == 'Usability' ? 'badge rounded-pill text-bg-info' : '' }}
                                                                                {{ $sd->type_solution == 'Reliability' ? 'badge rounded-pill text-bg-success' : '' }}
                                                                                {{ $sd->type_solution == 'Performance' ? 'badge rounded-pill text-bg-warning' : '' }}
                                                                                {{ $sd->type_solution == 'Supportability' ? 'badge rounded-pill text-bg-danger' : '' }}
                                                                                {{ $sd->type_solution == 'Design & Implementation Constraint' ? 'badge rounded-pill text-bg-secondary' : '' }}
                                                                                    ">{{ Str::before($sd->uid_solution, '-') }}</span>
                                                                    </div>
                                                                @endforeach
                                                            @else
                                                                <span>-</span>
                                                            @endif
                                                        </div>
                                                    </td>
                                                    <td class="text-end col-2">
                                                        <button class="btn btn-warning m-1"
                                                            data-bs-target="#editPopup-{{ $uc->id_usecase }}"
                                                            data-bs-toggle="modal"><i
                                                                class="bi bi-pencil-fill"></i><span
                                                                class="d-none d-lg-inline-block ms-2">Edit</span></button>
                                                    </td>
                                                    {{-- //MARK: Edit UC --}}
                                                    <x-modal-popup title="{{ $uc->uid_case }} - Edit Feat"
                                                        modalName="editPopup-{{ $uc->id_usecase }}">
                                                        <x-slot name="modalIcon"><i
                                                                class="bi bi-pencil-fill me-2"></i></x-slot>
                                                        <form action="{{ route('use-case.edit', $uc->id_usecase) }}"
                                                            method="POST"
                                                            class="form-control border border-0 rounded-4"
                                                            enctype="multipart/form-data" id="inputForm">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="container">
                                                                <div class="row text-center">
                                                                    <label for="case_actor"
                                                                        class="form-label mb-1 fs-5">Select
                                                                        the
                                                                        feature for the use case
                                                                        :</label>
                                                                    @foreach ($typeSolution as $ts)
                                                                        <div
                                                                            class="col-12 d-flex my-3 flex-column align-items-center justify-content-center">
                                                                            <h5 class="fs-6">{{ $ts->type_name }}
                                                                            </h5>
                                                                            @foreach ($solutionDomain->where('type_solution', $ts->type_name) as $sd)
                                                                                <div
                                                                                    class="d-flex flex-row gap-2 align-items-center justify-content-center flex-wrap">
                                                                                    <input type="checkbox"
                                                                                        name="case_for_solution[]"
                                                                                        class="form-check-input mb-2"
                                                                                        value="{{ $sd->uid_solution }}"
                                                                                        {{ Str::contains($uc->case_for_solution, $sd->uid_solution) ? 'checked' : '' }} />
                                                                                    <label for="case_for_solution"
                                                                                        class="
                                                                                                {{ $ts->type_name == 'Functionality' ? 'badge rounded-pill text-bg-primary' : '' }}
                                                                                                {{ $ts->type_name == 'Usability' ? 'badge rounded-pill text-bg-info' : '' }}
                                                                                                {{ $ts->type_name == 'Reliability' ? 'badge rounded-pill text-bg-success' : '' }}
                                                                                                {{ $ts->type_name == 'Performance' ? 'badge rounded-pill text-bg-warning' : '' }}
                                                                                                {{ $ts->type_name == 'Supportability' ? 'badge rounded-pill text-bg-danger' : '' }}
                                                                                                {{ $ts->type_name == 'Design & Implementation Constraint' ? 'badge rounded-pill text-bg-secondary' : '' }}
                                                                                                ">{{ Str::before($sd->uid_solution, '-') }}</label>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>
                                                                    @endforeach
                                                                    <div class="col-12 my-4 text-center">
                                                                        <button class="col-auto btn btn-warning fs-6"
                                                                            type="submit" id="btnSubmitForm"><i
                                                                                class="bi bi-plus-circle-fill me-2"></i>Edit</button>
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
    {{-- //MARK: Legenda Potential --}}
    <x-modal-popup title="Legenda Use Case vs Feat (feature)" modalName="legendaUCvsF">
        <x-slot name="modalIcon"><i class="bi bi-map-fill me-2"></i></x-slot>
        <div class="container">
            <div class="row p-5 gap-4 text-center">
                <div class="col-12">
                    <h4 class="fs-4">Type of solution domain</h4>
                </div>
                @foreach ($typeSolution as $ts)
                    <div class="col-12">
                            <h5
                                class="fs-5
                            {{ $ts->type_name == 'Functionality' ? 'badge rounded-pill text-bg-primary' : '' }}
                            {{ $ts->type_name == 'Usability' ? 'badge rounded-pill text-bg-info' : '' }}
                            {{ $ts->type_name == 'Reliability' ? 'badge rounded-pill text-bg-success' : '' }}
                            {{ $ts->type_name == 'Performance' ? 'badge rounded-pill text-bg-warning' : '' }}
                            {{ $ts->type_name == 'Supportability' ? 'badge rounded-pill text-bg-danger' : '' }}
                            {{ $ts->type_name == 'Design & Implementation Constraint' ? 'badge rounded-pill text-bg-secondary' : '' }}
                            ">
                                REQ000</h5>
                            <h5 class="fs-6">{{ $ts->type_name }}</h5>
                    </div>
                @endforeach
            </div>
        </div>
    </x-modal-popup>
</div>
