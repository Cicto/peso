<?php 
use CodeIgniter\I18n\Time;
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
</style>
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>
<div class="d-flex justify-content-md-end justify-content-around flex-column flex-md-row p-0 p-md-10 mb-5 h-md-100vh"
    style="
        background-image: url(<?=base_url()?>/public/assets/media/peso/baliwag-trabaho-update-bg.png);
        background-repeat: no-repeat;
        background-size: cover;
        background-position-x: left;
        background-position-y: bottom;
    " id="landing-page-search-container">
    <div class="card w-100 w-md-75 align-self-center d-flex p-5 mt-md-10 shadow-md shadow">
        <p style="color: var(--bs-gray-800); line-height: 30pt;" class="display-5 fw-normal">
            Find a job of your choice
        </p>
        <form method="get" action="jobs/search" id="job-search-form" class="row">
            <div class="col-12 col-md-5 col-lg-5">
                <div class="input-group mb-md-0 mb-5">
                    <span class="input-group-text border-end-0 bg-body border-focus fw-bold"
                        id="basic-addon1">What</span>
                    <input type="text" class="form-control form-control-lg border-start-0 border-focus"
                        placeholder="Job title, Company, etc..." name="what" aria-label="Username"
                        aria-describedby="basic-addon1">
                </div>
            </div>
            <div class="col-12 col-md-4 col-lg-5">
                <div class="input-group mb-md-0 mb-5">
                    <span class="input-group-text border-end-0 bg-body border-focus fw-bold"
                        id="basic-addon1">Where</span>
                    <input type="text" class="form-control form-control-lg border-start-0 border-focus"
                        placeholder="City, Province" name="where" aria-label="Username" aria-describedby="basic-addon1">
                </div>
            </div>
            <div class="col-12 col-md-3 col-lg-2">
                <button type="submit" class="btn btn-blue w-100 fw-semibold text-nowrap"><i
                        class="fas fa-search text-white"></i> Find Jobs</button>
            </div>
        </form>
    </div>
</div>

<div class="separator my-10"></div>

