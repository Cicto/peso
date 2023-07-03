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
    </style>
    <?= $this->endSection(); ?>

    <?= $this->section('content'); ?>
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0"><?= $title ?></h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="#" class="text-muted text-hover-primary"><?= $title ?></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-fluid">
            <div class="card">
                <div class="card-body py-5">
                    <form class="row gy-3" id="application-search-form">
                        <div class="col-md-3 offset-md-2">
                            <input type="text" class="form-control ff-noir text-green text-uppercase" placeholder="Job Title" name="job_title" id="job-title">
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control ff-noir text-blue text-uppercase" placeholder="Company Name" name="company_name" id="company-name">
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-success w-100"><i class="fas fa-search"></i> Search</button>
                        </div>
                    </form>
                    <table class="table table-info table-hover table-align-middle" id="jobs-applications-table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Applicants</th>
                            <th scope="col">Date Applied</th>
                            <th scope="col">Job Title</th>
                            <th scope="col">Company</th>
                            <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?= $this->endSection(); ?>

    <?= $this->section('javascript'); ?>
    <script>
        let job_applications_datatable;
        const status_colors = ["primary", "success", "danger", "muted"]

        $(function () {
            job_applications_datatable = $("#jobs-applications-table").DataTable({
                processing: true,
                serverSide: true,
                ajax: '<?=base_url()?>/jobs/jobApplicantsSearchDataTable/',
                columns : [
                    {
                        data: "id",
                        className: "text-center" 
                    },
                    {
                        data: "firstname",
                        render: function (data, display, row) {
                            return `
                                <div class="d-flex align-items-center view-profile me-3 pointer" data-applicant-id="${row.id}" data-toggle="0">
                                    <div class="symbol symbol-40px me-2">                                                   
                                        <img src="<?=base_url()?>/public/assets/media/avatars/${row.user_photo}" class="m-1" alt="">                                                    
                                    </div>
                                    <p class="text-nowrap flex-grow-1 h-100 text-dark m-0 lh-sm">${data} ${row.middlename} ${row.lastname} <br><small class="text-muted">${row.email}</small></p>
                                    
                                </div>
                            `;
                        }
                    },
                    {
                        data: "created_at",
                        render: function (data, display, row) {
                            return mySQLDateTimeToText(data)
                        }
                    },
                    {
                        data: "job_title",
                        render: function (data, display, row) {
                            return `<span class="ff-noir text-green fs-4">${data}</span>`
                        }
                        
                    },
                    {
                        data: "company_name",
                        render: function (data, display, row) {
                            return `<span class="text-blue ff-noir">${data}</span>
                            <br>
                            <small class="text-blue ff-noir opacity-75">
                                <i class="bi bi-geo-alt-fill text-blue"></i> ${row.company_address}
                            </small>`
                        }
                        
                    },
                    {
                        data: "job_posts_id",
                        render: function (data, display, row) {
                            return `<a href="<?=base_url()?>/jobs/applicants/${data}" class="btn btn-sm btn-success">View Application</a>`;
                        }
                    },
                ],
                createdRow: function( row, data, dataIndex ){
                    console.log($(row))
                    $(row).find("td").first().addClass( `mb-3 border-start border-3 border-${status_colors[data.application_status]} position-relative`);
                },
                order: [[2, 'desc']],
            })


            $("#application-search-form").submit(function (e) { 
                e.preventDefault();
                const job_title = $("#job-title").val() ? $("#job-title").val() : 0;
                const company_name = $("#company-name").val() ? $("#company-name").val() : 0;
                reloadDataTable(job_applications_datatable, `<?=base_url()?>/jobs/jobApplicantsSearchDataTable/${job_title}/${company_name}`)
            });
        });
    </script>
    <?= $this->endSection(); ?>