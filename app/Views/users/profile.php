<?= $this->extend('layouts/emptyMain'); ?>
<?= $this->section('content'); ?>

<style>
    .wrapper {
        background-image: url(<?=base_url("public/assets/media/auth/bg1.png")?>);
        background-size: cover;
        background-position: center;
    }
</style>
<div class="d-flex flex-column flex-column-fluid">
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <div class="row">
                            <div class="col-3 col-md-2 col-lg-1 m-auto">
                                <img src="<?=base_url()?>/public/assets/media/peso/logo-small.svg"
                                    alt="Baliwag Trabaho Updates logo" id="bessy-logo"
                                    class="theme-light-show img-fluid">
                                <img src="<?=base_url()?>/public/assets/media/peso/logo-small-dark.svg"
                                    alt="Baliwag Trabaho Updates logo" id="bessy-logo"
                                    class="theme-dark-show img-fluid">
                            </div>
                        </div>
                        <h1 id="welcome-to" class="d-inline m-0">Welcome to <span
                                class="text-blue theme-light-show">Baliwag Trabaho Updates</span> <span
                                class="text-white theme-dark-show">Baliwag eServices System</span></h1>
                    </div>
                    <small class="text-muted d-block text-center pt-2 my-2 border-top mb-10">Before you can look for job
                        opportunities, you must first fill your PESO Employment Information System
