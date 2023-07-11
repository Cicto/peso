<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
    <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
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
        </div>
    </div>
</div>

<div class="d-flex flex-column flex-column-fluid">
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-body">
                        <div class = "table-responsive">
                            <table class = "table table-row-dashed align-middle gs-0 gy-3 my-0" id="logs-table" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Action</th>
                                        <th>Actor</th>
                                        <th>Log ID</th>
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
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" id="log-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Log Data</h3>

                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                </div>
            </div>

            <div class="modal-body">
                <table id="log-table" class="table table-sm border table-rounded w-100 table-rounded overflow-hidden table-hover">
                    <thead>
                        <tr>
                            <th class="text-center bg-info text-white fw-bold">key</th>
                            <th class="text-center bg-info text-white fw-bold " style="width: 1px;">:</th>
                            <th class="text-center bg-info text-white fw-bold">value</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('javascript'); ?>

<!-- third party js -->
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

<script>
    let logs_data = {};
    $(document).ready(function(){
        let dataTables = $('#logs-table').DataTable({
            processing: true,
            serverSide: true,
            orderCellsTop: true,
            ajax: '<?=base_url()?>/logs/getLogs',
            columns: [
                {data: 'created_at'},
                {
                    data: 'log_action',
                    render: function(data, row, display){
                        return data
                    }
                },
                {data: 'log_actor'},
                {
                    data: 'log_id',
                    render: function(data, row, display){
                        return `<span class="d-none">${data}</span><button type="button" class="btn btn-outline-info btn-sm btn-active-light-info log-data" data-log-id="${data}"><i class="fas fa-save p-0"></i></button>`
                    }
                },
            ],
            initComplete: function( settings, json )
            {
                var indexColumn = 0;

                this.api().columns().every(function ()
                {
                    var column      = this;
                    var input       = document.createElement("input");

                    $(input).attr( 'placeholder', 'Search' )
                            .addClass('form-control form-control-sm')
                            .appendTo( $('.filterhead:eq('+indexColumn+')').empty() )
                            .on('keyup', function () {
                                column.search($(this).val(), false, false, true).draw();
                            });

                    indexColumn++;
                });
            }
        }).on('xhr.dt', function ( e, settings, json, xhr ) {
            logs_data = json.data
        });

        $("#logs-table").on("click", ".log-data", function(){
            const log = searchArrayById(logs_data, $(this).data("logId"), "log_id");
            const log_modal = bootstrap.Modal.getOrCreateInstance("#log-modal")
            const log_data = JSON.parse(htmlDecode(log.log_data));
            $("#log-table tbody").html("")
            for (const key in log_data) {
                if (Object.hasOwnProperty.call(log_data, key)) {
                    const value = log_data[key];
                    $("#log-table tbody").append(`
                    <tr>
                        <td class="text-center">${key}</td>
                        <td class="text-center" style="width: 1px;">:</td>
                        <td class="text-center">${value}</td>
                    </tr>
                    `)
                }
            }
            log_modal.show();
        })

    });
</script>

<!-- CUSTOM JS FOR THIS PAGE -->
<!-- <script src="<?= base_url()?>/public/assets/js/logs/logs.js"></script> -->
<?= $this->endSection(); ?>