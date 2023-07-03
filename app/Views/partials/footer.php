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

<!-- Job Application Modal -->
<div class="modal fade bg-blur" id="jobApplicationModal" tabindex="-1" aria-labelledby="jobApplicationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-white overflow-hidden shadow">
            <div class="modal-body text-center d-flex flex-column justify-content-between align-items-center" style="min-height: 40vh;">
                <div class=""></div>
                <div class="">
                    <span class="svg-icon text-green svg-icon-3hx">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.3" d="M20 15H4C2.9 15 2 14.1 2 13V7C2 6.4 2.4 6 3 6H21C21.6 6 22 6.4 22 7V13C22 14.1 21.1 15 20 15ZM13 12H11C10.5 12 10 12.4 10 13V16C10 16.5 10.4 17 11 17H13C13.6 17 14 16.6 14 16V13C14 12.4 13.6 12 13 12Z" fill="currentColor"/>
                            <path d="M14 6V5H10V6H8V5C8 3.9 8.9 3 10 3H14C15.1 3 16 3.9 16 5V6H14ZM20 15H14V16C14 16.6 13.5 17 13 17H11C10.5 17 10 16.6 10 16V15H4C3.6 15 3.3 14.9 3 14.7V18C3 19.1 3.9 20 5 20H19C20.1 20 21 19.1 21 18V14.7C20.7 14.9 20.4 15 20 15Z" fill="currentColor"/>
                        </svg>
                    </span>
                    <h5 class="mt-4">Confirm your Application</h5>
                    <p class="mt-3">
                        Are you sure you want to proceed your application at:
                    </p>
                </div>
                <div class="row m-0 rounded w-100" style="border: 1px var(--my-blue) solid !important;">
                    <div class="col-2 bg-blue px-0 d-flex align-items-center">
                        <img src="<?=base_url()?>/public/assets/media/peso/peso-hand.svg" alt="">
                    </div>
                    <div class="text-start ff-noir p-5 col-10">
                        <h6 class="bg-blue d-inline text-white px-3 py-1 text-uppercase" id="jobApplicationModal-job-category">Local Recruitment Activity</h6>
                        <h4 class="fw-bolder text-green text-uppercase fs-1 my-3 text-decoration-underline" id="jobApplicationModal-job-title">EIUSMOD COMMODI MAXI</h4>
                        <div class="company-name text-blue text-truncate fs-6 text-uppercase fw-normal mb-0" id="jobApplicationModal-company-name">VERO ALIAS CUPIDITAT</div>
                        <small class="company-location text-blue text-truncate mt-2 fs-6 fw-normal text-uppercase"><i class="fas fa-map-marker-alt text-blue fs-6"></i> <span id="jobApplicationModal-company-address">DOYLE WALSH INC, HAGONOY, BULACAN</span></small>
                    </div>
                </div>
                <div class="d-flex w-100">
                    <button type="button" id="jobApplicationModal_proceed" class="btn btn-blue my-2 mt-5 flex-grow-1 text-white fw-bold" data-bs-dismiss="modal" data-job-id="0"><i class="fas fa-file-alt text-white"></i> Proceed with the job application</button>
                    <button type="button" class="btn btn-secondary my-2 mt-5 ms-2" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>