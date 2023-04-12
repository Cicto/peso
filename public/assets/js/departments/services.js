let datatable_data = {};
$(document).ready(function () {
    const services_modal = new bootstrap.Modal('#services-modal')
    let dataTables = $('#data-table').DataTable({
        processing: true,
        serverSide: true,
        orderCellsTop: true,
        ajax: base_url + '/departments/getServiceDataTable/'+department_id,
        columns: [{
                data: 'service_name',
            },
            {
                data: 'service_description'
            },
            {
                data: 'form_view'
            },
            {
                data: 'status',
                render: function(data){
                    let visibility = classes = "";
                    switch (Number(data)) {
                        case 1:
                            visibility = "Visible"
                            classes = "badge-success";
                            break;
                        default:
                            visibility = "Hidden"
                            classes = "badge-dark opacity-50";
                            break;
                    }
                    return `<span class="badge badge-outline ${classes}">${visibility}</span>`;
                },
                className: "text-center"
            },
            {
                data: 'id',
                orderable: false,
                render: function(data, display, row){
                    console.log(row)
                    return `
                    <div class="dropdown ms-2">
                    <button class="btn btn-sm btn-icon btn-light btn-active-light-primary me-2" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="svg-icon svg-icon-5 m-0">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="10" y="10" width="4" height="4" rx="2" fill="currentColor"></rect>
                                <rect x="17" y="10" width="4" height="4" rx="2" fill="currentColor"></rect>
                                <rect x="3" y="10" width="4" height="4" rx="2" fill="currentColor"></rect>
                            </svg>
                        </span>
                    </button>
                    <div class="dropdown-menu menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-150px py-4" aria-labelledby="dropdownMenuButton" style="">
                        <div class="menu-item px-3">
                            <span class="menu-link px-3 edit-btn" data-id = "${data}" >Edit</span>
                        </div>
                        <div class="menu-item px-3">
                            <a class="menu-link px-3" target="_blank" href="${base_url}/services/preview_service/${row.form_view}/${row.id}" data-id = "${data}" >View Form</a>
                        </div>
                        <div class="menu-item px-3">
                            <span class="menu-link px-3 text-${Number(row.is_deleted) ? "success restore" : "danger delete"}-btn" data-id = "${data}">${Number(row.is_deleted)?"Restore":"Delete"}</span>
                        </div>
                    </div>
                </div>
                    `
                }
            },
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
            datatable_data = json.data;
            console.log(datatable_data)
        }
    });

    dataTables.on( 'xhr', function () {
        var json = dataTables.ajax.json();
        datatable_data = json.data;
    });

    $("#archive").change(function(){
        const button = $(this).prev();
        if(this.checked){
            button.addClass("btn-outline btn-outline-dashed btn-outline-danger btn-active-light-danger").removeClass("btn-danger").find("span").text("Hide")
            reloadDataTable(dataTables, base_url + '/departments/getArchivedServiceDataTable/'+department_id)
        }else{
            button.removeClass("btn-outline btn-outline-dashed btn-outline-danger btn-active-light-danger").addClass("btn-danger").find("span").text("View")
            reloadDataTable(dataTables, base_url + '/departments/getServiceDataTable/'+department_id)
        }
    })

    $(document).on('click', '.edit-btn', function () {
        const service_id = this.dataset.id;
        const service = searchArrayById(datatable_data, service_id, "id")
        $(".services-modal-title").html("Edit Service")

        $("#service-id").val(service.id);
        $("#service-name").val(htmlDecode(service.service_name));
        $("#service-description").val(htmlDecode(service.service_description));
        $("#form-view").val(htmlDecode(service.form_view));
        $("#service-visibility")[0].checked = service.status == 1;
        $("#service-visibility").next().html(Number(service.status)?"Visible":"Hidden")
        $("#is_edit")[0].checked = true;
        services_modal.show()
    })

    $(document).on('click', '#add-service-btn', function () {
        $("#is_edit")[0].checked = false;
        resetForm("#services-modal form")
        $("#service-visibility").next().html("Hidden")
        $(".services-modal-title").html("Add Service")
        services_modal.show()
    })

    $("#services-modal form").submit(function (e) {
        e.preventDefault();
        if ($("#is_edit")[0].checked) {
            $.post(base_url + '/departments/updateService', $(this).serialize()).done(function (data){
                data = JSON.parse(data);
                services_modal.hide()

                if (!data.error) {
                    dataTables.draw();
                    Swal.fire({
                        icon: 'success',
                        title: data.success_message,
                        showConfirmButton: false,
                        timer: 3000
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: data.error_message,
                        showConfirmButton: false,
                        timer: 3000
                    });
                }
            }).fail(function (xhr, textStatus, errorThrown) {
                Swal.fire({
                    icon: 'error',
                    title: 'Request ' + errorThrown,
                    showConfirmButton: false,
                    timer: 2000
                });
            });
        } else {
            $.post(base_url + '/departments/createService', $(this).serialize()).done(function (data){
                data = JSON.parse(data);
                services_modal.hide()

                if (!data.error) {
                    dataTables.draw();
                    Swal.fire({
                        icon: 'success',
                        title: data.success_message,
                        showConfirmButton: false,
                        timer: 3000
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: data.error_message,
                        showConfirmButton: false,
                        timer: 3000
                    });
                }
            }).fail(function (xhr, textStatus, errorThrown) {
                Swal.fire({
                    icon: 'error',
                    title: 'Request ' + errorThrown,
                    showConfirmButton: false,
                    timer: 2000
                });
            });

        }
    });

    $(document).on("click", ".delete-btn", function(){
        const service_id = this.dataset.id;
        if(!service_id){return false}
        
        Swal.fire({
            title: 'Wait',
            html: `Are you sure you want to delete this service?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#02a8b5',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                $.post(base_url + '/departments/deleteService/'+service_id)
                    .done(function (data) {
                        data = JSON.parse(data);
                        if (!data.error) {
                            dataTables.draw();
                            Swal.fire({
                                icon: 'success',
                                title: data.success_message,
                                showConfirmButton: false,
                                timer: 3000
                            });
                        } else {

                            Swal.fire({
                                icon: 'error',
                                title: data.error_message,
                                showConfirmButton: false,
                                timer: 3000
                            });
                        }
                    })
                    .fail(function (xhr, textStatus, errorThrown) {

                        Swal.fire({
                            icon: 'error',
                            title: 'Request ' + errorThrown,
                            showConfirmButton: false,
                            timer: 2000
                        });
                    });
            }
        })
    })

    $(document).on("click", ".restore-btn", function(){
        const service_id = this.dataset.id;
        if(!service_id){return false}
        
        Swal.fire({
            title: 'Wait',
            html: `Are you sure you want to restore this service?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#02a8b5',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                $.post(base_url + '/departments/restoreService/'+service_id)
                    .done(function (data) {
                        console.log(data)
                        data = JSON.parse(data);
                        if (!data.error) {
                            dataTables.draw();
                            Swal.fire({
                                icon: 'success',
                                title: data.success_message,
                                showConfirmButton: false,
                                timer: 3000
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: data.error_message,
                                showConfirmButton: false,
                                timer: 3000
                            });
                        }
                    })
                    .fail(function (xhr, textStatus, errorThrown) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Request ' + errorThrown,
                            showConfirmButton: false,
                            timer: 2000
                        });
                    });
            }
        })
    })

    $("#service-visibility").change(function () {
        const label = $(this).next();
        if (this.checked) {
            label.html("Visible")
        } else {
            label.html("Hidden")
        }
    })



});