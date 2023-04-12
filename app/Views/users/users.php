<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
    <!--begin::Toolbar container-->
    <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0"><?= $title ?></h1>
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                <li class="breadcrumb-item text-muted">
                    <a href="<?= base_url()?>" class="text-muted text-hover-primary">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-muted"><?= $title ?></li>
            </ul>
        </div>
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <button type="button" id = "add-user-btn" class="btn btn-primary btn-sm waves-effect waves-light float-right"><span class = "ri-user-add-line"></span> Add User</button>
        </div>
    </div>
</div>

<div class="d-flex flex-column flex-column-fluid">
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-body">

                        <div class = "btn-actions-container">
                            
                        </div>

                        <!-- <h5 class="card-title">Special title treatment</h5> -->
                        <div class = "table-responsive">

                            <table class = "table table-row-dashed table-hover align-middle gs-0 gy-3 my-0" id = "data-table" style = "width: 100%">
                                <thead>
                                    <tr>
                                        <th>Email</th>
                                        <th>Username</th>
                                        <th>Firstname</th>
                                        <th>Lastname</th>
                                        <th>Status</th>
                                    </tr>
                                    <tr>
                                        <th class="filterhead"></th>
                                        <th class="filterhead"></th>
                                        <th class="filterhead"></th>
                                        <th class="filterhead"></th>
                                        <th class=""></th>
                                    </tr>
                                </thead>

                            </table>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div id="right-modal" class="modal fade" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl modal-right">
        <div class="modal-content">
            <div class="modal-header border-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                
                <form role="form" id = "user-form" class="needs-validation user-form form fv-plugins-bootstrap5 fv-plugins-framework" method = "POST" novalidate>
                    
                    <div class="mb-13 text-center ">
                        <!--begin::Title-->
                        <h1 class="mb-3 modal-title">Set First Target</h1>
                        <!--end::Title-->
                        <!--begin::Description-->
                        <div class="text-muted fw-semibold fs-5 ">If you are experiencing problem, please contact
                        <a href="#" class="fw-bold link-primary">System Administrator</a>.</div>
                        <!--end::Description-->
                    </div>
                    
                    <div class="separator separator-dashed my-10"></div>
                    <div class="mb-8 text-left ">
                        <!--begin::Title-->
                        <h3 class="mb-3">Account Information</h3>
                    </div>
                    <input type="hidden" class="form-control form-control-sm" id="id" name = "id">
                    <div class="d-flex flex-column mb-5 fv-row fv-plugins-icon-container">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-1">
                            <span class="required">Email</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" aria-label="Specify a target name for future usage and reference" data-kt-initialized="1"></i>
                        </label>
                        <!--end::Label-->
                        <input type="email" class="form-control" placeholder="Enter Target Title" name="email" id = "email" value = "@baliwag.gov.ph">
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>

                    <div class="row mb-5">
                        <div class="col-8">
                            <label class="required fs-6 fw-semibold mb-1">Username</label>
                            <input type="username" class="form-control" placeholder="Enter Valid Username" name="username" id = "username">
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <div class="col-4">
                            <label class="required fs-6 fw-semibold mb-1">Role</label>
                            <select class="form-select" id="role" name = "role" aria-label="Floating label select example" required>
                                <option value = "" selected disabled>Select Role</option>

                                <?php foreach ($roles as $role) : ?>
                                    <option value="<?= $role->role_id ?>"><?= $role->role_description ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-10">
                            <label class="required fs-6 fw-semibold mb-1">Department</label>
                            <select name="dept_id" id="dept_id" class = "form-select">
                                <option value = "" selected disabled>Select Department</option>
                                <?php foreach ($departments as $department) : ?>
                                    <option value="<?= $department->dept_id ?>"><?= $department->department_name ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="separator separator-dashed my-10"></div>
                    <div class="mb-8 text-left ">
                        <!--begin::Title-->
                        <h3 class="mb-3">Personal Information</h3>
                    </div>
                    <div class="row mb-5">
                        <div class="col-4">
                            <label class="required fs-6 fw-semibold mb-2">Firstname</label>
                            <input type="text" class="form-control" id="firstname" name = "firstname" placeholder="Enter Firstname" required>
                                
                        </div>
                        <div class="col-4">
                            <label class="required fs-6 fw-semibold mb-2">Middlename</label>
                            <input type="text" class="form-control" id="middlename" name = "middlename" placeholder="Enter Middlename" required>
                                
                        </div>
                        <div class="col-4">
                            <label class="required fs-6 fw-semibold mb-2">Lastname</label>
                            <input type="text" class="form-control" id="lastname" name = "lastname" placeholder="Enter Lastname" required>
                            
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-7">
                            <label class="required fs-6 fw-semibold mb-2">Birthdate</label>
                            <input type="date" class="form-control " id="birthdate" name = "birthdate" placeholder="Enter Birthdate" required> 
                        </div>
                    </div>

                    
                    <div class="row mb-8 g-5" id = "other-buttons">
                        <div class="separator separator-dashed my-10"></div>
                        <div class="mb-3 text-left ">
                            <!--begin::Title-->
                            <h3 class="mb-3">Account Actions</h3>
                        </div>
                        <!-- <div class=" text-end" > -->
                            <div class="col-md-4 col-lg-4 col-xxl-4" id = "reset-password">
                                <label class="btn btn-outline btn-outline-dashed btn-active-light-primary border-success d-flex text-start p-6" data-kt-button="true">
                                    <span class="ms-5">
                                        <span class="fs-4 fw-bold mb-1 d-block">Reset Password</span>
                                        <span class="fw-semibold fs-7 text-gray-600">Account password will be set to default password.</span>
                                    </span>
                                </label>
                            </div>
                            <div class="col-md-4 col-lg-4 col-xxl-4 active-container" id = "user-status">
                                <label class="btn btn-outline btn-outline-dashed btn-active-light-primary border-gray-500 d-flex text-start p-6" data-kt-button="true">
                                    <span class="ms-5">
                                        <span class="fs-4 fw-bold mb-1 d-block" id = "user-status-text">Deactivate Account</span>
                                        <span class="fw-semibold fs-7 text-gray-600">Deactivate the current user account.</span>
                                    </span>
                                </label>
                            </div>
                            <div class="col-md-4 col-lg-4 col-xxl-4 ban-container" id="ban-user">
                                <label class="btn btn-outline btn-outline-dashed btn-active-light-primary border-danger d-flex text-start p-6" data-kt-button="true">
                                    <span class="ms-5">
                                        <span class="fs-4 fw-bold mb-1 d-block ban-text">Ban Account</span>
                                        <span class="fw-semibold fs-7 text-gray-600">Completely ban the user from the system.</span>
                                    </span>
                                </label>
                            </div>
                        <!-- </div> -->
                    </div>

                    <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed mb-9 px-5 py-2">
                        <!--begin::Icon-->
                        <!--begin::Svg Icon | path: icons/duotune/finance/fin008.svg-->
                        <!-- <span class="svg-icon svg-icon-2tx svg-icon-primary me-4">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.3" d="M3.20001 5.91897L16.9 3.01895C17.4 2.91895 18 3.219 18.1 3.819L19.2 9.01895L3.20001 5.91897Z" fill="currentColor"></path>
                                <path opacity="0.3" d="M13 13.9189C13 12.2189 14.3 10.9189 16 10.9189H21C21.6 10.9189 22 11.3189 22 11.9189V15.9189C22 16.5189 21.6 16.9189 21 16.9189H16C14.3 16.9189 13 15.6189 13 13.9189ZM16 12.4189C15.2 12.4189 14.5 13.1189 14.5 13.9189C14.5 14.7189 15.2 15.4189 16 15.4189C16.8 15.4189 17.5 14.7189 17.5 13.9189C17.5 13.1189 16.8 12.4189 16 12.4189Z" fill="currentColor"></path>
                                <path d="M13 13.9189C13 12.2189 14.3 10.9189 16 10.9189H21V7.91895C21 6.81895 20.1 5.91895 19 5.91895H3C2.4 5.91895 2 6.31895 2 6.91895V20.9189C2 21.5189 2.4 21.9189 3 21.9189H19C20.1 21.9189 21 21.0189 21 19.9189V16.9189H16C14.3 16.9189 13 15.6189 13 13.9189Z" fill="currentColor"></path>
                            </svg>
                        </span> -->
                        
                        <!--end::Svg Icon-->
                        <!--end::Icon-->
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-stack flex-grow-1">
                            <!--begin::Content-->
                            <div class="fw-semibold fs-7">
                                <h6 class="fw-bold"><i class="fas fa-exclamation-circle text-dark"></i> Reminders</h6>
                                <div class=" text-gray-700">Newly created accounts are using default password that is set by System Administrator.
                                </div>
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <div class="text-center">
                        <button type="reset" id="kt_modal_new_target_cancel" class="btn btn-light me-3">Cancel</button>
                        <button type="submit" id = "" class="btn btn-primary form-btn">Submit</button>
                    </div>

                </form>
                <!-- <div class="text-right">

                    <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula.</p>
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
                </div> -->
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<?= $this->endSection(); ?>

<?= $this->section('javascript'); ?>

<!-- third party js -->
<script src="<?= base_url()?>/public/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url()?>/public/assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="<?= base_url()?>/public/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url()?>/public/assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
<script src="<?= base_url()?>/public/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url()?>/public/assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
<script src="<?= base_url()?>/public/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url()?>/public/assets/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="<?= base_url()?>/public/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url()?>/public/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="<?= base_url()?>/public/assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>
<script src="<?= base_url()?>/public/assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="<?= base_url()?>/public/assets/libs/pdfmake/build/vfs_fonts.js"></script>

<!-- CUSTOM JS FOR THIS PAGE -->
<script src="<?= base_url()?>/public/assets/js/users/users.js"></script>
<?= $this->endSection(); ?>