@if (session('success'))
    <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 1055;">
        <div class="toast align-items-center text-success bg-withe border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex" data-bs-dismiss="toast">
                <div class="toast-body mt-3">
                    <div>
                        <h6 class="text-center" style="font-weight: 100;"><i class="fa fa-check ms-4 me-4" style="font-size: 15px;"></i>{{ session('success') }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif