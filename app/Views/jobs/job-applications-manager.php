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
                <table class="table table-info table-hover table-align-middle" id="jobs-table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Job Category</th>
                        <th scope="col" class="">Job Title</th>
                        <th scope="col">Company</th>
                        <th scope="col">Date Posted</th>
                        <th scope="col">Applicants</th>
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
    let job_datatable = null;
    $(function () {
        job_datatable = $("#jobs-table").DataTable({
            processing: true,
            serverSide: true,
            ajax: '<?=base_url()?>/jobs/jobApplicationsDataTable',
            columns: [
                {
                    data: 'id',
                    className: 'ps-3',
                    render: function(data, type, row){
                        return ` <i class="fas fa-flag text-green" style="transform: rotate(-25deg) translateY(-3px); opacity: ${row.status == 3 ? "1" : "0"};"></i> ${data}`
                    }
                },
                {   data: 'job_category',
                    render: function(data, type, row){
                        return `<span class="bg-blue text-white fw-bold p-1 text-truncate">${data}</span>`;
                    }
                },
                {   data: 'job_title',
                    render: function(data, type, row){
                        return `
                            <a href="<?=base_url()?>/jobs/post/${row.id}" target="_blank" class="fs-4 m-0 text-green ff-noir hover-a-underline">${data}</a>
                            `;
                    }
                },
                {   data: 'company_name',
                    render: function(data, type, row){
                        return `<span class="text-blue ff-noir">${data}</span><br><small class="text-blue ff-noir opacity-75"><i class="bi bi-geo-alt-fill text-blue"></i> ${row.company_address}</small>`;
                    }
                },
                {   data: 'posted_at',
                    className: "small",
                    render: function(data, type, row){
                        return `<i class="bi bi-calendar2-event text-dark"></i> ${mySQLDateTimeToText(data)}`;
                    }
                },
                {   data: 'applicants',
                    className: "text-center w-20px",
                    render: function(data, type, row){
                        return `
                            <div class="border border-success rounded bg-success bg-opacity-10 p-2">
                                <i class="fas fa-users text-dark me-1"></i> <span class=" text-dark">${data}</span>
                            </div>
                            `;
                    }
                },
                {   data: 'id',
                    className: "w-25px pe-3",
                    render: function(data, type, row){
                        return `
                            <div class="text-nowrap">
                                <a href="<?=base_url()?>/jobs/applicants/${data}" class="btn btn-sm btn-success">View Applicants</a>
                            </div>
                        `;
                    }
                },
            ],
            order: [[ 0, 'desc' ]]
        });

        $("#jobs-table").on("click", ".status-change", function(){
            AJAX({
                method: "POST",
                url: `<?=base_url()?>/jobs/updateJobStatus/${this.dataset.jobId}/${this.dataset.status}`,
                successAlert: true,
                success: function(){
                    reloadDataTable(job_datatable)
                }
            })
        })
        
        $("#jobs-table").on("click", ".job-delete", function(){
            const job_id = this.dataset.jobId
            const job_is_deleted = this.dataset.jobIsDeleted
            askConfirmation(function() {
                AJAX({
                    method: "POST",
                    url: `<?=base_url()?>/jobs/updateDeletedJobPost/${job_id}/${job_is_deleted}`,
                    successAlert: true,
                    success: function(){
                        reloadDataTable(job_datatable)
                    }
                })
            }, "Warning", `Are you sure you want to ${job_is_deleted == 1 ? "restore" : "delete" } this job post?`)
        })

        $("#view-drafts").change(function (e) { 
            console.log(this.checked)
            if(this.checked){
                $(this).next().html(`<i class="fas fa-thumbtack"></i> View Posts`).removeClass("btn-outline btn-outline-primary btn-active-light-primary").addClass("btn-primary")
            }else{
                $(this).next().html(`<i class="fas fa-save"></i> View Drafts`).addClass("btn-outline btn-outline-primary btn-active-light-primary").removeClass("btn-primary")
            }
            setDataTableViews()
        });

        $("#view-archives").change(function (e) { 
            console.log(this.checked)
            if(this.checked){
                $(this).next().html(`<i class="fas fa-archive"></i> Hide Archived`).removeClass("btn-outline btn-outline-danger btn-active-light-danger").addClass("btn-danger")
            }else{
                $(this).next().html(`<i class="fas fa-archive"></i> View Archived`).addClass("btn-outline btn-outline-danger btn-active-light-danger").removeClass("btn-danger")
            }
            setDataTableViews()
        });
    });

    function setDataTableViews(){
        const view_drafts = $("#view-drafts")[0].checked ? 1 : 0;
        const view_archives = $("#view-archives")[0].checked ? 1 : 0;
        reloadDataTable(job_datatable, `<?=base_url()?>/jobs/jobsDatatable/${view_drafts}/${view_archives}`);
    }
</script>
<?= $this->endSection(); ?>