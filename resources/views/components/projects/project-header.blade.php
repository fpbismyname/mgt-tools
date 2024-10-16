<div class="container-fluid">
    <div class="container border-bottom py-5">
        <div class="row justify-content-center align-items-center gap-3">
            <div class="col-auto">
                <a href="{{ route('dashboard') }}" class="fs-1 text-dark link-underline link-underline-opacity-0">
                    <i class="bi bi-arrow-left-circle-fill text-primary"></i>
                </a>
            </div>
            <div class="col">
                <h1 class="fs-3 d-none d-sm-block fw-bolder">{{ $projectApp->project_name }}</h1>
                <h1 class="fs-6 d-block d-sm-none fw-bolder">{{ $projectApp->project_name }}</h1>
                <p class="fs-6 d-none d-md-block text-body-secondary">{{ Str::words($projectApp->project_desc, 10, '...') }}</p>
            </div>
            <div class="col-12 col-sm-5">
                <div class="row">
                    <div class="col">
                        <form action="{{ route('project', $projectApp->id_project) }}" method="get"
                            onchange="this.submit()">
                            <select name="menu" class="form-select">
                                @foreach ($projectMenu as $menu)
                                    <option value="{{ $menu->menu }}"
                                        {{ $selectedMenu == $menu->menu ? 'selected' : '' }}>{{ $menu->menu }}
                                    </option>
                                @endforeach
                            </select>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
