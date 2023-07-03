<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
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

<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
    <!--begin::Toolbar container-->
    <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0"><?= $title ?></h1>
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                <li class="breadcrumb-item text-muted">
                    <a href="<?= base_url()?>" class="text-muted text-hover-primary">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-muted"><?= $title ?></li>
            </ul>
        </div>
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <!-- <button type="button" id = "add-user-btn" class="btn btn-primary btn-sm waves-effect waves-light float-right"><span class = "ri-user-add-line"></span> Add User</button> -->
        </div>
    </div>
</div>

<div class="d-flex flex-column flex-column-fluid">
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-body">

                        <div class = "btn-actions-container">
                            
                        </div>

                        <!-- <h5 class="card-title">Special title treatment</h5> -->
                        <div class = "table-responsive">

                            <table class = "table table-row-dashed table-hover align-middle gs-0 gy-3 my-0" id = "data-table" style = "width: 100%">
                                <thead>
                                    <tr>
                                        <th class="fw-bold">Full Name</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Contact Number</th>
                                        <th>Status</th>
                                    </tr>
                                    <tr>
                                        <th class="filterhead"></th>
                                        <th class="filterhead"></th>
                                        <th class="filterhead"></th>
                                        <th class="filterhead"></th>
                                        <th class=""></th>
                                    </tr>
                                </thead>

                            </table>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" id="public-user-info-modal">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Public User Personal Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-0">
                <div class="row m-0" id="public-user-personal-info-container" style="display: flex;">
                    <div class="col-12 col-md-3 border-end position-relative d-none d-md-block ">
                        <div class="p-1 border bg-light rounded-3 mb-5">
                            <img src="" alt="Applicant Photo" id="public-user-photo" class="img-fluid rounded-3 public-user-photo">
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
                                    <img src="" alt="Applicant Photo" id="public-user-photo" class="img-fluid rounded-3 public-user-photo">
                                </div>
                            </div>
                            <div class="">
                                <h1 class="display-3 lh-1 border-start border-dark border-5">
                                    <span id="public-user-firstname"></span> <br>
                                    <span id="public-user-middlename"></span> <br>
                                    <span id="public-user-lastname"></span>
                                </h1>
                                <p class="m-0">
                                    <i class="far fa-envelope text-primary"></i>
                                    <a href="#" id="public-user-email" class="m-0"></a>
                                </p>
                                <p class="m-0">
                                    <i class="fas fa-phone-alt text-dark"></i> +63<span id="public-user-contact-number" class="m-0"></span>
                                </p>
                            </div>
                        </div>
                        <div class="separator separator-dashed my-5"></div>
                        <div class="row m-0">
                            <div class="col-4 mb-3 px-0">Birthdate</div>
                            <div class="col-1">:</div>
                            <div class="col-7 mb-3"><span id="public-user-birthdate"></span> <small><span id="public-user-age"></span> years old</small></div>

                            <div class="col-4 mb-3 px-0">Address</div>
                            <div class="col-1">:</div>
                            <div class="col-7 mb-3"><span id="public-user-address"></span></div>

                            <div class="col-4 mb-3 px-0">Educational Attainment</div>
                            <div class="col-1">:</div>
                            <div class="col-7 mb-3"><span id="public-user-educational-attainment"></span></div>
                        </div>
                        <div class="row m-0">
                            <div class="col-4 mb-3 px-0">Current Employment Status</div>
                            <div class="col-1">:</div>
                            <div class="col-7 mb-3"><span id="public-user-current-employment-status"></span></div>
                        </div>
                        <div class="row m-0" id="public-user-work-experience-container">
                            <div class="col-4 mb-3 px-0">Work Experience(s)</div>
                            <div class="col-1">:</div>
                            <div class="col-7 mb-3" id="public-user-work-experience"></div>
                        </div>
                        <div class="row m-0" id="public-user-preferred-occupation-container">
                            <div class="col-4 mb-3 px-0">Preferred Occupation</div>
                            <div class="col-1">:</div>
                            <div class="col-7 mb-3" id="public-user-preferred-occupation">
                            </div>
                        </div>
                    </div>
                    <div class="p-0 pt-3 bg-white border-top theme-light-show" style="position: sticky; bottom: 0;">
                        <button class="btn btn-dark my-2 fw-bold w-100 public-user-resume-button">View Public User Resume</button>
                        <button class="btn btn-dark mb-5 fw-bold w-100 public-user-application-history-button">View Public User Application History</button>
                    </div>
                    <div class="p-0 pt-3 border-top theme-dark-show" style="position: sticky; bottom: 0; background: #1e1e2d;">
                        <button class="btn btn-dark my-2 fw-bold w-100 public-user-resume-button">View Public User Resume</button>
                        <button class="btn btn-dark mb-5 fw-bold w-100 public-user-application-history-button">View Public User Application History</button>
                    </div>
                </div>
                
                <div class="" id="public-user-resume-container" style="display: none;">
                    <div class="w-100 bg-light rounded border border-gray-300 p-1" id="pdfViewer-container">
                        <div class="d-flex justify-content-between mb-2">
                            <button type="button" class="btn btn-sm btn-dark" id="prev">Previous</button>
                            <button type="button" class="btn btn-sm btn-dark" id="next">Next</button>
                        </div>
                        <canvas id="pdfViewer" class="w-100"></canvas>
                    </div>
                    <div class="p-0 pt-3 bg-white border-top theme-light-show" style="position: sticky; bottom: 0;">
                        <button class="btn btn-dark my-2 fw-bold w-100 public-user-personal-info-button">View Applicant Personal Information</button>
                        <button class="btn btn-dark mb-5 fw-bold w-100 public-user-application-history-button">View Public User Application History</button>
                    </div>
                    <div class="p-0 pt-3 border-top theme-dark-show" style="position: sticky; bottom: 0; background: #1e1e2d;">
                        <button class="btn btn-dark my-2 fw-bold w-100 public-user-personal-info-button">View Applicant Personal Information</button>
                        <button class="btn btn-dark mb-5 fw-bold w-100 public-user-application-history-button">View Public User Application History</button>
                    </div>
                </div>

                <div class="" id="public-user-application-history-container" style="display: none;">
                    <div class="row">
                        <div class="col-2 text-center">
                            <small class="border border-gray-400 text-gray-500 border-2 rounded fw-bold bg-light px-2">Current</small>
                        </div>
                    </div>
                    <div class="pb-3" id="application-history">
                        <div class="row ">
                            <div class="col-1 p-0 d-flex flex-column align-items-end">
                                <div class=" d-flex flex-column align-items-center h-100">
                                    <div class="border-start border-2 border-gray-400 flex-grow-1"></div>
                                    <i class="far fa-circle"></i>
                                    <div class="flex-grow-1"></div>
                                </div>
                            </div>
                            <div class="col-1 p-0 d-flex align-items-center">
                                <div class="w-100 border border-start border-gray-300"></div>
                            </div>
                            <div class="col-10 py-3">
                                <div class="p-3 border rounded bg-light">
                                    <div class="fw-bold text-gray-700 text-center">Created their account on <span id="public-user-created-at"> January 1, 2022</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-0 pt-3 bg-white border-top theme-light-show" style="position: sticky; bottom: 0;">
                        <button class="btn btn-dark my-2 fw-bold w-100 public-user-personal-info-button">View Applicant Personal Information</button>
                        <button class="btn btn-dark mb-5 fw-bold w-100 public-user-resume-button">View Public User Resume</button>
                    </div>
                    <div class="p-0 pt-3 border-top theme-dark-show" style="position: sticky; bottom: 0; background: #1e1e2d;">
                        <button class="btn btn-dark my-2 fw-bold w-100 public-user-personal-info-button">View Applicant Personal Information</button>
                        <button class="btn btn-dark mb-5 fw-bold w-100 public-user-resume-button">View Public User Resume</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="right-modal" class="modal fade" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl modal-right">
        <div class="modal-content">
            <div class="modal-header border-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                
                <form role="form" id="user-form" class="needs-validation user-form form fv-plugins-bootstrap5 fv-plugins-framework" method = "POST" novalidate>
                    
                    <div class="mb-13 text-center ">
                        <!--begin::Title-->
                        <h1 class="mb-3 modal-title">Set First Target</h1>
                        <!--end::Title-->
                        <!--begin::Description-->
                        <div class="text-muted fw-semibold fs-5 ">If you are experiencing problem, please contact
                        <a href="#" class="fw-bold link-primary">System Administrator</a>.</div>
                        <!--end::Description-->
                    </div>
                    
                    <div class="separator separator-dashed my-10"></div>
                    <div class="mb-8 text-left ">
                        <!--begin::Title-->
                        <h3 class="mb-3">Account Information</h3>
                    </div>
                    <input type="hidden" class="form-control form-control-sm" id="id" name = "id">
                    <div class="d-flex flex-column mb-5 fv-row fv-plugins-icon-container">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-1">
                            <span class="required">Email</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" aria-label="Specify a target name for future usage and reference" data-kt-initialized="1"></i>
                        </label>
                        <!--end::Label-->
                        <input type="email" class="form-control" placeholder="Enter Target Title" name="email" id = "email" value = "@baliwag.gov.ph">
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>

                    <div class="row mb-5">
                        <div class="col-8">
                            <label class="required fs-6 fw-semibold mb-1">Username</label>
                            <input type="username" class="form-control" placeholder="Enter Valid Username" name="username" id = "username">
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <div class="col-4">
                            <label class="required fs-6 fw-semibold mb-1">Role</label>
                            <select class="form-select" id="role" name = "role" aria-label="Floating label select example" required>
                                <option value = "" selected disabled>Select Role</option>

                                <?php foreach ($roles as $role) : ?>
                                    <option value="<?= $role->id ?>"><?= $role->name ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="separator separator-dashed my-10"></div>
                    <div class="mb-8 text-left ">
                        <!--begin::Title-->
                        <h3 class="mb-3">Personal Information</h3>
                    </div>
                    <div class="row mb-5">
                        <div class="col-4">
                            <label class="required fs-6 fw-semibold mb-2">Firstname</label>
                            <input type="text" class="form-control" id="firstname" name = "firstname" placeholder="Enter Firstname" required>
                                
                        </div>
                        <div class="col-4">
                            <label class="required fs-6 fw-semibold mb-2">Middlename</label>
                            <input type="text" class="form-control" id="middlename" name = "middlename" placeholder="Enter Middlename" required>
                                
                        </div>
                        <div class="col-4">
                            <label class="required fs-6 fw-semibold mb-2">Lastname</label>
                            <input type="text" class="form-control" id="lastname" name = "lastname" placeholder="Enter Lastname" required>
                            
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-7">
                            <label class="required fs-6 fw-semibold mb-2">Birthdate</label>
                            <input type="date" class="form-control " id="birthdate" name = "birthdate" placeholder="Enter Birthdate" required> 
                        </div>
                    </div>

                    
                    <div class="row mb-8 g-5" id = "other-buttons">
                        <div class="separator separator-dashed my-10"></div>
                        <div class="mb-3 text-left ">
                            <!--begin::Title-->
                            <h3 class="mb-3">Account Actions</h3>
                        </div>
                        <!-- <div class=" text-end" > -->
                            <div class="col-md-4 col-lg-4 col-xxl-4" id = "reset-password">
                                <label class="btn btn-outline btn-outline-dashed btn-active-light-primary border-success d-flex text-start p-6" data-kt-button="true">
                                    <span class="ms-5">
                                        <span class="fs-4 fw-bold mb-1 d-block">Reset Password</span>
                                        <span class="fw-semibold fs-7 text-gray-600">Account password will be set to default password.</span>
                                    </span>
                                </label>
                            </div>
                            <div class="col-md-4 col-lg-4 col-xxl-4 active-container" id = "user-status">
                                <label class="btn btn-outline btn-outline-dashed btn-active-light-primary border-gray-500 d-flex text-start p-6" data-kt-button="true">
                                    <span class="ms-5">
                                        <span class="fs-4 fw-bold mb-1 d-block" id = "user-status-text">Deactivate Account</span>
                                        <span class="fw-semibold fs-7 text-gray-600">Deactivate the current user account.</span>
                                    </span>
                                </label>
                            </div>
                            <div class="col-md-4 col-lg-4 col-xxl-4 ban-container" id="ban-user">
                                <label class="btn btn-outline btn-outline-dashed btn-active-light-primary border-danger d-flex text-start p-6" data-kt-button="true">
                                    <span class="ms-5">
                                        <span class="fs-4 fw-bold mb-1 d-block ban-text">Ban Account</span>
                                        <span class="fw-semibold fs-7 text-gray-600">Completely ban the user from the system.</span>
                                    </span>
                                </label>
                            </div>
                        <!-- </div> -->
                    </div>

                    <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed mb-9 px-5 py-2">
                        <!--begin::Icon-->
                        <!--begin::Svg Icon | path: icons/duotune/finance/fin008.svg-->
                        <!-- <span class="svg-icon svg-icon-2tx svg-icon-primary me-4">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.3" d="M3.20001 5.91897L16.9 3.01895C17.4 2.91895 18 3.219 18.1 3.819L19.2 9.01895L3.20001 5.91897Z" fill="currentColor"></path>
                                <path opacity="0.3" d="M13 13.9189C13 12.2189 14.3 10.9189 16 10.9189H21C21.6 10.9189 22 11.3189 22 11.9189V15.9189C22 16.5189 21.6 16.9189 21 16.9189H16C14.3 16.9189 13 15.6189 13 13.9189ZM16 12.4189C15.2 12.4189 14.5 13.1189 14.5 13.9189C14.5 14.7189 15.2 15.4189 16 15.4189C16.8 15.4189 17.5 14.7189 17.5 13.9189C17.5 13.1189 16.8 12.4189 16 12.4189Z" fill="currentColor"></path>
                                <path d="M13 13.9189C13 12.2189 14.3 10.9189 16 10.9189H21V7.91895C21 6.81895 20.1 5.91895 19 5.91895H3C2.4 5.91895 2 6.31895 2 6.91895V20.9189C2 21.5189 2.4 21.9189 3 21.9189H19C20.1 21.9189 21 21.0189 21 19.9189V16.9189H16C14.3 16.9189 13 15.6189 13 13.9189Z" fill="currentColor"></path>
                            </svg>
                        </span> -->
                        
                        <!--end::Svg Icon-->
                        <!--end::Icon-->
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-stack flex-grow-1">
                            <!--begin::Content-->
                            <div class="fw-semibold fs-7">
                                <h6 class="fw-bold"><i class="fas fa-exclamation-circle text-dark"></i> Reminders</h6>
                                <div class=" text-gray-700">Newly created accounts are using default password that is set by System Administrator.
                                </div>
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <div class="text-center">
                        <button type="reset" id="kt_modal_new_target_cancel" data-bs-dismiss="modal" class="btn btn-light me-3">Cancel</button>
                        <button type="submit" id = "" class="btn btn-primary form-btn">Submit</button>
                    </div>

                </form>
                <!-- <div class="text-right">

                    <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula.</p>
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
                </div> -->
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<?= $this->endSection(); ?>

