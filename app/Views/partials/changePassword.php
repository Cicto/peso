<div id="change-pass-modal" class="modal fade" tabindex="-1" aria-labelledby="fullScreenModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="fullScreenModalLabel">Change Password</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method = "POST" id = "changepass-form" role = "form" class="needs-validation" novalidate>
                <div class="modal-body">

                    <div class="container">
                        <div class = "changepass-errors"></div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-floating mb-2">
                                    <input type="password" class="form-control" id="old_password" name = "old_password" placeholder="Enter Old Password" required>
                                    <label for="old_password">Old Password</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-floating mb-2">
                                    <input type="password" class="form-control" id="new_password" name = "new_password" placeholder="Enter New Password" required>
                                    <label for="new_password">New Password</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-floating mb-2">
                                    <input type="password" class="form-control" id="confirm_new_password" name = "confirm_new_password" placeholder="Confirm New Password" required>
                                    <label for="confirm_new_password">Confirm New Password</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<?= $this->section('javascript'); ?>

<!-- CUSTOM JS FOR THIS PAGE -->
<script src="<?= base_url()?>/public/assets/js/users/changePass.js"></script>

<?= $this->endSection(); ?>