Registration Form.</small>
                    <div class="stepper stepper-pills stepper-column" id="user-profile-stepper">
                        <div class="d-flex flex-row-auto w-100 row g-0 g-md-2">
                            <div class="mb-10 col-12 col-md-3 border-end px-3">

                                <div class="mb-10">
                                    <input type="number" name="user_id" class="d-none" value="<?=$userInformation->user_id?>" readonly>
                                    <input type="text" name="user_photo" class="" hidden id="file-name" value="<?= $userInformation->user_photo? $userInformation->user_photo : "" ?>">
                                    <input type="file" id="user-photo" class="w-100" hidden="" data-aa="aa">
                                    <label for="user-photo" class="d-block user-photo-hover pointer w-100 mb-5 text-center">
                                        <div class="p-2 border mx-auto d-inline-block bg-light rounded position-relative">
                                            <img src="<?=base_url()?>/public/assets/media/avatars/<?= $userInformation->user_photo? $userInformation->user_photo : "default-avatar.png" ?>" data-photo-name="<?= $userInformation->user_photo? $userInformation->user_photo : "" ?>" class="rounded img-fluid user-avatar" id="user-photo-preview" style="" alt="Profile picture">
                                            <div class="position-absolute w-100 h-100 top-0 start-0 bg-light bg-opacity-10 rounded d-flex justify-content-end align-items-end user-photo-hover-overlay">
                                                <div class="bg-light px-2 py-1 rounded">
                                                    <i class="fas fa-pen"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                <div class="stepper-nav ">
                                    <div class="stepper-item my-4 current" data-kt-stepper-element="nav">
                                        <div class="stepper-wrapper d-flex align-items-center">
                                            <div class="stepper-icon w-40px h-40px">
                                                <i class="stepper-check fas fa-check"></i>
                                                <span class="stepper-number">1</span>
                                            </div>

                                            <div class="stepper-label">
                                                <h3 class="stepper-title">
                                                    Step 1
                                                </h3>

                                                <div class="stepper-desc">
                                                    Personal Information
                                                </div>
                                            </div>
                                        </div>

                                        <div class="stepper-line h-40px"></div>
                                    </div>
                                    <div class="stepper-item my-4" data-kt-stepper-element="nav">
                                        <div class="stepper-wrapper d-flex align-items-center">
                                            <div class="stepper-icon w-40px h-40px">
                                                <i class="stepper-check fas fa-check"></i>
                                                <span class="stepper-number">2</span>
                                            </div>

                                            <div class="stepper-label">
                                                <h3 class="stepper-title">
                                                    Step 2
                                                </h3>

                                                <div class="stepper-desc">
                                                    Employment Status
                                                </div>
                                            </div>
                                        </div>

                                        <div class="stepper-line h-40px"></div>
                                    </div>
                                    <div class="stepper-item my-4" data-kt-stepper-element="nav">
                                        <div class="stepper-wrapper d-flex align-items-center">
                                            <div class="stepper-icon w-40px h-40px">
                                                <i class="stepper-check fas fa-check"></i>
                                                <span class="stepper-number">3</span>
                                            </div>

                                            <div class="stepper-label">
                                                <h3 class="stepper-title">
                                                    Step 3
                                                </h3>

                                                <div class="stepper-desc">
                                                    Educational Background
                                                </div>
                                            </div>
                                        </div>

                                        <div class="stepper-line h-40px"></div>
                                    </div>
                                    <div class="stepper-item my-4" data-kt-stepper-element="nav">
                                        <div class="stepper-wrapper d-flex align-items-center">
                                            <div class="stepper-icon w-40px h-40px">
                                                <i class="stepper-check fas fa-check"></i>
                                                <span class="stepper-number">4</span>
                                            </div>

                                            <div class="stepper-label">
                                                <h3 class="stepper-title">
                                                    Step 4
                                                </h3>

                                                <div class="stepper-desc">
                                                    Work Experience
                                                </div>
                                            </div>
                                        </div>

                                        <div class="stepper-line h-40px"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex-row-fluid col-12 col-md-9 ps-0 ps-md-5">
                                <form class="form mx-auto" novalidate="novalidate" id="user-profile-form">
                                    <div class="mb-5">

                                        <div class="flex-column current" data-kt-stepper-element="content">
                                            <!-- FULL NAME -->
                                            <div class="row gx-0 gx-md-2 mb-6">
                                                <label class="col-lg-4 col-form-label required fw-semibold fs-6">Full Name</label>

                                                <div class="col-lg-8">
                                                    <div class="row">
                                                        <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                                            <input type="text" name="firstname" id="first-name" class="form-control form-control-lg form-control-solid" placeholder="First name" required value="">
                                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                                        </div>

                                                        <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                                            <input type="text" name="middlename" class="form-control form-control-lg form-control-solid" placeholder="Middle name" value="">
                                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                                        </div>

                                                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                                            <input type="text" name="lastname" class="form-control form-control-lg form-control-solid" placeholder="Last name" required value="">
                                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                                        </div>
                                                        <div class="col-lg-4 fv-row fv-plugins-icon-container">
                                                            <input type="text" name="suffix" class="form-control form-control-lg form-control-solid" placeholder="Suffix" value="">
                                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- BIRTHDATE -->
                                            <div class="row gx-0 gx-md-2 mb-6">
                                                <label class="col-lg-4 col-form-label required fw-semibold fs-6">Birthdate</label>

                                                <div class="col-lg-8">
                                                    <div class="fv-row fv-plugins-icon-container">
                                                        <input type="date" name="birthdate" id="birthdate" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Birthdate" required value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- PLACE OF BIRTH -->
                                            <div class="row gx-0 gx-md-2 mb-6">
                                                <label class="col-lg-4 col-form-label required fw-semibold fs-6">Place of Birth</label>

                                                <div class="col-lg-8">
                                                    <div class="row">
                                                        <div class="col-12 col-md-6 fv-row fv-plugins-icon-container">
                                                            <select class="form-select form-select-search form-control form-control-solid" aria-label="Default select example" id="birthplace-province" required="">
                                                                <option value="" selected disabled>Province</option>
                                                                <?php foreach ($provinces as $key => $province):?>
                                                                    <option value="<?=$province->provCode?>" ><?= ucwords(strtolower($province->provDesc)) ?></option>
                                                                <?php endforeach;?>
                                                            </select>
                                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                                        </div>
                                                        <div class="col-12 col-md-6 fv-row fv-plugins-icon-container">
                                                            <select class="form-select form-select-search form-control form-control-solid" aria-label="Default select example" id="birthplace-city" name="birth_place_city_mun_id" required="">
                                                                <option value="" selected disabled>City/Municipality</option>
                                                            </select>
                                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- SEX -->
                                            <div class="row gx-0 gx-md-2 mb-6">
                                                <label class="col-lg-4 col-form-label required fw-semibold fs-6">Sex</label>

                                                <div class="col-lg-8">
                                                    <div class="fv-row fv-plugins-icon-container mb-3 mb-lg-0">
                                                        <select class="form-select form-control form-control-solid" aria-label="Default select example" name="sex" required="">
                                                            <option value="Male" >Male</option>
                                                            <option value="Female" >Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ADDRESS -->
                                            <div class="row gx-0 gx-md-2 mb-6">
                                                <label class="col-lg-4 col-form-label required fw-semibold fs-6">Address</label>

                                                <div class="col-lg-8">
                                                    <div class="row">
                                                        <div class="col-12 col-md-4 fv-row fv-plugins-icon-container">
                                                            <select class="form-select form-select-search form-control form-control-solid" aria-label="Default select example" id="province" required="">
                                                                <option value="" selected disabled>Province</option>
                                                                <?php foreach ($provinces as $key => $province):?>
                                                                    <option value="<?=$province->provCode?>" ><?= ucwords(strtolower($province->provDesc)) ?></option>
                                                                <?php endforeach;?>
                                                            </select>
                                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                                        </div>
                                                        <div class="col-12 col-md-4 fv-row fv-plugins-icon-container">
                                                            <select class="form-select form-select-search form-control form-control-solid" aria-label="Default select example" id="city" required="">
                                                                <option value="" selected disabled>City/Municipality</option>
                                                            </select>
                                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                                        </div>
                                                        <div class="col-12 col-md-4 fv-row fv-plugins-icon-container">
                                                            <select class="form-select form-select-search form-control form-control-solid" aria-label="Default select example" name="barangay_id" id="brgy-id" required="">
                                                                <option value="" selected disabled>Barangay</option>
                                                            </select>
                                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                                        </div>

                                                        <div class="col-lg-4 order-lg-1 order-2 fv-row fv-plugins-icon-container">
                                                            <input type="text" name="house_number" class="form-control form-control-lg form-control-solid" placeholder="House Number" value="">
                                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                                        </div>

                                                        <div class="col-lg-8 order-lg-2 order-1 fv-row fv-plugins-icon-container">
                                                            <input type="text" name="street_name" class="form-control form-control-lg form-control-solid" placeholder="Street" required value="">
                                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                                        </div>

                                                        <div class="col-12 text-end order-3">
                                                            <small class="text-muted"><i class="fas fa-exclamation-circle "></i> Select your province first, then select your city / municipality and barangay</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- RELIGION -->
                                            <div class="row gx-0 gx-md-2 mb-6">
                                                <label class="col-lg-4 col-form-label required fw-semibold fs-6">Religion</label>

                                                <div class="col-lg-8">
                                                    <input type="text" value="" name="religion" id="religion" class="form-control form-control-lg form-control-solid" placeholder="Religion">
                                                </div>
                                            </div>
                                            <!-- CIVIL STATUS -->
                                            <div class="row gx-0 gx-md-2 mb-6">
                                                <label class="col-lg-4 col-form-label required fw-semibold fs-6">Civil Status</label>

                                                <div class="col-lg-8">
                                                    <select class="form-select form-control form-control-solid" aria-label="Civil Status" name="civil_status" id="civil-status">
                                                        <option value="Single">Single</option>
                                                        <option value="Married">Married</option>
                                                        <option value="Widowed">Widowed</option>
                                                        <option value="Separated">Separated</option>
                                                        <option value="Live-in">Live-in</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- HEIGHT -->
                                            <div class="row gx-0 gx-md-2 mb-6">
                                                <label class="col-lg-4 col-form-label required fw-semibold fs-6">Height</label>

                                                <div class="col-lg-8">
                                                    <div class="input-group">
                                                        <input type="number" value="" name="height" id="height" min="10" placeholder="00" class="form-control form-control-lg form-control-solid">
                                                        <span class="input-group-text border-0">centimeters</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- LANDLINE NUMBER -->
                                            <div class="row gx-0 gx-md-2 mb-6">
                                                <label class="col-lg-4 col-form-label fw-semibold fs-6">Landline Number</label>

                                                <div class="col-lg-8">
                                                    <input type="text" value="" name="landline_number" id="landline-number" class="form-control form-control-lg form-control-solid mask-landline-phone" placeholder="00 0000-0000">
                                                </div>
                                            </div>
                                            <!-- CONTACT NUMBER -->
                                            <div class="row gx-0 gx-md-2 mb-6">
                                                <label class="col-lg-4 col-form-label required fw-semibold fs-6">Cellphone Number</label>

                                                <div class="col-lg-8">
                                                    <div class="fv-row fv-plugins-icon-container mb-3 mb-lg-0">
                                                        <div class="input-group">
                                                            <span class="input-group-text border-0">+63</span>
                                                            <input type="text" name="contact_number" id="contact-number" class="form-control form-mask mask-contact-number form-control-lg form-control-solid" placeholder="900-000-0000" pattern="^9[0-9]{2}-[0-9]{3}-[0-9]{4}$" required value="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- TIN -->
                                            <div class="row gx-0 gx-md-2 mb-6">
                                                <label class="col-lg-4 col-form-label fw-semibold fs-6">TIN</label>

                                                <div class="col-lg-8">
                                                    <input type="text" value="" name="tin" id="tin" class="form-control form-control-lg form-control-solid mask-tin" placeholder="Tax Identification Number">
                                                </div>
                                            </div>
                                            <!-- GSIS/SSS ID NO -->
                                            <div class="row gx-0 gx-md-2 mb-6">
                                                <label class="col-lg-4 col-form-label fw-semibold fs-6">GSIS/SSS ID No.</label>

                                                <div class="col-lg-8">
                                                    <input type="text" value="" name="gsis_sss_no" id="gsis-sss-no" class="form-control form-control-lg form-control-solid mask-sss" placeholder="GSIS/SSS ID Number">
                                                </div>
                                            </div>
                                            <!-- PAG-IBIG NO -->
                                            <div class="row gx-0 gx-md-2 mb-6">
                                                <label class="col-lg-4 col-form-label fw-semibold fs-6">Pag-IBIG No.</label>

                                                <div class="col-lg-8">
                                                    <input type="text" value="" name="pag_ibig_no" id="pag-ibig-no" class="form-control form-control-lg form-control-solid mask-pagibig" placeholder="Pag-IBIG Number">
                                                </div>
                                            </div>
                                            <!-- PHILHEALTH NO -->
                                            <div class="row gx-0 gx-md-2 mb-6">
                                                <label class="col-lg-4 col-form-label fw-semibold fs-6">PhilHealth No.</label>

                                                <div class="col-lg-8">
                                                    <input type="text" value="" name="philhealth_no" id="philhealth-no" class="form-control form-control-lg form-control-solid mask-philhealth" placeholder="PhilHealth Number">
                                                </div>
                                            </div>
                                            <!-- DISABILITY -->
                                            <div class="row gx-0 gx-md-2 mb-6">
                                                <label class="col-lg-4 col-form-label required fw-semibold fs-6">Disability</label>

                                                <div class="col-lg-8">
                                                    <select class="form-select form-control form-control-solid" aria-label="Disability" name="disability" id="disability">
                                                        <option value="" selected>None</option>
                                                        <?php $disabilities = ["Visual","Speech","Hearing","Physical"]; 
                                                            foreach ($disabilities as $disability):
                                                        ?>
                                                            <option value="<?=$disability?>"><?=$disability?></option>
                                                        <?php endforeach;?>
                                                        <option value="Others">Others</option>
                                                    </select>
                                                    <input type="text" id="other-disability" class="form-control form-control-lg form-control-solid mt-2" value="" placeholder="Others, specify:" style="display:none;">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="flex-column " data-kt-stepper-element="content">
                                            <!-- EMPLOYMENT STATUS / TYPE -->
                                            <div class="row gx-0 gx-md-2 mb-6">
                                                <label class="col-lg-4 col-form-label required fw-semibold fs-6">Employment Status</label>

                                                <div class="col-lg-8">
                                                    <?php
                                                        $employment_status_types = [
                                                            "Employed" => [
                                                                "Wage Employed",
                                                                "Self Unemployed"
                                                            ],
                                                            "Unemployed" => [
                                                                "New Entrant/Fresh Graduate",
                                                                "Finished Contract",
                                                                "Resigned",
                                                                "Retired",
                                                                "Terminated/Laidoff(local)",
                                                                "Terminated/Laidoff(abroad)",
                                                                "Others"
                                                            ]
                                                        ];
                                                    ?>
                                                    <select class="form-select form-control form-control-solid" aria-label="Employment Status" name="employment_status" id="employment-status">
                                                        <?php foreach ($employment_status_types as $status => $types):?>
                                                            <option value="<?=$status?>"><?=$status?></option>
                                                        <?php endforeach;?>
                                                    </select>
                                                    <select class="form-select form-control form-control-solid mt-2" aria-label="Employment Type" name="employment_type" id="employment-type">
                                                        <?php foreach ($employment_status_types as $status => $types):
                                                                foreach ($types as $type):?>
                                                            <option value="<?=$type?>" data-employment-status="<?=$status?>"><?=$type?></option>
                                                        <?php   endforeach;
                                                            endforeach;?>
                                                    </select>
                                                    <input type="text" id="other-employment-type" name="other_employment_type" value="" class="form-control form-control-lg form-control-solid mt-2" value="" placeholder="Others, specify:" style="display: none;">
                                                    <input type="text" id="terminated-laidoff-abroad" name="terminated_laidoff_abroad" value="" class="form-control form-control-lg form-control-solid mt-2" value="" placeholder="Specify Country:" style="display: none;">

                                                </div>
                                            </div>
                                            <!-- ACTIVELY LOOKING -->
                                            <div class="row gx-0 gx-md-2 mb-6">
                                                <label class="col-lg-4 col-form-label required fw-semibold fs-6">Are you actively looking for work?</label>

                                                <div class="col-lg-8">
                                                    <select class="form-select form-control form-control-solid" aria-label="Actively Looking" name="is_actively_looking" id="is-actively-looking">
                                                        <option value="1" selected >Yes</option>
                                                        <option value="0" >No</option>
                                                    </select>
                                                    <div id="actively-looking-duration-container">
                                                        <label class="col-form-label fw-semibold fs-6 pb-0 ps-2">How long have you been looking for work?</label>
                                                        <input type="text" list="actively-looking-duration-list" id="actively-looking-duration" name="is_actively_looking_since" value="" class="form-control form-control-lg form-control-solid mt-2" placeholder="Example: 3 months">
                                                        <datalist id="actively-looking-duration-list">
                                                            <option value="About a month">
                                                            <option value="X months">
                                                            <option value="About a year">
                                                            <option value="X year">
                                                        </datalist>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- WORK IMMEDIATELY -->
                                            <div class="row gx-0 gx-md-2 mb-6">
                                                <label class="col-lg-4 col-form-label required fw-semibold fs-6">Willing to work immediately</label>

                                                <div class="col-lg-8">
                                                    <select class="form-select form-control form-control-solid" aria-label="Work Immediately" name="will_work_immediately" id="will-work-immediately">
                                                        <option value="1" selected>Yes</option>
                                                        <option value="0" >No</option>
                                                    </select>
                                                    <div id="work-immediately-when-container" style="display: none;">
                                                        <label class="col-form-label fw-semibold fs-6 pb-0 ps-2">If no, when?</label>
                                                        <input type="text" list="work-immediately-when-list" id="work-immediately-when" name="when_will_work_immediately" value="" class="form-control form-control-lg form-control-solid mt-2" placeholder="Example: Within 3 months">
                                                        <datalist id="work-immediately-when-list">
                                                            <option value="In a month">
                                                            <option value="Within X months">
                                                            <option value="In a year">
                                                            <option value="Within X year">
                                                        </datalist>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- 4PS -->
                                            <div class="row gx-0 gx-md-2 mb-6">
                                                <label class="col-lg-4 col-form-label required fw-semibold fs-6">Are you a 4Ps beneficiary?</label>

                                                <div class="col-lg-8">
                                                    <select class="form-select form-control form-control-solid" aria-label="4Ps Beneficiary" name="is_4ps_beneficiary" id="4Ps-beneficiary">
                                                        <option value="1" >Yes</option>
                                                        <option value="0" selected >No</option>
                                                    </select>
                                                    <div id="4Ps-beneficiary-container" style="display: none;">
                                                        <label class="col-form-label fw-semibold fs-6 pb-0 ps-2">If yes, Household ID No.</label>
                                                        <input type="text" id="4ps-beneficiary-household-no" name="4ps_beneficiary_household_no" value="" class="form-control form-control-lg form-control-solid mt-2" placeholder="Household ID No.">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- PREFERRED OCCUPATION -->
                                            <div class="row gx-0 gx-md-2 mb-3">
                                                <label class="col-lg-4 col-form-label fw-semibold fs-6">Preferred Occupation</label>

                                                <div class="col-lg-8">
                                                    <ul class="text-blue fs-5 " id="preferred-occupation-list">
                                                        <li class="mb-2" id="preferred-occupation-input-container" style="display: none;">
                                                            <div class="input-group">
                                                                <input type="text" id="preferred-occupation-input"
                                                                    class="form-control form-control-sm form-control-solid fs-5"
                                                                    placeholder="Job Title">
                                                                <button type="button" class="btn btn-sm btn-green"
                                                                    id="preferred-occupation-input-submit"><i
                                                                        class="fas fa-check p-0 text-white"></i></button>
                                                            </div>
                                                        </li>
                                                        <li style="list-style-type: none;">
                                                            <button type="button" class="btn btn-blue w-100 fw-bold"
                                                                id="add-preferred-occupation"><i class="fas fa-plus text-white"></i> Add
                                                                Preferred Occupation</button>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- PREFERRED WORK LOCATION (LOCAL) -->
                                            <div class="row gx-0 gx-md-2 mb-3">
                                                <label class="col-lg-4 col-form-label fw-semibold fs-6">Preferred Work Location (Local)</label>
                                                
                                                <div class="col-lg-8">
                                                    <ul class="text-blue fs-5 " id="preferred-work-location-local-list">
                                                        <li class="mb-2" id="preferred-work-location-local-input-container" style="display: none;">
                                                            <div class="input-group">
                                                                <input type="text" id="preferred-work-location-local-input"
                                                                    class="form-control form-control-sm form-control-solid fs-5"
                                                                    placeholder="Work Location (Local)">
                                                                <button type="button" class="btn btn-sm btn-green"
                                                                    id="preferred-work-location-local-input-submit"><i
                                                                        class="fas fa-check p-0 text-white"></i></button>
                                                            </div>
                                                        </li>
                                                        <li style="list-style-type: none;">
                                                            <button type="button" class="btn btn-blue w-100 fw-bold"
                                                                id="add-preferred-work-location-local"><i class="fas fa-plus text-white"></i> Add
                                                                Preferred Work Location (Local)</button>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- PREFERRED WORK LOCATION (ABROAD) -->
                                            <div class="row gx-0 gx-md-2 mb-3">
                                                <label class="col-lg-4 col-form-label fw-semibold fs-6">Preferred Work Location (Abroad)</label>

                                                <div class="col-lg-8">
                                                    <ul class="text-blue fs-5 " id="preferred-work-location-abroad-list">
                                                        <li class="mb-2" id="preferred-work-location-abroad-input-container" style="display: none;">
                                                            <div class="input-group">
                                                                <input type="text" id="preferred-work-location-abroad-input"
                                                                    class="form-control form-control-sm form-control-solid fs-5"
                                                                    placeholder="Work Location (Abroad)">
                                                                <button type="button" class="btn btn-sm btn-green"
                                                                    id="preferred-work-location-abroad-input-submit"><i
                                                                        class="fas fa-check p-0 text-white"></i></button>
                                                            </div>
                                                        </li>
                                                        <li style="list-style-type: none;">
                                                            <button type="button" class="btn btn-blue w-100 fw-bold"
                                                                id="add-preferred-work-location-abroad"><i class="fas fa-plus text-white"></i> Add
                                                                Preferred Work Location (Abroad)</button>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- EXPECTED SALARY -->
                                            <div class="row gx-0 gx-md-2 mb-6">
                                                <label class="col-lg-4 col-form-label required fw-semibold fs-6">Expected Salary</label>

                                                <div class="col-lg-8">
                                                    <div class="fv-row fv-plugins-icon-container mb-3 mb-lg-0">
                                                        <div class="input-group">
                                                            <span class="input-group-text border-0">PHP</span>
                                                            <input type="text" name="expected_salary" value="" id="expected-salary" class="form-control form-mask mask-money form-control-lg form-control-solid" required placeholder="0.00">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- PASSPORT -->
                                            <div class="row gx-0 gx-md-2 mb-6">
                                                <label class="col-lg-4 col-form-label fw-semibold fs-6">Passport</label>

                                                <div class="col-lg-8">
                                                    <input type="text" name="passport_no" value="" id="passport" class="mask-passport form-control form-control-lg form-control-solid" placeholder="Passport ID No.">
                                                    <div id="passport-expiry-container" style="display: none;">
                                                        <label class="col-form-label fw-semibold fs-6 pb-0 ps-2">Passport Expiration</label>
                                                        <input type="date" name="passport_expiry" value="" id="passport-expiry" class="form-control form-control-lg form-control-solid mt-2" placeholder="Passport Expiration">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="flex-column " data-kt-stepper-element="content">
                                            <!-- EDUCATIONAL BACKGROUND -->
                                            <div class="row gx-0 gx-md-2 mb-6">
                                                <label class="col-lg-4 col-form-label required fw-semibold fs-6">Educational Background</label>
                                                <div class="col-lg-8">
                                                    <div class="accordion" id="educational-background-accordion">
                                                        <?php
                                                            $educations = ["elementary","secondary","tertiary","graduate studies"];
                                                            $grade_level_placeholders = ["Grade 5","Grade 11","1st Year","1st Year"];
                                                            $max_year = intval(date("Y"));
                                                            $min_year = $max_year-100;
                                                            foreach ($educations as $index => $education):
                                                            $id_education = str_replace(" ", "-", $education);
                                                            $name_education = str_replace(" ", "_", $education);
                                                        ?>
                                                        <div class="accordion-item" >
                                                            <h2 class="accordion-header" id="educational-background-header">
                                                                <button class="accordion-button col-form-label fw-semibold fs-6 <?=$index==0?"":"collapsed"?> py-3 px-4" type="button" data-bs-toggle="collapse" data-bs-target="#educational-background-<?=$index?>" aria-expanded="true" aria-controls="educational-background-<?=$index?>">
                                                                <?=ucwords($education)?>
                                                                </button>
                                                            </h2>
                                                            <div id="educational-background-<?=$index?>" class="accordion-collapse collapse <?=$index==0?"show":""?>" aria-labelledby="educational-background-header" data-bs-parent="#educational-background-accordion">
                                                                <div class="accordion-body row">
                                                                    <div class="col-12">
                                                                        <label class="col-form-label fw-semibold fs-6 p-0 ps-1">School Name</label>
                                                                        <input type="text" class="form-control form-control-solid mb-3" placeholder="<?=ucwords($education)?> School" name="<?=$name_education?>_school_name" value="">
                                                                    </div>
                                                                    <?php if($index>1):?>
                                                                    <div class="col-12 <?=$index==0?"d-none":""?>">
                                                                        <label class="col-form-label fw-semibold fs-6 p-0 ps-1">Course</label>
                                                                        <input type="text" class="form-control form-control-solid mb-3" placeholder="<?=ucwords($education)?> Course" name="<?=$name_education?>_course" value="">
                                                                    </div>
                                                                    <?php endif;?>

                                                                    <div class="col-6">
                                                                        <label class="col-form-label fw-semibold fs-6 p-0 ps-1 mb-2">Is Undergraduate?</label>
                                                                        <div class="form-check form-switch form-check-custom form-check-solid ps-1">
                                                                            <input class="form-check-input education-is-undergrad" type="checkbox" value="1" name="<?=$name_education?>_is_undergrad" id="<?=$id_education?>-is-undergrad"/>
                                                                            <label class="form-check-label" for="<?=$id_education?>-is-undergrad">
                                                                            No
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-6">
                                                                        <label class="col-form-label fw-semibold fs-6 p-0 ps-1">Year Graduated</label>
                                                                        <input type="number" name="<?=$name_education?>_year_graduated" value=""  min="<?=$min_year?>" max="<?=$max_year?>" class="form-control form-control-solid mb-3 year-graduated" placeholder="2000">
                                                                    </div>

                                                                    <div class="col-6 undergrad-level" style="display: none;">
                                                                        <label class="col-form-label fw-semibold fs-6 p-0 ps-1">What level?</label>
                                                                        <input type="text" name="<?=$name_education?>_last_level" value="" class="form-control form-control-solid mb-3 school-undergrad-level" placeholder="Example: <?=$grade_level_placeholders[$index]?>">
                                                                    </div>
                                                                    <div class="col-6 undergrad-year" style="display: none;">
                                                                        <label class="col-form-label fw-semibold fs-6 p-0 ps-1">Year last attended</label>
                                                                        <input type="number" name="<?=$name_education?>_last_year_attended" value="" min="<?=$min_year?>" max="<?=$max_year?>" class="form-control form-control-solid mb-3 school-undergrad-year" placeholder="2000">
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <label class="col-form-label fw-semibold fs-6 p-0 ps-1">Award</label>
                                                                        <input type="text" class="form-control form-control-solid mb-3" placeholder="<?=ucwords($education)?> School Award" name="<?=$name_education?>_award" value="" >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php
                                                            endforeach;
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- LANGUAGE / DIALECT PROFICIENCY -->
                                            <div class="row gx-0 gx-md-2 mb-6">
                                                <label class="col-lg-4 col-form-label required fw-semibold fs-6">Language / Dialect Proficiency</label>
                                                
                                                <div class="col-lg-11 offset-lg-1">
                                                    <table class="table table-align-middle">
                                                        <thead>
                                                            <tr class="">
                                                                <th></th>
                                                                <th class="text-center">Read</th>
                                                                <th class="text-center">Write</th>
                                                                <th class="text-center">Speak</th>
                                                                <th class="text-center">Understand</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                                $languages = ["english","filipino","others"];
                                                                foreach ($languages as $index => $language):
                                                            ?>
                                                            <tr data-language="<?=$language?>" class="language-row">
                                                                <td>
                                                                    <?php if($language == "others"):?>
                                                                        <input type="text" class="form-control language-name form-control-solid" value="" placeholder="Others:">
                                                                    <?php else:?>
                                                                        <input type="text" class="form-control language-name form-control-plaintext px-3 border-0" value="<?=ucfirst($language)?>" readonly>
                                                                    <?php endif;?>
                                                                </td>
                                                                <td class="text-center">
                                                                    <input class="form-check-input language-checkbox" type="checkbox" name="<?=$language?>-read" data-data-name="read" />
                                                                </td>
                                                                <td class="text-center">
                                                                    <input class="form-check-input language-checkbox" type="checkbox" name="<?=$language?>-write" data-data-name="write" />
                                                                </td>
                                                                <td class="text-center">
                                                                    <input class="form-check-input language-checkbox" type="checkbox" name="<?=$language?>-speak" data-data-name="speak" />
                                                                </td>
                                                                <td class="text-center">
                                                                    <input class="form-check-input language-checkbox" type="checkbox" name="<?=$language?>-understand" data-data-name="understand" />
                                                                </td>
                                                            </tr>
                                                            <?php
                                                                endforeach;
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            
                                            <!-- TECHNICAL/VOCATIONAL AND OTHER TRAINING -->
                                            <div class="row gx-0 gx-md-2 mb-6">
                                                <label class="col-lg-4 col-form-label fw-semibold fs-6">Technical/Vocational and Other Training <small class="text-muted">Include courses takens as part of college education</small></label>
                                                
                                                <div class="col-lg-11 offset-lg-1 table-responsive">
                                                    <table class="table table-align-middle" id="technical-vocational-table">
                                                        <thead>
                                                            <tr class="">
                                                                <th class="text-center min-w-200px">Training/Vocational Course</th>
                                                                <th class="text-center min-w-150px">Duration</th>
                                                                <th class="text-center min-w-150px">Training Institution</th>
                                                                <th class="text-center min-w-150px">Certificates Received <br> <small class="text-muted">(NC I, NC II, NC II, NC IV, etc)</small></th>
                                                                <th class="text-center w-25px"></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <input type="text" class="table-data form-control form-control-solid required technical-vocational-training" data-data-name="training" >
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="table-data form-control form-control-solid required technical-vocational-duration" data-data-name="duration" >
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="table-data form-control form-control-solid required technical-vocational-institution" data-data-name="institution" >
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="table-data form-control form-control-solid required technical-vocational-certificates" placeholder="" data-data-name="certificates" >
                                                                </td>
                                                                <td class="p-0">
                                                                    <button type="button" class="btn btn-sm py-1 float-end technical-vocational-remove">
                                                                        <i class="fas fa-times text-danger"></i>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="col-lg-11 offset-lg-1 table-responsive">
                                                    <button type="button" class="btn btn-blue w-100 fw-bold"
                                                    id="add-technical-vocational"><i class="fas fa-plus text-white"></i> Add
                                                    Technical/Vocational and Other Trainings</button>
                                                </div>
                                            </div>

                                            <!-- ELIGIBILITY -->
                                            <div class="row gx-0 gx-md-2 mb-6">
                                                <label class="col-lg-4 col-form-label fw-semibold fs-6">Eligibility (Civil Service)</label>

                                                <div class="col-lg-11 offset-lg-1 table-responsive">
                                                    <table class="table table-align-middle" id="eligibility-table">
                                                        <thead>
                                                            <tr class="">
                                                                <th class="text-center min-w-200px">Eligibility (Civil Service)</th>
                                                                <th class="text-center min-w-150px">Rating</th>
                                                                <th class="text-center min-w-150px">Date of examination</th>
                                                                <th class="text-center w-25px"></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <input type="text" class="table-data form-control form-control-solid required eligibility-civil-service" data-data-name="eligibility" >
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="table-data form-control form-control-solid required eligibility-rating" data-data-name="rating" >
                                                                </td>
                                                                <td>
                                                                    <input type="date" class="table-data form-control form-control-solid required eligibility-date" data-data-name="date" >
                                                                </td>
                                                                <td class="p-0">
                                                                    <button type="button" class="btn btn-sm py-1 float-end eligibility-remove">
                                                                        <i class="fas fa-times text-danger"></i>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="col-lg-11 offset-lg-1 table-responsive">
                                                    <button type="button" class="btn btn-blue w-100 fw-bold"
                                                    id="add-eligibility"><i class="fas fa-plus text-white"></i> Add
                                                    Eligibility</button>
                                                </div>
                                            </div>

                                            <!-- PROFESSIONAL LICENSE  -->
                                            <div class="row gx-0 gx-md-2 mb-6">
                                                <label class="col-lg-4 col-form-label fw-semibold fs-6">Professional License (PRC)</label>
                                                
                                                <div class="col-lg-11 offset-lg-1 table-responsive">
                                                    <table class="table table-align-middle" id="professional-license-table">
                                                        <thead>
                                                            <tr class="">
                                                                <th class="text-center min-w-200px">Professional License (PRC)</th>
                                                                <th class="text-center min-w-150px">Valid Until</th>
                                                                <th class="text-center w-25px"></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            
                                                            <tr>
                                                                <td>
                                                                    <input type="text" class="table-data form-control form-control-solid required professional-license" data-data-name="professional license">
                                                                </td>
                                                                <td>
                                                                    <input type="date" class="table-data form-control form-control-solid required professional-license-valid-until" data-data-name="valid until">
                                                                </td>
                                                                <td class="p-0">
                                                                    <button type="button" class="btn btn-sm py-1 float-end professional-license-remove">
                                                                        <i class="fas fa-times text-danger"></i>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="col-lg-11 offset-lg-1 table-responsive">
                                                    <button type="button" class="btn btn-blue w-100 fw-bold"
                                                    id="add-professional-license"><i class="fas fa-plus text-white"></i> Add
                                                    Professional License</button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="flex-column " data-kt-stepper-element="content">
                                            <!-- WORK EXPERIENCE  -->
                                            <div class="row gx-0 gx-md-2 mb-6">
                                                <label class="col-lg-12 col-form-label fw-semibold fs-6">Work Experience <br><small class="text-muted">(Limit to 10 year period, start with the most recent employment)</small></label>
                                                
                                                <div class="col-lg-12 table-responsive">
                                                    <table class="table table-align-middle" id="work-experience-table">
                                                        <thead>
                                                            <tr class="">
                                                                <th class="text-center min-w-200px">Position</th>
                                                                <th class="text-center min-w-150px">Company Name</th>
                                                                <th class="text-center min-w-150px">Address <br> <small>(City/Municipality)</small></th>
                                                                <th class="text-center min-w-150px">Inclusive Dates</th>
                                                                <th class="text-center min-w-150px">Status</th>
                                                                <th class="text-center w-25px"></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                           
                                                            <tr>
                                                                <td>
                                                                    <input type="text" class="form-control table-data form-control-solid required work-experience-position" data-data-name="position" >
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control table-data form-control-solid required work-experience-company-name" data-data-name="company name" >
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control table-data form-control-solid required work-experience-address" data-data-name="address" >
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control table-data form-control-solid required work-experience-inclusive-dates" data-data-name="inclusive dates" >
                                                                </td>
                                                                <td>
                                                                    <select class="form-select form-control table-data form-control-solid required work-experience-status" data-data-name="status"  aria-label="Default select example">
                                                                    <?php
                                                                        $work_experience_status = ["Permanent", "Contractual", "Part-time", "Probationary"];
                                                                        foreach ($work_experience_status as $value):
                                                                    ?>
                                                                    <option value="<?=$value?>"><?=$value?></option>
                                                                    <?php endforeach;?>
                                                                        
                                                                    </select>
                                                                </td>
                                                                <td class="p-0">
                                                                    <button type="button" class="btn btn-sm py-1 float-end work-experience-remove">
                                                                        <i class="fas fa-times text-danger"></i>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="col-lg-10 offset-lg-1 table-responsive">
                                                    <button type="button" class="btn btn-blue w-100 fw-bold"
                                                    id="add-work-experience"><i class="fas fa-plus text-white"></i> Add
                                                    Professional License</button>
                                                </div>
                                            </div>
                                            
                                            <!-- OTHER SKILLS ACQUIRED WITHOUT FORMAL TRAINING -->
                                            <div class="row gx-0 gx-md-2 mb-6">
                                                <label class="col-lg-12 col-form-label fw-semibold fs-6">Other Skills Acquired without Formal Training</label>

                                                <div class="col-lg-12 table-responsive">
                                                    <div class="row m-0 py-1" id="other-skills-acquired-without-formal-training">
                                                        <?php
                                                            $skills_array = [
                                                                "Auto Mechanic", "Electrician", "Photography",
                                                                "Beautician", "Embroidery", "Plumbing",
                                                                "Carpentry Work", "Gardening", "Sewing Dresses",
                                                                "Computer Literate", "Masonry", "Stenography",
                                                                "Domestic Chores", "Painter/Artist", "Tailoring",
                                                                "Driver", "Painting Jobs"
                                                            ];
                                                            foreach ($skills_array as $key => $skill):
                                                        ?>
                                                            <div class="form-check mb-3 col-6 col-md-4">
                                                                <input class="form-check-input skill-checkbox" type="checkbox" data-skill-name="<?=$skill?>" id="<?=str_replace(" ", "-",strtolower($skill))?>-skills" />
                                                                <label class="form-check-label" for="<?=str_replace(" ", "-",strtolower($skill))?>-skills">
                                                                    <?=$skill?>
                                                                </label>
                                                            </div>
                                                        <?php endforeach;?>
                                                            <div class="form-check mb-3 col-6 col-md-4">
                                                                <input class="form-check-input" type="checkbox" id="others-skills"/>
                                                                <input type="text" class="form-control form-control-sm form-control-solid" placeholder="Other:" id="others-skills-input" value="">
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>

                                    </div>
                                    <div class="d-flex flex-stack">
                                        <div class="me-2" id="cancel-button">
                                            <a href="<?=base_url()?>/logout" class="btn btn-light btn-active-light-primary" >
                                                Cancel
                                            </a>
                                        </div>
                                        <div class="me-2">
                                            <button type="button" class="btn btn-light btn-active-light-primary" data-kt-stepper-action="previous">
                                                Back
                                            </button>
                                        </div>

                                        <div>
                                            <button type="button" class="btn btn-primary" data-kt-stepper-action="submit">
                                                <span class="indicator-label">
                                                    Submit
                                                </span>
                                                <span class="indicator-progress">
                                                    Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                </span>
                                            </button>

                                            <button type="button" class="btn btn-primary" data-kt-stepper-action="next">
                                                Continue
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="1" id="my-profile-photo-crop-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header border-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0 d-flex justify-content-center">
                <img src="" alt="" class="img-fluid rounded" id="my-profile-photo-crop-image">
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="crop-button">Save Photo</button>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('javascript'); ?>
<script src="<?= base_url()?>/public/assets/js/services/form-misc.js"></script>
<script>
    $(document).ready(function () {

        $(`input[name="elementary_is_undergrad"]`).change(function(){
            console.log(this.value)
        })

        const element = document.querySelector("#user-profile-stepper");

        const stepper = new KTStepper(element);
        $(stepper.btnNext).addClass("btn-blue").removeClass("btn-primary")

        stepper.on("kt.stepper.next", function (stepper) {
            stepper.goNext(); // go next step
            $("#cancel-button").hide()
            if(stepper.currentStepIndex==1){
                $("#cancel-button").show()
            }
            document.getElementById("welcome-to").scrollIntoView({behavior: "smooth"})
            $(stepper.btnNext).addClass("btn-blue").removeClass("btn-primary")
        });
        
        stepper.on("kt.stepper.previous", function (stepper) {
            stepper.goPrevious(); // go previous step
            $("#cancel-button").hide()
            if(stepper.currentStepIndex==1){
                $("#cancel-button").show()
            }
            document.getElementById("welcome-to").scrollIntoView({behavior: "smooth"})
            $(stepper.btnNext).addClass("btn-blue").removeClass("btn-primary")
        });

        $(stepper.btnSubmit).click(function(){
            loading(true)

            $("#file-name").val($("#user-photo-preview")[0].dataset.photoName ? $("#user-photo-preview")[0].dataset.photoName : "");

            let data = serializeObject("#user-profile-form")
            data.user_id = <?=$userInformation->user_id?>;
            data.user_photo = $("#user-photo-preview")[0].dataset.photoName;
            data.disability = data.disability == "Others" ? $("#other-disability").val() : data.disability;
            data.preferred_occupation = getListData("#preferred-occupation-list", true)
            data.preferred_work_location_local  = getListData("#preferred-work-location-local-list", true)
            data.preferred_work_location_abroad  = getListData("#preferred-work-location-abroad-list", true)
            <?php foreach ($educations as $education):
                $education = str_replace(" ", "_", $education);
                ?>
                data.<?=$education?>_is_undergrad = $(`input[name="<?=$education?>_is_undergrad"]`)[0].checked ? 1 : 0;
                data.<?=$education?>_year_graduated = $(`input[name="<?=$education?>_is_undergrad"]`)[0].checked ? null : data.<?=$education?>_year_graduated ;
            <?php endforeach;?>
            
            data.language_dialect_proficiency = getLanguageProficiency(true)
            data.technical_vocational_and_other_training = getTableData("#technical-vocational-table", true)
            data.eligibility = getTableData("#eligibility-table", true)
            data.professional_license = getTableData("#professional-license-table", true)
            data.work_experience = getTableData("#work-experience-table", true)
            data.work_experience = getTableData("#work-experience-table", true)
            data.other_skills_acquired_without_formal_training = getSkills(true)

            console.table(data)
            AJAX({
                method: "POST",
                url: "<?=base_url()?>/users/addPublicUserInfo",
                data: data,
                warningAlert: true,
                success: function (response) {
                    loading(false)
                    if(isJsonString(response)){
                        response = JSON.parse(response);
                        if(response.status){
                            Swal.fire({
                                icon: 'success',
                                title: "Account Successfully updated",
                                showConfirmButton: false,
                                timer: 3000
                            }).then((result) => {
                                location.reload();
                            })
                        }
                    }
                },
                error: function(e){
                    warningAlert()
                    loading(false)
                }
            })

        })

        $("#province").change(function(){
            $.ajax({
                type: "get",
                url: "<?=base_url()?>/UtilController/getCityMun/"+this.value,
                success: function (response) {
                    $("#city").html(`<option value="" selected disabled>City/Municipality</option>`).removeAttr("disabled");
                    $("#brgy-id").html(`<option value="" selected disabled>Barangay</option>`).attr("disabled", "");
                    const result = JSON.parse(response)
                    result.forEach(res => {
                        $("#city").append(`<option value="${res.citymunCode}">${titleCase(res.citymunDesc)}</option>`)
                    });
                }
            });
        })

        $("#city").change(function(){
            $.ajax({
                type: "get",
                url: "<?=base_url()?>/UtilController/getBarangay/"+this.value,
                success: function (response) {
                    $("#brgy-id").html(`<option value="" selected disabled>Barangay</option>`).removeAttr("disabled");
                    const result = JSON.parse(response)
                    result.forEach(res => {
                        $("#brgy-id").append(`<option value="${res.id}">${titleCase(res.brgyDesc)}</option>`)
                    });
                }
            });
        })

        $("#birthplace-province").change(function(){
            $.ajax({
                type: "get",
                url: "<?=base_url()?>/UtilController/getCityMun/"+this.value,
                success: function (response) {
                    $("#birthplace-city").html(`<option value="" selected disabled>City/Municipality</option>`).removeAttr("disabled");
                    const result = JSON.parse(response)
                    result.forEach(res => {
                        $("#birthplace-city").append(`<option value="${res.id}">${titleCase(res.citymunDesc)}</option>`)
                    });
                }
            });
        })

        $("#disability").change(function(){
            $("#other-disability").val("")
            if(this.value == "Others"){
                $("#other-disability").show()
            }else{
                $("#other-disability").hide()
            }
        })

        $("#employment-status").change(function(){
            $("#terminated-laidoff-abroad").hide()
            $("#other-employment-type").hide()
            $(`#employment-type>option`).hide()
            $("#employment-type option").removeAttr("selected");
            console.log($("#employment-type").find(`option[data-employment-status="${this.value}"]`).first())
            $("#employment-type").find(`option[data-employment-status="${this.value}"]`).first().attr("selected", true);
            $("#employment-type").val($("#employment-type").find(`option[data-employment-status="${this.value}"]`).first().attr("value"))
            $(`#employment-type>option[data-employment-status="${this.value}"]`).show()
        })

        $("#employment-type").change(function(){
            $("#employment-status").val($(this).find(`option[value="${this.value}"]`).data("employmentStatus"))
            $("#other-employment-type").val("").hide()
            $("#terminated-laidoff-abroad").val("").hide()
            if(this.value == "Terminated/Laidoff(abroad)"){
                $("#terminated-laidoff-abroad").show()
            }else if(this.value == "Others"){
                $("#other-employment-type").show()
            }
        })

        $("#is-actively-looking").change(function(){
            $("#actively-looking-duration-container").hide()
            $("#actively-looking-duration").val("")
            if(this.value == "1"){
                $("#actively-looking-duration-container").show()
            }
        })

        $("#will-work-immediately").change(function(){
            $("#work-immediately-when-container").hide()
            $("#work-immediately-when").val("")
            if(this.value == "0"){  
                $("#work-immediately-when-container").show()
            }
        })

        $("#4Ps-beneficiary").change(function(){
            $("#4Ps-beneficiary-container").hide()
            $("#4ps-beneficiary-household-no").val("")
            if(this.value == "1"){
                $("#4Ps-beneficiary-container").show()
            }
        })

        $("#add-preferred-occupation").click(function () {
            $("#preferred-occupation-input-container").slideDown()
            $("#preferred-occupation-input")[0].focus()
        })

        $("#preferred-occupation-input-submit").click(function () {
            if ($("#preferred-occupation-input").val()) {
                $(`<li class="mb-3">
                    <span class="text-dark preferred-occupation list-data">${$("#preferred-occupation-input").val()}</span>
                    <button type="button" class="btn btn-sm py-1 float-end preferred-occupation-remove">
                        <i class="fas fa-times text-danger "></i>
                    </button>
                    </li>`).insertBefore("#preferred-occupation-input-container")
                $("#preferred-occupation-input").val('')
                $("#preferred-occupation-input-container").hide()
            } else {
                $("#preferred-occupation-input-container").slideUp()
            }
        })

        $("#preferred-occupation-list").on("click", ".preferred-occupation-remove", function () {
            $(this).closest("li").remove()
        })

        $("#add-preferred-work-location-local").click(function () {
            $("#preferred-work-location-local-input-container").slideDown()
            $("#preferred-work-location-local-input")[0].focus()
        })

        $("#preferred-work-location-local-input-submit").click(function () {
            if ($("#preferred-work-location-local-input").val()) {
                $(`<li class="mb-3">
                    <span class="text-dark preferred-work-location-local list-data">${$("#preferred-work-location-local-input").val()}</span>
                    <button type="button" class="btn btn-sm py-1 float-end preferred-work-location-local-remove">
                        <i class="fas fa-times text-danger "></i>
                    </button>
                    </li>`).insertBefore("#preferred-work-location-local-input-container")
                $("#preferred-work-location-local-input").val('')
                $("#preferred-work-location-local-input-container").hide()
            } else {
                $("#preferred-work-location-local-input-container").slideUp()
            }
        })

        $("#preferred-work-location-local-list").on("click", ".preferred-work-location-local-remove", function () {
            $(this).closest("li").remove()
        })

        $("#add-preferred-work-location-abroad").click(function () {
            $("#preferred-work-location-abroad-input-container").slideDown()
            $("#preferred-work-location-abroad-input")[0].focus()
        })

        $("#preferred-work-location-abroad-input-submit").click(function () {
            if ($("#preferred-work-location-abroad-input").val()) {
                $(`<li class="mb-3">
                    <span class="text-dark preferred-work-location-abroad list-data">${$("#preferred-work-location-abroad-input").val()}</span>
                    <button type="button" class="btn btn-sm py-1 float-end preferred-work-location-abroad-remove">
                        <i class="fas fa-times text-danger "></i>
                    </button>
                    </li>`).insertBefore("#preferred-work-location-abroad-input-container")
                $("#preferred-work-location-abroad-input").val('')
                $("#preferred-work-location-abroad-input-container").hide()
            } else {
                $("#preferred-work-location-abroad-input-container").slideUp()
            }
        })

        $("#preferred-work-location-abroad-list").on("click", ".preferred-work-location-abroad-remove", function () {
            $(this).closest("li").remove()
        })

        $("#passport").on("input", function(){
            if(this.value){
                $("#passport-expiry-container").show()
            }else{
                $("#passport-expiry-container").hide()
                $("#passport-expiry").val("")
            }
        })

        $(".education-is-undergrad").change(function(){
            const accordion_item = $(this).closest(".accordion-item");
            const undergrad_level = $(accordion_item).find(".undergrad-level");
            const undergrad_year = $(accordion_item).find(".undergrad-year");
            $(this).next("label").html(`${this.checked ? "Yes" : "No" }`);
            undergrad_level.find(".school-undergrad-level").val("")
            undergrad_year.find(".school-undergrad-year").val("")
            if(this.checked){
                accordion_item.find(".year-graduated").val("").attr("disabled", true);
                undergrad_level.show();
                undergrad_year.show();
            }else{
                accordion_item.find(".year-graduated").val("").removeAttr("disabled");
                undergrad_level.hide();
                undergrad_year.hide();
            }
        })

        $("#technical-vocational-table").on("click", ".technical-vocational-remove", function(){
            if($("#technical-vocational-table>tbody>tr").length>1){
                $(this).closest("tr").remove()
            }
        })

        $("#add-technical-vocational").click(function(){
            let is_ok = true;
            let required_element;
            $("#technical-vocational-table .required").each(function (index, element) {
                $(element).removeClass("error bg-light-danger ")
                if(!element.value){
                    is_ok = false
                    $(element).addClass("error bg-light-danger ")
                    element.scrollIntoView({
                        behavior: 'smooth',
                    }); 
                    return false;
                }
            });

            if(is_ok){
                $("#technical-vocational-table tbody").append(`
                    <tr>
                        <td>
                            <input type="text" class="table-data form-control form-control-solid required technical-vocational-training" data-data-name="training" >
                        </td>
                        <td>
                            <input type="text" class="table-data form-control form-control-solid required technical-vocational-duration" data-data-name="duration" >
                        </td>
                        <td>
                            <input type="text" class="table-data form-control form-control-solid required technical-vocational-institution" data-data-name="institution" >
                        </td>
                        <td>
                            <input type="text" class="table-data form-control form-control-solid required technical-vocational-certificates" placeholder="" data-data-name="certificates" >
                        </td>
                        <td class="p-0">
                            <button type="button" class="btn btn-sm py-1 float-end technical-vocational-remove">
                                <i class="fas fa-times text-danger"></i>
                            </button>
                        </td>
                    </tr>
                `)
    
                $(".technical-vocational-duration").daterangepicker({
                    maxDate: <?=date("mm/dd/YYYY")?>
                });
            }

            const table_data = getTableData("#technical-vocational-table")
            console.log(table_data)

        })

        $(".technical-vocational-duration").daterangepicker({
            maxDate: <?=date("mm/dd/YYYY")?>
        });

        $("#eligibility-table").on("click", ".eligibility-remove", function(){
            if($("#eligibility-table>tbody>tr").length>1){
                $(this).closest("tr").remove()
            }
        })

        $("#add-eligibility").click(function(){
            let is_ok = true;
            let required_element;
            $("#eligibility-table .required").each(function (index, element) {
                $(element).removeClass("error bg-light-danger ")
                if(!element.value){
                    is_ok = false
                    $(element).addClass("error bg-light-danger ")
                    element.scrollIntoView({
                        behavior: 'smooth',
                    }); 
                    return false;
                }
            });

            if(is_ok){
                $("#eligibility-table tbody").append(`
                    <tr>
                        <td>
                            <input type="text" class="table-data form-control form-control-solid required eligibility-civil-service" data-data-name="eligibility" >
                        </td>
                        <td>
                            <input type="text" class="table-data form-control form-control-solid required eligibility-rating" data-data-name="rating" >
                        </td>
                        <td>
                            <input type="date" class="table-data form-control form-control-solid required eligibility-date" data-data-name="date" >
                        </td>
                        <td class="p-0">
                            <button type="button" class="btn btn-sm py-1 float-end eligibility-remove">
                                <i class="fas fa-times text-danger"></i>
                            </button>
                        </td>
                    </tr>
                `)
            }

            const table_data = getTableData("#eligibility-table")
            console.log(table_data)
        })

        $("#professional-license-table").on("click", ".professional-license-remove", function(){
            if($("#professional-license-table>tbody>tr").length>1){
                $(this).closest("tr").remove()
            }
        })

        $("#add-professional-license").click(function(){
            let is_ok = true;
            let required_element;
            $("#professional-license-table .required").each(function (index, element) {
                $(element).removeClass("error bg-light-danger ")
                if(!element.value){
                    is_ok = false
                    $(element).addClass("error bg-light-danger ")
                    element.scrollIntoView({
                        behavior: 'smooth',
                    }); 
                    return false;
                }
            });

            if(is_ok){
                $("#professional-license-table tbody").append(`
                    <tr>
                        <td>
                            <input type="text" class="table-data form-control form-control-solid required professional-license" data-data-name="professional license" >
                        </td>
                        <td>
                            <input type="date" class="table-data form-control form-control-solid required professional-license-valid-until" data-data-name="valid until" >
                        </td>
                        <td class="p-0">
                            <button type="button" class="btn btn-sm py-1 float-end professional-license-remove">
                                <i class="fas fa-times text-danger"></i>
                            </button>
                        </td>
                    </tr>
                `)
            }

            const table_data = getTableData("#professional-license-table")
            console.log(table_data)

        })

        $("#work-experience-table").on("click", ".work-experience-remove", function(){
            if($("#work-experience-table>tbody>tr").length>1){
                $(this).closest("tr").remove()
            }
        })

        $("#add-work-experience").click(function(){
            let is_ok = true;
            let required_element;
            $("#work-experience-table .required").each(function (index, element) {
                $(element).removeClass("error bg-light-danger ")
                if(!element.value){
                    is_ok = false
                    $(element).addClass("error bg-light-danger ")
                    element.scrollIntoView({
                        behavior: 'smooth',
                    }); 
                    return false;
                }
            });

            if(is_ok){
                $("#work-experience-table tbody").append(`
                    <tr>
                        <td>
                            <input type="text" class="table-data form-control form-control-solid required work-experience-position" data-data-name="position" >
                        </td>
                        <td>
                            <input type="text" class="table-data form-control form-control-solid required work-experience-company-name" data-data-name="company name" >
                        </td>
                        <td>
                            <input type="text" class="table-data form-control form-control-solid required work-experience-address" data-data-name="address" >
                        </td>
                        <td>
                            <input type="text" class="table-data form-control form-control-solid required work-experience-inclusive-dates" data-data-name="inclusive dates" >
                        </td>
                        <td>
                            <select class="form-select table-data form-control form-control-solid required work-experience-status" aria-label="Default select example" data-data-name="status" >
                            <?php
                                $work_experience_status = ["Permanent", "Contractual", "Part-time", "Probationary"];
                                foreach ($work_experience_status as $value):
                            ?>
                            <option value="<?=$value?>"><?=$value?></option>
                            <?php endforeach;?>
                                
                            </select>
                        </td>
                        <td class="p-0">
                            <button type="button" class="btn btn-sm py-1 float-end work-experience-remove">
                                <i class="fas fa-times text-danger"></i>
                            </button>
                        </td>
                    </tr>
                `)
    
                $(".work-experience-inclusive-dates").daterangepicker({
                    maxDate: <?=date("mm/dd/YYYY")?>
                });
            }

            // const table_data = getTableData("#work-experience-table")
            // console.log(table_data)
        })

        $(".work-experience-inclusive-dates").daterangepicker({
            maxDate: <?=date("mm/dd/YYYY")?>
        });

        $("#user-profile-form").submit(async function (e) { 
            e.preventDefault();
            loading(true)

            $("#file-name").val($("#user-photo-preview")[0].dataset.photoName ? $("#user-photo-preview")[0].dataset.photoName : "");
            let data = {}
            $(this).serializeArray().forEach(field => {
                data[field.name] = field.value
            });

            data.user_photo = $("#user-photo-preview")[0].dataset.photoName;
            if (data.present_employment_status == 0) {
                data.present_employment_status = data.other_present_employment_status;
                delete data.other_present_employment_status;
            } else {
                delete data.other_present_employment_status;
            }
            if (data.educational_attainment == 0) {
                data.educational_attainment = data.other_educational_attainment;
                delete data.other_educational_attainment;
            } else {
                delete data.other_educational_attainment;
            }

            let course_program = [];
            $("#course-program-list").find(".course-program").each(function (index, element) {
                course_program.push($(element).text())
            });
            let work_experience = [];
            $("#work-experience-list").find(".work-experience").each(function (index, element) {
                work_experience.push($(element).text())
            });
            data.course_program = JSON.stringify(course_program);
            data.work_experience = JSON.stringify(work_experience);
            console.log(data)
            console.table(data)

            AJAX({
                method: "POST",
                url: "<?=base_url()?>/users/updatePublicUserInfo",
                data: data,
                warningAlert: true,
                success: function (response) {
                    loading(false)
                    if(isJsonString(response)){
                        response = JSON.parse(response);
                        if(response.status){
                            Swal.fire({
                                icon: 'success',
                                title: "Account Successfully updated",
                                showConfirmButton: false,
                                timer: 3000
                            }).then((result) => {
                                location.reload();
                            })
                        }
                    }
                },
                error: function(e){
                    warningAlert()
                    loading(false)
                }
            })
        });

        $("#others-skills-input").on("input", function(){
            $("#others-skills")[0].checked = this.value ? true :false;
        })

        $("#others-skills").change(function(){
            if(!this.checked){
                $("#others-skills-input").val("")
            }else{
                $("#others-skills-input")[0].focus()
            }
        })

        $(".language-row .form-check-input").change(function(){
            const language = getLanguageProficiency(true)
            console.log(language)
        })

    });

    function titleCase(str) {
        str = str.toLowerCase().split(' ');
        for (var i = 0; i < str.length; i++) {
            str[i] = str[i].charAt(0).toUpperCase() + str[i].slice(1); 
        }
        return str.join(' ');
    }

    function getSkills(is_json_string = false){
        let skills_array = [];
        let other_skills = $("#others-skills-input").val();
        $(".skill-checkbox").each((index, element) => {
            if(element.checked){
                skills_array.push(element.dataset.skillName)
            }
        })
        if(other_skills){
            skills_array.push(other_skills)
        }
        if(is_json_string){
            return JSON.stringify(skills_array)
        }
        return skills_array;
    }

    function getTableData(table_id, is_json_string = false){
        let table_data = [];
        $(table_id).find("tbody>tr").each((index, row)=>{
            const row_data = {};
            let required_is_filled = true

            $(row).find(".table-data").each((index, element)=>{
                const data_name = element.dataset.dataName
                if($(element).hasClass("required")){
                    if(!element.value){
                        required_is_filled = false;
                        return false;
                    }
                }
                row_data[data_name] = element.value
            })

            if(required_is_filled){
                if(Object.keys(row_data).length){
                    table_data.push(row_data)
                }
            }
        })

        if(is_json_string){
            return JSON.stringify(table_data)
        }
        return table_data;
    }

    function getLanguageProficiency(is_json_string = false){
        let language_array = []
        $(".language-row").each((index, row)=>{
            const language = $(row).find(".language-name").val()
            const language_data = {}
            language_data[language] = {}
            $(row).find(".language-checkbox").each((index, checkbox)=>{
                const data_name = checkbox.dataset.dataName;
                language_data[language][data_name] = checkbox.checked
            })
            language_array.push(language_data)
        })
        if(is_json_string){
            return JSON.stringify(language_array)
        }
        return language_array;
    }

    function getListData(list_id, is_json_string = false){
        const list_data = [];
        $(list_id).find(".list-data").each(function (index, element) {
            list_data.push(element.innerHTML)
        });
        if(is_json_string){
            return JSON.stringify(list_data)
        }
        return list_data;
    }
</script>
<?= $this->endSection(); ?>