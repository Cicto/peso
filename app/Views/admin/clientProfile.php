<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title"><?= $title ?></h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                    <li class="breadcrumb-item active"><?= $title ?></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-4 col-xl-4">
        <div class="card text-center">
            <div class="card-body">
                <img src="<?= base_url()?>/public/assets/images/users/avatar-1.jpg" class="rounded-circle avatar-xl img-thumbnail" alt="profile-image">

                <h4 class="mt-3 mb-0"><?= ($userCompleteInformation != FALSE) ? $userCompleteInformation->firstname.' '.$userCompleteInformation->lastname : ''?></h4>
                <p class="text-muted">@<?= $userAccountInfo->username ?></p>

                <!-- <button type="button" class="btn btn-success btn-xs waves-effect mb-2 waves-light">Follow</button>
                <button type="button" class="btn btn-danger btn-xs waves-effect mb-2 waves-light">Message</button> -->

                <div class="text-start mt-3">
                    <h4 class="font-13 text-uppercase">Basic Information :</h4>
                    <!-- <p class="text-muted font-13 mb-3">
                        Hi I'm Johnathn Deo,has been the industry's standard dummy text ever since the
                        1500s, when an unknown printer took a galley of type.
                    </p> -->

                    <div class="table-responsive">
                        <table class="table table-borderless table-sm">
                            <tbody>
                                <tr>
                                    <th scope="row">Full Name :</th>
                                    <td class="text-muted"><?= ($userCompleteInformation != FALSE) ? $userCompleteInformation->firstname.' '.$userCompleteInformation->lastname : ''?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Mobile :</th>
                                    <td class="text-muted"><?= ($userCompleteInformation != FALSE) ? $userCompleteInformation->contact_no : ''?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Email :</th>
                                    <td class="text-muted"><?= ($userAccountInfo != FALSE) ? $userAccountInfo->email : ''?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Gender :</th>
                                    <td class="text-muted"><?= ($userCompleteInformation != FALSE) ? ucfirst($userCompleteInformation->gender) : ''?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- <ul class="social-list list-inline mb-0">
                    <li class="list-inline-item">
                        <a href="javascript: void(0);" class="social-list-item border-purple text-purple"><i class="mdi mdi-facebook"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="mdi mdi-twitter"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="mdi mdi-github"></i></a>
                    </li>
                </ul> -->
            </div>
        </div> <!-- end card-box -->


    </div> <!-- end col-->

    <div class="col-lg-8 col-xl-8">
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-pills navtab-bg">
                    <li class="nav-item ">
                        <a href="#about-me" data-bs-toggle="tab" aria-expanded="true" class="nav-link ms-0 active">
                            <i class="ri-file-paper-line me-1"></i>Upload History
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#settings" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                            <i class="ri-user-line me-1"></i>Profile Details
                        </a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane show active" id="about-me">

                        <h5 class="mb-4 text-uppercase">Upload History (Last 10 uploads)</h5>

                        <ul class="list-unstyled timeline-sm">
                            <?php if($uploads != FALSE):?>
                                <?php foreach($uploads as $file):?>
                                    <li class="timeline-sm-item">
                                        <span class="timeline-sm-date"><?= date_format(date_create($file->created_at), 'M d, Y')?></span>
                                        <h5 class="mt-0 mb-1">Uploaded: <?= $file->filename?></h5>
                                        <p><?= date_format(date_create($file->created_at), 'h:i:s A')?></p>
                                    </li>
                                <?php endforeach;?>
                            <?php else:?>
                                <li class="timeline-sm-item">
                                    <span class="timeline-sm-date">00:00</span>
                                    <h5 class="mt-0 mb-1">No uploadeds yet</h5>
                                    <p>00:00</p>
                                </li>
                            <?php endif;?>
                        </ul>

                        <h5 class="mb-3 mt-5 text-uppercase">File Manager</h5>
                        <div class="table-responsive">
                            <table class="table table-borderless table-sm table-nowrap mb-0" id = "files-table">
                                <thead class="table-light">
                                    <tr>
                                        <th>Requirement Name</th>
                                        <th>Filename</th>
                                        <th>Date Uploaded</th>
                                        <th>Action</th>
                                    </tr>
                                    <tr>
                                        <th class="filterhead"></th>
                                        <th class="filterhead"></th>
                                        <th class="filterhead"></th>
                                        <th class="filterhead"></th>
                                    </tr>
                                </thead>
                            </table>
                        </div>

                    </div>
                    <!-- end timeline content-->

                    <div class="tab-pane" id="settings">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingPersonalInfo">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePersonalInfo" aria-expanded="true" aria-controls="collapsePersonalInfo">
                                        <i class="mdi mdi-account-circle text-primary me-1"></i>Personal Details
                                    </button>
                                </h2>
                                <div id="collapsePersonalInfo" class="accordion-collapse collapse show" aria-labelledby="headingPersonalInfo" data-bs-parent="#accordionExample" style="">
                                    <div class="accordion-body">
                                    <form id = "personal-details-form" role="form" class="needs-validation user-form" method = "POST" novalidate>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="mb-2">
                                                    <label for="firstname" class="form-label">First Name</label>
                                                    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter first name" value="<?= ($userCompleteInformation != FALSE) ? $userCompleteInformation->firstname : ''?>" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-2">
                                                    <label for="lastname" class="form-label">Middle Name</label>
                                                    <input type="text" class="form-control" id="middlename" name="middlename" placeholder="Enter Middle name" value="<?= ($userCompleteInformation != FALSE) ? $userCompleteInformation->middlename : ''?>" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-2">
                                                    <label for="lastname" class="form-label">Last Name</label>
                                                    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter last name" value="<?= ($userCompleteInformation != FALSE) ? $userCompleteInformation->lastname : ''?>" required>
                                                </div>
                                            </div>
                                        </div> <!-- end row -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-2">
                                                    <label for="street" class="form-label">House No. & Street</label>
                                                    <input type="text" class="form-control" id="street" name="street" placeholder="Enter Street" value="<?= ($userCompleteInformation != FALSE) ? $userCompleteInformation->street : ''?>" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="mb-2">
                                                    <label for="province" class="form-label">Province</label>
                                                    <input type="text" class="form-control" id="province" name="province" placeholder="Enter Province" value="<?= ($userCompleteInformation != FALSE) ? $userCompleteInformation->province : ''?>" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="mb-2">
                                                    <label for="city" class="form-label">City/Municipality</label>
                                                    <input type="text" class="form-control" id="city" name="city" placeholder="Enter City/Municipality" value="<?= ($userCompleteInformation != FALSE) ? $userCompleteInformation->city : ''?>" required>
                                                </div>
                                            </div>
                                        </div> <!-- end row -->
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="mb-2">
                                                    <label for="username" class="form-label">Client ID No.</label>
                                                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" value="<?= $userAccountInfo->username?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="mb-2">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email" value="<?= $userAccountInfo->email?>" disabled>
                                                </div>
                                            </div>
                                        </div> <!-- end row -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-2">
                                                    <label for="contact_no" class="form-label">Contact Number</label>
                                                    <input type="text" class="form-control" id="contact_no" name="contact_no" placeholder="Contact Number" value="<?= ($userCompleteInformation != FALSE) ? $userCompleteInformation->contact_no : ''?>" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-2">
                                                    <label for="marital_status" class="form-label">Marital Status</label>
                                                    <input type="text" class="form-control" id="marital_status" name="marital_status" placeholder="Marital Status" value="<?= ($userCompleteInformation != FALSE) ? $userCompleteInformation->marital_status : ''?>" required>
                                                </div>
                                            </div>
                                        </div> <!-- end row -->
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="mb-4">
                                                    <label for="birthday" class="form-label">Birthday</label>
                                                    <input type="date" class="form-control" id="birthdate" name="birthdate" placeholder="Birthday" value="<?= ($userCompleteInformation != FALSE) ? $userCompleteInformation->birthdate : ''?>" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-2">
                                                    <label for="gender" class="form-label">Gender</label>
                                                    <?= $userCompleteInformation->firstname?>
                                                    <select name="gender" id="gender" class = "form-control" required>
                                                        <option selected disabled>Select Gender</option>
                                                        <option value="male" <?= ($userCompleteInformation != FALSE) ? ($userCompleteInformation->gender == 'male') ? 'selected' : '' : '';?>>Male</option>
                                                        <option value="female" <?= ($userCompleteInformation != FALSE) ? ($userCompleteInformation->gender == 'female') ? 'selected' : '' : '';?>>Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div> <!-- end row -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-2">
                                                    <?php 

                                                        $date = new DateTime(($userCompleteInformation != FALSE) ? $userCompleteInformation->birthdate : date('Y-m-d'));
                                                        $now = new DateTime();
                                                        $interval = $now->diff($date);
                                                    ?>
                                                    <label for="birthday" class="form-label">Age</label>
                                                    <input type="text" class="form-control" id="age" name="age" placeholder="Age" value="<?= ($userCompleteInformation != FALSE) ? $interval->y : 0?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-2">
                                                    <label for="passport_no" class="form-label">Passport number</label>
                                                    <input type="text" class="form-control" id="passport_no" name="passport_no" placeholder="Enter Passport number" value="<?= ($userCompleteInformation != FALSE) ? $userCompleteInformation->passport_no : ''?>" required>
                                                </div>
                                            </div>
                                        </div> <!-- end row -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-2">
                                                    <label for="issued_date" class="form-label">Issued Date</label>
                                                    <input type="date" class="form-control" id="issued_date" name="issued_date" placeholder="Enter Issued Date" value="<?= ($userCompleteInformation != FALSE) ? $userCompleteInformation->issued_date : ''?>" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-2">
                                                    <label for="expiration_date" class="form-label">Expiration Date</label>
                                                    <input type="date" class="form-control" id="expiration_date" name="expiration_date" placeholder="Enter Expiration Date" value="<?= ($userCompleteInformation != FALSE) ? $userCompleteInformation->expiration_date : ''?>" required>
                                                </div>
                                            </div>
                                        </div> <!-- end row -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-2">
                                                    <label for="issuing_authority" class="form-label">Issuing Authority</label>
                                                    <input type="text" class="form-control" id="issuing_authority" name="issuing_authority" placeholder="Enter Issuing Authority" value="<?= ($userCompleteInformation != FALSE) ? $userCompleteInformation->issuing_authority : ''?>" required>
                                                </div>
                                            </div>
                                        </div> <!-- end row -->
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Save</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFamily">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFamily" aria-expanded="false" aria-controls="collapseFamily">
                                        <i class="ri-team-line text-primary me-1"></i>Family Information
                                    </button>
                                </h2>
                                <div id="collapseFamily" class="accordion-collapse collapse" aria-labelledby="headingFamily" data-bs-parent="#accordionExample" style="">
                                    <div class="accordion-body">
                                    <form id = "family-details-form" role="form" class="needs-validation user-form" method = "POST" novalidate>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-2">
                                                    <label for="spouse_name" class="form-label">Name of Spouse</label>
                                                    <input type="text" class="form-control" id="spouse_name" name="spouse_name" placeholder="Enter Name of Spouse" value="<?= ($userCompleteInformation != FALSE) ? $userCompleteInformation->spouse_name : ''?>">
                                                </div>
                                            </div>
                                        </div> <!-- end row -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-2">
                                                    <label for="spouse_email" class="form-label">Email</label>
                                                    <input type="text" class="form-control" id="spouse_email" name="spouse_email" placeholder="Enter Email" value="<?= ($userCompleteInformation != FALSE) ? $userCompleteInformation->spouse_email : ''?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-4">
                                                    <label for="spouse_contact_no" class="form-label">Contact Number</label>
                                                    <input type="text" class="form-control" id="spouse_contact_no" name="spouse_contact_no" placeholder="Enter Contact Number" value="<?= ($userCompleteInformation != FALSE) ? $userCompleteInformation->spouse_contact_no : ''?>">
                                                </div>
                                            </div>
                                        </div> <!-- end row -->

                                        <div id = "child-update-status"></div>
                                        <table class = "table table-hover table-sm " id = "child-table">
                                            <thead class = "table-light">
                                                <th>Name of Children</th>
                                                <th>Employed or Student</th>
                                                <th>Birthday</th>
                                                <th></th>
                                            </thead>
                                            <tbody>

                                                <?php if($userChildInfo) : ?>
                                                    <?php foreach ($userChildInfo as $child) : ?>
                                                        <tr>
                                                            <td>
                                                                <input type="hidden" name="child_id[]" value = "<?= $child->child_id?>">
                                                                <input type="text" class="form-control" name="name_of_children[]" value = "<?= $child->child_name?>" required>
                                                            </td>
                                                            <td>
                                                                <select name="child_status[]" class="form-control" required>
                                                                    <option value="" disabled>Select Status</option>
                                                                    <option value="employed" <?= ($child->child_status == 'employed') ? 'selected': '';?>>Employed</option>
                                                                    <option value="student" <?= ($child->child_status == 'student') ? 'selected': '';?>>Student</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input type="date" class="form-control" name="birthday_of_children[]" value = "<?= $child->child_birthdate?>" required>
                                                            </td>
                                                            <td>
                                                                <button type="button" class="btn btn-outline-primary btn-xs remove-child"><span class="ri-close-line"></span></button>
                                                            </td>
                                                        </tr>

                                                    <?php endforeach ?>
                                                <?php endif; ?>


                                            </tbody>
                                        </table>
                                        <div class="text-end">
                                            <button type="button" id = "add-child" class="btn btn-outline-success waves-effect waves-light mt-2"><i class="ri-user-add-line"></i> Add Child</button>
                                            <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Save</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingEducation">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEducation" aria-expanded="false" aria-controls="collapseEducation">
                                        <i class="fas fa-graduation-cap text-primary me-1"></i>Educational History
                                    </button>
                                </h2>
                                <div id="collapseEducation" class="accordion-collapse collapse" aria-labelledby="headingEducationy" data-bs-parent="#accordionExample" style="">
                                    <div class="accordion-body">
                                    <form id = "education-details-form" role="form" class="needs-validation user-form" method = "POST" novalidate>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-2">
                                                    <label for="highest_education" class="form-label">Highest Edicational Attainment</label>
                                                    <select name="highest_education" id="highest_education" class = "form-control" required>
                                                        <option value="" <?= ($educationalAttainment['status'] == FALSE) ? '': 'selected'?> disabled>Select Educational Attainment</option>
                                                        <?php if($educationalAttainment['status']) : ?>
                                                            <?php foreach ($educationalAttainment['result'] as $ea) : ?>
                                                                <option value="<?= $ea->ea_id ?>" <?= ($userEducationInfo != FALSE) ? ($userEducationInfo->highest_education == $ea->ea_id) ? 'selected' : '' : ''?>><?= $ea->ea_description ?></option>
                                                            <?php endforeach ?>
                                                        <?php endif; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div> <!-- end row -->
                                        <div class="row">
                                            <div class="col-md-10">
                                                <div class="mb-2">
                                                    <label for="name_of_school" class="form-label">Name of School</label>
                                                    <input type="text" class="form-control" id="name_of_school" name="name_of_school" placeholder="Enter Name of School" value="<?= ($userEducationInfo != FALSE) ? $userEducationInfo->name_of_school : ''?>" required>
                                                </div>
                                            </div>
                                        </div> <!-- end row -->
                                        <div class="row">
                                            <div class="col-md-10">
                                                <div class="mb-2">
                                                    <label for="school_address" class="form-label">School Address</label>
                                                    <input type="text" class="form-control" id="school_address" name="school_address" placeholder="Enter School Address" value="<?= ($userEducationInfo != FALSE) ? $userEducationInfo->school_address : ''?>" required>
                                                </div>
                                            </div>
                                        </div> <!-- end row -->
                                        <div class="row">
                                            <div class="col-md-10">
                                                <div class="mb-2">
                                                    <label for="course" class="form-label">Course/Program</label>
                                                    <input type="text" class="form-control" id="course" name="course" placeholder="Enter Course/Program" value="<?= ($userEducationInfo != FALSE) ? $userEducationInfo->course : ''?>" required>
                                                </div>
                                            </div>
                                        </div> <!-- end row -->
                                        <div class="row">
                                            <div class="col-md-10">
                                                <div class="mb-2">
                                                    <label for="school_year" class="form-label">School Year:</label>
                                                    <input type="text" class="form-control" id="school_year" name="school_year" placeholder="Enter School Year" value="<?= ($userEducationInfo != FALSE) ? $userEducationInfo->school_year : ''?>" required>
                                                </div>
                                            </div>
                                        </div> <!-- end row -->
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Save</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingCareer">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCareer" aria-expanded="false" aria-controls="collapseCareer">
                                        <i class="ri-radio-button-line text-primary me-1"></i>Career History
                                    </button>
                                </h2>
                                <div id="collapseCareer" class="accordion-collapse collapse" aria-labelledby="headingCareer" data-bs-parent="#accordionExample" style="">
                                    <div class="accordion-body">
                                    <form id = "career-details-form" role="form" class="needs-validation user-form" method = "POST" novalidate>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-2">
                                                    <label for="recent_job_position" class="form-label">Most Recent Job Position</label>
                                                    <input type="text" class="form-control" id="recent_job_position" name="recent_job_position" placeholder="Enter Most Recent Job Position" value="<?= ($userCareerInfo != FALSE) ? $userCareerInfo->recent_job_position : ''?>" required>
                                                </div>
                                            </div>
                                        </div> <!-- end row -->
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="mb-2">
                                                    <label for="recent_company_name" class="form-label">Company Name</label>
                                                    <input type="text" class="form-control" id="recent_company_name" name="recent_company_name" placeholder="Enter Company Name" value="<?= ($userCareerInfo != FALSE) ? $userCareerInfo->recent_company_name : ''?>" required>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="mb-2">
                                                    <label for="recent_company_address" class="form-label">Company Address</label>
                                                    <input type="text" class="form-control" id="recent_company_address" name="recent_company_address" placeholder="Enter Company Address" value="<?= ($userCareerInfo != FALSE) ? $userCareerInfo->recent_company_address : ''?>" required>
                                                </div>
                                            </div>
                                        </div> <!-- end row -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-4">
                                                    <label for="recent_job_tenure" class="form-label">Job Tenure</label>
                                                    <input type="text" class="form-control" id="recent_job_tenure" name="recent_job_tenure" placeholder="Enter Job Tenure" value="<?= ($userCareerInfo != FALSE) ? $userCareerInfo->recent_job_tenure : ''?>" required>
                                                </div>
                                            </div>
                                        </div> <!-- end row -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-2">
                                                    <label for="most_job_position" class="form-label">Most Experience Job Position</label>
                                                    <input type="text" class="form-control" id="most_job_position" name="most_job_position" placeholder="Enter Most Recent Job Position" value="<?= ($userCareerInfo != FALSE) ? $userCareerInfo->most_job_position : ''?>" required>
                                                </div>
                                            </div>
                                        </div> <!-- end row -->
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="mb-2">
                                                    <label for="most_company_name" class="form-label">Company Name</label>
                                                    <input type="text" class="form-control" id="most_company_name" name="most_company_name" placeholder="Enter Company Name" value="<?= ($userCareerInfo != FALSE) ? $userCareerInfo->most_company_name : ''?>" required>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="mb-2">
                                                    <label for="most_company_address" class="form-label">Company Address</label>
                                                    <input type="text" class="form-control" id="most_company_address" name="most_company_address" placeholder="Enter Company Address" value="<?= ($userCareerInfo != FALSE) ? $userCareerInfo->most_company_address : ''?>" required>
                                                </div>
                                            </div>
                                        </div> <!-- end row -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-2">
                                                    <label for="most_job_tenure" class="form-label">Job Tenure</label>
                                                    <input type="text" class="form-control" id="most_job_tenure" name="most_job_tenure" placeholder="Enter Job Tenure" value="<?= ($userCareerInfo != FALSE) ? $userCareerInfo->most_job_tenure : ''?>" required>
                                                </div>
                                            </div>
                                        </div> <!-- end row -->
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Save</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTravel">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTravel" aria-expanded="false" aria-controls="collapseTravel">
                                        <i class="ri-send-plane-2-line text-primary me-1"></i>Travel History
                                    </button>
                                </h2>
                                <div id="collapseTravel" class="accordion-collapse collapse" aria-labelledby="headingTravel" data-bs-parent="#accordionExample" style="">
                                    <div class="accordion-body">
                                    <form id = "travel-details-form" role="form" class="needs-validation user-form" method = "POST" novalidate>
                                        <table class = "table table-hover table-sm" id = "country-table">
                                            <thead class = "table-light">
                                                <th>Country</th>
                                                <th>Purpose of Travel</th>
                                                <th>Month & Year</th>
                                                <th></th>
                                            </thead>
                                            <tbody>
                                                <?php if($userTravelInfo != FALSE) : ?>
                                                    <?php foreach ($userTravelInfo as $travelInfo) : ?>
                                                        <tr>
                                                            <td>
                                                            <input type="hidden" class="form-control" name="travel_id[]" value="<?= ($travelInfo != FALSE) ? $travelInfo->travel_id : ''?>">
                                                                <input type="text" class="form-control" name="country[]" placeholder="Enter Country" value="<?= ($travelInfo != FALSE) ? $travelInfo->country : ''?>" required>
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" name="travel_purpose[]" placeholder="Enter Purpose" value="<?= ($travelInfo != FALSE) ? $travelInfo->travel_purpose : ''?>" required>
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" name="month_year[]" placeholder="Enter Month - Year" value="<?= ($travelInfo != FALSE) ? $travelInfo->month_year : ''?>" required>
                                                            </td>
                                                            <td>
                                                                <button type = "button" id = "remove-travel-history" class = "btn btn-outline-primary btn-sm"><span class = "ri-close-line"></span></button>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach ?>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>

                                        <div class="text-end">
                                            <button type="button" id = "add-country" class="btn btn-outline-success waves-effect waves-light mt-2"><i class="ri-map-pin-add-line"></i> Add Country</button>
                                            <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Save</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end accordion -->
                    </div>
                </div> <!-- end tab-content -->
            </div>
        </div> <!-- end card-->

    </div> <!-- end col -->
</div>

<?= $this->endSection(); ?>

<?= $this->section('javascript'); ?>

<script src="<?= base_url()?>/public/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url()?>/public/assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="<?= base_url()?>/public/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url()?>/public/assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
<script src="<?= base_url()?>/public/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url()?>/public/assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
<script src="<?= base_url()?>/public/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url()?>/public/assets/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="<?= base_url()?>/public/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url()?>/public/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="<?= base_url()?>/public/assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>
<script src="<?= base_url()?>/public/assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="<?= base_url()?>/public/assets/libs/pdfmake/build/vfs_fonts.js"></script>

<script src="<?= base_url()?>/public/assets/js/admin/clientProfile.js"></script>
<?= $this->endSection(); ?>