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
<div class="row">
    <div class="col-12 col-md-10 offset-md-1">
        <div class="card align-self-center d-flex p-5 mt-md-10">
            <form method="get" action="" id="job-search-form" class="row">
                <div class="col-12 col-md-5 col-lg-5">
                    <div class="input-group mb-md-0 mb-5">
                        <span class="input-group-text border-end-0 bg-body border-focus fw-bold"
                            id="basic-addon1">What</span>
                        <input type="text" class="form-control form-control-lg border-start-0 border-focus"
                            placeholder="Job title, Company, etc..." value="<?=$what?>" name="what" aria-label="What" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-5">
                    <div class="input-group mb-md-0 mb-5">
                        <span class="input-group-text border-end-0 bg-body border-focus fw-bold"
                            id="basic-addon1">Where</span>
                        <input type="text" class="form-control form-control-lg border-start-0 border-focus"
                            placeholder="City, Province" value="<?=$where?>" name="where" aria-label="Where" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="col-12 col-md-3 col-lg-2">
                    <button type="submit" class="btn btn-blue w-100 fw-semibold text-nowrap"><i
                            class="fas fa-search text-white"></i> Find Jobs</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="row my-5 mx-0">
    <div class="col-12 col-lg-10 offset-lg-1 mb-10">
        <div class="row m-0">
            <div class="col-12 col-md-5 rounded">
                <div class="ff-noir row m-0 mb-5">
                    <div class="col-1 bg-green" style="clip-path: polygon(100% 0%, 100% 100%, 0% 100%);"></div>
                    <div class="col-10 bg-green text-center">
                        <h1 class="display-4 text-white"> JOBS LIST </h1>
                    </div>
                    <div class="col-1 position-relative p-0">
                        <div class="position-absolute bg-dark-green top-0 w-100 h-100"
                            style="clip-path: polygon(0% 0%, 100% 100%, 0% 100%);"></div>
                        <div class="position-absolute bg-green top-0 w-100 h-100"
                            style="clip-path: polygon(0% 0%, 100% 0%, 0% 100%);"></div>
                    </div>
                </div>
                <ul class="p-0" id="job-list">
                    <?php 
                        if($searched_jobs["status"]):
                        $searched_job = $searched_jobs["result"];
                        $current_time = new Time('now');
                        $first = true;
                        $index = 0;
                        foreach ($searched_job as $key => $job):
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
                        <a class="h2 fw-semibold pointer hover-a-underline job-list-anchor " href="<?=base_url()?>/jobs/post/<?=$job->id?>"><?=$job->job_title?></a>
                        <div class="company-name fs-5 text-gray-700 text-truncate ff-noir text-blue"><i class="fas fa-city text-blue"></i> <?=$job->company_name?></div>
                        <div class="company-location small opacity-75 text-gray-700 text-truncate ff-noir text-blue"><i class="fas fa-map-marker-alt text-blue"></i> <?=$job->company_address?></div>
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
                        <i class="text-muted d-block text-end mt-4 px-2">Posted <?=$diff->humanize()?></i>
                    </li>
                    <?php endforeach;?>
                    <?php endif;?>
                    <!-- <li class="card p-5 shadow-none mb-5 job-list-item pointer active"
                        style="border-bottom: 5px #2966b1 solid !important;">
                        <a class="h2 fw-semibold pointer hover-a-underline" href="#">Sample Job Title</a>
                        <div class="company-name fs-5 text-gray-700 text-truncate"><i class="fas fa-city text-blue"></i>
                            Sample Company Name</div>
                        <div class="company-location fs-5 text-gray-700 text-truncate mt-2"><i
                                class="fas fa-map-marker-alt text-blue"></i> Sample Company Location, Baliwag, Bulacan
                        </div>
                        <div class="job-description text-muted border-top mt-2 pt-2 d-flex">
                            <div class="px-1">●</div>
                            <div class="truncate-2 flex-grow-1 ms-1" style="">
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Incidunt, aliquam sequi?
                                Soluta eveniet quod, consequuntur distinctio facilis dolores consectetur? Esse dolore
                                nihil voluptas explicabo illo mollitia vero debitis quod similique?
                            </div>
                        </div>
                        <i class="text-muted d-block text-end mt-4 px-2">Posted 1 hour ago</i>
                    </li>
                    <li class="card p-5 shadow-none mb-5 job-list-item pointer"
                        style="border-bottom: 5px #2966b1 solid !important;">
                        <a class="h2 fw-semibold pointer hover-a-underline" href="#">Sample Job Title</a>
                        <div class="company-name fs-5 text-gray-700 text-truncate"><i class="fas fa-city text-blue"></i>
                            Sample Company Name</div>
                        <div class="company-location fs-5 text-gray-700 text-truncate mt-2"><i
                                class="fas fa-map-marker-alt text-blue"></i> Sample Company Location, Baliwag, Bulacan
                        </div>
                        <div class="job-description text-muted border-top mt-2 pt-2 d-flex">
                            <div class="px-1">●</div>
                            <div class="truncate-2 flex-grow-1 ms-1" style="">
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Incidunt, aliquam sequi?
                                Soluta eveniet quod, consequuntur distinctio facilis dolores consectetur? Esse dolore
                                nihil voluptas explicabo illo mollitia vero debitis quod similique?
                            </div>
                        </div>
                        <i class="text-muted d-block text-end mt-4 px-2">Posted 1 hour ago</i>
                    </li>
                    <li class="card p-5 shadow-none mb-5 job-list-item pointer"
                        style="border-bottom: 5px #2966b1 solid !important;">
                        <a class="h2 fw-semibold pointer hover-a-underline" href="#">Sample Job Title</a>
                        <div class="company-name fs-5 text-gray-700 text-truncate"><i class="fas fa-city text-blue"></i>
                            Sample Company Name</div>
                        <div class="company-location fs-5 text-gray-700 text-truncate mt-2"><i
                                class="fas fa-map-marker-alt text-blue"></i> Sample Company Location, Baliwag, Bulacan
                        </div>
                        <div class="job-description text-muted border-top mt-2 pt-2 d-flex">
                            <div class="px-1">●</div>
                            <div class="truncate-2 flex-grow-1 ms-1" style="">
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Incidunt, aliquam sequi?
                                Soluta eveniet quod, consequuntur distinctio facilis dolores consectetur? Esse dolore
                                nihil voluptas explicabo illo mollitia vero debitis quod similique?
                            </div>
                        </div>
                        <i class="text-muted d-block text-end mt-4 px-2">Posted 1 hour ago</i>
                    </li>
                    <li class="card p-5 shadow-none mb-5 job-list-item pointer"
                        style="border-bottom: 5px #2966b1 solid !important;">
                        <a class="h2 fw-semibold pointer hover-a-underline" href="#">Sample Job Title</a>
                        <div class="company-name fs-5 text-gray-700 text-truncate"><i class="fas fa-city text-blue"></i>
                            Sample Company Name</div>
                        <div class="company-location fs-5 text-gray-700 text-truncate mt-2"><i
                                class="fas fa-map-marker-alt text-blue"></i> Sample Company Location, Baliwag, Bulacan
                        </div>
                        <div class="job-description text-muted border-top mt-2 pt-2 d-flex">
                            <div class="px-1">●</div>
                            <div class="truncate-2 flex-grow-1 ms-1" style="">
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Incidunt, aliquam sequi?
                                Soluta eveniet quod, consequuntur distinctio facilis dolores consectetur? Esse dolore
                                nihil voluptas explicabo illo mollitia vero debitis quod similique?
                            </div>
                        </div>
                        <i class="text-muted d-block text-end mt-4 px-2">Posted 1 hour ago</i>
                    </li>
                    <li class="card p-5 shadow-none mb-5 job-list-item pointer"
                        style="border-bottom: 5px #2966b1 solid !important;">
                        <a class="h2 fw-semibold pointer hover-a-underline" href="#">Sample Job Title</a>
                        <div class="company-name fs-5 text-gray-700 text-truncate"><i class="fas fa-city text-blue"></i>
                            Sample Company Name</div>
                        <div class="company-location fs-5 text-gray-700 text-truncate mt-2"><i
                                class="fas fa-map-marker-alt text-blue"></i> Sample Company Location, Baliwag, Bulacan
                        </div>
                        <div class="job-description text-muted border-top mt-2 pt-2 d-flex">
                            <div class="px-1">●</div>
                            <div class="truncate-2 flex-grow-1 ms-1" style="">
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Incidunt, aliquam sequi?
                                Soluta eveniet quod, consequuntur distinctio facilis dolores consectetur? Esse dolore
                                nihil voluptas explicabo illo mollitia vero debitis quod similique?
                            </div>
                        </div>
                        <i class="text-muted d-block text-end mt-4 px-2">Posted 1 hour ago</i>
                    </li>
                    <li class="card p-5 shadow-none mb-5 job-list-item pointer"
                        style="border-bottom: 5px #2966b1 solid !important;">
                        <a class="h2 fw-semibold pointer hover-a-underline" href="#">Sample Job Title</a>
                        <div class="company-name fs-5 text-gray-700 text-truncate"><i class="fas fa-city text-blue"></i>
                            Sample Company Name</div>
                        <div class="company-location fs-5 text-gray-700 text-truncate mt-2"><i
                                class="fas fa-map-marker-alt text-blue"></i> Sample Company Location, Baliwag, Bulacan
                        </div>
                        <div class="job-description text-muted border-top mt-2 pt-2 d-flex">
                            <div class="px-1">●</div>
                            <div class="truncate-2 flex-grow-1 ms-1" style="">
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Incidunt, aliquam sequi?
                                Soluta eveniet quod, consequuntur distinctio facilis dolores consectetur? Esse dolore
                                nihil voluptas explicabo illo mollitia vero debitis quod similique?
                            </div>
                        </div>
                        <i class="text-muted d-block text-end mt-4 px-2">Posted 1 hour ago</i>
                    </li>
                    <li class="card p-5 shadow-none mb-5 job-list-item pointer"
                        style="border-bottom: 5px #2966b1 solid !important;">
                        <a class="h2 fw-semibold pointer hover-a-underline" href="#">Sample Job Title</a>
                        <div class="company-name fs-5 text-gray-700 text-truncate"><i class="fas fa-city text-blue"></i>
                            Sample Company Name</div>
                        <div class="company-location fs-5 text-gray-700 text-truncate mt-2"><i
                                class="fas fa-map-marker-alt text-blue"></i> Sample Company Location, Baliwag, Bulacan
                        </div>
                        <div class="job-description text-muted border-top mt-2 pt-2 d-flex">
                            <div class="px-1">●</div>
                            <div class="truncate-2 flex-grow-1 ms-1" style="">
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Incidunt, aliquam sequi?
                                Soluta eveniet quod, consequuntur distinctio facilis dolores consectetur? Esse dolore
                                nihil voluptas explicabo illo mollitia vero debitis quod similique?
                            </div>
                        </div>
                        <i class="text-muted d-block text-end mt-4 px-2">Posted 1 hour ago</i>
                    </li> -->
                </ul>
            </div>
            <div class="d-none d-md-block col-12 col-md-7 d-flex flex-column" style="position: relative;">
                <?php 
                    $searched_job = $searched_jobs["result"];
                    // print_r($searched_job[$index]);
                    if($searched_jobs["status"]):
                ?>
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
                        <?php $initial_job = $searched_job[$index];
                            // print_r($initial_job);
                        ?>
                        <div class="d-flex mt-5">
                            <h1 class="bg-blue d-inline text-white px-3 py-1 text-uppercase" id="job-category"><?=$initial_job->job_category?></h1>
                        </div>
                        <h1 class="display-4 fw-bolder text-green text-uppercase my-7 text-decoration-underline" id="job-title"><?=$initial_job->job_title?></h1>
                        <h2 class="company-name text-blue text-truncate display-7 text-uppercase fw-normal mb-0" id="company-name"><?=$initial_job->company_name?></h2>
                        <h3 class="company-location text-blue text-truncate mt-2 display-8 fw-normal text-uppercase"><i class="fas fa-map-marker-alt text-blue fs-3"></i> <span id="company-address"> <?=$initial_job->company_address?></span></h3>

                        <div class="fs-4 text-blue my-5" style="display:<?=$initial_job->job_category_id==1? "block" : "none" ?>;" id="job-description">
                            <?=$initial_job->job_description?>
                        </div>
                        <span class="display-6 text-green ff-noir me-2 mt-10" style="display:<?=$initial_job->job_category_id==1? "none" : "block" ?>;" id="interview-date"><?=date("F d, Y", strtotime(explode(" ",$initial_job->job_date)[0]))?> • <?=date("h:i A", strtotime(explode(" ",$initial_job->job_date)[1]))?></span>
                        <h3 class="text-green text-truncate mt-2 display-8 fw-normal text-uppercase" id="interview-address-container" style="display:<?=$initial_job->job_category_id==1? "none" : "block" ?>;">
                        Interview Location: <br> 
                        <i class="fas fa-map-marker-alt text-green fs-3"></i> <span class="" id="interview-address"><?=$initial_job->interview_address?></span></h3>
                        
                        <div class="w-75 border-bottom-dashed my-10" style="border-color: var(--my-blue) ;"></div>
                        <?php $initial_job_qualifications = json_decode($initial_job->job_qualifications); ?>
                        <div id="job-qualifications-container" style="display: <?=count((array)$initial_job_qualifications)?"block":"none"?>;">
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
                        <div id="job-requirements-container" style="display: <?=count((array)$initial_job_requirements) ? "block":"none"?>;">
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
                        <div class="d-flex my-10">
                            <div class="">
                                <div class="company-name text-green text-truncate display-7 text-uppercase fw-normal mb-0">DATE POSTED:</div>
                                <div class="company-name text-blue text-truncate display-8 text-uppercase fw-normal mb-0" id="posted-at">
                                    <?=date("F d, Y", strtotime(explode(" ",$initial_job->posted_at)[0]))?></div>
                            </div>
                            <div class="ms-10" style="display:<?=$initial_job->job_category_id==1? "block" : "none" ?>;" id="job-date-container">
                                <div class="company-name text-green text-truncate display-7 text-uppercase fw-normal mb-0">CLOSING DATE:</div>
                                <div class="company-name text-blue text-truncate display-8 text-uppercase fw-normal mb-0" id="job-date">
                                <?=date("F d, Y", strtotime(explode(" ",$initial_job->job_date)[0]))?></div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="bg-blue rounded-bottom position-sticky bottom-0">
                        <button type="submit" class="btn btn-blue w-100 fw-semibold text-nowrap display-8 "><i
                                class="fas fa-file-alt text-white fs-3"></i> Apply Now!</button>
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
            <?php if(!$searched_jobs["status"]):?>
                <div class="col-12 border border-dashed border-secondary bg-secondary bg-opacity-50 text-muted ff-noir p-5 text-center rounded">
                    <div class="display-6">
                        No job post found...
                    </div>
                    <p>Come back a few days and maybe they'll post what you're searching then.</p>
                </div>
            <?php endif;?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
