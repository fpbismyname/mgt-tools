<div class="modal fade" id="{{ $modalName }}" tabindex="-1">
    <div class="modal-dialog {{ $customClass }} modal-dialog-centered">
        <div class="modal-content rounded-4" >
            <div class="modal-header">
                <h1 class="modal-title fs-5">{{ $modalIcon }}{{ $title }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            {{ $slot }}
        </div>
    </div>
</div>