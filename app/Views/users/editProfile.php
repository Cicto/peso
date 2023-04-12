<?= $this->extend('layouts/noSideBarMain'); ?>
<?= $this->section('content'); ?>


<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
    <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0"><?=$title?></h1>
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                <li class="breadcrumb-item text-muted">
                    <a href="../../demo1/dist/index.html" class="text-muted text-hover-primary">Edit Profile Information</a>
                </li>
            </ul>
        </div>
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            
            <!-- <a href="#" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">New System</a> -->
        </div>
    </div>
</div>

<div class="d-flex flex-column flex-column-fluid">
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">

        <div class="card">
                <div class="card-body">
                    <h3 class="mb-3 text-center pb-3">Edit Profile Information</h3>
                    <form action="" class="p-5" id="user-profile-form">
                        <div class="row g-0 g-md-2">
                            <div class="col-12 col-md-3 border-end px-3">
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

                                <a href="<?=base_url()?>/dashboard/resume" class="btn btn-blue w-100 position-relative"> Update Resume
                                    <div class="d-flex flex-column align-items-start position-absolute bottom-0 end-0 m-2">
                                        <div class="bg-white rounded-circle p-1 d-inline mb-1"></div>
                                        <div class="bg-white rounded-circle p-1 d-inline"></div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-12 col-md-9 row g-0 g-md-2 ps-0 ps-md-5">
                                <div class="row gx-0 gx-md-2 mb-6">
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Full Name</label>

                                    <div class="col-lg-8">
                                        <div class="row">
                                            <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                                <input type="text" name="firstname" id="first-name" class="form-control form-control-lg form-control-solid" placeholder="First name" required value="<?=$userInformation->firstname?>">
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>

                                            <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                                <input type="text" name="middlename" class="form-control form-control-lg form-control-solid" placeholder="Middle name" value="<?=$userInformation->middlename?>">
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>

                                            <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                                <input type="text" name="lastname" class="form-control form-control-lg form-control-solid" placeholder="Last name" required value="<?=$userInformation->lastname?>">
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>
                                            <div class="col-lg-4 fv-row fv-plugins-icon-container">
                                                <input type="text" name="suffix" class="form-control form-control-lg form-control-solid" placeholder="Suffix" value="<?=$userInformation->suffix?>">
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row gx-0 gx-md-2 mb-6">
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Birthdate</label>

                                    <div class="col-lg-8">
                                        <div class="fv-row fv-plugins-icon-container">
                                            <input type="date" name="birthdate" id="birthdate" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Birthdate" required value="<?=$userInformation->birthdate?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="row gx-0 gx-md-2 mb-6">
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Contact Number</label>

                                    <div class="col-lg-8">
                                        <div class="fv-row fv-plugins-icon-container mb-3 mb-lg-0">
                                            <div class="input-group">
                                                <span class="input-group-text border-0">+63</span>
                                                <input type="text" name="contact_number" id="contact-number" class="form-control form-mask mask-contact-number form-control-lg form-control-solid" placeholder="900-000-0000" pattern="^9[0-9]{2}-[0-9]{3}-[0-9]{4}$" required value="<?=$userInformation->contact_number?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row gx-0 gx-md-2 mb-6">
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Sex</label>

                                    <div class="col-lg-8">
                                        <div class="fv-row fv-plugins-icon-container mb-3 mb-lg-0">
                                            <select class="form-select form-control form-control-solid" aria-label="Default select example" name="sex" required="">
                                                <option value="Male" <?=$userInformation->sex=="Male"?'selected':''?>>Male</option>
                                                <option value="Female" <?=$userInformation->sex=="Female"?'selected':''?>>Female</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row gx-0 gx-md-2 mb-6">
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Address</label>

                                    <div class="col-lg-8">
                                        <div class="row">
                                            <div class="col-12 col-md-4 fv-row fv-plugins-icon-container">
                                                <select class="form-select form-select-search form-control form-control-solid" aria-label="Default select example" id="province" required="">
                                                    <option value="" selected disabled>Province</option>
                                                    <?php foreach ($userBarangaysCitiesAndProvinces->provinces as $key => $province):?>
                                                        <option value="<?=$province->provCode?>" <?=$userBarangaysCitiesAndProvinces->selected_province === $province->provCode?'selected':''?>><?= ucwords(strtolower($province->provDesc)) ?></option>
                                                    <?php endforeach;?>
                                                </select>
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>
                                            <div class="col-12 col-md-4 fv-row fv-plugins-icon-container">
                                                <select class="form-select form-select-search form-control form-control-solid" aria-label="Default select example" id="city" required="">
                                                    <option value="" selected disabled>City/Municipality</option>
                                                    <?php foreach ($userBarangaysCitiesAndProvinces->cities as $key => $cities):?>
                                                        <option value="<?=$cities->citymunCode?>" <?=$userBarangaysCitiesAndProvinces->selected_city === $cities->citymunCode?'selected':''?>><?= ucwords(strtolower($cities->citymunDesc)) ?></option>
                                                    <?php endforeach;?>
                                                </select>
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>
                                            <div class="col-12 col-md-4 fv-row fv-plugins-icon-container">
                                                <select class="form-select form-select-search form-control form-control-solid" aria-label="Default select example" name="barangay_id" id="brgy-id" required="">
                                                    <option value="" selected disabled>Barangay</option>
                                                    <?php foreach ($userBarangaysCitiesAndProvinces->barangays as $key => $barangays):?>
                                                        <option value="<?=$barangays->id?>" <?=$userBarangaysCitiesAndProvinces->selected_barangay === $barangays->id?'selected':''?>><?= ucwords(strtolower($barangays->brgyDesc)) ?></option>
                                                    <?php endforeach;?>
                                                </select>
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>

                                            <div class="col-lg-4 order-lg-1 order-2 fv-row fv-plugins-icon-container">
                                                <input type="text" name="house_number" class="form-control form-control-lg form-control-solid" placeholder="House Number" value="<?=$userInformation->house_number?>">
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>

                                            <div class="col-lg-8 order-lg-2 order-1 fv-row fv-plugins-icon-container">
                                                <input type="text" name="street_name" class="form-control form-control-lg form-control-solid" placeholder="Street" required value="<?=$userInformation->street_name?>">
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>

                                            <div class="col-12 text-end order-3">
                                                <small class="text-muted"><i class="fas fa-exclamation-circle "></i> Select your province first, then select your city / municipality and barangay</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row gx-0 gx-md-2 my-6">
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Educational
                                        Attainment</label>

                                    <div class="col-lg-8">
                                        <select name="educational_attainment" id="educational-attainment" class="form-select form-control form-control-solid mb-3">
                                            <?php
                                                $educations = [
                                                    "Post-Undergraduate",
                                                    "College Graduate",
                                                    "Technical - Vocational Graduate",
                                                    "College Level",
                                                    "High School Graduate",
                                                    "High School Level",
                                                    "Elementary Graduate",
                                                    "Elementary Level"
                                                ];
                                                
                                                $is_others = !in_array($userInformation->educational_attainment, $educations);
                                            ?>
                                            <option value="Post-Undergraduate" <?=$userInformation->educational_attainment == "Post-Undergraduate" ? "selected" : ""?>>Post-Undergraduate</option>
                                            <option value="College Graduate" <?=$userInformation->educational_attainment == "College Graduate" ? "selected" : ""?>>College Graduate</option>
                                            <option value="Technical - Vocational Graduate" <?=$userInformation->educational_attainment == "Technical - Vocational Graduate" ? "selected" : ""?>>Technical - Vocational Graduate</option>
                                            <option value="College Level" <?=$userInformation->educational_attainment == "College Level" ? "selected" : ""?>>College Level</option>
                                            <option value="High School Graduate" <?=$userInformation->educational_attainment == "High School Graduate" ? "selected" : ""?>>High School Graduate</option>
                                            <option value="High School Level" <?=$userInformation->educational_attainment == "High School Level" ? "selected" : ""?>>High School Level</option>
                                            <option value="Elementary Graduate" <?=$userInformation->educational_attainment == "Elementary Graduate" ? "selected" : ""?>>Elementary Graduate</option>
                                            <option value="Elementary Level" <?=$userInformation->educational_attainment == "Elementary Level" ? "selected" : ""?>>Elementary Level</option>
                                            <option value="0" <?=$is_others ? "selected" : ""?>>Others</option>
                                        </select>
                                        <input type="text" value="<?=$userInformation->educational_attainment?>" name="other_educational_attainment" id="other-educational-attainment" class="form-control form-control-lg form-control-solid" placeholder="Other: " style="display: <?=$is_others ? "block" : "none"?>;">
                                    </div>
                                </div>

                                <div class="row gx-0 gx-md-2 mb-3">
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Course / Program</label>

                                    <div class="col-lg-8">
                                        <ul class="text-blue fs-5 " id="course-program-list">
                                            <?php 
                                                $course_program = isset($userInformation->course_program) ? json_decode($userInformation->course_program) : false;
                                                if($course_program):
                                                    foreach ($course_program as $key => $value):
                                            ?>
                                                <li class="mb-3">
                                                    <span class="text-dark course-program"><?=$value?></span>
                                                    <button type="button" class="btn btn-sm py-1 float-end course-program-remove">
                                                        <i class="fas fa-times text-danger "></i>
                                                    </button>
                                                </li>
                                            <?php
                                                    endforeach;
                                                endif;
                                            ?>
                                            <li class="mb-1" id="course-program-input-container" style="display: none;">
                                                <div class="input-group">
                                                    <input type="text" id="course-program-input"
                                                        class="form-control form-control-sm form-control-solid fs-5"
                                                        placeholder="Course / Program">
                                                    <button type="button" class="btn btn-sm btn-green"
                                                        id="course-program-input-submit"><i
                                                            class="fas fa-check p-0 text-white"></i></button>
                                                </div>
                                            </li>
                                            <li style="list-style-type: none;">
                                                <button type="button" class="btn btn-blue w-100 fw-bold"
                                                    id="add-course-program"><i class="fas fa-plus text-white"></i> Add
                                                    Course / Degree / Program</button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="row gx-0 gx-md-2 mb-6">
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6"></label>

                                    <div class="col-lg-8 align-items-center d-flex">
                                        <div class="form-check form-switch form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" role="switch" id="with-drivers-license" name="with_drivers_license" <?=$userInformation->with_drivers_license ? "checked" : ""?>>
                                            <label class="form-check-label" for="with-drivers-license">I have a driver's license</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row gx-0 gx-md-2 my-6">
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Current Employment
                                        Status</label>

                                    <div class="col-lg-8">
                                        <select name="present_employment_status" id="present-employment-status" class="form-select form-control form-control-solid mb-3">
                                            <?php
                                                $employments = [
                                                    "Employed", 
                                                    "Self-Employed / Freelancer",
                                                    "Unemployed"
                                                ];
                                                
                                                $is_others = !in_array($userInformation->present_employment_status, $employments);
                                            ?>
                                            <option <?=$userInformation->present_employment_status == "Employed" ? "selected" :""?> value="Employed">Employed</option>
                                            <option <?=$userInformation->present_employment_status == "Self-Employed / Freelancer" ? "selected" :""?> value="Self-Employed / Freelancer">Self-Employed / Freelancer</option>
                                            <option <?=$userInformation->present_employment_status == "Unemployed" ? "selected" :""?> value="Unemployed">Unemployed</option>
                                            <option <?=$is_others ? "selected" :""?> value="0">Others</option>
                                        </select>
                                        <input type="text" name="other_present_employment_status" value="<?=$userInformation->present_employment_status?>" id="other-present-employment-status" class="form-control form-control-lg form-control-solid" placeholder="Other: " style="display: <?=$is_others ? "block" : "none"?>;">
                                    </div>
                                </div>
                                
                                <div class="row gx-0 gx-md-2 mb-6">
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Work Experience(s)</label>

                                    <div class="col-lg-8">
                                        <ul class="text-blue fs-5 " id="work-experience-list">
                                            <?php 
                                                $work_experience = isset($userInformation->work_experience) ? json_decode($userInformation->work_experience) : false;
                                                if($work_experience):
                                                    foreach ($work_experience as $key => $value):
                                            ?>
                                            <li class="mb-3">
                                                <span class="text-dark work-experience"><?=$value?></span>
                                                <button type="button" class="btn btn-sm py-1 float-end work-experience-remove">
                                                    <i class="fas fa-times text-danger "></i>
                                                </button>
                                            </li>
                                            <?php
                                                    endforeach;
                                                endif;
                                            ?>
                                            <li class="mb-1" id="work-experience-input-container"
                                                style="display: none;">
                                                <div class="input-group">
                                                    <input type="text" id="work-experience-input"
                                                        class="form-control form-control-sm form-control-solid fs-5"
                                                        placeholder="Work Experience">
                                                    <button type="button" class="btn btn-sm btn-green"
                                                        id="work-experience-input-submit"><i
                                                            class="fas fa-check p-0 text-white"></i></button>
                                                </div>
                                            </li>
                                            <li style="list-style-type: none;">
                                                <button type="button" class="btn btn-blue w-100 fw-bold"
                                                    id="add-work-experience"><i class="fas fa-plus text-white"></i> Add
                                                    Work Experience</button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                            
                            <div class="text-center">
                                <a href="<?=base_url()?>/home" class="btn btn-secondary">Cancel</a>
                                <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Update Information</button>
                            </div>
                        </div>
                    </form>
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
                <button type="button" class="btn btn-primary" id="update-crop-button">Save Photo</button>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('javascript'); ?>
