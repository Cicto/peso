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
                    <small class="text-muted d-block text-center pt-2 my-2 border-top">Before you can look for job
                        opportunities, you must first fill your personal information.</small>
                    <form action="" class="p-5" id="user-profile-form">
                        <div class="d-flex justify-content-center align-items-start mb-5">
                            <h3 class="text-blue">- -</h3> &nbsp; <h3 class="theme-light-show text-blue"
                                style="color: #21366b;"> Personal Information Form </h3>
                            <h3 class="text-white theme-dark-show"> Personal Information Form </h3> &nbsp; <h3
                                class="text-blue">- -</h3>
                        </div>
                        <div class="row g-0 g-md-2 mb-5">
                            <div class="col-12 col-md-3">
                                <input type="number" name="user_id" class="d-none"
                                    value="<?=$userInformation->user_id?>" readonly>
                                <input type="text" name="user_photo" class="d-none" id="file-name">
                                <input type="file" id="user-photo" class="w-100" hidden="">
                                <label for="user-photo" class="d-block user-photo-hover pointer w-100 mb-5 text-center">
                                    <div class="p-2 border mx-auto d-inline-block bg-light rounded position-relative">
                                        <img src="<?=base_url()?>/public/assets/media/avatars/default-avatar.png"
                                            data-photo-name="" class="rounded img-fluid user-avatar"
                                            id="user-photo-preview" style="" alt="Profile picture">
                                        <div
                                            class="position-absolute w-100 h-100 top-0 start-0 bg-light bg-opacity-10 rounded d-flex justify-content-end align-items-end user-photo-hover-overlay">
                                            <div class="bg-light px-2 py-1 rounded">
                                                <i class="fas fa-pen"></i>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <div class="col-12 col-md-9 row g-0 g-md-2 ps-0 ps-md-5">
                                <div class="row gx-0 gx-md-2 mb-6">
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Full Name</label>

                                    <div class="col-lg-8">
                                        <div class="row">
                                            <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                                <input type="text" name="firstname" id="first-name"
                                                    class="form-control form-control-lg form-control-solid"
                                                    placeholder="First name" required>
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>

                                            <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                                <input type="text" name="middlename"
                                                    class="form-control form-control-lg form-control-solid"
                                                    placeholder="Middle name">
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>

                                            <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                                <input type="text" name="lastname"
                                                    class="form-control form-control-lg form-control-solid"
                                                    placeholder="Last name" required>
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>
                                            <div class="col-lg-4 fv-row fv-plugins-icon-container">
                                                <input type="text" name="suffix"
                                                    class="form-control form-control-lg form-control-solid"
                                                    placeholder="Suffix">
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row gx-0 gx-md-2 mb-6">
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Birthdate</label>

                                    <div class="col-lg-8">
                                        <div class="fv-row fv-plugins-icon-container">
                                            <input type="date" name="birthdate" id="birthdate"
                                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                                placeholder="Birthdate" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row gx-0 gx-md-2 mb-6">
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Contact
                                        Number</label>

                                    <div class="col-lg-8">
                                        <div class="fv-row fv-plugins-icon-container mb-3 mb-lg-0">
                                            <div class="input-group">
                                                <span class="input-group-text border-0">+63</span>
                                                <input type="text" name="contact_number" id="contact-number"
                                                    class="form-control form-mask mask-contact-number form-control-lg form-control-solid"
                                                    placeholder="900-000-0000" pattern="^9[0-9]{2}-[0-9]{3}-[0-9]{4}$"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row gx-0 gx-md-2 mb-6">
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Sex</label>

                                    <div class="col-lg-8">
                                        <div class="fv-row fv-plugins-icon-container mb-3 mb-lg-0">
                                            <select class="form-select form-control form-control-solid"
                                                aria-label="Default select example" name="sex" required="">
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row gx-0 gx-md-2 mb-6">
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Address</label>

                                    <div class="col-lg-8">
                                        <div class="row">
                                            <div class="col-12 col-md-4 fv-row fv-plugins-icon-container">
                                                <select
                                                    class="form-select form-select-search form-control form-control-solid"
                                                    aria-label="Default select example" id="province" required="">
                                                    <option value="" selected disabled>Province</option>
                                                    <?php foreach ($provinces as $key => $province):?>
                                                    <option value="<?=$province->provCode?>">
                                                        <?= ucwords(strtolower($province->provDesc)) ?></option>
                                                    <?php endforeach;?>
                                                </select>
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>
                                            <div class="col-12 col-md-4 fv-row fv-plugins-icon-container">
                                                <select
                                                    class="form-select form-select-search form-control form-control-solid"
                                                    aria-label="Default select example" id="city" required="" disabled>
                                                    <option value="" selected disabled>City/Municipality</option>
                                                </select>
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>
                                            <div class="col-12 col-md-4 fv-row fv-plugins-icon-container">
                                                <select
                                                    class="form-select form-select-search form-control form-control-solid"
                                                    aria-label="Default select example" name="barangay_id" id="brgy-id"
                                                    required="" disabled>
                                                    <option value="" selected disabled>Barangay</option>
                                                </select>
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>

                                            <div class="col-lg-4 order-lg-1 order-2 fv-row fv-plugins-icon-container">
                                                <input type="text" name="house_number"
                                                    class="form-control form-control-lg form-control-solid"
                                                    placeholder="House Number">
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>

                                            <div class="col-lg-8 order-lg-2 order-1 fv-row fv-plugins-icon-container">
                                                <input type="text" name="street_name"
                                                    class="form-control form-control-lg form-control-solid"
                                                    placeholder="Street" required>
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>

                                            <div class="col-12 text-end order-3">
                                                <small class="text-muted"><i class="fas fa-exclamation-circle "></i>
                                                    Select your province first, then select your city / municipality and
                                                    barangay</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-center align-items-start mb-5">
                            <h3 class="text-blue">- -</h3> &nbsp; <h3 class="theme-light-show text-blue"
                                style="color: #21366b;"> Education Information </h3>
                            <h3 class="text-white theme-dark-show"> Personal Information Form </h3> &nbsp; <h3
                                class="text-blue">- -</h3>
                        </div>
                        <div class="row g-0 g-md-2">
                            <div class="col-12 col-md-3">
                            </div>
                            <div class="col-12 col-md-9 row g-0 g-md-2 ps-0 ps-md-5">
                                <div class="row gx-0 gx-md-2 mb-6">
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Educational
                                        Attainment</label>

                                    <div class="col-lg-8">
                                        <select name="educational_attainment" id="educational-attainment"
                                            class="form-select form-control form-control-solid mb-3">
                                            <option value="Post-Undergraduate">Post-Undergraduate</option>
                                            <option value="College Graduate">College Graduate</option>
                                            <option value="Technical - Vocational Graduate">Technical - Vocational
                                                Graduate</option>
                                            <option value="College Level">College Level</option>
                                            <option value="High School Graduate">High School Graduate</option>
                                            <option value="High School Level">High School Level</option>
                                            <option value="Elementary Graduate">Elementary Graduate</option>
                                            <option value="Elementary Level">Elementary Level</option>
                                            <option value="0">Others</option>
                                        </select>
                                        <input type="text" name="other_educational_attainment"
                                            id="other-educational-attainment"
                                            class="form-control form-control-lg form-control-solid"
                                            placeholder="Other: " style="display: none;">
                                    </div>
                                </div>

                                <div class="row gx-0 gx-md-2 mb-3">
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Course / Program</label>

                                    <div class="col-lg-8">
                                        <ul class="text-blue fs-5 " id="course-program-list">
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
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                id="with-drivers-license" name="with_drivers_license">
                                            <label class="form-check-label" for="with-drivers-license">I have a driver's
                                                license</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="d-flex justify-content-center align-items-start mb-5">
                            <h3 class="text-blue">- -</h3> &nbsp; <h3 class="theme-light-show text-blue"
                                style="color: #21366b;"> Employment Information </h3>
                            <h3 class="text-white theme-dark-show"> Personal Information Form </h3> &nbsp; <h3
                                class="text-blue">- -</h3>
                        </div>
                        <div class="row g-0 g-md-2">
                            <div class="col-12 col-md-3">
                            </div>
                            <div class="col-12 col-md-9 row g-0 g-md-2 ps-0 ps-md-5">
                                <div class="row gx-0 gx-md-2 mb-6">
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Current Employment
                                        Status</label>

                                    <div class="col-lg-8">
                                        <select name="present_employment_status" id="present-employment-status"
                                            class="form-select form-control form-control-solid mb-3">
                                            <option value="Employed">Employed</option>
                                            <option value="Self-Employed / Freelancer">Self-Employed / Freelancer
                                            </option>
                                            <option value="Unemployed" selected>Unemployed</option>
                                            <option value="0">Others</option>
                                        </select>
                                        <input type="text" name="other_present_employment_status"
                                            id="other-present-employment-status"
                                            class="form-control form-control-lg form-control-solid"
                                            placeholder="Other: " style="display: none;">
                                    </div>
                                </div>

                                <div class="row gx-0 gx-md-2 mb-6">
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Work Experience(s)</label>

                                    <div class="col-lg-8">
                                        <ul class="text-blue fs-5 " id="work-experience-list">
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
                        </div>
                        <div class="text-center">
                            <a href="<?=base_url()?>/logout" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-blue"><i class="fas fa-check text-white"></i> Submit
                                Information</button>
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
        const cropper_modal = bootstrap.Modal.getOrCreateInstance(document.querySelector(
            "#my-profile-photo-crop-modal"))
        let cropper, uploaded_filename;

        $("#province").change(function () {
            $.ajax({
                type: "get",
                url: "<?=base_url()?>/UtilController/getCityMun/" + this.value,
                success: function (response) {
                    $("#city").html(
                            `<option value="" selected disabled>City/Municipality</option>`)
                        .removeAttr("disabled");
                    $("#brgy-id").html(
                        `<option value="" selected disabled>Barangay</option>`).attr(
                        "disabled", "");
                    const result = JSON.parse(response)
                    result.forEach(res => {
                        $("#city").append(
                            `<option value="${res.citymunCode}">${titleCase(res.citymunDesc)}</option>`
                            )
                    });
                }
            });
        })

        $("#city").change(function () {
            $.ajax({
                type: "get",
                url: "<?=base_url()?>/UtilController/getBarangay/" + this.value,
                success: function (response) {
                    $("#brgy-id").html(
                            `<option value="" selected disabled>Barangay</option>`)
                        .removeAttr("disabled");
                    const result = JSON.parse(response)
                    result.forEach(res => {
                        $("#brgy-id").append(
                            `<option value="${res.id}">${titleCase(res.brgyDesc)}</option>`
                            )
                    });
                }
            });
        })

        $("#educational-attainment").change(function () {
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

        $("#user-profile-form").submit(function (e) {
            e.preventDefault();
            loading(true)

            $("#file-name").val($("#user-photo-preview")[0].dataset.photoName ? $(
                "#user-photo-preview")[0].dataset.photoName : "");
            let data = {}
            $(this).serializeArray().forEach(field => {
                data[field.name] = field.value
            });

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
            $.ajax({
                type: "POST",
                url: "<?=base_url()?>/users/addPublicUserInfo",
                data: data,
                success: function (response) {
                    $.post(base_url + '/UtilController/moveUserAvatar/' + uploaded_filename)
                        .done(function () {
                            loading(false)
                            Swal.fire({
                                icon: 'success',
                                title: "Account Successfully Created",
                                showConfirmButton: false,
                                timer: 3000
                            }).then((result) => {
                                location.reload();
                            })
                        }).fail(function () {
                            loading(false)
                            Swal.fire({
                                icon: 'success',
                                title: "Account Successfully Created",
                                showConfirmButton: false,
                                timer: 3000
                            }).then((result) => {
                                location.reload();
                            })
                        })
                }
            })
        });

        $("#user-photo").on("change", function () {
            const image = document.querySelector("#my-profile-photo-crop-image");
            const [file] = this.files
            if (file.size / 1024 / 1024 < 5) {
                if (file) {
                    image.src = URL.createObjectURL(file)
                }

                cropper = new Cropper(image, {
                    aspectRatio: 1 / 1,
                    dragMode: "move",
                    viewMode: 1,
                    background: false,
                    minContainerWidth: 450,
                    minContainerHeight: 420,
                    cropBoxMovable: false,
                    cropBoxResizable: false,
                });
                cropper.reset()
                cropper_modal.show();
            } else {
                Swal.fire({
                    icon: 'error',
                    title: "File size must not exceed 5Mb",
                    showConfirmButton: false,
                    timer: 3000
                })
            }
        })

        document.querySelector("#my-profile-photo-crop-modal").addEventListener('hidden.bs.modal', event => {
            if (cropper) {
                cropper.destroy()
            }
        })

        $("#my-profile-photo-crop-modal #crop-button").click(function () {
            const cropped_image = cropper.getCroppedCanvas().toDataURL('image/jpeg');
            loading(true)
            $.ajax({
                type: "POST",
                url: base_url + '/UtilController/uploadUserAvatar/' + user_id,
                data: {
                    'dataURL': cropped_image
                },
                success: (data) => {
                    if (data) {
                        console.log(data)
                        $("#user-photo-preview").attr("data-photo-name", data)
                        uploaded_filename = data;
                        $(".user-avatar").attr("src", base_url +
                            "/public/assets/media/avatars/temp/" + data)
                        cropper_modal.hide();
                        loading(false)
                    } else {
                        loading(false)
                        Swal.fire({
                            icon: 'error',
                            title: "Image not uploaded",
                            showConfirmButton: false,
                            timer: 3000
                        })
                    }
                },
            });
        })
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