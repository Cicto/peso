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
            <ul class="breadcrumb fw-semibold fs-7 my-0 pt-1">
                <li class="breadcrumb-item text-muted">
                    <a href="#" class="text-muted text-hover-primary"><?= $title ?></a>
                </li>
            </ul>
        </div>
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <a href="<?=base_url()?>/news/new_post" class="btn btn-sm fw-bold btn-info"><i class="fas fa-plus"></i> New Post</a>
            <input type="checkbox" name="view_drafts" id="view-drafts" hidden>
            <label class="btn btn-sm btn-outline btn-outline-info btn-active-light-info" for="view-drafts"><i class="fas fa-save"></i> View Drafts</label>
            <input type="checkbox" name="view_archives" id="view-archives" hidden>
            <label class="btn btn-sm btn-outline btn-outline-danger btn-active-light-danger" for="view-archives"><i class="fas fa-archive"></i> View Archived</label>
        </div>
    </div>
</div>

<div class="d-flex flex-column flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-fluid">
        <div class="card card-content">
            <div class="card-body py-5">
                <table class="table table-info table-hover table-align-middle" id="posts-table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Post Title</th>
                        <th scope="col">Author</th>
                        <th scope="col">Created at</th>
                        <th scope="col">Status</th>
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
    let post_datatable = null;
    $(function () {
        post_datatable = $("#posts-table").DataTable({
            processing: true,
            serverSide: true,
            ajax: '<?=base_url()?>/news/postDatatable',
            columns: [
                {data: 'id'},
                {   data: 'post_title',
                    render: function(data, type, row){
                        return `<a href="<?=base_url()?>/news/post/${row.id}" target="_blank" class="h5 m-0 text-dark hover-a-underline">${data}</a>`;
                    }
                },
                {data: 'post_author'},
                {   data: 'created_at',
                    render: function(data){
                        return `<p class="text-muted m-0">${mySQLDateTimeToText(data)}</p>`;
                    }
                },
                {   data: 'status',
                    className: "w-25px",
                    render: function(data, type, row){
                        const status = ["Not Posted", "Posted", "Drafted"];

                        return `<div class="dropdown">
                                    <button class="btn btn-sm btn-secondary dropdown-toggle w-100" ${row.is_pinned == 1 && "disabled"} type="button" ${row.is_pinned == 0 && `data-bs-toggle="dropdown"`} aria-expanded="false">
                                        ${status[data]}
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li data-post-id="${row.id}" data-status="1" class="status-change pointer"><a class="dropdown-item"> Posted </a></li>
                                        <li data-post-id="${row.id}" data-status="0" class="status-change pointer"><a class="dropdown-item"> Not Posted </a></li>
                                    </ul>
                                </div>`;
                    }
                },
                {   data: 'id',
                    className: "w-25px",
                    render: function(data, type, row){
                        return `
                            <div class="text-nowrap">
                                <a href="<?=base_url()?>/news/edit_post/${data}" class="btn btn-sm btn-info">Edit</a>
                                <input type="radio" class="btn-check" name="is_pinned" id="pin-post-${data}" autocomplete="off" data-post-id="${data}" ${row.is_pinned == 1 && "checked" }>
                                <label class="btn btn-sm border btn-outline-${row.status == 1 ? "success" : "secondary"} border-${row.status == 1 ? "success" : "secondary"} border ${row.is_deleted == 1 || (row.status == 2)  ? "d-none" : ""}" ${row.status == 1 && `for="pin-post-${data}" disabled`}><i class="fas fa-thumbtack p-0" style="color:  ${row.is_pinned == 1 ? "white" : row.status == 0 ? "muted" : "var(--kt-success)" };"></i></label>
                                <button type="button" class="btn btn-sm ${row.is_deleted == 0 ? "btn-danger" : "btn-success"} post-delete" data-post-id="${data}" data-post-is-deleted="${row.is_deleted}">${row.is_deleted == 1 ? `<i class="fas fa-trash-restore-alt p-0"></i>` : `<i class="fas fa-trash-alt p-0"></i>`}</button>
                            </div>
                        `;
                    }
                },
            ],
            createdRow: function (row, data, index) {
                if(data.is_pinned == 1){
                    $(row).addClass("border-bottom");
                }
            }
        });

        $("#posts-table").on("click", ".status-change", function(){
            AJAX({
                method: "POST",
                url: `<?=base_url()?>/news/updatePostStatus/${this.dataset.postId}/${this.dataset.status}`,
                successAlert: true,
                success: function(){
                    reloadDataTable(post_datatable)
                }
            })
        })

        $("#posts-table").on("change", "input[name='is_pinned']", function(){
            if(this.checked){
                AJAX({
                    method: "POST",
                    url: "<?=base_url()?>/news/updatePinnedPost/"+this.dataset.postId,
                    successAlert: true,
                    success: function(){
                        reloadDataTable(post_datatable)
                    }
                })
            }
        })
        
        $("#posts-table").on("click", ".post-delete", function(){
            const post_id = this.dataset.postId
            const post_is_deleted = this.dataset.postIsDeleted
            askConfirmation(function() {
                AJAX({
                    method: "POST",
                    url: `<?=base_url()?>/news/updateDeletedPost/${post_id}/${post_is_deleted}`,
                    successAlert: true,
                    success: function(){
                        reloadDataTable(post_datatable)
                    }
                })
            }, "Warning", `Are you sure you want to ${post_is_deleted == 1 ? "restore" : "delete" } this post?`)
        })

        $("#view-drafts").change(function (e) { 
            console.log(this.checked)
            if(this.checked){
                $(this).next().html(`<i class="fas fa-thumbtack"></i> View Posts`).removeClass("btn-outline btn-outline-info btn-active-light-info").addClass("btn-info")
            }else{
                $(this).next().html(`<i class="fas fa-save"></i> View Drafts`).addClass("btn-outline btn-outline-info btn-active-light-info").removeClass("btn-info")
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
        reloadDataTable(post_datatable, `<?=base_url()?>/news/postDatatable/${view_drafts}/${view_archives}`);
    }
</script>
<?= $this->endSection(); ?>