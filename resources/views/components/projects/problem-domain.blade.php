<div class="container-fluid">
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
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Request Description</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($problemDomain->count() > 0)
                                    @foreach ($problemDomain as $pd)
                                    <tr>
                                        <th scope="row">{{ $pd->id_problem }}</th>
                                        <th>{{ $pd->problem_name }}</th>
                                        <th>ACsdj</th>
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

{{-- Modal add problem domain --}}
<x-modal-popup title="Add Request" modalName="addRequest">
    <x-slot name="modalIcon"><i class="bi bi-plus-circle-fill me-2"></i></x-slot>
    <form action="{{ route('problem_domain.store', $projectId) }}" method="POST"
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
