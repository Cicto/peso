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

    @media only screen and (max-width: 600px) {

        .dataTables_length,
        .dataTables_filter {
            text-align: left !important;
        }
    }

    .view-profile *:hover a {
        text-decoration: underline;
    }

    #applicants-table .approved{
        background-color: var(--kt-success-light) !important;
        --bs-table-accent-bg: var(--kt-success-light) !important;
    }
    #applicants-table .approved > td:nth-child(1){
        border-left: 2px var(--kt-success) solid;
    }
    #applicants-table.table-hover > tbody > tr.approved:hover > * {
        background-color: #defded !important;
        --bs-table-accent-bg: #defded !important;
    }

    #applicants-table .declined{
        background-color: var(--kt-danger-light) !important;
        --bs-table-accent-bg: var(--kt-danger-light) !important;
    }
    #applicants-table.table-hover > tbody > tr.declined:hover > * {
        background-color: #ffe9f0 !important;
        --bs-table-accent-bg: #ffe9f0 !important;
    }
    #applicants-table .declined > td:nth-child(1){
        border-left: 2px var(--kt-danger) solid;
    }

    .applicant-checklist{
        background-color: white; 
    }

    #kt_app_toolbar{
        overflow: hidden !important;
    }
    .mx-1-5{
        margin-left:0.14rem !important;
        margin-right:0.14rem !important;
    }
</style>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
    <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0" data-bs-toggle="modal" data-bs-target="#applicant-emailing-modal"><?= $title ?>
            </h1>
            <ul class="breadcrumb fw-semibold fs-7 my-0 pt-1">
                <li class="breadcrumb-item text-muted">
                    <a href="<?=base_url()?>/jobs/applications" class="text-muted text-hover-primary">Job Applicants</a>
                </li>
                <li class="breadcrumb-item text-muted">
                    <a href="#" class="text-muted text-hover-primary"><?= $title ?></a>
                </li>
            </ul>
        </div>
        <div class="w-auto w-md-25 d-flex h-100 conclude-container position-relative">
            <div class="position-relative w-20px w-md-40px">
                <div class="position-absolute bg-dark-green top-0 w-100 h-100" style="margin: -1px;transform: rotateZ(180deg); clip-path: polygon(0% 0%, 100% 0%, 0% 100%);"></div>
                <div class="position-absolute bg-green bottom-0 w-100 h-100" style="transform: rotateZ(180deg); clip-path: polygon(0% 0%, 100% 100%, 0% 100%);"></div>
            </div>
            <div class="flex-grow-1 bg-green h-100 text-end d-flex align-items-center justify-content-end">
                <?php if($job_info->status==3):?>
                    <div class="concluded d-flex align-items-center text-nowrap border-0"><i class="fas fa-flag me-2 text-white" style="transform: rotate(-25deg);"></i> Job Post Concluded</div>
                <?php else:?>
                    <button type="button" class="conclude d-flex align-items-center text-nowrap" id="conclude-button"><i class="fas fa-flag me-2"></i> Conclude Job Post</button>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>

