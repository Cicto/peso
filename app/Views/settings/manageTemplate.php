<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>


<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
    <!--begin::Toolbar container-->
    <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Manage <?= $templateInfo->template_title;?></h1>
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
            <button type="button" class="btn btn-primary btn-sm float-end mb-2" id = "particulars-add" >Add Particulars</button>
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
                            <form role = "form" id = "particulars-form">
                                <div class="row">
                                    <div class="col-12">
                                        <table class = "table table-row-dashed align-middle gs-0 gy-3 my-0 table-sm mb-10">
                                            <thead class = "">
                                                <tr>
                                                    <th colspan = "2">Particulars</th>
                                                </tr>
                                            </thead>
                                            <tbody id="particulars-cont">
                                            
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 d-grid">
                                        <button type="submit" class="btn btn-primary float-end mb-2" id = "" >Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--  Modal content for the Large example -->
<div class="modal fade" id="particulars" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Large modal</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form role = "form" id = "" method = "post" class = "form-vessel">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" class="form-control" id="particular_id" name="particular_id" placeholder="Enter Particular" >
                            <div class="mb-2">
                                <label for="particular_title" class="form-label">Particular Title:</label>
                                <input type="text" class="form-control" id="particular_title" name="particular_title" placeholder="Enter Particular" required>
                            </div>
                        </div>
                        <div class="col-md-12 float-end">
                            <div class="mb-2">
                                <label for="username" class="form-label">&nbsp</label>
                                <button type = "submit" class = "btn btn-primary float-end">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
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

<script src="<?= base_url()?>/public/assets/js/settings/manageTemplate.js"></script>


<?= $this->endSection(); ?>