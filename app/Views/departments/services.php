<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
    <!--begin::Toolbar container-->
    <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0"><?= $title ?>
            </h1>
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                <li class="breadcrumb-item text-muted">
                    <a href="<?= base_url()?>" class="text-muted text-hover-primary">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-muted">
                    <a href="<?= base_url()?>/departments" class="text-muted text-hover-primary">Departments</a>
                </li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-muted"><?= $title ?></li>
            </ul>
        </div>
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <button type="button" id="add-service-btn"
                class="btn btn-primary btn-sm waves-effect waves-light float-right">
                <i class="ri-customer-service-2-line"></i> Add Service
            </button>
            <label id="archive-service-btn" class="btn btn-danger btn-sm waves-effect waves-light float-right"
                for="archive">
                <i class="ri-archive-line"></i><span>View</span> Archive
            </label>
            <input type="checkbox" name="archive" id="archive" hidden>
        </div>
    </div>
</div>
<div class="d-flex flex-column flex-column-fluid">
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-body">
                        <div class="btn-actions-container">
                        </div>
                        <div class="table-responsive">
                            <table class="table table-row-dashed align-middle gs-0 gy-3 my-0" id="data-table"
                                style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>Service Name</th>
                                        <th>Service Description</th>
                                        <th>Form View</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    <tr>
                                        <th class="filterhead"></th>
                                        <th class="filterhead"></th>
                                        <th class="filterhead"></th>
                                        <th class=""></th>
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


<div id="services-modal" class="modal fade" aria-hidden="true">
    <div class="modal-dialog modal-right">
        <div class="modal-content">
            <div class="modal-header border-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                <form role="form" id="user-form"  class="needs-validation user-form form fv-plugins-bootstrap5 fv-plugins-framework" method="POST" novalidate>
                    <div class="mb-13 text-center ">
                        <h1 class="mb-3 modal-title services-modal-title">Edit Service</h1>
                        <div class="text-muted fw-semibold fs-5">
                            <?=$department['result'][0]->dept_alias?> - <?=$department['result'][0]->department_name?>
                        </div>
                    </div>

                    <input type="checkbox" name="is_edit" id="is_edit" hidden>
                    <input type="hidden" class="form-control form-control-sm" id="department-id" name="department_id" value="<?=$department_id?>">
                    <input type="hidden" class="form-control form-control-sm" id="service-id" name="id" value="">

                    <div class="separator separator-dashed my-7"></div>
                    <div class="mb-8 text-left ">
                        <h3 class="mb-3">Service Information</h3>
                    </div>
                    <div class="d-flex flex-column mb-5 fv-row fv-plugins-icon-container">
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-1">
                            <span class="required">Service Name</span>
                        </label>
                        <input type="text" class="form-control" placeholder="Enter Service Name" name="service_name" id="service-name" value="" required>
                        
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-1">
                            <span class="required">Service Description</span>
                        </label>
                        <textarea class="form-control" placeholder="Enter Service Description" id="service-description" name="service_description"></textarea>
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>

                    <div class="separator separator-dashed my-4"></div>
                    <div class="d-flex flex-column mb-5 fv-row fv-plugins-icon-container">
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-1">
                            <span class="required">Service Form View</span>
                        </label>
                        <div class="form-check form-switch form-check-custom form-check-solid">
                            <input type="text" class="form-control" placeholder="Enter Service Name" name="form_view" id="form-view" value="" required>
                        </div>
                    </div>
                    <div class="d-flex flex-column mb-5 fv-row fv-plugins-icon-container">
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-1">
                            <span class="">Service Visibility</span>
                        </label>
                        <div class="form-check form-switch form-check-custom form-check-success form-check-solid">
                            <input class="form-check-input" type="checkbox" value="1" id="service-visibility" name="status"/>
                            <label class="form-check-label" for="service-visibility">
                                Hidden
                            </label>
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="reset" id="kt_modal_new_target_cancel" class="btn btn-light me-3"
                            data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" id="" class="btn btn-primary form-btn">Save</button>
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
<script>
    const department_id = <?= $department_id ?>
</script>
<script src="<?= base_url()?>/public/assets/js/departments/services.js"></script>
<?= $this->endSection(); ?>