<div class="d-flex flex-column flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-fluid">
        <div class="card">
            <div class="card-body py-5">
                <div class="row">
                    <div class="col-12 col-md-9 col-7 ff-noir">
                        <div class="d-flex justify-content-between align-items-end w-100">
                            <h5 class="bg-blue d-inline-block text-white px-3 py-1 text-uppercase ff-noir text-truncate"><?=$job_info->job_category?></h5>
                            <div class="dropdown text-end d-block d-md-none">
                                <button class="btn pe-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fs-2 text-blue p-0"></i>
                                </button>
                                <ul class="dropdown-menu p-0 shadow-lg">
                                    <li class="m-2"><a href="<?=base_url()?>/jobs/post/17" target="_blank" class="btn btn-sm btn-blue w-100 me-2 text-truncate">View Job Post</a></li>
                                    <li class="m-2"><a href="<?=base_url()?>/jobs/edit_job_post/17" target="_blank" class="btn btn-sm btn-blue w-100">Edit Job Post</a></li>
                                </ul>
                            </div>
                        </div>
                        <h1 class="display-7 fw-bolder text-green text-uppercase text-decoration-underline"><?=$job_info->job_title?></h1>
                        <div class="company-name text-blue fs-4 text-uppercase fw-normal mb-0 text-truncate"><?=$job_info->company_name?></div>
                        <div class="d-flex">
                            <i class="fas fa-map-marker-alt text-blue fs-4 me-1 d-flex align-items-center"></i>
                            <div class="company-location text-blue fs-4 fw-normal text-uppercase text-truncate"><?=$job_info->company_address?></div>
                        </div>

                    </div>
                    <div class="col-12 col-md-3 col-5 d-flex flex-column justify-content-between">
                        <div class="dropdown text-end d-none d-md-block">
                            <button class="btn pe-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fs-2 text-blue p-0"></i>
                            </button>
                            <ul class="dropdown-menu p-0 shadow-lg">
                                <li class="m-2"><a href="<?=base_url()?>/jobs/post/17" target="_blank" class="btn btn-sm btn-blue w-100 me-2 text-truncate">View Job Post</a></li>
                                <li class="m-2"><a href="<?=base_url()?>/jobs/edit_job_post/17" target="_blank" class="btn btn-sm btn-blue w-100">Edit Job Post</a></li>
                            </ul>
                        </div>
                        <p class="border bg-light p-3 rounded text-blue ff-noir text-center m-0"><?=$job_info->candidates != 0 ? "Looking for <u> ".$job_info->candidates." candidate(s) </u>" : "No number of candidates specified"?> </p>
                    </div>
                </div>
                <div class="w-100 border-bottom-dashed my-5 border-1" style="border-color: var(--my-blue) ; border-width: 2px !important;"></div>
                <div class="d-flex justify-content-<?= $job_info->status==3 ? "between" : "end"?>">
                    <?php if($job_info->status==3):?>
                        <input type="checkbox" class="btn-check" id="approved-applicants" autocomplete="off">
                        <label class="btn btn-sm btn-light-danger border border-danger border-dashed me-2" for="approved-applicants"><i class="far fa-thumbs-down"></i> View Not Qualified</label><br>
                    <?php endif;?>

                    <div class="d-flex justify-content-end">
                        <?php if($job_info->status==3):?>
                        <button type="button" class="btn btn-sm btn-light-success border border-success me-2" id="email-applicants"><i class="fas fa-envelope"></i> Resend Email Notification</button>
                        <?php endif;?>
                        
                        <button type="button" class="btn btn-sm btn-success" id="accept-applicants" style="display: <?=$job_info->status == 3 ? "none" : "block" ?>;"><i class="fas fa-check text-white"></i> Set Applicant(s) as Qualified</button>
                        <button type="button" class="btn btn-sm btn-danger mx-2" id="decline-applicants" style="display: <?=$job_info->status == 3 ? "none" : "block" ?>;"><i class="fas fa-times"></i> Set Applicant(s) as Not Qualified</button>
                        
                        <?php if($job_info->status==3):?>
                        <input type="checkbox" id="edit-applicants" hidden>
                        <label class="btn btn-sm btn-primary me-2 text-nowrap" for="edit-applicants"><i class="fas fa-edit text-white"></i> Edit</label>
                        <?php endif;?>
    
                        <button type="button" class="btn btn-sm btn-info " id="export-applicants"><i class="fas fa-file-export"></i> Export Applicant(s) Info</button>
                    </div>
                </div>
                <table class="table table-info table-hover table-align-middle" id="applicants-table">
                    <thead>
                        <tr>
                            <th scope="col">
                                <div class="form-check ms-2">
                                    <input class="form-check-input" type="checkbox" value="" id="applicant-select-all" />
                                </div>
                            </th>
                            <th scope="col" class="text-nowrap">Applicant Name</th>
                            <th scope="col" class="text-nowrap">Age</th>
                            <th scope="col" class="text-nowrap">Contact Number</th>
                            <th scope="col" class="text-nowrap">Resume</th>
                            <?php if($job_info->status==3):?>
                                <th scope="col" class="text-nowrap w-20px">Emailed</th>
                                <th scope="col" class="text-nowrap" id="application-hire">Hire Status</th>
                            <?php endif;?>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" id="applicant-info-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Applicant Personal Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row m-0" id="applicant-personal-info-container" style="display: flex;">
                    <div class="col-12 col-md-3 border-end position-relative d-none d-md-block">
                        <div class="p-1 border bg-light rounded-3">
                            <img src="" alt="Applicant Photo" id="applicant-photo" class="img-fluid rounded-3 applicant-photo">
                        </div>
                        <div class="bg-light text-gray-800 border mt-3 rounded p-1">
                            Applied on: <span id="applicant-applied-on" class="d-block text-end applicant-applied-on"></span>
                        </div>

                        <div class="position-absolute bottom-0 end-0 theme-light-show">
                            <div class="p-1 bg-dark rounded-circle m-4 shadow"></div>
                            <div class="p-1 bg-dark rounded-circle m-4 shadow"></div>
                        </div>
                        <div class="position-absolute bottom-0 end-0 theme-dark-show">
                            <div class="p-1 bg-white rounded-circle m-4 shadow"></div>
                            <div class="p-1 bg-white rounded-circle m-4 shadow"></div>
                        </div>
                    </div>
                    <div class="col-12 col-md-9 row g-0 g-md-2 ps-0 ps-md-5">
                        <div class="d-flex align-items-start">
                            <div class="">
                                <div class="p-1 border bg-light rounded-3 w-100px me-2 d-block d-md-none">
                                    <img src="" alt="Applicant Photo" id="applicant-photo" class="img-fluid rounded-3 applicant-photo">
                                </div>
                            </div>
                            <div class="">
                                <h1 class="display-3 lh-1 border-start border-dark border-5">
                                    <span id="applicant-firstname"></span> <br>
                                    <span id="applicant-middlename"></span> <br>
                                    <span id="applicant-lastname"></span>
                                </h1>
                                <p class="m-0">
                                    <i class="far fa-envelope text-primary"></i>
                                    <a href="#" id="applicant-email" class="m-0"></a>
                                </p>
                                <p class="m-0">
                                    <i class="fas fa-phone-alt text-dark"></i> +63<span id="applicant-contact-number" class="m-0"></span>
                                </p>
                            </div>
                        </div>
                        <div class="separator separator-dashed my-5"></div>
                        <div class="row m-0">
                            <div class="col-4 mb-3 px-0">Birthdate</div>
                            <div class="col-1">:</div>
                            <div class="col-7 mb-3"><span id="applicant-birthdate"></span> <small><span id="applicant-age"></span> years old</small></div>

                            <div class="col-4 mb-3 px-0">Address</div>
                            <div class="col-1">:</div>
                            <div class="col-7 mb-3"><span id="applicant-address"></span></div>

                            <div class="col-4 mb-3 px-0">Educational Attainment</div>
                            <div class="col-1">:</div>
                            <div class="col-7 mb-3">
                                <div id="applicant-educational-attainment">
                                </div>
                            </div>
                        </div>
                        <div class="row m-0">
                            <div class="col-4 mb-3 px-0">Current Employment Status</div>
                            <div class="col-1">:</div>
                            <div class="col-7 mb-3"><span id="applicant-current-employment-status"></span></div>
                        </div>
                        <div class="row m-0" id="applicant-work-experience-container">
                            <div class="col-4 mb-3 px-0">Work Experience(s)</div>
                            <div class="col-1">:</div>
                            <div class="col-7 mb-3" id="applicant-work-experience"></div>
                        </div>
                        <div class="row m-0" id="applicant-preferred-occupation-container">
                            <div class="col-4 mb-3 px-0">Preferred Occupation</div>
                            <div class="col-1">:</div>
                            <div class="col-7 mb-3" id="applicant-preferred-occupation"></div>
                        </div>
                    </div>
                    <div class="d-block d-md-none p-0">
                        <button class="btn btn-dark mt-5 fw-bold w-100" id="applicant-resume-button">View Applicant Resume</button>
                    </div>
                </div>
                <div class="" id="applicant-resume-container" style="display: none;">
                    <div class="w-100 bg-light rounded border border-gray-300 p-1" id="pdfViewer-container">
                        <div class="d-flex justify-content-between mb-2">
                            <button type="button" class="btn btn-sm btn-dark" id="prev">Previous</button>
                            <button type="button" class="btn btn-sm btn-dark" id="next">Next</button>
                        </div>
                        <canvas id="pdfViewer" class="w-100"></canvas>
                    </div>
                    <div class="d-block d-md-none">
                        <button class="btn btn-dark mt-5 fw-bold w-100" id="applicant-personal-info-button">View Applicant Personal Information</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" id="applicant-emailing-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Sending Email to Applicants</h5>
      </div>
      <div class="modal-body">
        <?php foreach($applicants as $key => $applicant):?>
        <li class="list-group-item d-flex justify-content-between align-items-center approved" id="email-applicant-<?=$applicant->id?>">
            <div class="d-flex align-items-center">
                <div class="symbol symbol-50px">
                    <img src="<?=base_url()?>/public/assets/media/avatars/<?=$applicant->user_photo?>" alt=""/>
                </div>
                <div class="ms-2">
                    <h5 class="m-0"><?=$applicant->firstname?> <?=$applicant->middlename?> <?=$applicant->lastname?></h5>
                    <small class="text-primary"><?=$applicant->email?></small>
                </div>
            </div>
            <div class="applicant-badge">
                <span class="badge bg-primary rounded-pill"><i class="fas fa-circle-notch text-white spinning"></i></span>
            </div>
        </li>
        <?php endforeach;?>
      </div>
      <div class="modal-footer d-flex align-items-stretch">
        <div class="flex-grow-1 border border-primary rounded" style="overflow: hidden;">
            <div class="bg-primary h-100 text-white d-flex align-items-center justify-content-center" style="width: 0%; transition: 0.5s;" id="email-sent-progress">0%</div>
        </div>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="email-sent-done" disabled>Done</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" id="hired-applicant-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Set Qualified Applicant Status</h5>
      </div>
      <div class="modal-body">
            <form id="hire-form">
                <input type="number" name="id" id="hire-application-id" class="d-none">
                <select class="form-select mb-3" name="is_hired" aria-label="Default select example" id="hire-status">
                    <option selected value="0">Set Hire Status</option>
                    <option value="1">Not Hired</option>
                    <option value="2">Hired</option>
                </select>

                <div class="form-floating" id="not-hired-reason-container" style="display: none;">
                    <textarea class="form-control" placeholder="Leave a comment here" id="not-hired-reason" name="not_hired_reason" style="height: 100px"></textarea>
                    <label for="not_hired_reason" style="color:var(--kt-form-select-color);font-size: 1.1rem;font-weight: 500;line-height: 1.5;">Reason</label>
                </div>
                <input type="submit" value="submit" id="hire-form-submit" class="d-none">
            </form>
      </div>
      <div class="modal-footer">
        <label type="button" class="btn btn-primary" data-bs-dismiss="modal" for="hire-form-submit">Save</label>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('javascript'); ?>
