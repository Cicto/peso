<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
    <!--begin::Toolbar container-->
    <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0"><?= $title ?></h1>
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    <a href="../../demo1/dist/index.html" class="text-muted text-hover-primary">Home</a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">Dashboards</li>
                <!--end::Item-->
            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
        <!--begin::Actions-->
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <!--begin::Secondary button-->
            <a href="#" class="btn btn-sm fw-bold bg-body btn-color-gray-700 btn-active-color-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">Rollover</a>
            <!--end::Secondary button-->
            <!--begin::Primary button-->
            <a href="#" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_new_target">Add Target</a>
            <!--end::Primary button-->
        </div>
        <!--end::Actions-->
    </div>
    <!--end::Toolbar container-->
</div>
<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card widget-icon">
            <div class="card-body">
                <div class="d-flex align-items-start">
                    <div class="avatar-lg">
                        <i class="mdi mdi-coffee text-primary avatar-title display-4 m-0"></i>
                    </div>
                    <div class="wid-icon-info flex-1 text-end">
                        <p class="text-muted mb-1 font-13 text-uppercase">New User</p>
                        <h4 class="mb-1 counter">8541</h4>
                        <small class="text-success"><b>39% Up</b></small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card widget-icon">
            <div class="card-body">
                <div class="d-flex align-items-start">
                    <div class="avatar-lg">
                        <i class="mdi mdi-contrast-circle text-warning avatar-title display-4 m-0"></i>
                    </div>
                    <div class="wid-icon-info flex-1 text-end">
                        <p class="text-muted mb-1 font-13 text-uppercase">New Orders</p>
                        <h4 class="mb-1 counter">6521</h4>
                        <small class="text-danger"><b>56% Down</b></small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card widget-icon">
            <div class="card-body">
                <div class="d-flex align-items-start">
                    <div class="avatar-lg">
                        <i class="mdi mdi-crown text-success avatar-title display-4 m-0"></i>
                    </div>
                    <div class="wid-icon-info flex-1 text-end">
                        <p class="text-muted mb-1 font-13 text-uppercase">Bug Reports</p>
                        <h4 class="mb-1 counter">1452</h4>
                        <small class="text-info"><b>0%</b></small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card widget-icon">
            <div class="card-body">
                <div class="d-flex align-items-start">
                    <div class="avatar-lg">
                        <i class="mdi mdi-download text-pink avatar-title display-4 m-0"></i>
                    </div>
                    <div class="wid-icon-info flex-1 text-end">
                        <p class="text-muted mb-1 font-13 text-uppercase">Total Downloads</p>
                        <h4 class="mb-1 counter">562</h4>
                        <small class="text-success"><b>39% Up</b></small>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection(); ?>