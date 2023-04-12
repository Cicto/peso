<?= $this->extend('layouts/emptyMain'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-body">

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
                    <!-- <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button> -->
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>

        </div>
    </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('javascript'); ?>

<!-- CUSTOM JS FOR THIS PAGE -->

<script src="<?= base_url()?>/public/assets/js/users/changePass.js"></script>
<?= $this->endSection(); ?>