<?= $this->section('javascript'); ?>
<script>
    let news_and_updates = [
        `<iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2FOfficialPESOBaliwag%2Fposts%2Fpfbid0zRarzvW1aQGVHxKjEDZL9arNQYjGYYD16xxowY428EGTBfj26aWUEaLtwGKmeqpLl&show_text=true&width=500" width="500" height="698" style="border:none;overflow:hidden" scrolling="yes" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>`,
        `<iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2FOfficialPESOBaliwag%2Fposts%2Fpfbid02eGvg8xBZfC2z2A4uQEfVCZWtq8nWZSLNbUXHdNyH1tmkYMZWU6PMBih5DQeBGbzrl&show_text=true&width=500" width="500" height="653" style="border:none;overflow:hidden" scrolling="yes" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>`,
        `<iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2FOfficialPESOBaliwag%2Fposts%2Fpfbid0WsjPBgySbqPppqDXxAZUqRKVhdm6hYhvkyQKgSaGK21mreToaSiQ6FrDp2QMr6e9l&show_text=true&width=500" width="500" height="722" style="border:none;overflow:hidden" scrolling="yes" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>`,
    ]
    $(function () {
        // $("#job-list").on("click", ".job-list-item, .job-list-item a", function (e) {
        //     e.preventDefault()
        //     $("#job-list").find(".job-list-item").removeClass("active");
        //     $(this).addClass("active");
        //     $("#job-overview-container")[0].scrollTop = 0;

        //     $("#job-container-placeholder").show().parent().css("overflow-y", "hidden")
        //     setTimeout(() => {
        //         $("#job-container-placeholder").hide().parent().css("overflow-y", "auto")
        //     }, 3000);
        // })

        $("#job-list").on("click", ".job-list-item, .job-list-item a", async function (e) {
            if(window.innerWidth > 768){
                e.preventDefault()
                $("#job-list").find(".job-list-item").removeClass("active");
                $(this).addClass("active");
                $("#job-overview-container")[0].scrollTop = 0;
                $("#job-container-placeholder").show().parent().css("overflow-y", "hidden")
                let job_id = this.dataset.jobId;
                if(job_id){
                    job_id = $(this).closest(".job-list-item")[0].dataset.jobId;
                    console.log(job_id)
                    await AJAX({
                        method: "GET",
                        url: "<?=base_url()?>/jobs/getJob/"+job_id,
                        loader: false,
                        success: data=>{
                            if(isJsonString(data)){
                                result = JSON.parse(data)
                                if(result.status){
                                    const job_info = result.result[0];
                                    console.log(job_info)
                                    $("#job-category").html(`${job_info.job_category}`)
                                    $("#job-title").html(`${job_info.job_title}`)
                                    $("#job-description").html(`${job_info.job_description}`)
                                    $("#company-name").html(`${job_info.company_name}`)
                                    $("#company-address").html(`${job_info.company_address}`)
                                    $("#interview-address").html(`${job_info.interview_address}`)
                                    $("#interview-date").html(`${mySQLDateToText(job_info.job_date.split(" ")[0])} • ${mySQLTimeToText(job_info.job_date.split(" ")[1])}`)
                                    $("#job-qualifications-container").show()
                                    if(isJsonString(job_info.job_qualifications)){
                                        job_qualifications = JSON.parse(job_info.job_qualifications)
                                        if(Object.keys(job_qualifications).length !== 0 ){
                                            $("#job-qualifications").html(``)
                                            for (const index in job_qualifications) {
                                                if (Object.hasOwnProperty.call(job_qualifications, index)) {
                                                    const job_qualification = job_qualifications[index];
                                                    $("#job-qualifications").append(`<li class="fs-4 text-blue">${job_qualification}</li>`)
                                                }
                                            }
                                        }else{
                                            $("#job-qualifications-container").hide()
                                        }
                                    }else{
                                        $("#job-qualifications-container").hide()
                                    }

                                    $("#job-requirements-container").show(``)
                                    if(isJsonString(job_info.job_requirements)){
                                        job_requirements = JSON.parse(job_info.job_requirements)
                                        if(Object.keys(job_requirements).length !== 0 ){
                                            $("#job-requirements").html(``)
                                            console.log(job_requirements)
                                            for (const index in job_requirements) {
                                                if (Object.hasOwnProperty.call(job_requirements, index)) {
                                                    const job_requirement = job_requirements[index];
                                                    $("#job-requirements").append(`<li class="fs-4 text-blue">${job_requirement}</li>`)
                                                }
                                            }
                                        }else{
                                            $("#job-requirements-container").hide()
                                        }
                                    }else{
                                        $("#job-requirements-container").hide()
                                    }
                                
                                    $("#posted-at").html(`${mySQLDateToText(job_info.posted_at.split(" ")[0])}`)
                                    $("#job-date").html(`${mySQLDateToText(job_info.job_date.split(" ")[0])}`)

                                    if(job_info.job_category_id == 1){
                                        $("#job-date-container").show()
                                        $("#interview-address-container").hide()
                                        $("#interview-date").hide()
                                    }else if(job_info.job_category_id == 2){
                                        $("#job-date-container").hide()
                                        $("#interview-address-container").show()
                                        $("#interview-date").show()
                                    }
                                }
                            }
                        }
                    })
                    $("#job-container-placeholder").hide().parent().css("overflow-y", "auto")
                }
            }else{
                if(!$(this).attr("href")){
                    window.location.href = $(this).find("a").attr("href");
                }
            }
        })
    });
</script>
<?= $this->endSection(); ?>