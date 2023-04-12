let datatable_data = {};

$(document).ready(function () {
    const department_modal = new bootstrap.Modal('#department-modal')
    let dataTables = $('#data-table').DataTable({
        processing: true,
        serverSide: true,
        orderCellsTop: true,
        ajax: current_url + '/getDepartmentDataTable',
        columns: [{
                data: 'dept_id'
            },
            {
                data: 'dept_alias'
            },
            {
                data: 'department_name'
            },
            {
                data: 'status',
                render: function(data){
                    let visibility = classes = "";
                    switch (data) {
                        case "Visible":
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
                className: "text-center",
                orderable: false
            },
            {
                data: 'action',
                orderable: false
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
    } );

    $("#archive").change(function(){
        const button = $(this).prev();
        if(this.checked){
            button.addClass("btn-outline btn-outline-dashed btn-outline-danger btn-active-light-danger").removeClass("btn-danger").find("span").text("Hide")
            reloadDataTable(dataTables, current_url + '/getArchivedDepartmentDataTable')
        }else{
            button.removeClass("btn-outline btn-outline-dashed btn-outline-danger btn-active-light-danger").addClass("btn-danger").find("span").text("View")
            reloadDataTable(dataTables, current_url + '/getDepartmentDataTable')
        }
    })

    $(document).on('click', '.edit-btn', function () {
        const department_id = this.dataset.id;
        const department = searchArrayById(datatable_data, department_id, "dept_id")
        $(".department-modal-title").html("Edit Department")
        $(".department-name").html(department.department_name)

        $("#dept-id").val(department.dept_id);
        $("#dept_alias").val(department.dept_alias);
        $("#department_name").val(htmlDecode(department.department_name));
        $("#department-visibility")[0].checked = department.status == "Visible";
        $("#department-visibility").next().html(department.status)
        $("#is_edit")[0].checked = true;
        department_modal.show()
    })

    $(document).on('click', '#add-department-btn', function () {
        $("#is_edit")[0].checked = false;
        resetForm("#department-modal form")
        $(".department-modal-title").html("Add Department")
        $(".department-name").html("Add a New Department")
        department_modal.show()
    })

    $("#department-visibility").change(function () {
        const label = $(this).next();
        if (this.checked) {
            label.html("Visible")
        } else {
            label.html("Hidden")
        }
    })

    $("#department-modal form").submit(function (e) {
        e.preventDefault();
        if ($("#is_edit")[0].checked) {
            $.post(current_url + '/updateDepartment', $(this).serialize()).done(function (data){
                data = JSON.parse(data);
                department_modal.hide()

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
            $.post(current_url + '/createDepartment', $(this).serialize()).done(function (data){
                data = JSON.parse(data);
                department_modal.hide()

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
        const department_id = this.dataset.id;
        const department = searchArrayById(datatable_data, department_id, "dept_id")
        if(!department_id){return false}
        
        Swal.fire({
            title: 'Wait',
            html: `Are you sure you want to delete <i class="text-nowrap">${department.dept_alias} - ${department.department_name}<i>?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#02a8b5',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                $.post(current_url + '/deleteDepartment/'+department_id)
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
        const department_id = this.dataset.id;
        const department = searchArrayById(datatable_data, department_id, "dept_id")
        if(!department_id){return false}
        
        Swal.fire({
            title: 'Wait',
            html: `Are you sure you want to restore <i class="text-nowrap">${department.dept_alias} - ${department.department_name}<i>?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#02a8b5',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                $.post(current_url + '/restoreDepartment/'+department_id)
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
});