<?= $this->section('javascript'); ?>
<script src="<?= base_url()?>/public/assets/libs/pdfjs-3.5.141-dist/build/pdf.js"></script>
<script src="<?= base_url()?>/public/assets/libs/pdfjs-3.5.141-dist/build/pdf.worker.js"></script>

<script>
    let datatable;
    let public_users_data = {};
    let public_user_id = 0;
    let pdfjsLib = window['pdfjs-dist/build/pdf'];
    let canvas;
    let ctx;
    $(function () {
        canvas = document.getElementById('pdfViewer'),
        ctx = canvas.getContext('2d');
        pdfjsLib.GlobalWorkerOptions.workerSrc = '<?= base_url()?>/public/assets/libs/pdfjs-3.5.141-dist/build/pdf.worker.js';

        dataTables = $('#data-table').DataTable({
            processing: true,
            serverSide: true,
            orderCellsTop: true,
            ajax: '<?=base_url()?>/users/getPublicUsersDataTable',
            createdRow: function (row, data, rowIndex) {
                $(row).attr('data-id', data['id']).addClass(`pointer`);
            },
            columns: [{
                    data: 'firstname',
                    className: 'text-nowrap public-user',
                    render: function (data, display, row) {
                        return  `<div class="symbol symbol-50px me-2">
                                    <img src = "${base_url}/public/assets/media/avatars/${row.user_photo?row.user_photo:'default-avatar.png'}" class="ms-5 me-8">
                                </div>
                            <b class="">${data} ${row.middlename} ${row.lastname}</b>`
                    }
                },
                {
                    data: 'username',
                    className: 'text-nowrap public-user'
                },
                {
                    data: 'email',
                    className: 'text-nowrap public-user'

                },
                {
                    data: 'contact_number',
                    className: 'text-nowrap public-user',
                    render: function(data, type, row){
                        return '0'+data
                    }
                },
                {
                    data: 'status',
                    className: "align-middle",
                    render: function(data, display, row){
                        let status = classes = "";
                        switch (data) {
                            case "banned":
                                status = "Banned"
                                classes = "badge-danger";
                                break;
                            default:
                                status = "Active"
                                classes = "badge-success";
                                break;
                        }
                        if(!Number(row.active)){
                            status = "Inactive"
                            classes = "badge-dark opacity-50";
                        }   
                        return `
                        <div class="d-flex align-items-center justify-content-between">
                            <div class=""></div>
                            <span class="badge badge-outline ${classes}">${status}</span>
                            <div class="dropdown">
                                <button type="button" class="btn" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <ul class="dropdown-menu p-2">
                                    <li>
                                        <button type="button" class=" small text-nowrap btn btn-sm w-100 my-1 btn-outline btn-outline-dashed btn-active-light-danger border-danger">
                                            Ban User
                                        </button>
                                    </li>
                                    <li>
                                        <button type="button" class=" small text-nowrap btn btn-sm w-100 my-1 btn-outline btn-outline-dashed btn-active-light-primary border-gray-500">
                                            Deactivate User
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        `;
                    },
                    className: "text-center"
                }
            ],
            initComplete: function (settings, json) {
                var indexColumn = 0;

                this.api().columns().every(function () {
                    var column = this;
                    var input = document.createElement("input");

                    $(input).attr('placeholder', 'Search')
                        .addClass('form-control form-control-sm')
                        .appendTo($('.filterhead:eq(' + indexColumn + ')').empty())
                        .on('keyup', function () {
                            column.search($(this).val(), false, false, true).draw();
                        });

                    indexColumn++;
                });
            }
        }).on('xhr.dt', function (e, settings, json, xhr) {
            public_users_data = json.data
        });

        // $("#data-table").on("click", ".public-user", function(){

        //     const public_user_info_modal = bootstrap.Modal.getOrCreateInstance('#public-user-info-modal');
        //     const id = $(this).closest("tr")[0].dataset.id;
        //     public_user_id = id;
        //     const public_user = searchArrayById(public_users_data, id)
        //     console.log(public_user)

        //     $(".public-user-photo").attr("src", `<?=base_url()?>/public/assets/media/avatars/${public_user.user_photo ? public_user.user_photo : "default-avatar.png"}`)
        //     $("#public-user-firstname").html(`${public_user.firstname}`)
        //     $("#public-user-middlename").html(`${public_user.middlename}`)
        //     $("#public-user-lastname").html(`${public_user.lastname}`)
        //     $("#public-user-email").html(`${public_user.email}`)
        //     $("#public-user-contact-number").html(`${public_user.contact_number}`)
        //     $("#public-user-birthdate").html(`${mySQLDateToText(public_user.birthdate)}`)
        //     $("#public-user-age").html(`${getAge(public_user.birthdate)}`)
        //     $("#public-user-address").html(`${public_user.house_number} ${public_user.street_name} ${public_user.brgyDesc.ucwords()}, ${public_user.citymunDesc.ucwords()}, ${public_user.provDesc.ucwords()}`)
        //     $("#public-user-sex").html(`${public_user.sex}`)
        //     $("#public-user-educational-attainment").html(`${public_user.educational_attainment}`)
        //     const public_user_course_program = JSON.parse(htmlDecode(public_user.course_program))
        //     let course_program_list = '';
        //     if(public_user_course_program.length){
        //         public_user_course_program.forEach(course_program => {
        //             course_program_list += `<li class="mb-3">
        //                                         <span class="text-dark course-program">${course_program}</span>
        //                                     </li>`
        //         });

        //         $("#public-user-course-program").html(`
        //             <ul class="text-blue ps-4">
        //                 ${course_program_list}
        //             </ul>
        //         `)
        //         $("#public-user-course-program-container").show()
        //     }else{
        //         $("#public-user-course-program-container").hide()
        //     }

        //     const public_user_work_experience = JSON.parse(htmlDecode(public_user.work_experience))
        //     let work_experience_list = '';
        //     if(public_user_work_experience.length){
        //         public_user_work_experience.forEach(work_experience => {
        //             work_experience_list += `<li class="mb-3">
        //                                         <span class="text-dark work-experience">${work_experience}</span>
        //                                     </li>`
        //         });

        //         $("#public-user-work-experience").html(`
        //             <ul class="text-blue ps-4">
        //                 ${work_experience_list}
        //             </ul>
        //         `)
        //         $("#public-user-work-experience-container").show()
        //     }else{
        //         $("#public-user-work-experience-container").hide()
        //     }
            
        //     if(public_user.with_drivers_license==0){
        //         $("#public-user-has-drivers-license-container").hide()
        //     }else{
        //         $("#public-user-has-drivers-license-container").show()
        //     }
        //     $("#public-user-current-employment-status").html(`${public_user.present_employment_status}`)
            
        //     previewResume(public_user.resume)

        //     $("#public-user-created-at").html(mySQLDateToText(public_user.created_at))

        //     $("#public-user-personal-info-container").show()
        //     $("#public-user-resume-container").hide()
        //     $("#public-user-application-history-container").hide()

        //     public_user_info_modal.show();
        // })

        $("#data-table").on("click", ".public-user", function () {
            const public_user_modal = bootstrap.Modal.getOrCreateInstance('#public-user-info-modal');
            const id = $(this).closest("tr")[0].dataset.id;
            public_user_id = id;
            const public_user_object = searchArrayById(public_users_data, id)
            const public_user = public_user_object

            $(".public-user-photo").attr("src", `<?=base_url()?>/public/assets/media/avatars/${public_user.user_photo ? public_user.user_photo : "default-avatar.png"}`)
            $("#public-user-firstname").html(`${public_user.firstname}`)
            $("#public-user-middlename").html(`${public_user.middlename}`)
            $("#public-user-lastname").html(`${public_user.lastname}`)
            $("#public-user-email").html(`${public_user.email}`)
            $("#public-user-contact-number").html(`${public_user.contact_number}`)
            $("#public-user-birthdate").html(`${mySQLDateToText(public_user.birthdate)}`)
            $("#public-user-age").html(`${getAge(public_user.birthdate)}`)
            $("#public-user-address").html(`${public_user.house_number} ${public_user.street_name} ${public_user.brgyDesc.ucwords()}, ${public_user.citymunDesc.ucwords()}, ${public_user.provDesc.ucwords()}`)
            $("#public-user-educational-attainment").html(setEducationalAttainment(
                [
                    {
                        name: "Elementary",
                        school_name: public_user.elementary_school_name,
                        year_graduated: public_user.elementary_year_graduated,
                        is_undergrad: Number(public_user.elementary_is_undergrad),
                        last_year_attended: public_user.elementary_last_year_attended,
                    },
                    {
                        name: "Secondary",
                        school_name: public_user.secondary_school_name,
                        year_graduated: public_user.secondary_year_graduated,
                        is_undergrad: Number(public_user.secondary_is_undergrad),
                        last_year_attended: public_user.secondary_last_year_attended,
                    },
                    {
                        name: "Tertiary",
                        school_name: public_user.tertiary_school_name,
                        year_graduated: public_user.tertiary_year_graduated,
                        is_undergrad: Number(public_user.tertiary_is_undergrad),
                        last_year_attended: public_user.tertiary_last_year_attended,
                        course: public_user.tertiary_course,
                    },
                    {
                        name: "Graduate Studies",
                        school_name: public_user.graduate_studies_school_name,
                        year_graduated: public_user.graduate_studies_year_graduated,
                        is_undergrad: Number(public_user.graduate_studies_is_undergrad),
                        last_year_attended: public_user.graduate_studies_last_year_attended,
                        course: public_user.graduate_studies_course,
                    }
                ]
            ))

            const applicant_work_experience = JSON.parse(htmlDecode(public_user.work_experience))
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

                $("#public-user-work-experience").html(`
                    <ul class="text-blue ps-4">
                        ${work_experience_list}
                    </ul>
                `)
                $("#public-user-work-experience-container").show()
            }else{
                $("#public-user-work-experience-container").hide()
            }

            const applicant_preferred_occupation = JSON.parse(htmlDecode(public_user.preferred_occupation))
            let preferred_occupation_list = '';
            if(applicant_preferred_occupation.length){
                applicant_preferred_occupation.forEach(preferred_occupation => {
                    preferred_occupation_list += `<li class="">
                                                <span class="text-dark preferred-occupation">${preferred_occupation}</span>
                                            </li>`
                });

                $("#public-user-preferred-occupation").html(`
                    <ul class="text-blue ps-4">
                        ${preferred_occupation_list}
                    </ul>
                `)
                $("#public-user-preferred-occupation-container").show()
            }else{
                $("#public-user-preferred-occupation-container").hide()
            }
        
            $("#public-user-current-employment-status").html(`
            ${public_user.employment_status} <br>
            <small class="ps-1">
                <b class="text-blue"> - </b> ${public_user.employment_type}
            </small>`)
            $(".public-user-applied-on").html(`${mySQLDateTimeToText(public_user.created_at)}`)
            
            previewResume(public_user.resume)
            if(Number(this.dataset.toggle)){
                $("#public-user-personal-info-container").hide()
                $("#public-user-resume-container").show()
            }else{
                $("#public-user-personal-info-container").show()
                $("#public-user-resume-container").hide()
            }
            
            $("#application-history").find(".history").remove();
            $("#public-user-created-at").html(mySQLDateToText(public_user.created_at))

            $("#public-user-personal-info-container").show()
            $("#public-user-resume-container").hide()
            $("#public-user-application-history-container").hide()
            public_user_modal.show()
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

        $(".public-user-personal-info-button").click(function(){
            $("#public-user-application-history-container").hide()
            $("#public-user-personal-info-container").show()
            $("#public-user-resume-container").hide()
        })

        $(".public-user-resume-button").click(function(){
            $("#public-user-personal-info-container").hide()
            $("#public-user-application-history-container").hide()
            $("#public-user-resume-container").show()
        })

        $(".public-user-application-history-button").click(async function(){
            
            AJAX({
                method: "GET",
                url: "<?=base_url()?>/jobs/getUserApplicationHistory/"+public_user_id,
                success: function(data){
                    if(isJsonString(data)){
                        const response = JSON.parse(data)
                        if(response.status){
                            $("#application-history").find(".history").remove()
                            const status = ["Pending", "Qualified", "Not Qualified", "Cancelled" 	]
                            const color = ["primary", "success", "danger", "secondary" 	]
                            response.result.forEach(application => {
                                $("#application-history").prepend(
                                    `<div class="row history">
                                        <div class="col-1 p-0 d-flex flex-column align-items-end">
                                            <div class=" d-flex flex-column align-items-center h-100">
                                                <div class="border-start border-2 border-gray-400 flex-grow-1"></div>
                                                <i class="far fa-circle"></i>
                                                <div class="border-start border-2 border-gray-400 flex-grow-1"></div>
                                            </div>
                                        </div>
                                        <div class="col-1 p-0 d-flex align-items-center">
                                            <div class="w-100 border border-start border-gray-300"></div>
                                        </div>
                                        <div class="col-10 py-3">
                                            <div class="p-3 border rounded d-flex">
                                                <div class="flex-grow-1">
                                                    <small class="fw-bold text-gray-700 ">Applied on ${mySQLDateTimeToText(application.created_at)}</small>
                                                    <div class="col-12 col-md-9 col-7 ff-noir" style="transform: scale(0.75); transform-origin: left;">
                                                        <h5 class="bg-blue d-inline-block text-white px-3 py-1 text-uppercase ff-noir text-truncate">${application.job_category}</h5>
                                                        <h1 class="display-7 fw-bolder text-green text-uppercase text-decoration-underline">${application.job_title}</h1>
                                                        <div class="company-name text-blue fs-4 text-uppercase fw-normal mb-0 text-truncate">${application.company_name}</div>
                                                        <div class="d-flex">
                                                            <i class="fas fa-map-marker-alt text-blue fs-4 me-1 d-flex align-items-center"></i>
                                                            <div class="company-location text-blue fs-4 fw-normal text-uppercase text-truncate">${application.company_address}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <small class="border border-${color[application.application_status]} bg-light-${color[application.application_status]} text-${color[application.application_status]} rounded p-2"> <i class="far fa-thumbs-${application.application_status == 1 ? "up":"down"} text-${color[application.application_status]}"></i> ${status[application.application_status]}</small>
                                                    
                                                    <div class="text-end mt-1 p-1 text-${color[application.application_status]}" style="display: ${ application.is_emailed == 0 ? "none" : "block" };">
                                                        <i class="fas fa-envelope text-${color[application.application_status]}"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>`
                                )
                            });
                        }
                    }
                } 
            })
            $("#public-user-personal-info-container").hide()
            $("#public-user-resume-container").hide()
            $("#public-user-application-history-container").show()
        })
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