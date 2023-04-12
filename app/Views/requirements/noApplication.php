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
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-10">

                        <div class="text-center">

                            <img src="<?= base_url()?>/public/assets/images/animat-rocket-color.gif" alt="" height="160">

                            <h3 class="mt-4">You have no ongoing application(s).</h3>
                            <p class="text-muted">Please accomplish your application before uploading required documents.</p>
                        </div> <!-- end /.text-center-->

                    </div> <!-- end col -->
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('css'); ?>
<!-- CUSTOM CSS FOR THIS PAGE -->
<?= $this->endSection(); ?>

<?= $this->section('javascript'); ?>

<?= $this->endSection(); ?>