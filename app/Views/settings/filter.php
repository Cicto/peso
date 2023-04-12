<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<style>
    .form-check .form-check-input
    {
        height: 18px;
        width: 18px;
    }
</style>
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
            <!-- <a href="#" class="btn btn-sm fw-bold bg-body btn-color-gray-700 btn-active-color-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">Rollover</a>
            <a href="#" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_new_target">Add Target</a> -->
            <!-- <button type = "button" class = "btn btn-primary btn-sm float-right" id = "add-btn">Add Requirement</button> -->
        </div>
    </div>
</div>

<div class="d-flex flex-column flex-column-fluid">
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-fluid">

            <div class="row mb-5">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-md-12">
                                <form role="form" id = "application-search-form">
                                    <div class="input-group mb-1">
                                        <input type="text" class="form-control" name = "application_id" placeholder="Search Application No." required>
                                        <button class="btn btn-primary waves-effect waves-light" type="submit"><span class = "ri-search-line"></span> Search</button>
                                    </div>
                                    <small class = "text-muted mt-1">Only applications under <?= $visaInfo->visa_description ?> are searchable.</small>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" >
                <div class="col-12">
                    <div class="card">
                        <div class="preload-icon text-center">
                            <h1 class = " mt-4" style = "font-size: 150px;">
                                <span class = "ri-search-line text-muted"></span>
                            </h1>
                            <small class = "text-muted text-center">Search for <b><?= $visaInfo->visa_description ?></b> applciations</small>
                        </div>
                        
                        <div class="card-body" id = "req-container">
                            
                        </div>
                        <div id="loader-wrapper">
                            <div id="loader"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('css'); ?>
<!-- CUSTOM CSS FOR THIS PAGE -->

<link href="<?= base_url()?>/public/assets/libs/mohithg-switchery/switchery.min.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url()?>/public/assets/libs/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url()?>/public/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url()?>/public/assets/libs/selectize/css/selectize.bootstrap3.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url()?>/public/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" type="text/css" />

<?= $this->endSection(); ?>

<?= $this->section('javascript'); ?>
<!-- CUSTOM JS FOR THIS PAGE -->

<!-- Plugins Js -->
<script src="<?= base_url()?>/public/assets/libs/selectize/js/standalone/selectize.min.js"></script>
<script src="<?= base_url()?>/public/assets/libs/mohithg-switchery/switchery.min.js"></script>
<script src="<?= base_url()?>/public/assets/libs/multiselect/js/jquery.multi-select.js"></script>
<script src="<?= base_url()?>/public/assets/libs/jquery.quicksearch/jquery.quicksearch.min.js"></script>
<script src="<?= base_url()?>/public/assets/libs/select2/js/select2.min.js"></script>
<script src="<?= base_url()?>/public/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
<script src="<?= base_url()?>/public/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>

<script src="<?= base_url()?>/public/assets/libs/tippy.js/tippy.all.min.js"></script>
<script src="<?= base_url()?>/public/assets/js/settings/filter.js"></script>


<?= $this->endSection(); ?>