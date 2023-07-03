<?= $this->extend('layouts/noSideBarMain'); ?>
<?= $this->section('css'); ?>
<?php use CodeIgniter\I18n\Time;?>

<style>
    @font-face {
        font-family: 'noirpro';
        src: url('<?=base_url()?>/public/assets/fonts/noir-pro-semi-bold-webfont.woff2') format('woff2'),
            url('<?=base_url()?>/public/assets/fonts/noir-pro-semi-bold-webfont.woff') format('woff');
        font-weight: normal;
        font-style: normal;
    }

    #job-applications-table tr::before{
        content: " ";
        position: absolute;
        padding: 3px;
        width: 100%;
        bottom: 0;
        left: 0;
        background: white;
    }
</style>
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>


<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
    <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0"><?=$title?>
            </h1>
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                <li class="breadcrumb-item text-muted">
                    <a href="#" class="text-muted text-hover-primary">View Notifications</a>
                </li>
            </ul>
        </div>
        <div class="d-flex align-items-center gap-2 gap-lg-3">
        </div>
    </div>
</div>

<div class="d-flex flex-column flex-column-fluid">
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">

            <div class="card">
                <div class="card-body">
                    <ul class="list-group list-group-flush rounded">
                        
                        <?php 
                        if($notifications['status']):
                            $months = ["January", "February", "March", "April", "May", "June",
                                "July", "August", "September", "October", "November", "December"
                            ];
                            $current_time = new Time('now');
                            $counter = 10;
                            $current_month = 0;
                            if($counter):
                            foreach ($notifications['result'] as $key => $notification):
                                $diff = $current_time->difference($notification->created_at);
                                $notification_month = explode("-", $notification->created_at)[1];
                                if($current_month != $notification_month):
                            ?>
                            <li class="list-group-item p-0 d-flex align-items-center mt-5 pb-2" style="<?=$current_month == 0 ? "" : "filter: grayscale(1);"?>">
                                <div class="separator w-20px border-dashed border-bottom-0 border-primary opacity-10"></div>
                                <h4 class="text-primary mx-3 mb-0"><?=$current_month == 0 ? "New" : $months[intval($notification_month)-1] ?></h4>
                                <div class="separator flex-grow-1 border-dashed border-bottom-0 border-primary opacity-10"></div>
                            </li>
                            <?php 
                                $current_month = $notification_month;
                                endif;?>

                            <li class="list-group-item list-group-item-action" data-month="<?=$current_month?>">
                                <a href="<?=base_url()?>/home/notifications/<?=$notification->id?>" class="d-flex">
                                    <i class="fas fa-<?=$notification->notification_icon?> pe-3 fs-1 align-self-center text-<?=!$notification->is_seen ? "primary" : "gray-500" ?> opacity-75"></i>
                                    <div class="lh-1 w-100">
                                        <span class="text-dark lh-sm"><?=$notification->description ?></span>
                                        <div class="d-flex justify-content-between mt-2" style="">
                                            <small class="fw-lighter text-<?=!$notification->is_seen ? "primary" : "gray-500" ?> ">
                                                <?=$diff->humanize() ?>
                                            </small>
                                            <?php if(!$notification->is_seen):?>
                                                <i class="fas fa-circle align-self-center text-primary" style=""></i>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        <?php
                            $counter--; 
                            endforeach;
                            endif;
                        endif;
                        ?>
                    
                        <?php if(!$notifications['status']):?>
                        <li class="list-group-item p-0 bg-body">
                            <div class=" text-center bg-light rounded mb-1 border border-dashed border-gray-300 py-10">
                                <span class="text-gray-700 lh-sm">No new notifications found.</span>
                            </div>
                        </li>
                        <?php endif;?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <?= $this->endSection(); ?>
    <?= $this->section('javascript'); ?>
    <script>
        $(document).ready(function () {
            
        });
    </script>
    <?= $this->endSection(); ?>