<script src="<?= base_url()?>/public/assets/js/users/users.js"></script>

<script>
    $(document).ready(function () {
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

        $("#educational-attainment").change(function () {
            $("#other-educational-attainment").val('')
            if (this.value == 0) {
                $("#other-educational-attainment").slideDown();
            } else {
                $("#other-educational-attainment").slideUp();
            }
        })

        $("#add-course-program").click(function () {
            $("#course-program-input-container").slideDown()
            $("#course-program-input")[0].focus()
        })

        $("#course-program-input-submit").click(function () {
            if ($("#course-program-input").val()) {
                $(`<li class="mb-3">
                    <span class="text-dark course-program">${$("#course-program-input").val()}</span>
                    <button type="button" class="btn btn-sm py-1 float-end course-program-remove">
                        <i class="fas fa-times text-danger "></i>
                    </button>
                    </li>`).insertBefore("#course-program-input-container")
                $("#course-program-input").val('')
                $("#course-program-input-container").slideUp()
            } else {
                $("#course-program-input-container").slideUp()
            }
        })

        $("#course-program-list").on("click", ".course-program-remove", function () {
            $(this).closest("li").remove()
        })

        $("#present-employment-status").change(function () {
            $("#other-present-employment-status").val('')
            if (this.value == 0) {
                $("#other-present-employment-status").slideDown();
            } else {
                $("#other-present-employment-status").slideUp();
            }
        })

        $("#add-work-experience").click(function () {
            $("#work-experience-input-container").slideDown()
            $("#work-experience-input")[0].focus()
        })

        $("#work-experience-input-submit").click(function () {
            if ($("#work-experience-input").val()) {
                $(`<li class="mb-3">
                    <span class="text-dark work-experience">${$("#work-experience-input").val()}</span>
                    <button type="button" class="btn btn-sm py-1 float-end work-experience-remove">
                        <i class="fas fa-times text-danger "></i>
                    </button>
                    </li>`).insertBefore("#work-experience-input-container")
                $("#work-experience-input").val('')
                $("#work-experience-input-container").slideUp()
            } else {
                $("#work-experience-input-container").slideUp()
            }
        })

        $("#work-experience-list").on("click", ".work-experience-remove", function () {
            $(this).closest("li").remove()
        })

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
    });

    function titleCase(str) {
        str = str.toLowerCase().split(' ');
        for (var i = 0; i < str.length; i++) {
            str[i] = str[i].charAt(0).toUpperCase() + str[i].slice(1); 
        }
        return str.join(' ');
    }
</script>
<?= $this->endSection(); ?>