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
            <button type = "button" class = "btn btn-primary btn-sm float-right" id = "add-btn">Add Requirement</button>
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
                            <!-- <h4 class = "card-title">Available Requirements</h4> -->
                            <div class = "row">
                                <div class = "col-12 mb-3 btn-actions-container">
                                    
                                </div>
                            </div>
                            <table class = "table table-row-dashed align-middle gs-0 gy-3 my-0" id = "requirements-dataTable">
                                <thead class = "">
                                    <tr>
                                        <th>Requirement Title</th>
                                        <th>Requirement Desc</th>
                                        <th>Remarks</th>
                                    </tr>
                                    <tr>
                                        <th class="filterhead"></th>
                                        <th class="filterhead"></th>
                                        <th class="filterhead"></th>
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
    <div class="modal-dialog mw-800px">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h4 class="modal-title">Add User</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form role="form" id = "" class="needs-validation form-vessel" method = "POST" novalidate>

                    <input type="hidden" class="form-control form-control-sm" id="req_id" name = "req_id">
                    <div class="row">
                        <div class="col-8">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control form-control-sm" id="req_title" name = "req_title" placeholder="Enter Title" required>
                                <label for="req_title">Title</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control form-control-sm" id="req_description" name = "req_description" placeholder="Enter Description" required>
                                <label for="req_description">Description</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-floating mb-2">
                                <textarea name="req_remarks" id="req_remarks" cols="200" rows="150" class = "form-control" style = "height: 150px"></textarea>
                                <!-- <input type="text" class="form-control form-control-sm" id="req_remarks" name = "req_remarks" placeholder="Enter Description" required> -->
                                <label for="req_remarks">Remarks</label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-10 d-grid">
                            <button type="submit" id = "" class="btn btn-primary form-btn btn-sm">Submit</button>
                        </div>
                        <div class="col-2 restore-btn-cont">
                            <button type="button" class="btn btn-success btn-sm" id = "restore-btn"><span class = "ri-arrow-go-back-line"></span></button>
                        </div>
                        <div class="col-2 delete-btn-cont">
                            <button type="button" class="btn btn-danger btn-sm" id = "remove-btn"><span class = "ri-delete-bin-line"></span></button>
                        </div>
                    </div>

                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
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

<!-- Plugins Js -->
<script src="<?= base_url()?>/public/assets/libs/selectize/js/standalone/selectize.min.js"></script>
<script src="<?= base_url()?>/public/assets/libs/mohithg-switchery/switchery.min.js"></script>
<script src="<?= base_url()?>/public/assets/libs/multiselect/js/jquery.multi-select.js"></script>
<script src="<?= base_url()?>/public/assets/libs/jquery.quicksearch/jquery.quicksearch.min.js"></script>
<script src="<?= base_url()?>/public/assets/libs/select2/js/select2.min.js"></script>
<script src="<?= base_url()?>/public/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
<script src="<?= base_url()?>/public/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>

<script src="<?= base_url()?>/public/assets/js/settings/requirements.js"></script>


<?= $this->endSection(); ?>