<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<div class="row">
    <div class="col-12">
        <div class="page-title-box page-title-box-alt">
            <h4 class="page-title"><?= $title ?></h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                    <li class="breadcrumb-item active"><?= $title ?></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-body">
            <div class = "btn-actions-container">
                <button type="button" id = "add-btn" class="btn btn-primary btn-sm waves-effect waves-light float-right"><span class = "ri-user-add-line"></span> Add Item</button>
            </div>
            <!-- <h5 class="card-title">Special title treatment</h5> -->
            <div class = "table-responsive">

                <table class = "table table-hover table-sm" id = "data-table" style = "width: 100%">
                    <thead class = "bg-light">
                        <tr>
                            <th>ID</th>
                            <th>Code</th>
                            <th>Description</th>
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

<div id="right-modal" class="modal fade" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-right" style = "width: 600px">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h4 class="modal-title">Add Item</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form role="form" class="needs-validation form-vessel" method = "POST" novalidate>
                    <input type="hidden" class="form-control form-control-sm" id="issue_id" name = "issue_id">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control form-control-sm" id="issue_code" name = "issue_code" placeholder="Enter Code" required>
                                <label for="issue_code">Code</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control" id="issue_description" name = "issue_description" placeholder="Enter Description" required>
                                <label for="issues_description">Description</label>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="row">
                        <div class="col-12 mb-4" id = "other-buttons">
                            <div class="btn-group mb-2 d-flex" role="group">
                                <button type="button" class="btn btn-outline-primary" id = "reset-password"><span class = "ri-door-lock-box-line"></span> Reset Password</button>
                                <button type="button" class="btn btn-outline-primary active-container" id = "user-status" data-action = "deactivate"><span class = "ri-close-line"></span> Deactivate User</button>
                                <button type="button" class="btn btn-outline-danger ban-container" id = "ban-user"><span class = "ri-user-unfollow-line"></span> Ban User</button>
                            </div>
                        </div>
                    </div> -->
                    <div class="row">
                        <div class="col-12 d-grid">
                            <button type="submit" class="btn btn-primary form-btn">Submit</button>
                        </div>
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
<script src="<?= base_url()?>/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url()?>/assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="<?= base_url()?>/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url()?>/assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
<script src="<?= base_url()?>/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url()?>/assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
<script src="<?= base_url()?>/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url()?>/assets/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="<?= base_url()?>/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url()?>/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="<?= base_url()?>/assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>
<script src="<?= base_url()?>/assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="<?= base_url()?>/assets/libs/pdfmake/build/vfs_fonts.js"></script>
<!-- CUSTOM JS FOR THIS PAGE -->
<script src="<?= base_url()?>/assets/js/config/technicalIssues.js"></script>
<?= $this->endSection(); ?>