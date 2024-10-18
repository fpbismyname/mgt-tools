<div class="container-fluid mb-5">
    <div class="container">
        <div class="row gap-5">
            {{-- Header --}}
            <div class="container border rounded-4 p-3 p-sm-4 shadow">
                <div class="row align-items-center gap-1">
                    <div class="col-12 col-sm text-center text-sm-start">
                        <h1 class="fw-bolder text-primary fs-2" id="projectMenuTitle">Solution Domain</h1>
                        <p class="fs-6 w-md-50">Requirement Elicitation List : Feat (feature)</p>
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
            {{-- Content --}}
            <div class="container shadow border p-3 p-sm-4 rounded-4">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="table-responsive">
                            {{-- Functional Requirement --}}
                            <table class="table table-hover">
                                <thead class="">
                                    <tr>
                                        <th scope="col" class="text-center" colspan="3">Functional Requirement
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
                                    <tr class="align-middle">
                                        <td class="text-center">1</td>
                                        <td>Kumalala</td>
                                        <td class="text-end">
                                            {{-- Edit.problem & Delete.problem --}}
                                            <button class="btn btn-warning m-1" data-bs-target="#editSolution-"
                                                data-bs-toggle="modal">
                                                <i class="bi bi-pencil-fill me-lg-2"></i><span
                                                    class="d-none d-lg-inline-block">Edit</span></button>
                                            <button class="btn btn-danger m-1" data-bs-target="#deleteSolution-"
                                                data-bs-toggle="modal">
                                                <i class="bi bi-trash-fill me-lg-2"></i><span
                                                    class="d-none d-lg-inline-block">Delete</span></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="table-responsive">
                            {{-- Non Functional Requirement --}}
                            <table class="table table-hover">
                                {{-- Table Title --}}
                                <thead class="">
                                    <tr>
                                        <th scope="col" class="text-center" colspan="3">Non Functional
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

                                {{-- Usability --}}
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
                                    <tr class="align-middle">
                                        <td class="text-center">1</td>
                                        <td>Kumalala</td>
                                        <td class="text-end">
                                            {{-- Edit.problem & Delete.problem --}}
                                            <button class="btn btn-warning m-1" data-bs-target="#editSolution-"
                                                data-bs-toggle="modal">
                                                <i class="bi bi-pencil-fill me-lg-2"></i><span
                                                    class="d-none d-lg-inline-block">Edit</span></button>
                                            <button class="btn btn-danger m-1" data-bs-target="#deleteSolution-"
                                                data-bs-toggle="modal">
                                                <i class="bi bi-trash-fill me-lg-2"></i><span
                                                    class="d-none d-lg-inline-block">Delete</span></button>
                                        </td>
                                    </tr>
                                </tbody>

                                {{-- Reliability --}}
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
                                    <tr class="align-middle">
                                        <td class="text-center">1</td>
                                        <td>Kumalala</td>
                                        <td class="text-end">
                                            {{-- Edit.problem & Delete.problem --}}
                                            <button class="btn btn-warning m-1" data-bs-target="#editSolution-"
                                                data-bs-toggle="modal">
                                                <i class="bi bi-pencil-fill me-lg-2"></i><span
                                                    class="d-none d-lg-inline-block">Edit</span></button>
                                            <button class="btn btn-danger m-1" data-bs-target="#deleteSolution-"
                                                data-bs-toggle="modal">
                                                <i class="bi bi-trash-fill me-lg-2"></i><span
                                                    class="d-none d-lg-inline-block">Delete</span></button>
                                        </td>
                                    </tr>
                                </tbody>

                                {{-- Performance --}}
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
                                    <tr class="align-middle">
                                        <td class="text-center">1</td>
                                        <td>Kumalala</td>
                                        <td class="text-end">
                                            {{-- Edit.problem & Delete.problem --}}
                                            <button class="btn btn-warning m-1" data-bs-target="#editSolution-"
                                                data-bs-toggle="modal">
                                                <i class="bi bi-pencil-fill me-lg-2"></i><span
                                                    class="d-none d-lg-inline-block">Edit</span></button>
                                            <button class="btn btn-danger m-1" data-bs-target="#deleteSolution-"
                                                data-bs-toggle="modal">
                                                <i class="bi bi-trash-fill me-lg-2"></i><span
                                                    class="d-none d-lg-inline-block">Delete</span></button>
                                        </td>
                                    </tr>
                                </tbody>

                                {{-- Supportability --}}
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
                                    <tr class="align-middle">
                                        <td class="text-center">1</td>
                                        <td>Kumalala</td>
                                        <td class="text-end">
                                            {{-- Edit.problem & Delete.problem --}}
                                            <button class="btn btn-warning m-1" data-bs-target="#editSolution-"
                                                data-bs-toggle="modal">
                                                <i class="bi bi-pencil-fill me-lg-2"></i><span
                                                    class="d-none d-lg-inline-block">Edit</span></button>
                                            <button class="btn btn-danger m-1" data-bs-target="#deleteSolution-"
                                                data-bs-toggle="modal">
                                                <i class="bi bi-trash-fill me-lg-2"></i><span
                                                    class="d-none d-lg-inline-block">Delete</span></button>
                                        </td>
                                    </tr>
                                </tbody>

                                {{-- Design & Implementation --}}
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
                                    <tr class="align-middle">
                                        <td class="text-center">1</td>
                                        <td>Kumalala</td>
                                        <td class="text-end">
                                            {{-- Edit.problem & Delete.problem --}}
                                            <button class="btn btn-warning m-1" data-bs-target="#editSolution-"
                                                data-bs-toggle="modal">
                                                <i class="bi bi-pencil-fill me-lg-2"></i><span
                                                    class="d-none d-lg-inline-block">Edit</span></button>
                                            <button class="btn btn-danger m-1" data-bs-target="#deleteSolution-"
                                                data-bs-toggle="modal">
                                                <i class="bi bi-trash-fill me-lg-2"></i><span
                                                    class="d-none d-lg-inline-block">Delete</span></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
