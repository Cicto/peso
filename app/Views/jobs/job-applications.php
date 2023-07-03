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

    #job-applications-table tr::before{
        content: " ";
        position: absolute;
        padding: 3px;
        width: 100%;
        bottom: 0;
        left: 0;
        background: white;
    }
</style>
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>


<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
    <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0"><?=$title?>
            </h1>
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                <li class="breadcrumb-item text-muted">
                    <a href="#" class="text-muted text-hover-primary">View Job Applications</a>
                </li>
            </ul>
        </div>
        <div class="d-flex align-items-center gap-2 gap-lg-3">
        </div>
    </div>
</div>

<div class="d-flex flex-column flex-column-fluid">
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">

            <div class="card">
                <div class="card-body">
                    <table id="job-applications-table" class="table gy-5">
                        <thead>
                            <tr class="fw-semibold fs-6 text-muted">
                                <th>Job Post</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="">
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
        const status_descriptions = ["Pending", "Qualified", "Not Qualified", "Cancelled"];
        const status_colors = ["primary", "success", "danger", "muted"]
        const status_icons = ["circle", "check", "times", "dash"]
        $(document).ready(function () {
            job_applications_datatable = $("#job-applications-table").DataTable({
                processing: true,
                serverSide: true,
                ajax: '<?=base_url()?>/jobs/appliedJobsDataTable',
                columns: [
                    {
                        data: 'job_title',
                        render: function(data, display, row){
                            return `
                            <div class="text-start ff-noir p-5 col-10">
                                <h6 class="bg-blue d-inline text-white px-3 py-1 text-uppercase">${row.job_category}</h6>
                                <h4 class="fw-bolder text-green text-uppercase fs-1 my-3 text-decoration-underline">${row.job_title}</h4>
                                <div class="company-name text-blue text-truncate fs-6 text-uppercase fw-normal mb-0">${row.company_name}</div>
                                <small class="company-location text-blue text-truncate mt-2 fs-6 fw-normal text-uppercase">
                                    <i class="fas fa-map-marker-alt text-blue fs-6"></i> 
                                    <span>${row.company_address}</span>
                                </small>
                            </div>
                            `;
                        },
                    },
                    {
                        data: 'application_status',
                        render: function(data, display, row){
                            return `
                                <div class="alert alert-${status_colors[data]} d-flex align-items-center p-3 px-5 mb-0">
                                    <i class="fas fa-${status_icons[data]} text-${status_colors[data]} me-4"></i>
                                    <h6 class="text-${status_colors[data]} text-nowrap m-0">${status_descriptions[data]}</h6>
                                </div>
                                <div class="text-end mt-2">
                                    <small class="text-nowrap ps-3 text-muted">Applied on ${mySQLDateToText(row.created_at)}</small>
                                </div>
                            `;
                        },
                        className: "w-25px border-0",
                    },
                    {
                        data: 'id',
                        render: function(data, display, row){
                            return `
                                <div class="d-flex flex-column justify-content-between h-100">
                                    <div class="d-flex flex-column">
                                        <a href="<?=base_url()?>/jobs/post/${row.job_post_id}" class="btn btn-sm btn-blue mb-3 text-nowrap fw-bold">View Job Post</a>
                                        ${!Number(row.application_status) ? 
                                        `<button type="button" data-job-application-id="${data}" class="btn btn-sm btn-light-danger border border-1 border-danger text-nowrap fw-bold cancel-application">Cancel Application</button>` : ""}
                                    </div>
                                </div>
                            `;
                        },
                        className: "w-25px border-0 pe-5",
                    },
                ],
                createdRow: function( row, data, dataIndex ){
                    console.log($(row))
                    $(row).addClass( `mb-3 border-start border-3 border-${status_colors[data.application_status]} position-relative`).css("background-color", `var(--kt-${status_colors[data.application_status]}-light)`);
                },
                scrollX: true
            });

            $("#job-applications-table").on("click", ".cancel-application", function(){
                const application_id = this.dataset.jobApplicationId;
                askConfirmation(function(){
                    AJAX({
                        method: "POST",
                        url: `<?=base_url()?>/jobs/updateJobApplication/${application_id}/3`,
                        successAlert: true,
                        success: function(){
                            reloadDataTable(job_applications_datatable)
                        }
                    })
                }, "Notice!", "Are you sure to cancel your application on this job post?")
            })
        });
    </script>
    <?= $this->endSection(); ?>