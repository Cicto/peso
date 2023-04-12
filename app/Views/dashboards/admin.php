<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<div class="row">
    <div class="col-12">
        <div class="page-title-box page-title-box-alt">
            <h4 class="page-title"><?= $title ?></h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <!-- <li class="breadcrumb-item"><a href="javascript: void(0);">Minton</a></li> -->
                    <li class="breadcrumb-item active"><?= $title ?></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card widget-icon">
            <div class="card-body">
                <div class="d-flex align-items-start">
                    <div class="avatar-lg">
                        <i class="mdi mdi-coffee text-primary avatar-title display-4 m-0"></i>
                    </div>
                    <div class="wid-icon-info flex-1 text-end">
                        <p class="text-muted mb-1 font-13 text-uppercase">Applications</p>
                        <h4 class="mb-1 counter">8541</h4>
                        <!-- <small class="text-success"><b>39% Up</b></small> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card widget-icon">
            <div class="card-body">
                <div class="d-flex align-items-start">
                    <div class="avatar-lg">
                        <i class="mdi mdi-contrast-circle text-warning avatar-title display-4 m-0"></i>
                    </div>
                    <div class="wid-icon-info flex-1 text-end">
                        <p class="text-muted mb-1 font-13 text-uppercase">Estimated Income</p>
                        <h4 class="mb-1 counter">6521</h4>
                        <!-- <small class="text-danger"><b>56% Down</b></small> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card widget-icon">
            <div class="card-body">
                <div class="d-flex align-items-start">
                    <div class="avatar-lg">
                        <i class="mdi mdi-crown text-success avatar-title display-4 m-0"></i>
                    </div>
                    <div class="wid-icon-info flex-1 text-end">
                        <p class="text-muted mb-1 font-13 text-uppercase">Registered Client</p>
                        <h4 class="mb-1 counter">1452</h4>
                        <!-- <small class="text-info"><b>0%</b></small> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card widget-icon">
            <div class="card-body">
                <div class="d-flex align-items-start">
                    <div class="avatar-lg">
                        <i class="mdi mdi-download text-pink avatar-title display-4 m-0"></i>
                    </div>
                    <div class="wid-icon-info flex-1 text-end">
                        <p class="text-muted mb-1 font-13 text-uppercase">System User</p>
                        <h4 class="mb-1 counter">562</h4>
                        <!-- <small class="text-success"><b>39% Up</b></small> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection(); ?>