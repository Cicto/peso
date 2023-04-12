<?= $this->extend('layouts/noSideBarMain'); ?>
<?= $this->section('content'); ?>

<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
    <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0"><?= $title ?></h1>
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                <li class="breadcrumb-item text-muted">
                    <a href="../../demo1/dist/index.html" class="text-muted text-hover-primary">Client Dashboard</a>
                </li>
            </ul>
        </div>
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            
            <!-- <a href="#" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">New System</a> -->
        </div>
    </div>
</div>

<div class="d-flex flex-column flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-xxl">
        <div class="row gy-5">
            <!-- <div class="col-12">
                <div class="card border-hover-primary">
                    <div class="card-header border-0">
                        <div class="card-title w-100 m-0 py-10">
                            <div class="row w-100 m-0">
                                <div class="col-4 col-md-3">
                                    <img src="<?= base_url()?>/public/assets/media/icons/id-verified.svg" alt="image" class="p-3 img-fluid">
                                </div>
                                <div class="col-8 col-md-9">
                                    <div class="alert alert-primary rounded-4 border-0 h-100">
                                        <div class="fs-2 fw-bold text-center">Get the most out of Baliwag eServices System when you are <br> <span class="fs-1">Fully Verified</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <?php if($departments != FALSE):?>
                <?php foreach($departments as $department):?>
                    <div class="col-xl-4">
                        <a href="<?= base_url()?>/external/deptServices/<?= $department->dept_id?>" target = "_blank" class="card border-hover-primary">
                            <div class="card-header border-0 pt-9">
                                <div class="card-title m-0">
                                    <div class="symbol symbol-50px w-50px bg-light"> 
                                        <img src="<?= base_url()?>/public/assets/media/svg/brand-logos/plurk.svg" alt="image" class="p-3">
                                    </div>
                                </div>
                                <div class="card-toolbar">
                                    <span class="badge <?= ($department->status == 'Online') ? 'badge-light-success' : 'badge-light-danger' ?> fw-bold me-auto px-4 py-3"><?= $department->status?></span>
                                </div>
                            </div>
                            <div class="card-body p-9">
                                <div class="fs-3 fw-bold text-dark"><?= $department->dept_alias?></div>
                                <p class="text-gray-400 fw-semibold fs-5 mt-1 mb-7"><?= (strlen($department->department_name) > 35) ? substr($department->department_name, 0, 35).'...' : $department->department_name;?></p>
                            </div>
                        </a>
                    </div>
                <?php endforeach;?>
            <?php endif;?>
            
        </div>
    </div>
</div>

<?= $this->endSection(); ?>