<div class="container-fluid mb-5">
    <div class="container">
        <div class="row gap-3">
            {{-- //MARK:HEADER --}}
            <div class="col-12">
                <div class="container border rounded-4 p-3 p-sm-4 shadow">
                    <div class="row align-items-center gap-1">
                        <div class="col-12 col-sm text-center text-sm-start">
                            <h1 class="fw-bolder text-primary fs-2" id="projectMenuTitle">Need vs Feat</h1>
                            <p class="fs-6 w-md-50">Comparison Need (problem domain) vs Feat (feature)</p>
                        </div>
                        <div class="col-12 col-sm text-center text-sm-end">
                            <div class="container">
                                <div class="row justify-content-center justify-content-sm-end gap-2">
                                    <button class="col-auto btn btn-primary fs-6" data-bs-target="#addRequest"
                                        data-bs-toggle="modal"><i class="bi bi-plus-circle-fill me-2"></i>Add
                                        Feature</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- //MARK:CONTENT --}}
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
                                            <th scope="col" class="text-start">Req.ID</th>
                                            <th scope="col">Request Description</th>
                                            <th scope="col" class="text-center">Needs Type</th>
                                            <th scope="col" class="text-end">Action</th>
                                        </tr>
                                    </tbody>
                                    {{-- content table --}}
                                    <tbody>
                                        @php
                                            $functionalSolution = $solutionDomain
                                                ->where('project_id', $projectId)
                                                ->where('type_solution', 'Functionality');
                                            $functional = 1;
                                            $problemDomains = $problemDomain->where('project_id', '=', $projectId);
                                        @endphp
                                        @if ($functionalSolution->count() > 0)
                                            @foreach ($functionalSolution as $sD)
                                                <tr class="align-middle">
                                                    <td class="text-start col-1">{{ sprintf('REQ%03d', $functional++) }}
                                                    </td>
                                                    <td class="col-auto">{{ $sD->solution_desc }}</td>
                                                    <td class="col-2 text-center">
                                                       {{ $sD->solution_need ? $sD->solution_need : "Need-?" }} 
                                                    </td>
                                                    <td class="text-end col-2">
                                                        <button class="btn btn-warning"
                                                            data-bs-target="#editPotential-{{ $sD->id_solution }}"
                                                            data-bs-toggle="modal"><i
                                                                class="bi bi-pencil-fill"></i><span
                                                                class="d-none d-lg-inline-block ms-2">Edit</span></button>
                                                    </td>
                                                    {{-- //MARK: Edit Solution domain --}}
                                                <x-modal-popup title="Edit Potential Problem" modalName="editPotential-{{ $sD->id_solution }}">
                                                    <x-slot name="modalIcon"><i
                                                            class="bi bi-pencil-fill me-2"></i></x-slot>
                                                    <form
                                                        action="{{ route('solution-domain.edit', $sD->id_solution) }}"
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
                                                                            <label class="form-label mb-1">Request Description</label>
                                                                            <input type="text"
                                                                                class="form-control" disabled
                                                                                value="{{ $sD->solution_revision ? $sD->solution_revision : $sD->solution_desc }}">
                                                                        </div>
                                                                        <div class="col-12 mb-3">
                                                                            <label for="solution_need"
                                                                                class="form-label mb-1">Needs To</label>
                                                                            <select name="solution_need"
                                                                                class="form-select">
                                                                                @php
                                                                                    $problemDomain = 0;
                                                                                @endphp
                                                                                    @foreach ($problemDomains as $pd)
                                                                                    {{$problemDomain++}}
                                                                                        <option value="Need-{{$problemDomain}}">Need-{{$problemDomain}}</option>
                                                                                    @endforeach
                                                                            </select>
                                                                        </div>  
                                                                        <div class="col-12 my-4 text-center">
                                                                            <button
                                                                                class="col-auto btn btn-warning fs-6"
                                                                                type="submit"
                                                                                id="btnSubmitForm"><i
                                                                                    class="bi bi-plus-circle-fill me-2"></i>Edit
                                                                                Potential</button>
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
                                            <th scope="col" class="p-3 fs-4 text-body-secondary " colspan="3">
                                                Non
                                                Functional
                                                Requirement
                                            </th>
                                        </tr>
                                    </thead>
                                    {{-- column title --}}
                                    <tbody class="table-group-divider">
                                        <tr class="align-middle">
                                            <th scope="col" class="text-start">Req.ID</th>
                                            <th scope="col">Request Description</th>
                                            <th scope="col" class="text-center">Needs Type</th>
                                            <th scope="col" class="text-end">Action</th>
                                        </tr>
                                    </tbody>

                                    {{-- //MARK:Usability --}}
                                    <tbody>
                                        <tr>
                                            <td scope="col" colspan="4" class="border-0"><span
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
                                            $usability = 1;
                                        @endphp
                                        @if ($usabilitySolution->count() > 0)
                                            @foreach ($usabilitySolution as $sD)
                                                <tr class="align-middle">
                                                    <td class="text-start col-1">{{ sprintf('REQ%03d', $usability++) }}
                                                    </td>
                                                    <td class="col-auto">{{ $sD->solution_desc }}</td>
                                                    <td class="col-2 text-center">
                                                        {{ $sD->solution_need ? $sD->solution_need : "Need-?" }} 
                                                     </td>
                                                     <td class="text-end col-2">
                                                         <button class="btn btn-warning"
                                                             data-bs-target="#editPotential-{{ $sD->id_solution }}"
                                                             data-bs-toggle="modal"><i
                                                                 class="bi bi-pencil-fill"></i><span
                                                                 class="d-none d-lg-inline-block ms-2">Edit</span></button>
                                                     </td>
                                                     {{-- //MARK: Edit Solution domain --}}
                                                 <x-modal-popup title="Edit Potential Problem" modalName="editPotential-{{ $sD->id_solution }}">
                                                     <x-slot name="modalIcon"><i
                                                             class="bi bi-pencil-fill me-2"></i></x-slot>
                                                     <form
                                                         action="{{ route('solution-domain.edit', $sD->id_solution) }}"
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
                                                                             <label class="form-label mb-1">Request Description</label>
                                                                             <input type="text"
                                                                                 class="form-control" disabled
                                                                                 value="{{ $sD->solution_revision ? $sD->solution_revision : $sD->solution_desc }}">
                                                                         </div>
                                                                         <div class="col-12 mb-3">
                                                                             <label for="solution_need"
                                                                                 class="form-label mb-1">Needs To</label>
                                                                             <select name="solution_need"
                                                                                 class="form-select">
                                                                                 @php
                                                                                     $problemDomain = 0;
                                                                                 @endphp
                                                                                     @foreach ($problemDomains as $pd)
                                                                                     {{$problemDomain++}}
                                                                                         <option value="Need-{{$problemDomain}}">Need-{{$problemDomain}}</option>
                                                                                     @endforeach
                                                                             </select>
                                                                         </div>  
                                                                         <div class="col-12 my-4 text-center">
                                                                             <button
                                                                                 class="col-auto btn btn-warning fs-6"
                                                                                 type="submit"
                                                                                 id="btnSubmitForm"><i
                                                                                     class="bi bi-plus-circle-fill me-2"></i>Edit
                                                                                 Potential</button>
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

                                    {{-- //MARK:Reliability --}}
                                    <tbody>
                                        <tr>
                                            <td scope="col" colspan="4" class="border-0"><span
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
                                            $reliability = 1;
                                        @endphp
                                        @if ($reliabilitySolution->count() > 0)
                                            @foreach ($reliabilitySolution as $sD)
                                                <tr class="align-middle">
                                                    <td class="text-start">{{ sprintf('REQ%03d', $reliability++) }}
                                                    </td>
                                                    <td>{{ $sD->solution_desc }}</td>
                                                    <td class="col-2 text-center">
                                                        {{ $sD->solution_need ? $sD->solution_need : "Need-?" }} 
                                                     </td>
                                                     <td class="text-end col-2">
                                                         <button class="btn btn-warning"
                                                             data-bs-target="#editPotential-{{ $sD->id_solution }}"
                                                             data-bs-toggle="modal"><i
                                                                 class="bi bi-pencil-fill"></i><span
                                                                 class="d-none d-lg-inline-block ms-2">Edit</span></button>
                                                     </td>
                                                     {{-- //MARK: Edit Solution domain --}}
                                                 <x-modal-popup title="Edit Potential Problem" modalName="editPotential-{{ $sD->id_solution }}">
                                                     <x-slot name="modalIcon"><i
                                                             class="bi bi-pencil-fill me-2"></i></x-slot>
                                                     <form
                                                         action="{{ route('solution-domain.edit', $sD->id_solution) }}"
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
                                                                             <label class="form-label mb-1">Request Description</label>
                                                                             <input type="text"
                                                                                 class="form-control" disabled
                                                                                 value="{{ $sD->solution_revision ? $sD->solution_revision : $sD->solution_desc }}">
                                                                         </div>
                                                                         <div class="col-12 mb-3">
                                                                             <label for="solution_need"
                                                                                 class="form-label mb-1">Needs To</label>
                                                                             <select name="solution_need"
                                                                                 class="form-select">
                                                                                 @php
                                                                                     $problemDomain = 0;
                                                                                 @endphp
                                                                                     @foreach ($problemDomains as $pd)
                                                                                     {{$problemDomain++}}
                                                                                         <option value="Need-{{$problemDomain}}">Need-{{$problemDomain}}</option>
                                                                                     @endforeach
                                                                             </select>
                                                                         </div>  
                                                                         <div class="col-12 my-4 text-center">
                                                                             <button
                                                                                 class="col-auto btn btn-warning fs-6"
                                                                                 type="submit"
                                                                                 id="btnSubmitForm"><i
                                                                                     class="bi bi-plus-circle-fill me-2"></i>Edit
                                                                                 Potential</button>
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

                                    {{-- //MARK:Performance --}}
                                    <tbody>
                                        <tr>
                                            <td scope="col" colspan="4" class="border-0"><span
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
                                            $performance = 1;
                                        @endphp
                                        @if ($performanceSolution->count() > 0)
                                            @foreach ($performanceSolution as $sD)
                                                <tr class="align-middle">
                                                    <td class="text-start">{{ sprintf('REQ%03d', $performance++) }}
                                                    </td>
                                                    <td>{{ $sD->solution_desc }}</td>
                                                    <td class="col-2 text-center">
                                                        {{ $sD->solution_need ? $sD->solution_need : "Need-?" }} 
                                                     </td>
                                                     <td class="text-end col-2">
                                                         <button class="btn btn-warning"
                                                             data-bs-target="#editPotential-{{ $sD->id_solution }}"
                                                             data-bs-toggle="modal"><i
                                                                 class="bi bi-pencil-fill"></i><span
                                                                 class="d-none d-lg-inline-block ms-2">Edit</span></button>
                                                     </td>
                                                     {{-- //MARK: Edit Solution domain --}}
                                                 <x-modal-popup title="Edit Potential Problem" modalName="editPotential-{{ $sD->id_solution }}">
                                                     <x-slot name="modalIcon"><i
                                                             class="bi bi-pencil-fill me-2"></i></x-slot>
                                                     <form
                                                         action="{{ route('solution-domain.edit', $sD->id_solution) }}"
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
                                                                             <label class="form-label mb-1">Request Description</label>
                                                                             <input type="text"
                                                                                 class="form-control" disabled
                                                                                 value="{{ $sD->solution_revision ? $sD->solution_revision : $sD->solution_desc }}">
                                                                         </div>
                                                                         <div class="col-12 mb-3">
                                                                             <label for="solution_need"
                                                                                 class="form-label mb-1">Needs To</label>
                                                                             <select name="solution_need"
                                                                                 class="form-select">
                                                                                 @php
                                                                                     $problemDomain = 0;
                                                                                 @endphp
                                                                                     @foreach ($problemDomains as $pd)
                                                                                     {{$problemDomain++}}
                                                                                         <option value="Need-{{$problemDomain}}">Need-{{$problemDomain}}</option>
                                                                                     @endforeach
                                                                             </select>
                                                                         </div>  
                                                                         <div class="col-12 my-4 text-center">
                                                                             <button
                                                                                 class="col-auto btn btn-warning fs-6"
                                                                                 type="submit"
                                                                                 id="btnSubmitForm"><i
                                                                                     class="bi bi-plus-circle-fill me-2"></i>Edit
                                                                                 Potential</button>
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

                                    {{-- //MARK:Supportability --}}
                                    <tbody>
                                        <tr>
                                            <td scope="col" colspan="4" class="border-0"><span
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
                                            $supportability = 1;
                                        @endphp
                                        @if ($supportabilitySolution->count() > 0)
                                            @foreach ($supportabilitySolution as $sD)
                                                <tr class="align-middle">
                                                    <td class="text-start">
                                                        {{ sprintf('REQ%03d', $supportability++) }}
                                                    </td>
                                                    <td>{{ $sD->solution_desc }}</td>
                                                    <td class="col-2 text-center">
                                                        {{ $sD->solution_need ? $sD->solution_need : "Need-?" }} 
                                                     </td>
                                                     <td class="text-end col-2">
                                                         <button class="btn btn-warning"
                                                             data-bs-target="#editPotential-{{ $sD->id_solution }}"
                                                             data-bs-toggle="modal"><i
                                                                 class="bi bi-pencil-fill"></i><span
                                                                 class="d-none d-lg-inline-block ms-2">Edit</span></button>
                                                     </td>
                                                     {{-- //MARK: Edit Solution domain --}}
                                                 <x-modal-popup title="Edit Potential Problem" modalName="editPotential-{{ $sD->id_solution }}">
                                                     <x-slot name="modalIcon"><i
                                                             class="bi bi-pencil-fill me-2"></i></x-slot>
                                                     <form
                                                         action="{{ route('solution-domain.edit', $sD->id_solution) }}"
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
                                                                             <label class="form-label mb-1">Request Description</label>
                                                                             <input type="text"
                                                                                 class="form-control" disabled
                                                                                 value="{{ $sD->solution_revision ? $sD->solution_revision : $sD->solution_desc }}">
                                                                         </div>
                                                                         <div class="col-12 mb-3">
                                                                             <label for="solution_need"
                                                                                 class="form-label mb-1">Needs To</label>
                                                                             <select name="solution_need"
                                                                                 class="form-select">
                                                                                 @php
                                                                                     $problemDomain = 0;
                                                                                 @endphp
                                                                                     @foreach ($problemDomains as $pd)
                                                                                     {{$problemDomain++}}
                                                                                         <option value="Need-{{$problemDomain}}">Need-{{$problemDomain}}</option>
                                                                                     @endforeach
                                                                             </select>
                                                                         </div>  
                                                                         <div class="col-12 my-4 text-center">
                                                                             <button
                                                                                 class="col-auto btn btn-warning fs-6"
                                                                                 type="submit"
                                                                                 id="btnSubmitForm"><i
                                                                                     class="bi bi-plus-circle-fill me-2"></i>Edit
                                                                                 Potential</button>
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

                                    {{-- //MARK:Design & Implementation --}}
                                    <tbody>
                                        <tr>
                                            <td scope="col" colspan="4" class="border-0"><span
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
                                                ->where('type_solution', 'Design & Implementation Constraint');
                                            $design = 1;
                                        @endphp
                                        @if ($designSolution->count() > 0)
                                            @foreach ($designSolution as $sD)
                                                <tr class="align-middle">
                                                    <td class="text-start">{{ sprintf('REQ%03d', $design++) }}
                                                    </td>
                                                    <td>{{ $sD->solution_desc }}</td>
                                                    <td class="col-2 text-center">
                                                        {{ $sD->solution_need ? $sD->solution_need : "Need-?" }} 
                                                     </td>
                                                     <td class="text-end col-2">
                                                         <button class="btn btn-warning"
                                                             data-bs-target="#editPotential-{{ $sD->id_solution }}"
                                                             data-bs-toggle="modal"><i
                                                                 class="bi bi-pencil-fill"></i><span
                                                                 class="d-none d-lg-inline-block ms-2">Edit</span></button>
                                                     </td>
                                                     {{-- //MARK: Edit Solution domain --}}
                                                 <x-modal-popup title="Edit Potential Problem" modalName="editPotential-{{ $sD->id_solution }}">
                                                     <x-slot name="modalIcon"><i
                                                             class="bi bi-pencil-fill me-2"></i></x-slot>
                                                     <form
                                                         action="{{ route('solution-domain.edit', $sD->id_solution) }}"
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
                                                                             <label class="form-label mb-1">Request Description</label>
                                                                             <input type="text"
                                                                                 class="form-control" disabled
                                                                                 value="{{ $sD->solution_revision ? $sD->solution_revision : $sD->solution_desc }}">
                                                                         </div>
                                                                         <div class="col-12 mb-3">
                                                                             <label for="solution_need"
                                                                                 class="form-label mb-1">Needs To</label>
                                                                             <select name="solution_need"
                                                                                 class="form-select">
                                                                                 @php
                                                                                     $problemDomain = 0;
                                                                                 @endphp
                                                                                     @foreach ($problemDomains as $pd)
                                                                                     {{$problemDomain++}}
                                                                                         <option value="Need-{{$problemDomain}}">Need-{{$problemDomain}}</option>
                                                                                     @endforeach
                                                                             </select>
                                                                         </div>  
                                                                         <div class="col-12 my-4 text-center">
                                                                             <button
                                                                                 class="col-auto btn btn-warning fs-6"
                                                                                 type="submit"
                                                                                 id="btnSubmitForm"><i
                                                                                     class="bi bi-plus-circle-fill me-2"></i>Edit
                                                                                 Potential</button>
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
</div>