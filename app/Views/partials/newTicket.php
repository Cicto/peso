<div class="modal fade" id="new-ticket-modal" tabindex="-1" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-full-width">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title-ticket" id="myLargeModalLabel">Add New Ticket</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form role="form" id = "ticket-form" class="needs-validation user-form" method = "POST" novalidate>
                    <input type="hidden" class="form-control form-control-sm" id="id" name = "id">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-floating mb-2">
                                <select class="form-select" id="department" name = "department" aria-label="Floating label select example" required>
                                    <option value = "" selected disabled>Select Issue</option>
                                    <?php foreach ($departments as $department) : ?>
                                        <option value="<?= $department->dept_id ?>"><?= $department->department_name ?></option>
                                    <?php endforeach ?>
                                </select>
                                <label for="department">Technical Issue</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-10">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="firstname" name = "firstname" placeholder="Enter Firstname" required>
                                <label for="firstname">Requested By</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-floating mb-3">
                                <textarea name="notes" id="notes" cols="30" rows="30" class = "form-control" style = "height: 150px"></textarea>
                                <label for="notes">Notes</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 d-grid">
                            <button type="submit" id = "" class="btn btn-primary">Submit</button>
                        </div>
                    </div>

                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<?= $this->section('javascript'); ?>

<!-- CUSTOM JS FOR THIS PAGE -->
<script src="<?= base_url()?>/assets/js/tickets/tickets.js"></script>

<?= $this->endSection(); ?>