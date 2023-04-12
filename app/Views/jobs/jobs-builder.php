<?= $this->extend('layouts/main'); ?>
<?= $this->section('css'); ?>
<style>
    @font-face {
        font-family: 'noirpro';
        src: url('<?=base_url()?>/public/assets/fonts/noir-pro-semi-bold-webfont.woff2') format('woff2'),
            url('<?=base_url()?>/public/assets/fonts/noir-pro-semi-bold-webfont.woff') format('woff');
        font-weight: normal;
        font-style: normal;
    }

    div.ck-content.ck-focused{
        border-color: #1f6ae1 !important;
        border-width: 2px !important;
    }

    div.ck-content{
        border-color: transparent !important;
        border-width: 2px !important;
    }

    .ck-editor.text-blue *{
        color: var(--my-blue) !important;
    }

    .ck-editor p{
        margin: 0;
    }
    .ck.ck-editor__editable_inline > :first-child{
        margin-top: 5px !important;
    }
    .ck.ck-editor__editable_inline > :last-child{
        margin-bottom: 5px !important;
    }

    .ck .ck-placeholder::before{
        color: var(--my-blue) !important;
        opacity: .5;
    }

    .input-sizer {
        display: inline-grid;
        vertical-align: top;
        align-items: center;
        position: relative;
        padding: 0.25em 0.5em;
        margin: 5px;
    }
    .input-sizer.stacked {
        padding: 0.5em;
        align-items: stretch;
    }
    .input-sizer.stacked::after,
    .input-sizer.stacked input,
    .input-sizer.stacked textarea {
        grid-area: 2/1;
    }
    .input-sizer::after,
    .input-sizer input,
    .input-sizer textarea {
        width: auto;
        min-width: 1em;
        grid-area: 1/2;
        font: inherit;
        padding: 0.25em;
        margin: 0;
        resize: none;
        background: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        border: none;
    }
    .input-sizer::after {
        content: attr(data-value) " ";
        font-size: calc(1.05rem + .6vw) !important;
        visibility: hidden;
        padding: .25rem .75rem !important;
        text-transform: uppercase !important;
        white-space: pre-wrap;
        font-family: noirpro,Inter,Helvetica,sans-serif !important;
    }
    

