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
                    <a href="../../demo1/dist/index.html" class="text-muted text-hover-primary">Home</a>
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
            
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-5">
                                <?php if($visaList != FALSE):?>
                                    <?php foreach($visaList as $visa): ?>
                                        <div class="col-4">
                                            <div class="card">
                                                <div class="d-flex align-items-center border-1 border-dashed card-rounded p-2 visa-item" id = "visa-item" data-id="<?= $visa->visa_id?>">
                                                    <div class="card-body">
                                                        <h3 class="text-primary mt-0 visa_desc"><?= $visa->visa_description?></h3>
                                                        <small class="mb-0 visa_click">Click to arrange documents.</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form id="requirements-form" role = "form">
                                <div class="" id = "requirementsList">
                                    
                                </div>
                                <button type = "submit" class = "btn btn-primary btn-block btn-sm">Update</button>
                                
                            </form>
                            <div id="loader-wrapper">
                                <div id="loader"></div>
                            </div>
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

<script src="<?= base_url()?>/public/assets/libs/selectize/js/standalone/selectize.min.js"></script>
<script src="<?= base_url()?>/public/assets/libs/mohithg-switchery/switchery.min.js"></script>
<script src="<?= base_url()?>/public/assets/libs/multiselect/js/jquery.multi-select.js"></script>
<script src="<?= base_url()?>/public/assets/libs/jquery.quicksearch/jquery.quicksearch.min.js"></script>
<script src="<?= base_url()?>/public/assets/libs/select2/js/select2.min.js"></script>
<script src="<?= base_url()?>/public/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
<script src="<?= base_url()?>/public/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>

<!-- Plugins Js -->
<script src="<?= base_url()?>/public/assets/js/settings/requirementsArrangement.js"></script>

<?= $this->endSection(); ?>