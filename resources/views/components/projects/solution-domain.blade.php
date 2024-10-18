<div class="container-fluid mb-5">
    <div class="container">
        <div class="row gap-5">
            <div class="col-12">
                {{-- //MARK:Header --}}
                <div class="container border rounded-4 p-3 p-sm-4 shadow">
                    <div class="row align-items-center gap-1">
                        <div class="col-12 col-sm text-center text-sm-start">
                            <h1 class="fw-bolder text-primary fs-2" id="projectMenuTitle">Solution Domain</h1>
                            <p class="fs-6 w-md-50">Requirement Elicitation List : Feat (feature)</p>
                        </div>
                        <div class="col-12 col-sm text-center text-sm-end">
                            <div class="container">
                                <div class="row justify-content-center justify-content-sm-end gap-2">
                                    <button class="col-auto btn btn-primary fs-6" data-bs-target="#addSolution"
                                        data-bs-toggle="modal"><i class="bi bi-plus-circle-fill me-2"></i>Add
                                        Feature</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                {{-- //MARK:Content --}}
                {{-- //MARK:Functional Requirement --}}
                <div class="container shadow border p-3 p-sm-4 rounded-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="">
                                        <tr>
                                            <th scope="col" class="p-3 fs-4 text-body-secondary" colspan="3">
                                                Functional Requirement
                                            </th>
                                        </tr>
                                    </thead>
                                    {{-- column title --}}
                                    <tbody class="table-group-divider">
                                        <tr class="align-middle">
                                            <th scope="col" class="text-center">No</th>
                                            <th scope="col">Request Description</th>
                                            <th scope="col" class="text-end">Action</th>
                                        </tr>
                                    </tbody>
                                    {{-- content table --}}
                                    <tbody>
                                        @php
                                            $functionalSolution = $solutionDomain
                                                ->where('project_id', $projectId)
                                                ->where('type_solution', 'Functionality');
                                        @endphp
                                        @if ($functionalSolution->count() > 0)
                                            @foreach ($functionalSolution as $sD)
                                                <tr class="align-middle">
                                                    <td class="text-center">{{ sprintf('REQ%03d',$sD->id_solution) }}</td>
                                                    <td>{{ $sD->solution_desc }}</td>
                                                    <td class="text-end">
                                                        {{-- Edit.problem & Delete.problem --}}
                                                        <button class="btn btn-warning m-1"
                                                            data-bs-target="#editSolution-" data-bs-toggle="modal">
                                                            <i class="bi bi-pencil-fill me-lg-2"></i><span
                                                                class="d-none d-lg-inline-block">Edit</span></button>
                                                        <button class="btn btn-danger m-1"
                                                            data-bs-target="#deleteSolution-" data-bs-toggle="modal">
                                                            <i class="bi bi-trash-fill me-lg-2"></i><span
                                                                class="d-none d-lg-inline-block">Delete</span></button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr class="text-center">
                                                <td colspan="3" text-center> - No solution data- </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                {{-- //MARK:NonFunctional Requirement --}}
                <div class="container shadow border p-3 p-sm-4 rounded-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    {{-- Table Title --}}
                                    <thead class="">
                                        <tr>
                                            <th scope="col" class="p-3 fs-4 text-body-secondary " colspan="3">Non
                                                Functional
                                                Requirement
                                            </th>
                                        </tr>
                                    </thead>
                                    {{-- column title --}}
                                    <tbody class="table-group-divider">
                                        <tr class="align-middle">
                                            <th scope="col" class="text-center">No</th>
                                            <th scope="col">Request Description</th>
                                            <th scope="col" class="text-end">Action</th>
                                        </tr>
                                    </tbody>

                                    {{-- //MARK:Usability --}}
                                    <tbody>
                                        <tr>
                                            <td scope="col" colspan="3" class="border-0"><span
                                                    class="text-danger"><i
                                                        class="bi bi-person-fill-check me-2"></i>Usability
                                                    (lingkungan operasional dan tipeuser)</span></td>
                                        </tr>
                                    </tbody>
                                    {{-- content table --}}
                                    <tbody>
                                        @php
                                            $usabilitySolution = $solutionDomain
                                                ->where('project_id', $projectId)
                                                ->where('type_solution', 'Usability');
                                        @endphp
                                        @if ($usabilitySolution->count() > 0)
                                            @foreach ($usabilitySolution as $sD)
                                                <tr class="align-middle">
                                                    <td class="text-center">{{ sprintf('REQ%03d',$sD->id_solution) }}</td>
                                                    <td>{{ $sD->solution_desc }}</td>
                                                    <td class="text-end">
                                                        {{-- Edit.problem & Delete.problem --}}
                                                        <button class="btn btn-warning m-1"
                                                            data-bs-target="#editSolution-" data-bs-toggle="modal">
                                                            <i class="bi bi-pencil-fill me-lg-2"></i><span
                                                                class="d-none d-lg-inline-block">Edit</span></button>
                                                        <button class="btn btn-danger m-1"
                                                            data-bs-target="#deleteSolution-" data-bs-toggle="modal">
                                                            <i class="bi bi-trash-fill me-lg-2"></i><span
                                                                class="d-none d-lg-inline-block">Delete</span></button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr class="text-center">
                                                <td colspan="3" text-center> - No solution data- </td>
                                            </tr>
                                        @endif
                                    </tbody>

                                    {{-- //MARK:Reliability --}}
                                    <tbody>
                                        <tr>
                                            <td scope="col" colspan="3" class="border-0"><span
                                                    class="text-danger"><i
                                                        class="bi bi-gear-wide-connected me-2"></i>Reliability
                                                    (Availability, MTBF, MTTR, akurasi)</span></td>
                                        </tr>
                                    </tbody>
                                    {{-- content table --}}
                                    <tbody>
                                        @php
                                            $reliabilitySolution = $solutionDomain
                                                ->where('project_id', $projectId)
                                                ->where('type_solution', 'Reliability');
                                        @endphp
                                        @if ($reliabilitySolution->count() > 0)
                                            @foreach ($reliabilitySolution as $sD)
                                                <tr class="align-middle">
                                                    <td class="text-center">{{ sprintf('REQ%03d',$sD->id_solution) }}</td>
                                                    <td>{{ $sD->solution_desc }}</td>
                                                    <td class="text-end">
                                                        {{-- Edit.problem & Delete.problem --}}
                                                        <button class="btn btn-warning m-1"
                                                            data-bs-target="#editSolution-" data-bs-toggle="modal">
                                                            <i class="bi bi-pencil-fill me-lg-2"></i><span
                                                                class="d-none d-lg-inline-block">Edit</span></button>
                                                        <button class="btn btn-danger m-1"
                                                            data-bs-target="#deleteSolution-" data-bs-toggle="modal">
                                                            <i class="bi bi-trash-fill me-lg-2"></i><span
                                                                class="d-none d-lg-inline-block">Delete</span></button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr class="text-center">
                                                <td colspan="3" text-center> - No solution data- </td>
                                            </tr>
                                        @endif
                                    </tbody>

                                    {{-- //MARK:Performance --}}
                                    <tbody>
                                        <tr>
                                            <td scope="col" colspan="3" class="border-0"><span
                                                    class="text-danger"><i
                                                        class="bi bi-speedometer me-2"></i>Performance (Response time,
                                                    throughput, capacity, degradation modes)</span></td>
                                        </tr>
                                    </tbody>
                                    {{-- content table --}}
                                    <tbody>
                                        @php
                                            $performanceSolution = $solutionDomain
                                                ->where('project_id', $projectId)
                                                ->where('type_solution', 'Performance');
                                        @endphp
                                        @if ($performanceSolution->count() > 0)
                                            @foreach ($performanceSolution as $sD)
                                                <tr class="align-middle">
                                                    <td class="text-center">{{ sprintf('REQ%03d',$sD->id_solution) }}</td>
                                                    <td>{{ $sD->solution_desc }}</td>
                                                    <td class="text-end">
                                                        {{-- Edit.problem & Delete.problem --}}
                                                        <button class="btn btn-warning m-1"
                                                            data-bs-target="#editSolution-" data-bs-toggle="modal">
                                                            <i class="bi bi-pencil-fill me-lg-2"></i><span
                                                                class="d-none d-lg-inline-block">Edit</span></button>
                                                        <button class="btn btn-danger m-1"
                                                            data-bs-target="#deleteSolution-" data-bs-toggle="modal">
                                                            <i class="bi bi-trash-fill me-lg-2"></i><span
                                                                class="d-none d-lg-inline-block">Delete</span></button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr class="text-center">
                                                <td colspan="3" text-center> - No solution data- </td>
                                            </tr>
                                        @endif
                                    </tbody>

                                    {{-- //MARK:Supportability --}}
                                    <tbody>
                                        <tr>
                                            <td scope="col" colspan="3" class="border-0"><span
                                                    class="text-danger"><i class="bi bi-tools me-2"></i>Supportability
                                                    (kemudahan dimodifikasi untuk mengakomodasi pengembangan atau
                                                    perbaikan)</span></td>
                                        </tr>
                                    </tbody>
                                    {{-- content table --}}
                                    <tbody>
                                        @php
                                            $supportabilitySolution = $solutionDomain
                                                ->where('project_id', $projectId)
                                                ->where('type_solution', 'Supportability');
                                        @endphp
                                        @if ($supportabilitySolution->count() > 0)
                                            @foreach ($supportabilitySolution as $sD)
                                                <tr class="align-middle">
                                                    <td class="text-center">{{ sprintf('REQ%03d',$sD->id_solution) }}</td>
                                                    <td>{{ $sD->solution_desc }}</td>
                                                    <td class="text-end">
                                                        {{-- Edit.problem & Delete.problem --}}
                                                        <button class="btn btn-warning m-1"
                                                            data-bs-target="#editSolution-" data-bs-toggle="modal">
                                                            <i class="bi bi-pencil-fill me-lg-2"></i><span
                                                                class="d-none d-lg-inline-block">Edit</span></button>
                                                        <button class="btn btn-danger m-1"
                                                            data-bs-target="#deleteSolution-" data-bs-toggle="modal">
                                                            <i class="bi bi-trash-fill me-lg-2"></i><span
                                                                class="d-none d-lg-inline-block">Delete</span></button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr class="text-center">
                                                <td colspan="3" text-center> - No solution data- </td>
                                            </tr>
                                        @endif
                                    </tbody>

                                    {{-- //MARK:Design & Implementation --}}
                                    <tbody>
                                        <tr>
                                            <td scope="col" colspan="3" class="border-0"><span
                                                    class="text-danger"><i class="bi bi-view-list me-2"></i>Design &
                                                    Implementation Constraint (Batasan/ Prasyarat pada Rancangan &
                                                    Pemrograman]</span></td>
                                        </tr>
                                    </tbody>
                                    {{-- content table --}}
                                    <tbody>
                                        @php
                                            $designSolution = $solutionDomain
                                                ->where('project_id', $projectId)
                                                ->where('type_solution', "Design & Implementation Constraint");
                                        @endphp
                                        @if ($designSolution->count() > 0)
                                            @foreach ($designSolution as $sD)
                                                <tr class="align-middle">
                                                    <td class="text-center">{{ sprintf('REQ%03d',$sD->id_solution) }}</td>
                                                    <td>{{ $sD->solution_desc }}</td>
                                                    <td class="text-end">
                                                        {{-- Edit.problem & Delete.problem --}}
                                                        <button class="btn btn-warning m-1"
                                                            data-bs-target="#editSolution-" data-bs-toggle="modal">
                                                            <i class="bi bi-pencil-fill me-lg-2"></i><span
                                                                class="d-none d-lg-inline-block">Edit</span></button>
                                                        <button class="btn btn-danger m-1"
                                                            data-bs-target="#deleteSolution-" data-bs-toggle="modal">
                                                            <i class="bi bi-trash-fill me-lg-2"></i><span
                                                                class="d-none d-lg-inline-block">Delete</span></button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr class="text-center">
                                                <td colspan="3" text-center> - No solution data- </td>
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
</div>
{{-- //MARK: Add Solution --}}
<x-modal-popup title="Add Solution Feature" modalName="addSolution">
    <x-slot name="modalIcon"><i class="bi bi-plus-circle-fill me-2"></i></x-slot>
    <form action="{{ route('solution-domain.add', $projectId) }}" method="post">
        @csrf
        <div class="container p-3">
            <div class="row justify-content-center">
                <div class="container">
                    <div class="col-12 mb-3">
                        <label for="solution_desc" class="form-label mb-1">Request Description</label>
                        <input type="text" name="solution_desc" class="form-control"></textarea>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="solution_desc" class="form-label mb-1">Type Solution</label>
                        <select name="type_solution" class="form-select">
                            @foreach ($solutionType as $sT)
                                <option value="{{ $sT->type_name }}">{{ $sT->type_name }}</option>
                            @endforeach
                        </select>
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