<div class="row my-5 mx-0">
    <div class="col-12 col-lg-10 offset-lg-1 mb-10">
        <div class="row m-0">
            <div class="col-12 d-flex justify-content-center">
                <div class="ff-noir row m-0 mb-5 mx-auto px-2 w-100 w-md-75 w-lg-75">
                    <div class="col-1 bg-green" style="clip-path: polygon(100% 0%, 100% 100%, 0% 100%);"></div>
                    <div class="col-10 bg-green text-center">
                        <h1 class="display-4 text-white"> RECENTLY POSTED JOBS </h1>
                    </div>
                    <div class="col-1 position-relative p-0">
                        <div class="position-absolute bg-dark-green top-0 w-100 h-100"
                            style="clip-path: polygon(0% 0%, 100% 100%, 0% 100%);"></div>
                        <div class="position-absolute bg-green top-0 w-100 h-100"
                            style="clip-path: polygon(0% 0%, 100% 0%, 0% 100%);"></div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-5 rounded">
                <ul class="p-0" id="job-list">
                    <?php 
                        if($recent_jobs):
                        $current_time = new Time('now');
                        $first = true;
                        $index = 0;
                        $is_applied = FALSE;
                        foreach ($recent_jobs as $key => $job):
                            if($applied_jobs['status']){
                                foreach ($applied_jobs['result'] as $key => $job_info) {
                                    $is_applied = $job->id == $job_info->id;
                                    if($is_applied){
                                        break;
                                    }
                                }
                            }
                            $posted_at = Time::parse($job->posted_at);
                            $diff = $current_time->difference($posted_at);
                    ?>
                    <li class="card p-5 shadow-none mb-5 job-list-item pointer <?php 
                        if($first){
                            $index = $key;
                            $first = false;
                            echo "active";
                        }
                    ?>" style="border-bottom: 5px #2966b1 solid !important;" data-job-id="<?=$job->id?>">
                        <a class="h2 fw-semibold pointer hover-a-underline job-list-anchor "
                            href="<?=base_url()?>/jobs/post/<?=$job->id?>"><?=$job->job_title?></a>
                        <div class="company-name fs-5 text-gray-700 text-truncate ff-noir text-blue"><i
                                class="fas fa-city text-blue"></i> <?=$job->company_name?></div>
                        <div class="company-location small opacity-75 text-gray-700 text-truncate ff-noir text-blue"><i
                                class="fas fa-map-marker-alt text-blue"></i> <?=$job->company_address?></div>
                        <div class="job-description text-muted border-top mt-2 pt-2 d-flex">
                            <?php if($job->job_description):?>
                            <div class="px-1">●</div>
                            <div class="truncate-2 flex-grow-1 ms-1" style="">
                                <?=$job->job_description?>
                            </div>
                            <?php else:?>
                            <ul class="job-list-qualifications">
                                <?php 
                                    $count = 1;
                                    $job_qualifications = json_decode($job->job_qualifications);
                                    foreach ($job_qualifications as $key => $value):
                                        if($count<=2):?>
                                <li class="d-flex">
                                    <div class="px-1">●</div>
                                    <div class="">
                                        <?=$value?>
                                    </div>
                                </li>
                                <?php 
                                    
                                        $count++;
                                        endif;
                                    endforeach;?>
                            </ul>
                            <?php endif;?>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span class="text-muted d-block text-end mt-4 px-2"><i class="fas fa-users"></i> <?=$job->applicants?></span>
                            <i class="text-muted d-block text-end mt-4 px-2">Posted <?=$diff->humanize()?></i>
                        </div>
                        <?php if($is_applied):?>
                            <div class="position-absolute top-0 end-0 my-1" title="Job Applied">
                                <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2023-03-24-172858/core/html/src/media/icons/duotune/general/gen056.svg-->
                                <span class="svg-icon text-blue svg-icon-2hx">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.0077 19.2901L12.9293 17.5311C12.3487 17.1993 11.6407 17.1796 11.0426 17.4787L6.89443 19.5528C5.56462 20.2177 4 19.2507 4 17.7639V5C4 3.89543 4.89543 3 6 3H17C18.1046 3 19 3.89543 19 5V17.5536C19 19.0893 17.341 20.052 16.0077 19.2901Z" fill="currentColor"/>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </div>
                        <?php endif;?>
                    </li>
                    <?php endforeach;?>
                    <?php endif;?>
                </ul>
            </div>
            <div class="d-none d-md-block col-12 col-md-7 d-flex flex-column" style="position: relative;">
                <?php if($recent_jobs):?>
                <div class="card  shadow-none ff-noir" id="job-overview-container" style="
                    border: 1px var(--my-blue) solid !important;
                    position: sticky;
                    height: 97vh;
                    top: 10px;
                    z-index: 100;
                    overflow-y: auto;

                    background-image: url(<?=base_url()?>/public/assets/media/peso/peso-job-bg.png);
                    background-repeat: no-repeat;
                    background-size: cover;
                    background-position: bottom;
                    ">

                    <div class="p-7 flex-grow-1">
                        <?php 
                            $initial_job = isset($recent_jobs[$index]) ? $recent_jobs[$index] : $recent_jobs[0];
                            $initial_job_id = $initial_job->id;
                            $is_applied = FALSE;
                            if($applied_jobs['status']){
                                foreach ($applied_jobs['result'] as $key => $job_info) {
                                    $is_applied = $initial_job_id == $job_info->id;
                                    if($is_applied){
                                        break;
                                    }
                                }
                            }
                        ?>
                        <div class="d-flex mt-5">
                            <h1 class="bg-blue d-inline text-white px-3 py-1 text-uppercase" id="job-category">
                                <?=$initial_job->job_category?></h1>
                        </div>
                        <h1 class="display-4 fw-bolder text-green text-uppercase my-7 text-decoration-underline"
                            id="job-title"><?=$initial_job->job_title?></h1>
                        <h2 class="company-name text-blue text-truncate display-7 text-uppercase fw-normal mb-0"
                            id="company-name"><?=$initial_job->company_name?></h2>
                        <h3 class="company-location text-blue text-truncate mt-2 display-8 fw-normal text-uppercase"><i
                                class="fas fa-map-marker-alt text-blue fs-3"></i> <span id="company-address">
                                <?=$initial_job->company_address?></span></h3>

                        <div class="fs-4 text-blue my-5"
                            style="display:<?=$initial_job->job_category_id==1? "block" : "none" ?>;"
                            id="job-description">
                            <?=$initial_job->job_description?>
                        </div>
                        <span class="display-6 text-green ff-noir me-2 mt-10"
                            style="display:<?=$initial_job->job_category_id==1? "none" : "block" ?>;"
                            id="interview-date"><?=date("F d, Y", strtotime(explode(" ",$initial_job->job_date)[0]))?> •
                            <?=date("h:i A", strtotime(explode(" ",$initial_job->job_date)[1]))?></span>
                        <h3 class="text-green text-truncate mt-2 display-8 fw-normal text-uppercase"
                            id="interview-address-container"
                            style="display:<?=$initial_job->job_category_id==1? "none" : "block" ?>;">
                            Interview Location: <br>
                            <i class="fas fa-map-marker-alt text-green fs-3"></i> <span class=""
                                id="interview-address"><?=$initial_job->interview_address?></span></h3>

                        <div class="w-75 border-bottom-dashed my-10" style="border-color: var(--my-blue) ;"></div>
                        <?php $initial_job_qualifications = json_decode($initial_job->job_qualifications); ?>
                        <div id="job-qualifications-container"
                            style="display: <?=count((array)$initial_job_qualifications)?"block":"none"?>;">
                            <h2 class="company-name text-green text-truncate display-7 text-uppercase fw-normal mb-0">
                                QUALIFICATIONS:</h2>
                            <ul id="job-qualifications">
                                <?php
                                foreach ($initial_job_qualifications as $key => $qualification):
                                ?>
                                <li class="fs-4 text-blue"><?=$qualification?></li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                        <?php $initial_job_requirements = json_decode($initial_job->job_requirements);?>
                        <div id="job-requirements-container"
                            style="display: <?=count((array)$initial_job_requirements) ? "block":"none"?>;">
                            <h2 class="company-name text-green text-truncate display-7 text-uppercase fw-normal mb-0">
                                REQUIREMENTS:</h2>
                            <ul id="job-requirements">
                                <?php
                                foreach ($initial_job_requirements as $key => $requirements):
                                ?>
                                <li class="fs-4 text-blue"><?=$requirements?></li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                        <div class="d-flex mt-10">
                            <div class="">
                                <div
                                    class="company-name text-green text-truncate display-7 text-uppercase fw-normal mb-0">
                                    DATE POSTED:</div>
                                <div class="company-name text-blue text-truncate display-8 text-uppercase fw-normal mb-0"
                                    id="posted-at">
                                    <?=date("F d, Y", strtotime(explode(" ",$initial_job->posted_at)[0]))?></div>
                            </div>
                            <div class="ms-10" style="display:<?=$initial_job->job_category_id==1? "block" : "none" ?>;"
                                id="job-date-container">
                                <div
                                    class="company-name text-green text-truncate display-7 text-uppercase fw-normal mb-0">
                                    CLOSING DATE:</div>
                                <div class="company-name text-blue text-truncate display-8 text-uppercase fw-normal mb-0"
                                    id="job-date">
                                    <?=date("F d, Y", strtotime(explode(" ",$initial_job->job_date)[0]))?></div>
                            </div>
                        </div>
                        <div class="fs-4 text-blue ff-noir text-uppercase text-end" id="job-candidates-container" style="display: <?=$initial_job->candidates == 0 ? "none" : "block" ?>;">
                        <i class="fas fa-users text-blue"></i> <span id="candidates">Looking for <u><span id="job-candidates"><?=$initial_job->candidates?></span> candidates</u></span>
                        </div>
                    </div>
                    <div class="bg-blue rounded-bottom position-sticky bottom-0">
                        <button type="button" data-job-id="<?=$initial_job->id?>" data-is-applied="<?=$is_applied ? 1 : 0 ?>" class="btn btn-blue w-100 fw-semibold text-nowrap display-8" id="job-application-button">
                            <?php if($is_applied):?>
                                <i class="fas fa-check text-white fs-3"></i> Applied
                            <?php else:?>
                                <i class="fas fa-file-alt text-white fs-3"></i> Apply Now!
                            <?php endif;?>
                        </button>
                    </div>

                    <!-- PLACEHOLDER============================================================================================================ -->

                    <div class="position-absolute top-0 w-100 h-100 bg-white rounded-3 p-7"
                        id="job-container-placeholder"
                        style="display: none;-webkit-user-select: none; -ms-user-select: none; user-select: none;">
                        <div class="placeholder-glow">

                            <div class="d-flex mt-5">
                                <h1 class="bg-blue d-inline text-blue px-3 py-1 text-uppercase placeholder">REFERRAL
                                </h1>
                            </div>
                            <h1 class="display-4 text-green text-uppercase my-7"><span
                                    class="bg-green placeholder">TECHNICAL</span> <span
                                    class="bg-green placeholder">STAFF</span></h1>
                            <h2 class="company-name text-blue display-7 mb-0"><span
                                    class="bg-blue placeholder">KEBA</span> <span
                                    class="bg-blue placeholder">ENGINEERING</span></h2>
                            <h3
                                class="company-location text-blue text-truncate mt-2 display-8 fw-normal text-uppercase">
                                <span class="bg-blue placeholder">Sample</span> <span
                                    class="bg-blue   placeholder">Company</span> <span
                                    class="bg-blue   placeholder">Location,</span> <span
                                    class="bg-blue   placeholder">Baliwag,</span> <span
                                    class="bg-blue   placeholder">Bulacan</span></h3>

                            <p class="card-text">
                                <span class="placeholder bg-blue col-7"></span>
                                <span class="placeholder bg-blue col-1"></span>
                                <span class="placeholder bg-blue col-4"></span>
                                <span class="placeholder bg-blue col-1"></span>
                                <span class="placeholder bg-blue col-5"></span>
                                <span class="placeholder bg-blue col-6"></span>
                                <span class="placeholder bg-blue col-3"></span>
                                <span class="placeholder bg-blue col-8"></span>
                            </p>

                            <div class="w-75 border-bottom-dashed mt-8 mb-10 placeholder bg-transparent"
                                style="border-color: var(--my-blue) ;"></div>

                            <h2
                                class="company-name text-green text-truncate display-7 text-uppercase fw-normal mb-0 text0-green placeholder">
                                QUALIFICATIONS:</h2>
                            <p class="card-text ms-5">
                                <span class="placeholder bg-blue col-5"></span>
                                <span class="placeholder bg-blue col-2"></span>
                                <span class="placeholder bg-blue col-4"></span>
                                <span class="placeholder bg-blue col-1"></span>
                                <span class="placeholder bg-blue col-3"></span>
                                <span class="placeholder bg-blue col-2"></span>
                                <span class="placeholder bg-blue col-6"></span>
                                <span class="placeholder bg-blue col-3"></span>
                                <span class="placeholder bg-blue col-1"></span>
                                <span class="placeholder bg-blue col-6"></span>
                            </p>
                            <h2
                                class="company-name text-green text-truncate display-7 text-uppercase fw-normal mb-0 bg-green placeholder">
                                REQUIREMENTS:</h2>
                            <p class="card-text ms-5">
                                <span class="placeholder bg-blue col-6"></span>
                                <span class="placeholder bg-blue col-2"></span>
                                <span class="placeholder bg-blue col-4"></span>
                                <span class="placeholder bg-blue col-1"></span>
                                <span class="placeholder bg-blue col-3"></span>
                            </p>

                            <div class="d-flex my-10">
                                <div class="">
                                    <div
                                        class="company-name text-green text-truncate display-7 text-uppercase fw-normal mb-0 bg-green placeholder">
                                        DATE POSTED:</div>
                                    <div
                                        class="company-name text-blue text-truncate display-8 text-uppercase fw-normal mb-0 placeholder bg-blue mt-1">
                                        March 06, 2023</div>
                                </div>
                                <div class="ms-10">
                                    <div
                                        class="company-name text-green text-truncate display-7 text-uppercase fw-normal mb-0 bg-green placeholder">
                                        CLOSING DATE:</div>
                                    <div
                                        class="company-name text-blue text-truncate display-8 text-uppercase fw-normal mb-0 placeholder bg-blue mt-1">
                                        March 07, 2023</div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <?php endif;?>
            </div>
            <?php if(!$recent_jobs):?>
            <div
                class="col-12 border border-dashed border-secondary bg-secondary bg-opacity-50 text-muted ff-noir p-5 text-center rounded">
                <div class="display-6">
                    No available job posts yet...
                </div>
                <p>Wait a few days for further announcements</p>
            </div>
            <?php endif;?>
        </div>
    </div>
    <div class="separator my-10"></div>
    <div class="col-12 mt-10">
        <div class="ff-noir row m-0 mb-5 mx-auto px-2 w-100 w-md-75 w-lg-50">
            <div class="col-1 bg-green" style="clip-path: polygon(100% 0%, 100% 100%, 0% 100%);"></div>
            <div class="col-10 bg-green text-center">
                <h1 class="display-4 text-white"> NEWS AND UPDATES </h1>
            </div>
            <div class="col-1 position-relative p-0">
                <div class="position-absolute bg-dark-green top-0 w-100 h-100"
                    style="clip-path: polygon(0% 0%, 100% 100%, 0% 100%);"></div>
                <div class="position-absolute bg-green top-0 w-100 h-100"
                    style="clip-path: polygon(0% 0%, 100% 0%, 0% 100%);"></div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-10 offset-lg-1 text-center">
        <div class="row mx-0" id="news-and-updates-container">
            <div class="col-12 row mx-0 mb-5 rounded">
                <div class="col-12 col-md-8 bg-white p-0 border position-relative big-news-and-updates-image"
                    style="overflow: hidden; background-size: cover; background-repeat: no-repeat; background-position: center;"
                    id="big-news-and-updates"></div>
                <div class="col-12 col-md-4 card rounded-0 border border-start-0 text-start position-relative"
                    style="overflow-y: hidden; display: <?=$pinned_news["status"] ? "block" : "none"?>;">
                    <?php 
                        if($pinned_news["status"]):
                            $pinned_news_0 = $pinned_news["result"][0];
                    ?>
                    <div class="p-5" id="big-news-and-updates-article">
                        <div class="row mb-3">
                            <div class="col-2 d-flex d-md-none d-xl-flex align-items-center">
                                <img src="<?=base_url()?>/public/assets/media/peso/logo-small.svg" class="img-fluid"
                                    alt="">
                            </div>
                            <div class="col-10">
                                <h1 class=" display-6 text-start ff-noir text-gray-900" style="word-break:;">
                                    <?=$pinned_news_0->post_title ?></h1>
                            </div>
                        </div>
                        <div class="text-start text-gray-900 d-none d-md-block"><b> Post Author:
                            </b><?=$pinned_news_0->post_author?></div>
                        <div class="text-start text-gray-600 d-none d-md-block"><i class="far fa-clock"></i>
                            <?=$pinned_news_0->updated_at == "0000-00-00 00:00:00" ? date('M j Y g:i A', strtotime($pinned_news_0->created_at)) : date('M j Y g:i A', strtotime($pinned_news_0->updated_at))?>
                        </div>
                        <hr>
                        <div id="pinned-news-body" class="py-2"></div>
                    </div>
                    <div class="position-absolute bottom-0 start-0 bg-body w-100 text-center py-5"
                        style="display: none;" id="big-news-and-updates-see-more">
                        <a href="<?=base_url()?>/news/post/<?=$pinned_news_0->id?>" class="btn btn-blue">Learn More</a>
                    </div>
                    <?php endif;?>
                </div>
            </div>
            <?php if($recent_news["status"]):?>
            <div class="col-12 col-md-6 col-xl-4 news-and-updates-1" style="overflow: hidden;">
                <div class="h-300px card rounded-0 p-5 position-relative mb-3" style="overflow: hidden;background-image: url(<?=base_url()?>/public/assets/media/stock/900x600/42.png);">
                    <div class="mb-10 mb-md-0 w-100">
                        <?php $recent_news_1 = $recent_news["result"][0]?>
                        <div class="row mb-3">
                            <div class="col-2 d-flex d-md-none d-xl-flex align-items-start mt-2">
                                <img src="<?=base_url()?>/public/assets/media/peso/logo-small.svg" class="img-fluid"
                                    alt="">
                            </div>
                            <div class="col-10">
                                <h1 class=" display-6 text-start ff-noir text-gray-900" style="word-break:;">
                                    <?=$recent_news_1->post_title ?></h1>
                            </div>
                        </div>
                        <div class="text-start text-gray-900 d-none d-md-block"><b> Post Author:
                            </b><?=$recent_news_1->post_author?></div>
                        <div class="text-start text-gray-600 d-none d-md-block"><i class="far fa-clock"></i>
                            <?=$recent_news_1->updated_at == "0000-00-00 00:00:00" ? date('M j Y g:i A', strtotime($recent_news_1->created_at)) : date('M j Y g:i A', strtotime($recent_news_1->updated_at))?>
                        </div>
                        <hr>
                        <div class="no-figure text-start">
                            <?=$recent_news_1->post_body?>
                        </div>
                    </div>
                    <div class="news-learn-more-container position-absolute bottom-0 start-0 text-center w-100 pb-5 theme-light-show">
                        <a href="<?=base_url()?>/news/post/<?=$recent_news_1->id?>" class="btn btn-blue">Learn More</a>
                    </div>
                    <div class="news-learn-more-container-dark position-absolute bottom-0 start-0 text-center w-100 pb-5 theme-dark-show">
                        <a href="<?=base_url()?>/news/post/<?=$recent_news_1->id?>" class="btn btn-blue">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-xl-4 news-and-updates-2" style="overflow: hidden;">
                <div class="h-300px card rounded-0 p-5 position-relative mb-3" style="overflow: hidden;background-image: url(<?=base_url()?>/public/assets/media/stock/900x600/42.png);">
                    <div class="mb-10 mb-md-0 w-100">
                        <?php $recent_news_2 = $recent_news["result"][1]?>
                        <div class="row mb-3">
                            <div class="col-2 d-flex d-md-none d-xl-flex align-items-start mt-2">
                                <img src="<?=base_url()?>/public/assets/media/peso/logo-small.svg" class="img-fluid"
                                    alt="">
                            </div>
                            <div class="col-10">
                                <h1 class=" display-6 text-start ff-noir text-gray-900" style="word-break:;">
                                    <?=$recent_news_2->post_title ?></h1>
                            </div>
                        </div>
                        <div class="text-start text-gray-900 d-none d-md-block"><b> Post Author:
                            </b><?=$recent_news_2->post_author?></div>
                        <div class="text-start text-gray-600 d-none d-md-block"><i class="far fa-clock"></i>
                            <?=$recent_news_2->updated_at == "0000-00-00 00:00:00" ? date('M j Y g:i A', strtotime($recent_news_2->created_at)) : date('M j Y g:i A', strtotime($recent_news_2->updated_at))?>
                        </div>
                        <hr>
                        <div class="no-figure text-start">
                            <?=$recent_news_2->post_body?>
                        </div>
                    </div>
                    <div class="news-learn-more-container position-absolute bottom-0 start-0 text-center w-100 pb-5 theme-light-show">
                        <a href="<?=base_url()?>/news/post/<?=$recent_news_2->id?>" class="btn btn-blue">Learn More</a>
                    </div>
                    <div class="news-learn-more-container-dark position-absolute bottom-0 start-0 text-center w-100 pb-5 theme-dark-show">
                        <a href="<?=base_url()?>/news/post/<?=$recent_news_2->id?>" class="btn btn-blue">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="d-none d-lg-block col-xl-4 news-and-updates-3" style="overflow: hidden;">
                <div class="h-300px card rounded-0 p-5 position-relative mb-3" style="overflow: hidden;background-image: url(<?=base_url()?>/public/assets/media/stock/900x600/42.png);">
                    <div class="mb-10 mb-md-0 w-100">
                        <?php $recent_news_3 = $recent_news["result"][2]?>
                        <div class="row mb-3">
                            <div class="col-2 d-flex d-md-none d-xl-flex align-items-start mt-2">
                                <img src="<?=base_url()?>/public/assets/media/peso/logo-small.svg" class="img-fluid"
                                    alt="">
                            </div>
                            <div class="col-10">
                                <h1 class=" display-6 text-start ff-noir text-gray-900" style="word-break:;">
                                    <?=$recent_news_3->post_title ?></h1>
                            </div>
                        </div>
                        <div class="text-start text-gray-900 d-none d-md-block"><b> Post Author:
                            </b><?=$recent_news_3->post_author?></div>
                        <div class="text-start text-gray-600 d-none d-md-block"><i class="far fa-clock"></i>
                            <?=$recent_news_3->updated_at == "0000-00-00 00:00:00" ? date('M j Y g:i A', strtotime($recent_news_3->created_at)) : date('M j Y g:i A', strtotime($recent_news_3->updated_at))?>
                        </div>
                        <hr>
                        <div class="no-figure text-start">
                            <?=$recent_news_3->post_body?>
                        </div>
                    </div>

                    <div class="news-learn-more-container position-absolute bottom-0 start-0 text-center w-100 pb-5 theme-light-show">
                        <a href="<?=base_url()?>/news/post/<?=$recent_news_3->id?>" class="btn btn-blue">Learn More</a>
                    </div>
                    <div class="news-learn-more-container-dark position-absolute bottom-0 start-0 text-center w-100 pb-5 theme-dark-show">
                        <a href="<?=base_url()?>/news/post/<?=$recent_news_3->id?>" class="btn btn-blue">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
        <?php endif;?>

    </div>
    <div class="col-12 px-6 text-center">
        <a href="<?=base_url()?>/news" class="btn btn-blue px-5 w-100 w-md-25" id="news-and-updates-link">See More Updates</a>
    </div>
