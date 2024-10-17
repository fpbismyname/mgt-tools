<div class="container-fluid mb-5">
    <div class="container gap">
        <div class="row gap-5">
            {{-- Header --}}
            <div class="container border rounded-4 p-3 p-sm-4 shadow">
                <div class="row align-items-center gap-1">
                    <div class="col-12 col-sm-auto text-center text-sm-start">
                        <h1 class="fw-bolder text-primary fs-2" id="projectMenuTitle">Problem Domain</h1>
                    </div>
                    <div class="col-12 col-sm text-center text-sm-end">
                        <div class="container">
                            <div class="row justify-content-center justify-content-sm-end gap-2">
                                <button class="col-auto btn btn-primary fs-6" data-bs-target="#addRequest"
                                    data-bs-toggle="modal"><i class="bi bi-plus-circle-fill me-2"></i>Add
                                    Request</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Content --}}
            <div class="container border rounded-4 p-3 p-sm-4 shadow">
                <div class="row">
                    <div class="col">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Request Description</th>
                                        <th scope="col" class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($problemDomain->count() > 0)
                                        @foreach ($problemDomain as $problemDomain)
                                            @php
                                                $problemDomain = $problemDomain->all()->where('project_id', $projectId);
                                                $i = 1;
                                            @endphp
                                        @endforeach
                                        @foreach ($problemDomain as $pd)
                                            <tr class=" text-wrap" id="problem-{{ $pd->id_problem }}">
                                                <td scope="row" class="align-middle">{{ $i++ }}</td>
                                                <td class="align-middle text-break">
                                                    {{ $pd->problem_name }}</td>
                                                <td class="align-middle text-end">
                                                    {{-- Edit.problem & Delete.problem --}}
                                                    <button class="btn btn-warning m-1" data-bs-target="#editRequest"
                                                        data-bs-toggle="modal">
                                                        <i class="bi bi-pencil-fill me-lg-2"></i><span
                                                            class="d-none d-lg-inline-block">Edit</span></button>
                                                    <button class="btn btn-danger m-1" data-bs-target="#deleteRequest"
                                                        data-bs-toggle="modal">
                                                        <i class="bi bi-trash me-lg-2"></i><span
                                                            class="d-none d-lg-inline-block">Delete</span></button>
                                                </td>
                                            </tr>
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
</div>

{{-- Modal add problem domain --}}
<x-modal-popup title="Add Request" modalName="addRequest">
    <x-slot name="modalIcon"><i class="bi bi-plus-circle-fill me-2"></i></x-slot>
    <form action="" method="POST"
        class="form-control border border-0 shadow rounded-4" enctype="multipart/form-data">
        @csrf
        <div class="container p-3">
            <div class="row justify-content-center">
                <div class="container">
                    <div class="col-12 mb-3">
                        <label for="request_desc" class="form-label mb-1">Request Description</label>
                        <input type="text" name="request_desc" class="form-control">
                    </div>
                    <div class="row">
                        <div class="col-12 my-4 text-center">
                            <button class="col-auto btn btn-primary fs-6" type="submit"><i
                                    class="bi bi-plus-circle-fill me-2"></i>Add Request</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-modal-popup>


{{-- Modal edit problem domain --}}
<x-modal-popup title="Edit Request" modalName="editRequest">
    <x-slot name="modalIcon"><i class="bi bi-pencil-fill me-2"></i></x-slot>
    <form action="" method="POST"
        class="form-control border border-0 shadow rounded-4" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="container p-3">
            <div class="row justify-content-center">
                <div class="container">
                    <div class="col-12 mb-3">
                        <label for="request_desc" class="form-label mb-1">New Request Description</label>
                        <input type="text" name="request_desc" class="form-control" value="">
                    </div>
                    <div class="row">
                        <div class="col-12 my-4 text-center">
                            <button class="col-auto btn btn-warning fs-6" type="submit"><i
                                    class="bi bi-pencil-fill me-2"></i>Edit Request</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-modal-popup>

{{-- Modal Delete Project Description --}}
<x-modal-popup title="Delete Project Apps" modalName="deleteRequest">
    <x-slot name="modalIcon"><i class="bi bi-trash-fill me-2"></i></x-slot>
    <div class="container py-5">
        <div class="container">
            <form class="row text-center justify-content-center"
                action="" method="POST">
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