<?= $this->extend('layouts/noSideBarMain'); ?>
<?= $this->section('content'); ?>

<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
    <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0"><?= $title ?></h1>
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                <li class="breadcrumb-item text-muted">
                    <a href="../../demo1/dist/index.html" class="text-muted text-hover-primary">Listing</a>
                </li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-muted"><?= $title ?></li>
            </ul>
        </div>
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <!-- <div class="m-0">
                <a href="#" class="btn btn-sm btn-flex bg-body btn-color-gray-700 btn-active-color-primary fw-bold" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                    <span class="svg-icon svg-icon-6 svg-icon-muted me-1">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="currentColor"></path>
                        </svg>
                    </span>
                Filter</a>
                <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_633f0a65864cd">
                    <div class="px-7 py-5">
                        <div class="fs-5 text-dark fw-bold">Filter Options</div>
                    </div>
                    <div class="separator border-gray-200"></div>
                    <div class="px-7 py-5">
                        <div class="mb-10">
                            <label class="form-label fw-semibold">Status:</label>
                            <div>
                                <select class="form-select form-select-solid select2-hidden-accessible" data-kt-select2="true" data-placeholder="Select option" data-dropdown-parent="#kt_menu_633f0a65864cd" data-allow-clear="true" data-select2-id="select2-data-7-lsp6" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                                    <option data-select2-id="select2-data-9-8fj4"></option>
                                    <option value="1">Qualified</option>
                                    <option value="2">Pending</option>
                                    <option value="2">In Process</option>
                                    <option value="2">Rejected</option>
                                </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-8-oc25" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-sd0f-container" aria-controls="select2-sd0f-container"><span class="select2-selection__rendered" id="select2-sd0f-container" role="textbox" aria-readonly="true" title="Select option"><span class="select2-selection__placeholder">Select option</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                            </div>
                        </div>
                        <div class="mb-10">
                            <label class="form-label fw-semibold">Member Type:</label>
                            <div class="d-flex">
                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                    <input class="form-check-input" type="checkbox" value="1">
                                    <span class="form-check-label">Author</span>
                                </label>
                                <label class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="2" checked="checked">
                                    <span class="form-check-label">Customer</span>
                                </label>
                            </div>
                        </div>
                        <div class="mb-10">
                            <label class="form-label fw-semibold">Notifications:</label>
                            <div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="" name="notifications" checked="checked">
                                <label class="form-check-label">Enabled</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-2" data-kt-menu-dismiss="true">Reset</button>
                            <button type="submit" class="btn btn-sm btn-primary" data-kt-menu-dismiss="true">Apply</button>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- <a href="#" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">New System</a> -->
        </div>
    </div>
</div>

<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-xxl">
        <div class="row">
            <div class="col-md-4 col-xl-4">
                <a href="" target = "_blank" class="card border-hover-primary">
                    <div class="card-header border-0 pt-9">
                        <div class="card-title m-0">
                            <div class="symbol symbol-50px w-50px bg-light">
                                <img src="<?= base_url()?>/public/assets/media/svg/brand-logos/plurk.svg" alt="image" class="p-3">
                            </div>
                        </div>
                        <div class="card-toolbar">
                            <span class="badge badge-light-primary fw-bold me-auto px-4 py-3">Admin</span>
                        </div>
                    </div>
                    <div class="card-body p-9">
                        <div class="fs-3 fw-bold text-dark">HRIS</div>
                        <p class="text-gray-400 fw-semibold fs-5 mt-1 mb-7">Human Resource Management System</p>
                        <!-- <div class="d-flex flex-wrap mb-5 ">
                            
                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3 me-auto">
                                <div class="fs-6 text-gray-800 fw-bold">$284,900.00</div>
                                <div class="fw-semibold text-gray-400">Budget</div>
                            </div>
                        </div> -->
                        <!-- <div class="symbol-group symbol-hover">
                            <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" aria-label="Emma Smith" data-kt-initialized="1">
                                <img alt="Pic" src="assets/media/avatars/300-6.jpg">
                            </div>
                            <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" aria-label="Rudy Stone" data-kt-initialized="1">
                                <img alt="Pic" src="assets/media/avatars/300-1.jpg">
                            </div>
                            <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" data-kt-initialized="1">
                                <span class="symbol-label bg-primary text-inverse-primary fw-bold">S</span>
                            </div>
                        </div> -->
                    </div>
                </a>
            </div>
        </div>
        
    </div>
</div>
<div class="d-flex flex-column flex-column-fluid">
    <div id="kt_app_content" class="app-content flex-column-xxl">
        <div id="kt_app_content_container" class="app-container container-fluid">
            
        </div>
    </div>
</div>


<?= $this->endSection(); ?>