</style>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
    <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0"><?= $title ?></h1>
            <ul class="breadcrumb fw-semibold fs-7 my-0 pt-1">
                <li class="breadcrumb-item text-muted">
                    <a href="<?=base_url()?>/jobs/manage" class="text-muted text-hover-primary">Job Posts</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#" class="text-muted text-hover-primary"><?= $title ?></a>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="d-flex flex-column flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-fluid">
        <div class="card card-content">
            <div class="card-body py-5 px-3 px-md-9 d-flex flex-column">
                <form id="post-form" action="<?=base_url()?>/jobs/<?= $is_edit ? "updateJobPost/" . $job_info->id : "createJobPost"?>" method="POST" class="h-100 d-flex flex-column justify-content-between flex-grow-1">
                    <div class="row m-0 border border-start-0 py-5 position-relative">
                        <div class="col-12 col-md-3 col-lg-3 d-none-x d-md-block-x">
                            <div class="d-flex h-100 justify-content-end align-items-center">
                                <div class="fs-5 d-flex align-items-center text-gray-700 ">
                                    <label for="" class="required form-label">Category</label>
                                     <i class="fas fa-caret-left text-gray-400 ms-3 fs-1" style="margin-right: -1px;"></i>
                                </div>
                                <div class="h-100 align-self-stretch px-3 border border-gray-400 border-end-0 border-2 rounded position-relative" style="clip-path: polygon(0% 0%, 50% 0%, 50% 100%, 0% 100%);">
                                </div>
                            </div>
                        </div>
                        <!-- JOB CATEGORY -->
                        <div class="col-12 col-md-9 col-lg-9 border-start">
                            <input type="number" class="d-none" placeholder="0" value="<?= $is_edit ? $job_info->job_category_id: ""?>" name="job_category_id" id="job-category">
                            <div class="dropdown ff-noir">
                                <div class="bg-blue text-white px-3 py-1 text-uppercase fs-1 border-0 d-inline pointer" id="dropdown-job-category" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php if( $is_edit ):?>
                                        <?php foreach ($job_categories as $key => $value):?>
                                            <?= $value->id == $job_info->job_category_id ? strtoupper($value->job_category) : ""?>
                                        <?php endforeach;?>
                                    <?php else:?>
                                        <span class="opacity-50">CATEGORY</span>
                                    <?php endif;?>
                                </div>
                                <ul class="dropdown-menu bg-blue">
                                    <?php foreach ($job_categories as $key => $value):?>
                                        <li class=""><button class="dropdown-item dropdown-item-job-category" data-category="<?=$value->id?>" style="color: white;" type="button"><?=strtoupper($value->job_category)?></button></li>
                                    <?php endforeach;?>
                                    <!-- <li class=""><button class="dropdown-item dropdown-item-job-category" data-category="Local Recruitment Activity" style="color: white;" type="button">LOCAL RECRUITMENT ACTIVITY</button></li> -->
                                </ul>
                            </div>

                        </div>
                        <div class="col-12 col-md-3 col-lg-3 my-7 d-none-x d-md-block-x">
                            <div class="d-flex h-100 justify-content-end align-items-center">
                                <div class="fs-5 d-flex align-items-center text-gray-700">
                                    <label for="" class="required form-label">Job Title</label>
                                    <i class="fas fa-caret-left text-gray-400 ms-3 fs-1" style="margin-right: -1px;"></i>
                                </div>
                                <div class="h-100 align-self-stretch px-3 border border-gray-400 border-end-0 border-2 rounded position-relative" style="clip-path: polygon(0% 0%, 50% 0%, 50% 100%, 0% 100%);">
                                </div>
                            </div>
                        </div>
                        <!-- JOB TITLE -->
                        <div class="col-12 col-md-9 col-lg-9 my-7 border-start">
                            <textarea name="job_title" id="job-title" rows="1" style="min-height: 4.25rem !important; resize: none;" class="px-4 display-4 fw-bolder ff-noir text-green text-uppercase border-0 rounded-1 text-decoration-underline w-100 bg-transparent" placeholder="Job Title"><?=$is_edit ? $job_info->job_title: "" ?></textarea>
                        </div>  
                        <div class="col-12 col-md-3 col-lg-3 d-none-x d-md-block-x">
                            <div class="d-flex h-100 justify-content-end align-items-center">
                                <div class="fs-5 d-flex align-items-center text-gray-700">
                                    <label for="" class="required form-label">Company Name</label>
                                    <i class="fas fa-caret-left text-gray-400 ms-3 fs-1" style="margin-right: -1px;"></i>
                                </div>
                                <div class="h-100 align-self-stretch px-3 border border-gray-400 border-end-0 border-2 rounded position-relative" style="clip-path: polygon(0% 0%, 50% 0%, 50% 100%, 0% 100%);">
                                </div>
                            </div>
                        </div>
                        <!-- COMPANY NAME -->
                        <div class="col-12 col-md-9 col-lg-9 border-start">
                            <textarea name="company_name" id="company-name" rows="1" style="min-height: 2rem !important;" class="px-4 text-blue border-0 rounded-1 text-truncate display-7 text-uppercase fw-normal mb-0 ff-noir w-100 bg-transparent" placeholder="Company Name"><?=$is_edit ? $job_info->company_name: "" ?></textarea>
                        </div>
                        <div class="col-12 col-md-3 col-lg-3 mt-2 d-none-x d-md-block-x">
                            <div class="d-flex h-100 justify-content-end align-items-center">
                                <div class="fs-5 d-flex align-items-center text-gray-700">
                                    Company Address <i class="fas fa-caret-left text-gray-400 ms-3 fs-1" style="margin-right: -1px;"></i>
                                </div>
                                <div class="h-100 align-self-stretch px-3 border border-gray-400 border-end-0 border-2 rounded position-relative" style="clip-path: polygon(0% 0%, 50% 0%, 50% 100%, 0% 100%);">
                                </div>
                            </div>
                        </div>
                        <!-- COMPANY ADDRESS -->
                        <div class="col-12 col-md-9 col-lg-9 mt-2 border-start d-flex">
                            <!-- COMPANY LOCATION -->
                            <input type="text" name="company_location" value="<?=$is_edit ? $job_info->company_location: "" ?>" id="company-location" class=" bg-transparent px-4 text-blue text-truncate mt-2 display-8 fw-normal text-uppercase mb-0 ff-noir border-0 rounded-1 w-50" placeholder="Company Address">
                            <!-- COMPANY CITY/MUNICIPALITY -->
                            <span class="text-blue text-truncate mt-2 display-8 fw-normal text-uppercase ff-noir">,&nbsp;</span>
                            <div class="dropdown d-flex">
                                <input type="text" name="company_citymun_code" id="company-city-code" value="<?=$is_edit ? $job_info->company_citymun_code : "031403" ?>" hidden>
                                <?php 
                                    $company_city = "BALIWAG";
                                    if($is_edit) {
                                        foreach ($barangays_cities_and_pronvinces["cities"] as $key => $city){
                                            if($job_info->company_citymun_code == $city->citymunCode){
                                                $company_city = $city->citymunDesc;
                                            }
                                        }
                                    }
                                ?>
                                <input type="text" name="company_city" id="company-city" value="<?=$company_city?>" hidden>
                                <span class="text-blue text-truncate mt-2 display-8 fw-normal text-uppercase ff-noir pointer" id="company-city-preview" type="button" data-bs-toggle="dropdown" aria-expanded="false"><?=$company_city?></span>
                                <ul class="dropdown-menu shadow-sm border ff-noir text-uppercase text-blue pt-0" style="max-height: 50vh; overflow: auto;">
                                    <li class="p-1 sticky-top bg-white shadow-sm"><input type="text" id="city-search" class="w-100 form-control form-control-sm text-uppercase" placeholder="Search"></li>
                                    <?php 
                                        $initial_prov_code = '0314';
                                        if($is_edit){
                                            $initial_prov_code = $job_info->company_prov_code;
                                        }
                                        foreach ($barangays_cities_and_pronvinces["cities"] as $key => $city):?>
                                    <li><a class="dropdown-item text-blue company-city <?= $city->provCode == $initial_prov_code ? "" : "d-none"?>" href="#" data-value="<?=$city->citymunDesc?>" data-prov-code="<?=$city->provCode?>" data-city-mun-code="<?=$city->citymunCode?>"><?=$city->citymunDesc?></a></li>
                                    <?php endforeach;?>
                                </ul>
                            </div>
                            <!-- COMPANY PROVINCE -->
                            <span class="text-blue text-truncate mt-2 display-8 fw-normal text-uppercase ff-noir">,&nbsp;</span>
                            <div class="dropdown d-flex">
                                <input type="text" name="company_prov_code" id="company-prov-code" value="<?=$is_edit ? $job_info->company_prov_code : "0314" ?>" hidden>
                                <?php 
                                    $company_prov = "BULACAN";
                                    if($is_edit) {
                                        foreach ($barangays_cities_and_pronvinces["provinces"] as $key => $prov){
                                            if($job_info->company_prov_code == $prov->provCode){
                                                $company_prov = $prov->provDesc;
                                            }
                                        }
                                    }
                                ?>
                                <input type="text" name="company_province" id="company-province" value="<?=$company_prov?>" hidden>
                                <span class="text-blue text-truncate mt-2 display-8 fw-normal text-uppercase ff-noir pointer" id="company-province-preview" type="button" data-bs-toggle="dropdown" aria-expanded="false"><?=$company_prov?></span>
                                <ul class="dropdown-menu shadow-sm border ff-noir text-uppercase text-blue pt-0" style="max-height: 50vh; overflow: auto;">
                                    <li class="p-1 sticky-top bg-white shadow-sm"><input type="text" id="province-search" class="w-100 form-control form-control-sm text-uppercase" placeholder="Search"></li>
                                    <?php
                                        foreach ($barangays_cities_and_pronvinces["provinces"] as $key => $province):?>
                                    <li><a class="dropdown-item text-blue company-province" href="#" data-value="<?=$province->provDesc?>" data-prov-code="<?= $province->provCode?>"><?=$province->provDesc?></a></li>
                                    <?php endforeach;?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-md-3 col-lg-3 my-5 d-none-x d-md-block-x job-description"  style="display: none;">
                            <div class="d-flex h-100 justify-content-end align-items-center">
                                <div class="fs-5 d-flex align-items-center text-gray-700">
                                    Job Description <i class="fas fa-caret-left text-gray-400 ms-3 fs-1" style="margin-right: -1px;"></i>
                                </div>
                                <div class="h-100 align-self-stretch px-3 border border-gray-400 border-end-0 border-2 rounded position-relative" style="clip-path: polygon(0% 0%, 50% 0%, 50% 100%, 0% 100%);">
                                </div>
                            </div>
                        </div>
                        <!-- JOB DESCRIPTION -->
                        <div class="col-12 col-md-9 col-lg-9 my-5 border-start job-description"  style="display: none;">
                            <div class="ck-editor ff-noir text-blue fs-4" name="job_description" id="job-description">
                                <?php if($is_edit):?>
                                    <?= stripslashes($job_info->job_description)?>
                                <?php endif;?>
                            </div>
                        </div>
                        <div class="col-12 col-md-3 col-lg-3 mt-10 mb-2 d-none-x d-md-block-x interview-date" style="display: none;">
                            <div class="d-flex h-100 justify-content-end align-items-center">
                                <div class="fs-5 d-flex align-items-center text-gray-700">
                                    Interview Date & Time <i class="fas fa-caret-left text-gray-400 ms-3 fs-1" style="margin-right: -1px;"></i>
                                </div>
                                <div class="h-100 align-self-stretch px-3 border border-gray-400 border-end-0 border-2 rounded position-relative" style="clip-path: polygon(0% 0%, 50% 0%, 50% 100%, 0% 100%);">
                                </div>
                            </div>
                        </div>
                        <!-- INTERVIEW DATE -->
                        <div class="col-12 col-md-9 col-lg-9 mt-10 mb-2 border-start align-items-start d-flex-x interview-date " style="display: none;">
                            <input type="text" name="interview_date" value="<?=$is_edit ? $job_info->job_date : ""?>" id="interview-date" hidden>
                            <span class="display-6 text-green ff-noir me-2"><?= $is_edit ? date("F d, Y" ,strtotime( explode(" ", $job_info->job_date)[0] )) : "_____ __, ____ " ?> • <?= $is_edit ? date("h:i A" ,strtotime( explode(" ", $job_info->job_date)[1] )) : "__:__ __"?></span> <div class="btn btn-green btn-sm" id="interview-date-picker"><i class="fas fa-calendar-day p-0 text-white"></i></div>
                        </div>
                        <div class="col-12 col-md-3 col-lg-3 mb-5 d-none-x d-md-block-x interview-location" style="display: none;">
                            <div class="d-flex h-100 justify-content-end align-items-center">
                                <div class="fs-5 d-flex align-items-center text-gray-700">
                                    Interview Location <i class="fas fa-caret-left text-gray-400 ms-3 fs-1" style="margin-right: -1px;"></i>
                                </div>
                                <div class="h-100 align-self-stretch px-3 border border-gray-400 border-end-0 border-2 rounded position-relative" style="clip-path: polygon(0% 0%, 50% 0%, 50% 100%, 0% 100%);">
                                </div>
                            </div>
                        </div>
                        <!-- INTERVIEW ADDRESS -->
                        <div class="col-12 col-md-9 col-lg-9 mb-5 border-start d-flex-x interview-location" style="display: none;">
                            <!-- INTERVIEW LOCATION -->
                            <input type="text" name="interview_location" value="<?=$is_edit ? $job_info->interview_location : ""?>" id="interview-location" class=" bg-transparent px-4 text-green text-truncate mt-2 display-8 fw-normal text-uppercase mb-0 ff-noir border-0 rounded-1 w-50" placeholder="Interview Address">
                            <!-- INTERVIEW CITY/MUNICIPALITY -->
                            <span class="text-green text-truncate mt-2 display-8 fw-normal text-uppercase ff-noir">,&nbsp;</span>
                            <div class="dropdown d-flex">
                                <input type="text" name="interview_citymun_code" id="interview-city-code" value="<?=$is_edit?$job_info->interview_citymun_code:"031403"?>" hidden>
                                <?php 
                                    $interview_city = "BALIWAG";
                                    if($is_edit) {
                                        foreach ($barangays_cities_and_pronvinces["cities"] as $key => $city){
                                            if($job_info->interview_citymun_code == $city->citymunCode){
                                                $interview_city = $city->citymunDesc;
                                            }
                                        }
                                    }
                                ?>
                                <input type="text" name="interview_city" id="interview-city" value="<?=$interview_city?>" hidden>
                                <span class="text-green text-truncate mt-2 display-8 fw-normal text-uppercase ff-noir pointer" id="interview-city-preview" type="button" data-bs-toggle="dropdown" aria-expanded="false"><?=$interview_city?></span>
                                <ul class="dropdown-menu shadow-sm border ff-noir text-uppercase text-green pt-0" style="max-height: 50vh; overflow: auto;">
                                    <li class="p-1 sticky-top bg-white shadow-sm"><input type="text" id="interview-city-search" class="w-100 form-control form-control-sm text-uppercase" placeholder="Search"></li>
                                    <?php 
                                        $initial_prov_code = '0314';
                                        if($is_edit){
                                            $initial_prov_code = $job_info->interview_prov_code;
                                        }
                                        foreach ($barangays_cities_and_pronvinces["cities"] as $key => $city):?>
                                    <li><a class="dropdown-item text-green interview-city <?= $city->provCode == $initial_prov_code ? $city->provCode : "d-none"?>" href="#" data-value="<?=$city->citymunDesc?>" data-prov-code="<?=$city->provCode?>" data-city-mun-code="<?=$city->citymunCode?>" ><?=$city->citymunDesc?></a></li>
                                    <?php endforeach;?>
                                </ul>
                            </div>
                            <!-- INTERVIEW PROVINCE -->
                            <span class="text-green text-truncate mt-2 display-8 fw-normal text-uppercase ff-noir">,&nbsp;</span>
                            <div class="dropdown d-flex">
                                <input type="text" name="interview_prov_code" id="interview-prov-code" value="<?=$is_edit ? $job_info->interview_prov_code : "0314" ?>" hidden>
                                <?php 
                                    $interview_prov = "BULACAN";
                                    if($is_edit) {
                                        foreach ($barangays_cities_and_pronvinces["provinces"] as $key => $prov){
                                            if($job_info->interview_prov_code == $prov->provCode){
                                                $interview_prov = $prov->provDesc;
                                            }
                                        }
                                    }
                                ?>
                                <input type="text" name="interview_province" id="interview-province" value="<?=$interview_prov?>" hidden>
                                <span class="text-green text-truncate mt-2 display-8 fw-normal text-uppercase ff-noir pointer" id="interview-province-preview" type="button" data-bs-toggle="dropdown" aria-expanded="false"><?=$interview_prov?></span>
                                <ul class="dropdown-menu shadow-sm border ff-noir text-uppercase text-green pt-0" style="max-height: 50vh; overflow: auto;">
                                    <li class="p-1 sticky-top bg-white shadow-sm"><input type="text" id="interview-province-search" class="w-100 form-control form-control-sm text-uppercase" placeholder="Search"></li>
                                    <?php foreach ($barangays_cities_and_pronvinces["provinces"] as $key => $province):?>
                                    <li><a class="dropdown-item text-green interview-province" href="#" data-value="<?=$province->provDesc?>" data-prov-code="<?= $province->provCode?>"><?=$province->provDesc?></a></li>
                                    <?php endforeach;?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-md-9 col-lg-9 offset-md-3">
                            <div class="w-75 border-bottom-dashed my-10" style="border-color: var(--my-blue) ;"></div>
                        </div>
                        <div class="col-12 col-md-9 col-lg-9 offset-md-3 border-start">
                            <h2 class="company-name text-green text-truncate display-7 text-uppercase ff-noir fw-normal mb-0">QUALIFICATIONS:</h2>
                        </div>
                        <div class="col-12 col-md-3 col-lg-3 my-5 d-none-x d-md-block-x">
                            <div class="d-flex h-100 justify-content-end align-items-center">
                                <div class="fs-5 d-flex align-items-center text-gray-700">
                                    Job Qualifications <i class="fas fa-caret-left text-gray-400 ms-3 fs-1" style="margin-right: -1px;"></i>
                                </div>
                                <div class="h-100 align-self-stretch px-3 border border-gray-400 border-end-0 border-2 rounded position-relative" style="clip-path: polygon(0% 0%, 50% 0%, 50% 100%, 0% 100%);">
                                </div>
                            </div>
                        </div>
                        <!-- JOB QUALIFICATION -->
                        <div class="col-12 col-md-9 col-lg-9 my-5 border-start">
                            <ul class="ff-noir">
                                <?php 
                                    if($is_edit):
                                        foreach (json_decode($job_info->job_qualifications) as $index => $qualification):?>
                                        <li class="fs-4 text-blue mb-2">
                                            <div class="d-flex justify-content-between" style="min-width: 50%;" data-job-qualification="${qualification}">
                                                <span class="job-qualification"> <?=$qualification?> </span>
                                                <i class="fas fa-times fs-4 text-danger align-self-center pointer job-qualification-remove"></i>
                                            </div>
                                        </li>
                                <?php 
                                        endforeach;
                                    endif;?>
                                <li class="fs-4 text-blue "><button type="button" class="btn btn-sm btn-blue w-100 w-md-50" id="qualification-button"><i class="fas fa-plus text-white"></i> </button></li>
                            </ul>
                        </div>
                        <div class="col-12 col-md-9 col-lg-9 offset-md-3 border-start">
                            <h2 class="company-name text-green text-truncate display-7 text-uppercase ff-noir fw-normal mb-0">REQUIREMENTS:</h2>
                        </div>
                        <div class="col-12 col-md-3 col-lg-3 my-5 d-none-x d-md-block-x">
                            <div class="d-flex h-100 justify-content-end align-items-center">
                                <div class="fs-5 d-flex align-items-center text-gray-700">
                                    Job Requirements <i class="fas fa-caret-left text-gray-400 ms-3 fs-1" style="margin-right: -1px;"></i>
                                </div>
                                <div class="h-100 align-self-stretch px-3 border border-gray-400 border-end-0 border-2 rounded position-relative" style="clip-path: polygon(0% 0%, 50% 0%, 50% 100%, 0% 100%);">
                                </div>
                            </div>
                        </div>
                        <!-- JOB REQUIREMENTS -->
                        <div class="col-12 col-md-9 col-lg-9 my-5 border-start">
                            <ul class="ff-noir">
                                <?php 
                                    if($is_edit):
                                        foreach (json_decode($job_info->job_requirements) as $index => $requirement):?>
                                        <li class="fs-4 text-blue mb-2">
                                            <div class="d-flex justify-content-between" style="min-width: 50%;" data-job-requirements="<?=$requirement?>">
                                                <span class="job-requirements"> <?=$requirement?> </span>
                                                <i class="fas fa-times fs-4 text-danger align-self-center pointer job-requirements-remove"></i>
                                            </div>
                                        </li>
                                <?php 
                                        endforeach;
                                    endif;?>
                                <li class="fs-4 text-blue "><button type="button" class="btn btn-sm btn-blue w-100 w-md-50" id="requirements-button"><i class="fas fa-plus text-white"></i> </button></li>
                            </ul>
                        </div>
                        <div class="col-12 col-md-3 col-lg-3 my-5 d-none-x d-md-block-x job-date">
                            <div class="d-flex h-100 justify-content-end align-items-center">
                                <div class="fs-5 d-flex align-items-center text-gray-700">
                                    <label for="" class="required form-label">Closing Date</label>
                                    <i class="fas fa-caret-left text-gray-400 ms-3 fs-1" style="margin-right: -1px;"></i>
                                </div>
                                <div class="h-100 align-self-stretch px-3 border border-gray-400 border-end-0 border-2 rounded position-relative" style="clip-path: polygon(0% 0%, 50% 0%, 50% 100%, 0% 100%);">
                                </div>
                            </div>
                        </div>
                        <!-- JOB DATE -->
                        <div class="col-12 col-md-9 col-lg-9 my-5 border-start ff-noir job-date">
                            <div class="text-green text-truncate display-7 text-uppercase fw-normal mb-0">CLOSING DATE:</div>
                            <div class="text-blue text-truncate display-8 text-uppercase fw-normal mb-0">
                                <input type="date" name="job_date" id="job-date" class="d-none" value="<?= $is_edit ? explode(" ", $job_info->job_date)[0]: "" ?>">
                                <span><?= $is_edit ? date("F d, Y", strtotime(explode(" ", $job_info->job_date)[0])) : "_____ __, ____"?></span> <div class="btn btn-green btn-sm" id="date"><i class="fas fa-calendar-day p-0 text-white"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <input hidden type="checkbox" name="status" id="status" checked>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="<?=base_url()?>/jobs/manage" class="btn btn-secondary my-6 mx-2 d-flex align-items-center">Cancel</a>
                        <div class="d-flex">
                            <button type="submit" class="d-none" id="post-form-submit"></button>
                            <?php if($is_edit):?>
                                <button type="button" id="save-post" class="btn btn-primary my-6 mx-2 d-flex align-items-center"><i class="fas fa-save"></i> Save Changes</button>
                            <?php else:?>
                                <button type="button" id="upload-post" class="btn btn-primary my-6 mx-2 d-flex align-items-center"><i class="fas fa-file-upload"></i> Upload Post</button>
                                <button type="button" id="draft-post" class="btn btn-primary my-6 mx-2 d-flex align-items-center"><i class="fas fa-save"></i> Save Draft</button>
                            <?php endif;?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('javascript'); ?>
