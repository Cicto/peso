let dataTables;
$(document).ready(function () {

    dataTables = $('#data-table').DataTable({
        processing: true,
        serverSide: true,
        orderCellsTop: true,
        ajax: current_url + '/getUsers',
        createdRow: function (row, data, rowIndex) {
            $(row).attr('data-id', data['id']).addClass(`pointer`);
        },
        columns: [{
                data: 'email',
                render: function (data, display, row) {
                    return  `<div class="symbol symbol-50px me-2ddd">
                                <img src = "${base_url}/public/assets/media/avatars/${row.user_photo?row.user_photo:'default-avatar.png'}" class="ms-5 me-8">
                            </div>
                        ${data}`
                }
            },
            {
                data: 'username'
            },
            {
                data: 'firstname'
            },
            {
                data: 'lastname'
            },
            {
                data: 'status',
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
                    return `<span class="badge badge-outline ${classes}">${status}</span>`;
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

                console.log(json.data)
            });
        }
    });

    $(document).on('click', '#add-user-btn', function () {

        $('.user-form')[0].reset();
        $('.user-form').attr('id', 'add-user-form');
        $('#right-modal').modal('show');
        $('.modal-title').text('Add New System User');
        $('#other-buttons').hide();

    });

    $(document).on('submit', '#add-user-form', function (event) {

        event.preventDefault();

        Swal.fire({
            title: 'Wait',
            text: "Are you sure you want to add this user?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#02a8b5',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                console.table($(this).serializeArray())
                $.post(current_url + '/addUser', $(this).serialize())
                    .done(function (data) {

                        data = JSON.parse(data);

                        if (!data.error) {

                            $('#right-modal').modal('hide');

                            dataTables.draw();

                            Swal.fire({
                                //position: 'top-end',
                                icon: 'success',
                                title: data.success_message,
                                showConfirmButton: false,
                                timer: 3000
                            });
                        } else {

                            Swal.fire({
                                //position: 'top-end',
                                icon: 'error',
                                title: data.error_message,
                                showConfirmButton: false,
                                timer: 3000
                            });
                        }
                    })
                    .fail(function (xhr, textStatus, errorThrown) {

                        Swal.fire({
                            //position: 'top-end',
                            icon: 'error',
                            title: 'Request ' + errorThrown,
                            showConfirmButton: false,
                            timer: 2000
                        });
                    });
            }
        })
    });

    $('#role').change(function () {

        if ($('#role option:selected').val() != 3) {
            $('.username-cont').append(
                '<div class="row">' +
                '<div class="col-10">' +
                '<div class="form-floating mb-2">' +
                '<input type="text" class="form-control form-control-sm" id="username" name = "username" placeholder="Enter Username" required>' +
                '<label for="username">Username</label>' +
                '</div>' +
                '</div>' +
                '</div>'
            );
        } else {
            $('.username-cont div').remove();
        }


    });

    $(document).on('submit', '#edit-user-form', function () {

        event.preventDefault();

        Swal.fire({
            title: 'Wait',
            text: "Are you sure you want to update this user?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#02a8b5',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                updateUser(this)
            }
        });

    });

    $(document).on('click', '#ban-user', function () {
        let id = $(this).attr('data-id');

        Swal.fire({
            title: 'Wait',
            text: "Are you sure you want to ban this user?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#02a8b5',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {

                $.post(current_url + '/banUser/' + id, {})
                    .done(function (data) {

                        data = JSON.parse(data);

                        if (!data.error) {

                            $('#right-modal').modal('hide');

                            dataTables.draw();

                            Swal.fire({
                                //position: 'top-end',
                                icon: 'success',
                                title: data.success_message,
                                showConfirmButton: false,
                                timer: 3000
                            });
                        } else {

                            Swal.fire({
                                //position: 'top-end',
                                icon: 'success',
                                title: data.error_message,
                                showConfirmButton: false,
                                timer: 3000
                            });
                        }
                    })
                    .fail(function (xhr, textStatus, errorThrown) {

                        Swal.fire({
                            //position: 'top-end',
                            icon: 'error',
                            title: 'Request ' + errorThrown,
                            showConfirmButton: false,
                            timer: 2000
                        });
                    });
            }
        });
    });

    $(document).on('click', '#unban-user', function () {

        let id = $(this).attr('data-id');
        Swal.fire({
            title: 'Wait',
            text: "Are you sure you want to unban this user?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#02a8b5',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {

                $.post(current_url + '/unbanUser/' + id, {})
                    .done(function (data) {

                        data = JSON.parse(data);

                        if (!data.error) {

                            $('#right-modal').modal('hide');

                            dataTables.draw();

                            Swal.fire({
                                //position: 'top-end',
                                icon: 'success',
                                title: data.success_message,
                                showConfirmButton: false,
                                timer: 3000
                            });
                        } else {

                            Swal.fire({
                                //position: 'top-end',
                                icon: 'success',
                                title: data.error_message,
                                showConfirmButton: false,
                                timer: 3000
                            });
                        }
                    })
                    .fail(function (xhr, textStatus, errorThrown) {

                        Swal.fire({
                            //position: 'top-end',
                            icon: 'error',
                            title: 'Request ' + errorThrown,
                            showConfirmButton: false,
                            timer: 2000
                        });
                    });
            }
        });

    });

    $(document).on('click', '#reset-password', function () {

        let id = $(this).attr('data-id');

        Swal.fire({
            title: 'Wait',
            text: "Are you sure you want to reset password?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#02a8b5',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {

                $.post(current_url + '/resetUserPassword/' + id, {})
                    .done(function (data) {

                        data = JSON.parse(data);

                        if (!data.error) {

                            $('#right-modal').modal('hide');

                            dataTables.draw();

                            Swal.fire({
                                //position: 'top-end',
                                icon: 'success',
                                title: data.success_message,
                                showConfirmButton: false,
                                timer: 3000
                            });
                        } else {

                            Swal.fire({
                                //position: 'top-end',
                                icon: 'success',
                                title: data.error_message,
                                showConfirmButton: false,
                                timer: 3000
                            });
                        }
                    })
                    .fail(function (xhr, textStatus, errorThrown) {

                        Swal.fire({
                            //position: 'top-end',
                            icon: 'error',
                            title: 'Request ' + errorThrown,
                            showConfirmButton: false,
                            timer: 2000
                        });
                    });
            }
        });

    });

    $(document).on('click', '#user-status', function () {

        let id = $(this).attr('data-id');
        let status = $(this).attr('data-action');
        Swal.fire({
            title: 'Wait',
            text: (status == 'activate') ? "Are you sure you want to activate this user?" : "Are you sure you want to deactivate this user?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#02a8b5',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {

                $.post(current_url + '/userActivationStatus/' + id, {
                        status: status
                    })
                    .done(function (data) {

                        data = JSON.parse(data);

                        if (!data.error) {

                            $('#right-modal').modal('hide');

                            dataTables.draw();

                            Swal.fire({
                                //position: 'top-end',
                                icon: 'success',
                                title: data.success_message,
                                showConfirmButton: false,
                                timer: 3000
                            });
                        } else {

                            Swal.fire({
                                //position: 'top-end',
                                icon: 'success',
                                title: data.error_message,
                                showConfirmButton: false,
                                timer: 3000
                            });
                        }
                    })
                    .fail(function (xhr, textStatus, errorThrown) {

                        Swal.fire({
                            //position: 'top-end',
                            icon: 'error',
                            title: 'Request ' + errorThrown,
                            showConfirmButton: false,
                            timer: 2000
                        });
                    });
            }
        });

    });

    // ON CLICK EVENT FOR DATATABLES
    $('#data-table tbody').on('click', 'tr', function () {

        let id = $(this).attr('data-id');
        let data = dataTables.row(this).data();

        $('.modal-title').text('Edit User Information');
        $('.user-form')[0].reset();
        $('.user-form').attr('id', 'edit-user-form');
        $('#ban-user').attr('data-id', id);
        $('#reset-password').attr('data-id', id);
        $('#user-status').attr('data-id', id);
        $('#other-buttons').show();

        $.get(current_url + '/getSpecificUser/' + id, {})
            .done(function (data) {

                data = JSON.parse(data);

                console.log(data);
                if (data.active != 1) {
                    $('#user-status>label').addClass('border-primary').removeClass('border-gray-500');
                    $('#user-status').attr('data-action', 'activate');
                    $('#user-status-text').html('Activate User');
                } else {
                    $('#user-status>label').addClass('border-gray-500').removeClass('border-primary');
                    $('#user-status').attr('data-action', 'deactivate');
                    $('#user-status-text').html('Deactivate User');
                }

                if (data.status == 'banned') {
                    $('.ban-container').attr('id', 'unban-user');
                    $('.ban-container>label').addClass('border-primary').removeClass('border-danger');
                    $('.ban-text').html('Unban User');
                }else{
                    $('.ban-container').attr('id', 'ban-user');
                    $('.ban-container>label').addClass('border-danger').removeClass('border-primary');
                    $('.ban-text').html('Ban User');
                }

                $('#right-modal').modal('show');

                $.each(data, (key, val) => {
                    $(`#edit-user-form *[name="${key}"]`).val(val);
                    console.log(key, val)
                });

            })
            .fail(function (xhr, textStatus, errorThrown) {

                Swal.fire({
                    //position: 'top-end',
                    icon: 'error',
                    title: 'Request ' + errorThrown,
                    showConfirmButton: false,
                    timer: 1500
                });

            });

    });

});

/**
 * It sends a POST request to the server, and then it does something with the response.
 * @param form_selector - the form selector to be serialized
 */
async function updateUser(form_selector){
    $.post(base_url + '/users/updateUser', $(form_selector).serialize())
    .done(function (data) {

        data = JSON.parse(data);

        if (!data.error) {

            $('#right-modal').modal('hide');

            dataTables.draw();

            Swal.fire({
                icon: 'success',
                title: data.success_message,
                showConfirmButton: false,
                timer: 3000
            });
        } else {

            Swal.fire({
                icon: 'success',
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