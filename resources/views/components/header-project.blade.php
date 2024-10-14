<div class="container-fluid p-5">
    <div class="row px-3">
        <div class="col-1">
            <div class="d-flex flex-column justify-content-center align-items-start w-100 h-100">
                <a href="{{ route('dashboard') }}"
                    class="fs-1 d-flex flex-column justify-content-center
                    align-items-center link-underline link-underline-opacity-0">
                    <i class="bi bi-arrow-left-circle"></i>
                    <p class="fs-6 text-dark">Back</p>
                </a>
            </div>
        </div>
        <div class="col">
            <h5 class="fs-1 fw-bolder">{{ $projectName }}</h5>
            <p class="fs-6">{{ $projectDesc }}</p>
        </div>
        <div class="col">
            <div class="d-flex justify-content-end align-items-center h-100 flex-wrap gap-4">
                <div class="row w-50">
                    <div class="col">
                        <h5 class="fs-6 fw-bolder">Project menu</h5>
                        <select class="form-select" onchange="changeTabs(event)">
                            {{ $projectMenu }}
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
