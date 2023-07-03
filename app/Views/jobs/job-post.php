<?php 
    if(!$job_post["status"]){
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
    $job_post = $job_post["result"][0];
    if(($job_post->status != 1 && $job_post->status != 3) && $userInformation->role != 1){
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
    $is_applied = FALSE;
    if($applied_jobs['status']){
        foreach ($applied_jobs['result'] as $key => $job_info) {
            $is_applied = $job_post->id == $job_info->id;
            if($is_applied){
                break;
            }
        }
    }
?>
<?= $this->extend('layouts/noSideBarMain'); ?>
<?= $this->section('css'); ?>
<style>
    @font-face {
        font-family: 'noirpro';
        src: url('<?=base_url()?>/public/assets/fonts/noir-pro-semi-bold-webfont.woff2') format('woff2'),
            url('<?=base_url()?>/public/assets/fonts/noir-pro-semi-bold-webfont.woff') format('woff');
        font-weight: normal;
        font-style: normal;
    }

    .image-style-side{
        width: 50%;
        float: right;
        margin-left: 1em; 
    }
    
    @media only screen and (max-width: 768px) {
        .image-style-side{
            width: 100%;
        }
    }

    blockquote {
        border-left: 5px solid #ccc;
        font-style: italic;
        margin-left: 0;
        margin-right: 0;
        overflow: hidden;
        padding-left: 1.5em;
        padding-right: 1.5em;
    }

    .modal-fullscreen .modal-content{
        height: fit-content;
    }

    i.bi, i[class*=" fa-"], i[class*=" fonticon-"], i[class*=" la-"], i[class^="fa-"], i[class^="fonticon-"], i[class^="la-"] {
        line-height: inherit;
        font-size: inherit;
        color: inherit;
    }
</style>
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>

<div class="d-flex flex-column flex-column-fluid mt-6 mt-md-10">
    <div id="kt_app_content_container" class="app-container container-fluid">
        <div class="card card-content">
            <div class="card-body px-2 px-md-8 py-5 row">
                <div class="col-12 col-md-3 col-lg-3 bg-blue d-none d-md-flex flex-column justify-content-around p-0 position-relative">
                    <div class="row mx-0 my-10 m-lg-10">
                        <div class="col-6 p-1 p-lg-3">
                            <img src="<?=base_url()?>/public/assets/media/logos/baliwag-city-logo.png" class="img-fluid bg-white rounded-circle p-1" alt="">
                        </div>
                        <div class="col-6 p-1 p-lg-3">
                            <img src="<?=base_url()?>/public/assets/media/logos/peso-baliwag-logo.png" class="img-fluid bg-white rounded-circle p-1" alt="">
                        </div>
                    </div>
                    <img src="<?=base_url()?>/public/assets/media/peso/peso-hand.svg" alt="">
                    <div class="position-absolute bottom-0 end-0">
                        <div class="p-1 p-lg-2 bg-white rounded-circle m-4 shadow"></div>
                        <div class="p-1 p-lg-2 bg-white rounded-circle m-4 shadow"></div>
                    </div>
                </div>
                <div class="col-12 col-md-9 col-lg-9 p-7 pb-0 d-flex flex-column justify-content-between ff-noir p-0 ps-md-10" style="
                    background-image: url(<?=base_url()?>/public/assets/media/peso/peso-job-bg.png);
                    background-repeat: no-repeat;
                    background-size: cover;
                    background-position: bottom;
                ">
                    <div class="">
                        <div class="d-flex mt-5">
                            <h1 class="bg-blue d-inline text-white px-3 py-1 text-uppercase"><?=$job_post->job_category?></h1>
                        </div>
                        <h1 class="display-4 fw-bolder text-green text-uppercase my-7 text-decoration-underline"><?=$job_post->job_title?></h1>
                        <h2 class="company-name text-blue display-7 text-uppercase fw-normal mb-0"><?=$job_post->company_name?></h2>
                        <div class="d-flex">
                            <h3><i class="fas fa-map-marker-alt text-blue mt-2 display-8 me-3"></i></h3>
                            <h3 class="company-location text-blue mt-2 display-8 fw-normal text-uppercase"> <?=$job_post->company_address?></h3>
                        </div>
    
                        <?php if($job_post->job_category_id == 2):?>
                            <h2 class="company-name text-green display-6 text-uppercase fw-normal mb-0 mt-10"><?= date("F d, Y" ,strtotime( explode(" ", $job_post->job_date)[0] ))?> • <?= date("h:i A" ,strtotime( explode(" ", $job_post->job_date)[1] ))?></h2>
                            <div class="d-flex">
                                <h3><i class="fas fa-map-marker-alt text-green mt-2 display-8 me-3"></i></h3>
                                <h3 class="company-location text-green mt-2 display-8 fw-normal text-uppercase"><?=$job_post->interview_address?></h3>
                            </div>
                        <?php endif;?>
    
                        <div class="fs-4 text-blue my-5">
                        <?=$job_post->job_description?>
                        </div>
                        <div class="w-75 border-bottom-dashed my-10" style="border-color: var(--my-blue) ;"></div>
    
                        <?php
                            $job_qualifications = json_decode($job_post->job_qualifications); 
                            if(!empty((array)$job_qualifications)):?>
                        <h2 class="company-name text-green text-truncate display-7 text-uppercase fw-normal mb-0">
                            QUALIFICATIONS:</h2>
                        <ul>
                            <?php foreach ($job_qualifications as $key => $value):?>
    
                                <li class="fs-4 text-blue"><?=$value?></li>
    
                            <?php endforeach;?>
                        </ul>
                        <?php endif;?>
                        <?php
                            $job_requirements = json_decode($job_post->job_requirements); 
                            if(!empty((array)$job_requirements)):?>
                        <h2 class="company-name text-green text-truncate display-7 text-uppercase fw-normal mb-0">
                            REQUIREMENTS:</h2>
                        <ul>
                            <?php foreach ($job_requirements as $key => $value):?>
    
                                <li class="fs-4 text-blue"><?=$value?></li>
    
                            <?php endforeach;?>
                        </ul>
                        <?php endif;?>
                        <?php if($job_post->job_category_id == 1):?>
                            <div class="d-flex my-10">
                                <div class="">
                                    <div class="company-name text-green text-truncate display-7 text-uppercase fw-normal mb-0">
                                        DATE POSTED:</div>
                                    <div class="company-name text-blue text-truncate display-8 text-uppercase fw-normal mb-0"><?=date("F d, Y" ,strtotime( $job_post->posted_at ))?></div>
                                </div>
                                <div class="ms-10">
                                    <div class="company-name text-green text-truncate display-7 text-uppercase fw-normal mb-0">
                                        CLOSING DATE:</div>
                                    <div class="company-name text-blue text-truncate display-8 text-uppercase fw-normal mb-0"><?=date("F d, Y" ,strtotime( $job_post->job_date ))?></div>
                                </div>
                            </div>
                        <?php endif;?>
                        <div class="fs-4 text-blue ff-noir text-uppercase text-end mt-5" id="job-candidates-container" style="display: <?=$job_post->candidates == 0 ? "none" : "block"?>;">
                        <i class="fas fa-users text-blue"></i> <span id="candidates">Looking for <u><span id="job-candidates"><?=$job_post->candidates?></span> candidates</u></span>
                        </div>
                    </div>
                    
                    <div class="">

                        <?php if($job_post->status == 1):
                                if($is_applied):
                            ?>
                            <button class="btn btn-lg btn-blue w-100 mt-10" >Job Application Submitted <div class="fas fa-check text-white"></div></button>
                            <?php else:?>
                                <button class="btn btn-lg btn-blue w-100 mt-10" id="job-application-button" data-job-id="<?=$job_post->id?>">Apply Now!</button>
                            <?php endif;?>
                        <?php else:?>
                            <div class="alert alert-warning d-flex align-items-center mt-10" role="alert">
                                <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2023-03-24-172858/core/html/src/media/icons/duotune/general/gen044.svg-->
                                <span class="svg-icon svg-icon-warning svg-icon-2hx">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor"/>
                                    <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="currentColor"/>
                                    <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="currentColor"/>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <div class="ms-3">
                                    <?php $status = ["Not Posted", "Posted", "Drafted", "Finished"];?>
                                    This job post's status <?= $job_post->status==3? "was":"is currently"?> "<?= $status[$job_post->status] ?>"
                                </div>
                            </div>
                            <button class="btn btn-lg btn-secondary w-100" disabled id="job-application-button" data-job-id="<?=$job_post->id?>">Apply Now!</button>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('javascript'); ?>
<script>
    $(function () {
        $("#job-application-button").click(function(){
            <?php if($userInformation):?>
            if(this.dataset.isApplied==0){
                confirmApplication(this.dataset.jobId, function(){
                    $("#job-application-button").html(`<i class="fas fa-check text-white fs-3"></i> Applied`)
                })
            }
            <?php else:?>
                window.location.href = "<?=base_url()?>/login";
            <?php endif;?>
        })
    });
</script>
<?= $this->endSection(); ?>