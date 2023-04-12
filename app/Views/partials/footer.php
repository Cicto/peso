<div id="kt_app_footer" class="app-footer">
    <!--begin::Footer container-->
    <div class="app-container container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
        <!--begin::Copyright-->
        <div class="text-dark order-2 order-md-1">
            <span class="text-muted fw-semibold me-1"><?= date('Y')?> ©</span>
            <a href="https://keenthemes.com" target="_blank" class="text-gray-800 text-hover-primary">Baliwag City | City Information and Technology Office</a>
        </div>
        <!--end::Copyright-->
        <!--begin::Menu-->
        <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
            <li class="menu-item">
                <a href="https://keenthemes.com" target="_blank" class="menu-link px-2">About</a>
            </li>
            <li class="menu-item">
                <a href="mailto:geslanidarrel@gmail.com" target="_blank" class="menu-link px-2">Support</a>
            </li>
            <li class="menu-item">
                <!-- <a href="https://1.envato.market/EA4JP" target="_blank" class="menu-link px-2">Purchase</a> -->
            </li>
        </ul>
        <!--end::Menu-->
    </div>
    <!--end::Footer container-->
</div>

<!-- Loading screen -->
<div class="position-fixed top-0 start-0 bg-white bg-blur bg-opacity-10 w-100 h-100" id="page-loader" style="display: none; z-index: 10000;">
    <div class=" d-flex flex-column justify-content-center align-items-center h-100">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem; --bs-spinner-border-width: 5px;" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
</div>

<!-- Success Modal -->
<div class="modal fade bg-blur" id="successAlert" tabindex="-1" aria-labelledby="successAlertLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" style="pointer-events:none;">
        <div class="modal-content bg-white overflow-hidden shadow">
            <div class="bg-primary bg-opacity-75" >
                <div class="modal-body text-white text-center py-5 px-6 d-flex flex-column justify-content-between align-items-center" style="min-height: 40vh;">
                    <div class=""></div>
                    <div class="">
                        <i class="far fa-check-circle fs-1 text-white"></i>
                        <h5 class="mt-4 text-white">Success!</h5>
                        <p class="mt-3">
                            Operation successfully completed!
                        </p>
                    </div>
                    <button type="button" class="btn btn-sm bg-white text-primary my-2 mt-5" data-bs-dismiss="modal">Okay</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Warning/Error Modal -->
<div class="modal fade bg-blur" id="warningAlert" tabindex="-1" aria-labelledby="warningAlertLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content bg-white overflow-hidden shadow">
            <div class="bg-danger bg-opacity-75">
                <div class="modal-body text-white text-center py-5 px-6 d-flex flex-column justify-content-between align-items-center" style="min-height: 40vh;">
                    <div class=""></div>
                    <div class="">
                        <i class="fas fa-exclamation-triangle fs-1 text-white"></i>
                        <h5 class="mt-4 text-white">Error</h5>
                        <p class="mt-3">
                            Something went wrong.
                        </p>
                    </div>
                    <button type="button" class="btn btn-sm bg-white text-danger my-2 mt-5" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Confirmation Modal -->
<div class="modal fade bg-blur" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content bg-white overflow-hidden shadow">
            <div class="modal-body text-center py-5 px-6 d-flex flex-column justify-content-between align-items-center" style="min-height: 40vh;">
                <div class=""></div>
                <div class="">
                    <i class="fas fa-exclamation-circle fs-1 text-warning"></i>
                    <h5 class="mt-4">Notice!</h5>
                    <p class="mt-3">
                        Are you sure you want to continue?
                    </p>
                </div>
                <div class="d-flex">
                    <button type="button" id="confirmationModal_yes" class="btn btn-sm btn-warning my-2 mt-5 flex-grow-1 text-opacity-50 text-dark" data-bs-dismiss="modal">Yes</button>
                    <button type="button" class="btn btn-sm btn-secondary my-2 mt-5 ms-2" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>