</div>
</div>

<?= $this->endSection(); ?>
<?= $this->section('javascript'); ?>
<script>
    const pinned_news_body = `<div><?= $pinned_news["status"] ? $pinned_news_0->post_body : "" ?></div>`;
    let pinned_news_body_image;
    let applied_jobs_id = [<?php 
    if($applied_jobs["status"]){
        foreach ($applied_jobs["result"] as $key => $job_info) {
            echo $job_info->id . ", ";
        }
    }
    ?>];
    $(function () {

        window.onresize = function () {
            resizeBigNewsAndUpdate()
            if(window.innerWidth < 768){
                $("#landing-page-search-container").css({backgroundImage: "", backgroundColor: "var(--kt-card-bg)"})
            }else{
                $("#landing-page-search-container").css({backgroundImage: "url(<?=base_url()?>/public/assets/media/peso/baliwag-trabaho-update-bg.png)", backgroundColor: "transparent"})
            }
        }

        console.log(applied_jobs_id);
        const parsed_pinned_news_body = $($.parseHTML(pinned_news_body))
        pinned_news_body_image = parsed_pinned_news_body.find(".image").first();
        pinned_news_body_image.addClass("pinned-news-body-image")

        parsed_pinned_news_body.find(".image").remove()

        $("#pinned-news-body").html(parsed_pinned_news_body)

        const pinned_news_body_bg_image = pinned_news_body_image.clone(true).find("img").attr("src")
        $("#big-news-and-updates").html(pinned_news_body_image).css("background-image",
            `url(${pinned_news_body_bg_image})`)

        resizeBigNewsAndUpdate()
        $("#job-list").on("click", ".job-list-item, .job-list-item a", async function (e) {
            if (window.innerWidth > 768) {
                e.preventDefault()
                $("#job-list").find(".job-list-item").removeClass("active");
                $(this).addClass("active");
                $("#job-overview-container")[0].scrollTop = 0;
                $("#job-container-placeholder").show().parent().css("overflow-y", "hidden")
                let job_id = this.dataset.jobId;
                if (job_id) {
                    job_id = $(this).closest(".job-list-item")[0].dataset.jobId;
                    console.log(job_id)
                    await AJAX({
                        method: "GET",
                        url: "<?=base_url()?>/jobs/getJob/" + job_id,
                        loader: false,
                        success: async function(data){
                            if (isJsonString(data)) {
                                result = JSON.parse(data)
                                if (result.status) {
                                    const job_info = result.result[0];
                                    console.log(job_info)
                                    await getAppliedJobsId()

                                    $("#job-category").html(`${job_info.job_category}`)
                                    $("#job-title").html(`${job_info.job_title}`)
                                    $("#job-description").html(
                                        `${job_info.job_description}`)
                                    $("#company-name").html(`${job_info.company_name}`)
                                    $("#company-address").html(
                                        `${job_info.company_address}`)
                                    $("#interview-address").html(
                                        `${job_info.interview_address}`)
                                    $("#interview-date").html(
                                        `${mySQLDateToText(job_info.job_date.split(" ")[0])} • ${mySQLTimeToText(job_info.job_date.split(" ")[1])}`
                                        )
                                    $("#job-qualifications-container").show()
                                    if (isJsonString(job_info.job_qualifications)) {
                                        job_qualifications = JSON.parse(job_info
                                            .job_qualifications)
                                        if (Object.keys(job_qualifications).length !==
                                            0) {
                                            $("#job-qualifications").html(``)
                                            for (const index in job_qualifications) {
                                                if (Object.hasOwnProperty.call(
                                                        job_qualifications, index)) {
                                                    const job_qualification =
                                                        job_qualifications[index];
                                                    $("#job-qualifications").append(
                                                        `<li class="fs-4 text-blue">${job_qualification}</li>`
                                                        )
                                                }
                                            }
                                        } else {
                                            $("#job-qualifications-container").hide()
                                        }
                                    } else {
                                        $("#job-qualifications-container").hide()
                                    }

                                    $("#job-requirements-container").show()
                                    if (isJsonString(job_info.job_requirements)) {
                                        job_requirements = JSON.parse(job_info
                                            .job_requirements)
                                        if (Object.keys(job_requirements).length !==
                                            0) {
                                            $("#job-requirements").html(``)
                                            console.log(job_requirements)
                                            for (const index in job_requirements) {
                                                if (Object.hasOwnProperty.call(
                                                        job_requirements, index)) {
                                                    const job_requirement =
                                                        job_requirements[index];
                                                    $("#job-requirements").append(
                                                        `<li class="fs-4 text-blue">${job_requirement}</li>`
                                                        )
                                                }
                                            }
                                        } else {
                                            $("#job-requirements-container").hide()
                                        }
                                    } else {
                                        $("#job-requirements-container").hide()
                                    }

                                    $("#posted-at").html(
                                        `${mySQLDateToText(job_info.posted_at.split(" ")[0])}`
                                        )
                                    $("#job-date").html(
                                        `${mySQLDateToText(job_info.job_date.split(" ")[0])}`
                                        )

                                    if (job_info.job_category_id == 1) {
                                        $("#job-date-container").show()
                                        $("#interview-address-container").hide()
                                        $("#interview-date").hide()
                                    } else if (job_info.job_category_id == 2) {
                                        $("#job-date-container").hide()
                                        $("#interview-address-container").show()
                                        $("#interview-date").show()
                                    }
                                    
                                    if(job_info.candidates==0){
                                        $("#job-candidates-container").hide()
                                    }else{
                                        $("#job-candidates-container").show()
                                        $("#job-candidates").html(`${job_info.candidates}`)
                                    }

                                    if(applied_jobs_id.includes(Number(job_info.id))){
                                        $("#job-application-button").html(`<i class="fas fa-check text-white fs-3"></i> Applied`)
                                    }else{
                                        $("#job-application-button").html(`<i class="fas fa-file-alt text-white fs-3"></i> Apply Now!`)
                                    }
                                    $("#job-application-button").attr("data-job-id", job_info.id).attr("data-is-applied", `${applied_jobs_id.includes(Number(job_info.id)) ? '1' : '0' }`)
                                }
                            }
                        }
                    })
                    await getAppliedJobsId()

                    $("#job-container-placeholder").hide().parent().css("overflow-y", "auto")
                }
            } else {
                if (!$(this).attr("href")) {
                    window.location.href = $(this).find("a").attr("href");
                }
            }
        })

        $("#job-application-button").click(function(){
            <?php if($userInformation):?>
                if(this.dataset.isApplied==0){
                    confirmApplication(this.dataset.jobId, function(){
                        $("#job-application-button").html(`<i class="fas fa-check text-white fs-3"></i> Applied`)
                        $("#job-application-button").attr("data-is-applied", 1);
                    })
                }
            <?php else:?>
                window.location.href = "<?=base_url()?>/login";
            <?php endif;?>
        })
    });

    function resizeBigNewsAndUpdate() {
        const width = $("#big-news-and-updates").width()
        const height = (width / 1.778)
        $("#big-news-and-updates").height(height + "px");
        $("#big-news-and-updates").next().height(height + "px");
        if ($("#big-news-and-updates-article").height() > height) {
            $("#big-news-and-updates-see-more").show()
        } else {
            $("#big-news-and-updates-see-more").hide()
        }
        let image = pinned_news_body_image.find("img")
        if(image.height() > image.width()){
            pinned_news_body_image.find("img").height(height)
        }else{
            image.addClass("img-fluid").css("max-height", height)
        }
        console.log(height, $("#big-news-and-updates-article").height())
    }

    async function getAppliedJobsId(){
        await AJAX({
            method: "GET",
            url: "<?=base_url()?>/jobs/getAppliedJobsId",
            loader: false,
            success: function(data){
                if(isJsonString(data)){
                    let response = JSON.parse(data)
                    if(response.status){
                        let result = response.result;
                        console.log(result.map(element => element.job_post_id))
                        applied_jobs_id = result.map(element => Number(element.job_post_id));
                    }
                }
            }
        })
    }
</script>
<?= $this->endSection(); ?>