<script src="<?=base_url()?>/public/assets/plugins/custom/ckeditor/ckeditor-balloon.bundle.js"></script>
<script>
    let editor;
    let job_title_height = 0;
    let initial_job_category = <?=$is_edit ? $job_info->job_category_id : 0?>;
    $(async function () {
        loadingCursor()
        setCategory(initial_job_category)
        editor = await BalloonEditor.create(document.querySelector('#job-description'), {
            mediaEmbed: {
                previewsInData: true
            },
            placeholder: 'Type the job description here'
        })
        .then(editor => {
            editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {
                return new MyUploadAdapter( loader );
            };
            return editor
        })
        .catch(error => {
            console.error(error);
        });

        const job_date = $("#date").flatpickr({
            // enableTime: true,
            minDate: "today",
        });
        const interview_date = $("#interview-date-picker").flatpickr({
            enableTime: true,
            minDate: "today",
        });

        job_date.config.onChange.push(function() {
            const year = job_date.latestSelectedDateObj.getFullYear() 
            const month = job_date.latestSelectedDateObj.getMonth()+1
            const day = job_date.latestSelectedDateObj.getDate() 
            const set_date = `${year}-${month>9?month:"0"+month}-${day>9?day:"0"+day}`
            $("#job-date").val(set_date).next("span").html(`${mySQLDateToText(set_date)}`)
            console.log(set_date, mySQLDateToText(set_date))
        })

        interview_date.config.onChange.push(function() {
            const year = interview_date.latestSelectedDateObj.getFullYear() 
            const month = interview_date.latestSelectedDateObj.getMonth()+1
            const day = interview_date.latestSelectedDateObj.getDate()
            const hours = interview_date.latestSelectedDateObj.getHours()
            const minutes = interview_date.latestSelectedDateObj.getMinutes()
            const meridian = hours > 11 ? "PM" : "AM";
            const set_date = `${year}-${month>9?month:"0"+month}-${day>9?day:"0"+day}`
            $("#interview-date").val(`${set_date} ${hours<10 ? "0" : ""}${hours}:${minutes<10 ? "0" : "" }${minutes}:00`).next("span").html(`${mySQLDateToText(set_date)} • ${hours<10 ? "0" : ""}${hours<=12?hours:hours-12}:${minutes<10 ? "0" : "" }${minutes} ${meridian}`)
            console.log(set_date, mySQLDateToText(set_date))
        })
        
        $(".dropdown-item-job-category").click(function(){
            const category = this.dataset.category;
            $("#dropdown-job-category").text(this.innerText)
            $("#job-category").val(category)
            setCategory(category)
        })

        job_title_height = $("#job-title").height();
        $("#job-title").on("input", function(){
            $(this).css("height", job_title_height * this.value.split('\n').length)
        })

        $("#city-search").on("input", function () {
            const search_phrase = this.value.toUpperCase();
            $.each($(".company-city"), function (indexInArray, valueOfElement) { 
                const value = this.dataset.value;
                if(value.includes(search_phrase)){
                    $(this).removeAttr("hidden")
                }else{
                    $(this).attr("hidden", true)
                }
            });
        })

        $("#province-search").on("input", function () {
            const search_phrase = this.value.toUpperCase();
            $.each($(".company-province"), function (indexInArray, valueOfElement) { 
                const value = this.dataset.value;
                if(value.includes(search_phrase)){
                    $(this).removeAttr("hidden")
                }else{
                    $(this).attr("hidden", true)
                }
            });
        })

        $("#interview-city-search").on("input", function () {
            const search_phrase = this.value.toUpperCase();
            $.each($(".interview-city"), function (indexInArray, valueOfElement) { 
                const value = this.dataset.value;
                if(value.includes(search_phrase)){
                    $(this).removeAttr("hidden")
                }else{
                    $(this).attr("hidden", true)
                }
            });
        })

        $("#interview-province-search").on("input", function () {
            const search_phrase = this.value.toUpperCase();
            $.each($(".interview-province"), function (indexInArray, valueOfElement) { 
                const value = this.dataset.value;
                if(value.includes(search_phrase)){
                    $(this).removeAttr("hidden")
                }else{
                    $(this).attr("hidden", true)
                }
            });
        })

        $(".company-city").click(function(){
            const value = this.dataset.value;
            const cityMunCode = this.dataset.cityMunCode;
            $("#company-city-preview").text(value)
            $("#company-city").val(value)
            $("#company-city-code").val(cityMunCode)
        })

        $(".company-province").click(function(){
            const value = this.dataset.value;
            const prov_code = this.dataset.provCode;
            let is_first_to_city = true
            $("#company-province-preview").text(value)
            $("#company-prov-code").val(prov_code)
            $("#company-province").val(value)
            $.each($(".company-city"), function (indexInArray, valueOfElement) { 
                const city_prov_code = this.dataset.provCode;
                const city_mun_code = this.dataset.cityMunCode;
                const city_value = this.dataset.value;
                if(prov_code == city_prov_code){
                    if(is_first_to_city){
                        $("#company-city").val(city_value)
                        $("#company-city-code").val(city_mun_code)
                        $("#company-city-preview").text(city_value)
                        is_first_to_city = false
                    }
                    $(this).removeClass("d-none")
                }else{
                    $(this).addClass("d-none")
                }
            });
        })

        $(".interview-city").click(function(){
            const value = this.dataset.value;
            const cityMunCode = this.dataset.cityMunCode;   
            $("#interview-city-preview").text(value)
            $("#interview-city").val(value)
            $("#interview-city-code").val(cityMunCode)    
        })

        $(".interview-province").click(function(){
            const value = this.dataset.value;
            const prov_code = this.dataset.provCode;
            let is_first_to_city = true
            $("#interview-province-preview").text(value)
            $("#interview-province").val(value)
            $.each($(".interview-city"), function (indexInArray, valueOfElement) { 
                const city_prov_code = this.dataset.provCode;
                const city_value = this.dataset.value;
                if(prov_code == city_prov_code){
                    if(is_first_to_city){
                        const city_mun_code = this.dataset.cityMunCode;
                        $("#interview-city").val(city_value)
                        $("#interview-city-code").val(city_mun_code)
                        $("#interview-city-preview").text(city_value)
                        is_first_to_city = false
                    }
                    $(this).removeClass("d-none")
                }else{
                    $(this).addClass("d-none")
                }
            });
        })

        $("#qualification-button").click(async function(){
            // console.log(editor.data.get())
            if(!$(this).closest('ul').find("li input").length){
                $(`
                <li class="fs-4 text-blue mb-2">
                    <div class="input-group w-100 w-md-50">
                        <input type="text" class=" fs-4 text-blue form-control form-control-sm flex-grow-1" placeholder="Qualification">
                        <button type="button" class="btn btn-sm btn-green" id="qualification-done">
                            <i class="fas fa-check text-white p-0"></i> 
                        </button>
                    </div>
                </li>`).insertBefore($(this).closest('li'));
            }else{
                $(this).closest('ul').find("li input")[0].focus()
            }
        })

        $("#qualification-button").closest("ul").on("click", "#qualification-done", function(){
            const qualification = $(this).prev().val()
            if(qualification){
                $(this).closest("li").prepend(`
                    <div class="d-flex justify-content-between" style="min-width: 50%;" data-job-qualification="${qualification}">
                        <span class="job-qualification"> ${qualification} </span>
                        <i class="fas fa-times fs-4 text-danger align-self-center pointer job-qualification-remove"></i>
                    </div>
                `)
                $(this).closest(".input-group").remove()
            }
        })

        $("#qualification-button").closest("ul").on("click", ".job-qualification-remove", function(){
            $(this).closest("li").remove()
        })

        $("#requirements-button").click(function(){
            if(!$(this).closest('ul').find("li input").length){
                $(`
                <li class="fs-4 text-blue mb-2">
                    <div class="input-group w-100 w-md-50">
                        <input type="text" class=" fs-4 text-blue form-control form-control-sm flex-grow-1" placeholder="Requirement">
                        <button type="button" class="btn btn-sm btn-green" id="requirements-done">
                            <i class="fas fa-check text-white p-0"></i> 
                        </button>
                    </div>
                </li>`).insertBefore($(this).closest('li'));
            }else{
                $(this).closest('ul').find("li input")[0].focus()
            }
        })

        $("#requirements-button").closest("ul").on("click", "#requirements-done", function(){
            const qualification = $(this).prev().val()
            if(qualification){
                $(this).closest("li").prepend(`
                    <div class="d-flex justify-content-between" style="min-width: 50%;" data-job-requirement="${qualification}">
                        <span class="job-requirements">${qualification}</span>
                        <i class="fas fa-times fs-4 text-danger align-self-center pointer job-requirements-remove"></i>
                    </div>
                `)
                $(this).closest(".input-group").remove()
            }
        })

        $("#requirements-button").closest("ul").on("click", ".job-requirements-remove", function(){
            $(this).closest("li").remove()
        })

        $("#draft-post").click(function() {
            $("#status")[0].checked = false;
            askConfirmation(function(){
                $("#post-form-submit")[0].click()
            }, "Notice", "The job post you've created will not be posted and only be stored in drafts. Are you sure you would like to continue?")
        })

        $("#upload-post").click(function() {
            $("#status")[0].checked = true;
            $("#post-form-submit")[0].click()
        })

        $("#save-post").click(function() {
            $("#post-form-submit")[0].click()
        })

        $("#post-form").submit(async function (e) { 
            e.preventDefault();
            const form_data = $(this).serialize()
            const is_update = <?= $is_edit ? 1 : 0?>;
            let form_data_array = $(this).serializeArray()
            let form_url = $(this).attr("action")
            const [job_qualifications, job_requirements] = getJobQualAndReq()
            <?php if($is_edit):?>
            form_data_array.push({
                name: "id",
                value: <?=$job_info->id?>
            })
            <?php endif;?>
            form_data_array.push({
                name: "job_description",
                value: editor.data.get()
            })
            form_data_array.push({
                name: "job_qualifications",
                value: job_qualifications
            })
            form_data_array.push({
                name: "job_requirements",
                value: job_requirements
            })

            console.log(form_data_array)
            console.table(form_data_array)

            const result = await AJAX({
                method: "POST",
                url: form_url,
                data: form_data_array,
                successAlert: true,
                warningAlert: true,
                success: function(data){
                    if(JSON.parse(data).status){
                        console.log(JSON.parse(data))
                        // setTimeout(() => {
                        //     window.location.href = "<?=base_url()?>/jobs/manage";
                        // }, 1000);
                    }
                }
            })
        });
    });

    class MyUploadAdapter {
        constructor( loader ) {
            this.loader = loader;
        }

        upload() {
        return this.loader.file
            .then( file => new Promise( ( resolve, reject ) => {
                this._initRequest();
                this._initListeners( resolve, reject, file );
                this._sendRequest( file );
            } ) );
        }

        abort() {
            if ( this.xhr ) {
                this.xhr.abort();
            }
        }

        _initRequest() {
            const xhr = this.xhr = new XMLHttpRequest();
            xhr.open( 'POST', '<?=base_url()?>/utilcontroller/uploadCkImage', true );
        }

        _initListeners( resolve, reject, file ) {
            const xhr = this.xhr;
            const loader = this.loader;
            const genericErrorText = `Couldn't upload file: ${ file.name }.`;

            xhr.addEventListener( 'error', () => reject( genericErrorText ) );
            xhr.addEventListener( 'abort', () => reject() );
            xhr.addEventListener( 'load', () => {
                let response = xhr.response;
                response = JSON.parse(response);

                if ( !response || response.error ) {
                    const error_response = response && response.error ? response.error.message : genericErrorText;
                    warningAlert("Error", error_response);
                    return reject();
                }

                resolve( {
                    default: response.url
                } );
            } );

            if ( xhr.upload ) {
                xhr.upload.addEventListener( 'progress', evt => {
                    if ( evt.lengthComputable ) {
                        loader.uploadTotal = evt.total;
                        loader.uploaded = evt.loaded;
                    }
                } );
            }
        }

        _sendRequest( file ) {
            const data = new FormData();
            data.append( 'fileToUpload', file );
            this.xhr.send( data );
        }
    }

    function getJobQualAndReq(){
        let job_qualification={};
        let job_requirements={};
        $(".job-qualification").each(function (index, element) {
            job_qualification[index] = this.innerText
        });
        $(".job-requirements").each(function (index, element) {
            job_requirements[index] = this.innerText
        });
        return [ JSON.stringify(job_qualification), JSON.stringify(job_requirements)]
    }

    function setCategory(category){
        if(category==1){
            $(".job-description").show()
            $(".job-date").show()
            $(".interview-location").hide()
            $(".interview-date").hide()
        }else if(category==2){
            $(".job-description").hide()
            $(".job-date").hide()
            $(".interview-location").show()
            $(".interview-date").show()
        }
    }

    function loadingCursor(){
        $("body").css("cursor", "progress")
        setTimeout(() => {
            $("body").css("cursor", "auto")
        }, 3000);
    }
</script>
<?= $this->endSection(); ?>