<script src="<?= base_url()?>/public/assets/js/services/form-misc.js"></script>
<script src="<?= base_url()?>/public/assets/libs/pdfjs-3.5.141-dist/build/pdf.js"></script>
<script src="<?= base_url()?>/public/assets/libs/pdfjs-3.5.141-dist/build/pdf.worker.js"></script>

<script>
    let applicant_datatable, applicants_list = {}
    var pdfjsLib = window['pdfjs-dist/build/pdf'];
    var pdfDoc = null,
        pageNum = 1,
        pageRendering = false,
        pageNumPending = null,
        scale = 0.8,
        canvas = null,
        ctx = null;
    let resume_file = null
    var pdfData;
    var loadingTask;
    let pdfs;

    $(function () {
        canvas = document.getElementById('pdfViewer'),
        ctx = canvas.getContext('2d');
        pdfjsLib.GlobalWorkerOptions.workerSrc = '<?= base_url()?>/public/assets/libs/pdfjs-3.5.141-dist/build/pdf.worker.js';

        applicant_datatable = $("#applicants-table").DataTable({
            processing: true,
            serverSide: true,
            ajax: '<?=base_url()?>/jobs/applicantsDataTable/<?=$job_info->id?>/<?=$job_info->status==3 ? "1" : "0" ?>',
            columns: [
                {
                    data: "id",
                    render: function (data, display, row) {
                        return `
                        <div class="form-check ms-2">
                            <input class="form-check-input applicant-checklist" type="checkbox" value="" data-applicant-id="${data}"/>
                        </div>
                        `;
                    },
                    orderable: false,
                },
                {
                    data: "firstname",
                    className: "p-0 fw-bold",
                    render: function (data, display, row) {
                        return `
                            <div class="d-flex align-items-center view-profile me-3 pointer" data-applicant-id="${row.id}" data-toggle="0">
                                <div class="symbol symbol-40px me-2">                                                   
                                    <img src="<?=base_url()?>/public/assets/media/avatars/${row.user_photo}" class="m-1" alt="">                                                    
                                </div>
                                <a href="#" class="text-nowrap flex-grow-1 h-100 text-dark">${data} ${row.middlename} ${row.lastname}</a>
                            </div>
                        `;
                    }
                },
                {
                    data: "birthdate",
                    className: "text-nowrap",
                    render: function (data, display, row) {
                        return `${getAge(data)} yrs old`
                    }
                },
                {
                    data: "contact_number",
                    render: function (data, display, row) {
                        return `+63${data}`
                    }
                },
                {
                    data: "resume",
                    render: function (data, display, row) {
                        return `<a href="#" class="text-nowrap p-3 text-gray-800 view-profile bg-white border rounded " data-toggle="1" data-applicant-id="${row.id}"><i class="far fa-file text-gray-700"></i> ${data}</a>`;
                    }
                },
                <?php if($job_info->status==3):?>
                {
                    data: "is_emailed",
                    className: "text-center",
                    render: function (data, display, row) {
                        if(Number(data)){
                            return `<span class="badge bg-success rounded-pill"><i class="fas fa-check text-white"></i></span>`;
                        }
                        return `<span class="badge bg-danger rounded-pill"><i class="fas fa-times text-white mx-1-5"></i></span>`;
                    }
                },
                {
                    data: "is_hired",
                    className: "application-hire",
                    render: function (data, display, row) {
                        if(row.application_status == 1){
                            if(data==1){
                                return `
                                    <input type="checkbox" class="btn-check hire-applicant" id="hire-applicant-${row.id}" data-application-id="${row.id}" checked>
                                    <label class="btn btn-sm btn-light-danger border border-danger me-2 text-nowrap" for="hire-applicant-${row.id}">Not Hired</label><br>
                                `;
                            }else if(data==2){
                                return `
                                    <input type="checkbox" class="btn-check hire-applicant" id="hire-applicant-${row.id}" data-application-id="${row.id}" checked>
                                    <label class="btn btn-sm btn-light-success border border-success me-2 text-nowrap" for="hire-applicant-${row.id}">Hired</label><br>
                                `;
                            }
                            return `
                                <input type="checkbox" class="btn-check hire-applicant" id="hire-applicant-${row.id}" data-application-id="${row.id}">
                                <label class="btn btn-sm btn-light-secondary border border-secondary me-2 text-gray-700 text-nowrap" for="hire-applicant-${row.id}">Set Hire Status</label><br>
                            `;
                        }
                        return `
                            <input type="checkbox" class="btn-check" id="hire-applicant-${row.id}" data-application-id="${row.id}" autocomplete="off" disabled>
                            <label class="btn btn-sm btn-light-secondary border border-secondary me-2 text-gray-700 text-nowrap" for="hire-applicant-${row.id}">Not Hired</label><br>
                        `;
                    }
                },
                <?php endif;?>
            ],
            createdRow: function(row, data, dataIndex, cells){
                console.log(JSON.parse(htmlDecode(data.work_experience)))
                if(data.application_status == 1){
                    $(row).addClass("approved")
                }else if(data.application_status == 2){
                    $(row).addClass("declined")
                }
            },
            order: [
                [1, 'asc']
            ],
            scrollX: true
        }).on('xhr.dt', function (e, settings, json, xhr) {
            applicants_list = json.data
            console.log(applicants_list)
        })

        $("#applicant-select-all").change(function () {
            const is_checked = this.checked;
            $("#applicants-table").find(".applicant-checklist").each(function () {
                this.checked = is_checked
            })
        })

        $("#applicants-table").on("click", ".view-profile", function () {
            const applicant_modal = bootstrap.Modal.getOrCreateInstance('#applicant-info-modal');
            const applicant_id = this.dataset.applicantId
            const applicant_object = searchArrayById(applicants_list, applicant_id)
            const applicant = applicant_object
            console.log(applicants_list, applicant_id)

            $(".applicant-photo").attr("src", `<?=base_url()?>/public/assets/media/avatars/${applicant.user_photo}`)
            $("#applicant-firstname").html(`${applicant.firstname}`)
            $("#applicant-middlename").html(`${applicant.middlename}`)
            $("#applicant-lastname").html(`${applicant.lastname}`)
            $("#applicant-email").html(`${applicant.email}`)
            $("#applicant-contact-number").html(`${applicant.contact_number}`)
            $("#applicant-birthdate").html(`${mySQLDateToText(applicant.birthdate)}`)
            $("#applicant-age").html(`${getAge(applicant.birthdate)}`)
            $("#applicant-address").html(`${applicant.house_number} ${applicant.street_name} ${applicant.brgyDesc.ucwords()}, ${applicant.citymunDesc.ucwords()}, ${applicant.provDesc.ucwords()}`)
            $("#applicant-educational-attainment").html(setEducationalAttainment(
                [
                    {
                        name: "Elementary",
                        school_name: applicant.elementary_school_name,
                        year_graduated: applicant.elementary_year_graduated,
                        is_undergrad: Number(applicant.elementary_is_undergrad),
                        last_year_attended: applicant.elementary_last_year_attended,
                    },
                    {
                        name: "Secondary",
                        school_name: applicant.secondary_school_name,
                        year_graduated: applicant.secondary_year_graduated,
                        is_undergrad: Number(applicant.secondary_is_undergrad),
                        last_year_attended: applicant.secondary_last_year_attended,
                    },
                    {
                        name: "Tertiary",
                        school_name: applicant.tertiary_school_name,
                        year_graduated: applicant.tertiary_year_graduated,
                        is_undergrad: Number(applicant.tertiary_is_undergrad),
                        last_year_attended: applicant.tertiary_last_year_attended,
                        course: applicant.tertiary_course,
                    },
                    {
                        name: "Graduate Studies",
                        school_name: applicant.graduate_studies_school_name,
                        year_graduated: applicant.graduate_studies_year_graduated,
                        is_undergrad: Number(applicant.graduate_studies_is_undergrad),
                        last_year_attended: applicant.graduate_studies_last_year_attended,
                        course: applicant.graduate_studies_course,
                    }
                ]
            ))

            const applicant_work_experience = JSON.parse(htmlDecode(applicant.work_experience))
            let work_experience_list = '';
            if(applicant_work_experience.length){
                applicant_work_experience.forEach(work_experience => {
                    work_experience_list += `<li class="">
                                                <span class="text-dark work-experience">${work_experience.position}</span>
                                                <br>
                                                <small class="ps-1 text-dark">
                                                    <b class="text-blue"> - </b> ${work_experience["company name"]} (${work_experience.address})
                                                </small>
                                            </li>`
                });

                $("#applicant-work-experience").html(`
                    <ul class="text-blue ps-4">
                        ${work_experience_list}
                    </ul>
                `)
                $("#applicant-work-experience-container").show()
            }else{
                $("#applicant-work-experience-container").hide()
            }

            const applicant_preferred_occupation = JSON.parse(htmlDecode(applicant.preferred_occupation))
            let preferred_occupation_list = '';
            if(applicant_preferred_occupation.length){
                applicant_preferred_occupation.forEach(preferred_occupation => {
                    preferred_occupation_list += `<li class="">
                                                <span class="text-dark preferred-occupation">${preferred_occupation}</span>
                                            </li>`
                });

                $("#applicant-preferred-occupation").html(`
                    <ul class="text-blue ps-4">
                        ${preferred_occupation_list}
                    </ul>
                `)
                $("#applicant-preferred-occupation-container").show()
            }else{
                $("#applicant-preferred-occupation-container").hide()
            }
        
            $("#applicant-current-employment-status").html(`
            ${applicant.employment_status} <br>
            <small class="ps-1">
                <b class="text-blue"> - </b> ${applicant.employment_type}
            </small>`)
            $(".applicant-applied-on").html(`${mySQLDateTimeToText(applicant.created_at)}`)
            
            previewResume(applicant.resume)
            if(Number(this.dataset.toggle)){
                $("#applicant-personal-info-container").hide()
                $("#applicant-resume-container").show()
            }else{
                $("#applicant-personal-info-container").show()
                $("#applicant-resume-container").hide()
            }
            applicant_modal.show()
            console.log(applicant_object)
        })

        $("#applicants-table").on("click", ".hire-applicant", async function () {
            const hired_applicant_modal = bootstrap.Modal.getOrCreateInstance("#hired-applicant-modal")
            const applicant = searchArrayById(applicants_list, this.dataset.applicationId)
            $("#hire-application-id").val(this.dataset.applicationId)
            $("#hire-status").val(applicant.is_hired)
            $("#not-hired-reason-container").hide()
            $("#not-hired-reason").val("")
            if(applicant.is_hired == 1){
                console.log(applicant.not_hired_reason)
                $("#not-hired-reason").val(applicant.not_hired_reason)
                $("#not-hired-reason-container").show()

            }
            hired_applicant_modal.show()
        })

        $("#prev").click(function(){
            if(pageNum > 1){
                pageNum --;
                pdfs.getPage(pageNum).then(function(page) {
                    
                    var scale = 2;
                    var viewport = page.getViewport({scale: scale});
    
                    // Prepare canvas using PDF page dimensions
                    var canvas = $("#pdfViewer")[0];
                    var context = canvas.getContext('2d');
                    canvas.height = viewport.height;
                    canvas.width = viewport.width;
    
                    // Render PDF page into canvas context
                    var renderContext = {
                    canvasContext: context,
                    viewport: viewport
                    };
                    var renderTask = page.render(renderContext);
                    renderTask.promise.then(function () {
                    });
                })
            }
        })

        $("#next").click(function(){
            if(pageNum < pdfs.numPages){
                pageNum ++;
                pdfs.getPage(pageNum).then(function(page) {
                    
                    var scale = 2;
                    var viewport = page.getViewport({scale: scale});
    
                    // Prepare canvas using PDF page dimensions
                    var canvas = $("#pdfViewer")[0];
                    var context = canvas.getContext('2d');
                    canvas.height = viewport.height;
                    canvas.width = viewport.width;
    
                    // Render PDF page into canvas context
                    var renderContext = {
                    canvasContext: context,
                    viewport: viewport
                    };
                    var renderTask = page.render(renderContext);
                    renderTask.promise.then(function () {
                    });
                })
            }
        })

        $("#applicant-personal-info-button").click(function(){
            $("#applicant-personal-info-container").show()
            $("#applicant-resume-container").hide()
        })

        $("#applicant-resume-button").click(function(){
            $("#applicant-personal-info-container").hide()
            $("#applicant-resume-container").show()
        })

        $("#accept-applicants").click(function(){
            let applicants_id = {}
            $("#applicants-table").find("input.applicant-checklist").each(function (index, element) {
                if(this.checked){
                    applicants_id[index] = this.dataset.applicantId
                    this.checked = false
                }
            });
            $("#applicant-select-all")[0].checked = false
            if(Object.keys(applicants_id).length==0){
                return false;
            }
            AJAX({
                method: "POST",
                url: "<?=base_url()?>/jobs/approveApplicants/<?=$job_info->id?>",
                data: applicants_id,
                successAlert: true,
                success: function(data){
                    console.log(data)
                    reloadDataTable(applicant_datatable)
                }
            })
        })

        $("#decline-applicants").click(function(){
            let applicants_id = {}
            $("#applicants-table").find("input.applicant-checklist").each(function (index, element) {
                if(this.checked){
                    applicants_id[index] = this.dataset.applicantId
                    this.checked = false
                }
            });
            $("#applicant-select-all")[0].checked = false
            if(Object.keys(applicants_id).length==0){
                return false;
            }
            AJAX({
                method: "POST",
                url: "<?=base_url()?>/jobs/declineApplicants/<?=$job_info->id?>",
                data: applicants_id,
                successAlert: true,
                success: function(data){
                    console.log(data)
                    reloadDataTable(applicant_datatable)
                }
            })
        })

        $("#export-applicants").click(function(){
            let applicants_id = []
            $("#applicants-table").find("input.applicant-checklist").each(function (index, element) {
                if(this.checked){
                    applicants_id.push(this.dataset.applicantId)
                    this.checked = false
                }
            });
            $("#applicant-select-all")[0].checked = false
            if(Object.keys(applicants_id).length==0){
                return false;
            }

            window.open(`<?=base_url()?>/users/export_applicants/${applicants_id.join("/")}`); 
        })

        $("#conclude-button").click(function(){
            const application_ids = [
            <?php foreach ($applicants as $key => $applicant) {
                echo $applicant->id . ", ";
            }?>
            ]
            askConfirmation(function(){
                AJAX({
                    method: "POST",
                    url: `<?=base_url()?>/jobs/updateJobStatus/<?=$job_info->id?>/3`,
                    warningAlert: true,
                    success: function(data){
                        console.log(data)
                        if(isJsonString(data)){
                            data = JSON.parse(data)
                            if(data.status){
                                const applicant_modal = bootstrap.Modal.getOrCreateInstance('#applicant-emailing-modal');
                                // window.open(`<?=base_url()?>/jobs/email_applicants/<?=$job_info->id?>`); 
                                applicant_modal.show()
                                sendEmails(application_ids)
                                console.log(data)
                                
                            }
                        }
                    }
                })
            }, "Conclude Job Post", "Are your sure to conclude this job post? This means that you may not be able to approve / decline applications and this job post will not be posted and seen by future applicants.")
        })

        $("#email-sent-done").click(function(){
            location.reload();
        })

        $("#edit-applicants").change(function(){
            if(this.checked){
                $("#accept-applicants").show()
                $("#decline-applicants").show()
                $(this).next("label").html(`<i class="fas fa-check"></i> Done`).removeClass("btn-primary").addClass("btn-light-primary border border-primary")
            }else{
                $("#accept-applicants").hide()
                $("#decline-applicants").hide()
                $(this).next("label").html(`<i class="fas fa-edit"></i> Edit`).removeClass("btn-light-primary border border-primary").addClass("btn-primary")
            }
        })

        $("#email-applicants").click(async function(){
            let application_ids = []
            await $("#applicants-table").find("input.applicant-checklist").each(function (index, element) {
                if(this.checked){
                    application_ids.push(this.dataset.applicantId)
                    this.checked = false
                }
            });
            $("#applicant-select-all")[0].checked = false
            if(application_ids.length==0){
                return false;
            }
            const applicant_modal = bootstrap.Modal.getOrCreateInstance('#applicant-emailing-modal');
            applicant_modal.show()
            sendEmails(application_ids)
        })

        $("#approved-applicants").change(function (e) { 
            const application_status = this.checked ? "2" : "1";
            if(!this.checked){
                $("label[for='approved-applicants']").addClass("btn-light-danger border-danger").removeClass("btn-light-success border-success").html(
                    `<i class="far fa-thumbs-down"></i> View Not Qualified</label>`
                )
            }else{
                $("label[for='approved-applicants']").addClass("btn-light-success border-success").removeClass("btn-light-danger border-danger").html(
                    `<i class="far fa-thumbs-up"></i> View Qualified</label>`
                )
            }
            reloadDataTable(applicant_datatable, `<?=base_url()?>/jobs/applicantsDataTable/<?=$job_info->id?>/${application_status}`);

        });

        $("#hire-status").change(function(){
            $("#not-hired-reason-container").hide()
            if(this.value == 1){
                $("#not-hired-reason-container").show()
            }else{
                $("#not-hired-reason").val("")
            }
        })
        
        $("#hire-form").submit(function (e) { 
            e.preventDefault();
            console.table($(this).serializeArray())
            AJAX({
                method: "POST",
                url: "<?=base_url()?>/jobs/updateHiredApplicant",
                data: $(this).serialize(),
                successAlert: true,
                warningAlert: true,
                success: function(data){
                    reloadDataTable(applicant_datatable)
                }
            })
        });
    });

    function previewResume(resume_name){
        $("#resume-upload-label").hide()
        $("#pdfViewer-container").show()

        // If absolute URL from the remote server is provided, configure the CORS
        // header on that server.
        var url = '<?=base_url()?>/public/assets/files/resumes/'+resume_name;

        // Asynchronous download of PDF
        loadingTask = pdfjsLib.getDocument(url);
        loadingTask.promise.then(function(pdf) {
            console.log('PDF loaded');
            
            // Fetch the first page
            pageNum = 1
            pdfs = pdf;
            pdf.getPage(pageNum).then(function(page) {
                console.log('Page loaded');
                
                var scale = 2;
                var viewport = page.getViewport({scale: scale});

                // Prepare canvas using PDF page dimensions
                var canvas = document.getElementById('pdfViewer');
                var context = canvas.getContext('2d');
                canvas.height = viewport.height;
                canvas.width = viewport.width;

                // Render PDF page into canvas context
                var renderContext = {
                canvasContext: context,
                viewport: viewport
                };
                var renderTask = page.render(renderContext);
                renderTask.promise.then(function () {
                console.log('Page rendered');
                });
            });
        }, function (reason) {
            // PDF loading error
            console.error(reason);
        });
    }

    async function sendEmails(application_ids){
        let finished_count = 0;

        await application_ids.forEach(async function(applicant){
            await AJAX({
                method: "POST",
                url: `<?=base_url()?>/jobs/sendApplicantEmails/${applicant}`,
                loader: false,
                success: function(data){
                    if(isJsonString(data)){
                        const response = JSON.parse(data)
                        if(response.status){
                            $(`#email-applicant-${applicant}`).find('.applicant-badge').html(`<span class="badge bg-success rounded-pill"><i class="fas fa-check text-white"></i></span>`)
                            return true;
                        }
                    }
                    $(`#email-applicant-${applicant}`).find('.applicant-badge').html(`<span class="badge bg-danger rounded-pill"><i class="fas fa-times text-white mx-1-5"></i></span>`)
                    return false;
                }
            })
            finished_count++;
            $("#email-sent-progress").css("width", `${(finished_count/application_ids.length)*100}%`).html(`${Math.round((finished_count/application_ids.length)*100)}%`)
            console.log("finished")
            if(finished_count>=application_ids.length){
                $("#email-sent-done").removeAttr("disabled");
                console.log("finished all")
            }
        });
    }

    function setEducationalAttainment(educational_attainment){
        console.log(educational_attainment)
        let counter = 0;
        let educational_attainment_element = $('<div></div>');
        for (let index = educational_attainment.length-1; index >= 0; index--) {
            const education = educational_attainment[index];
            if(education.school_name){
                counter++;
                educational_attainment_element.prepend(`
                <p>
                    ${education.name} :
                    <span class="d-block text-center lh-sm">${education.school_name} ${education.course ? `<br> <small>${education.course}</small>`:''}  <br> <small>${education.is_undergrad ? "UnderGraduate" : "Graduated"} S.Y. ${education.is_undergrad ? education.last_year_attended : education.year_graduated }</small></span>
                </p>`)
            }
            if(counter >= 2){
                index = -1;
            }
        }
        return educational_attainment_element;
    }
</script>
<?= $this->endSection(); ?>