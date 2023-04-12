$(document).ready(function(){

    let pathname = window.location.pathname.split( '/' );
    let url = window.location.origin+'/'+pathname[1]+'/'+pathname[2]+'/'+pathname[3];

    let dataTables = $('#data-table').DataTable({
        processing: true,
        serverSide: true,
        orderCellsTop: true,
        ajax: url+'/config/getTechIssueList',
        'createdRow': function (row, data, rowIndex) {
            $(row).attr('data-id', data['issue_id']);

        },
        columns: [
            {data: 'issue_id'},
            {data: 'issue_code'},
            {data: 'issue_description'},
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
    });

    $(document).on('click', '#add-btn', function(){

        $('.user-form')[0].reset();
        $('.form-vessel').attr('id', 'form-add');
        $('#right-modal').modal('show');
        $('.modal-title').text('Add User');
        // $('#other-buttons').hide();

    });

    $(document).on('submit', '#form-add', function(){

        event.preventDefault();

        Swal.fire({
            title: 'Wait',
            text: "Are you sure you want to add this item?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#02a8b5',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {

                $.post(document.URL+'/addTechIssueData', $(this).serialize())
                    .done(function(data){

                        data = JSON.parse(data);

                        if(!data.error){

                            $('#right-modal').modal('hide');

                            dataTables.draw();

                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: data.success_message,
                                showConfirmButton: false,
                                timer: 3000
                            });
                        }
                        else{

                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: data.error_message,
                                showConfirmButton: false,
                                timer: 3000
                            });
                        }
                    })
                    .fail(function(xhr, textStatus, errorThrown){

                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: 'Request '+errorThrown,
                            showConfirmButton: false,
                            timer: 2000
                        });
                });
            }
        });

    });

    $(document).on('submit', '#form-edit', function(){

        event.preventDefault();

        Swal.fire({
            title: 'Wait',
            text: "Are you sure you want to update this item?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#02a8b5',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {

                $.post(document.URL+'/updateTechIssueData', $(this).serialize())
                    .done(function(data){

                        data = JSON.parse(data);

                        if(!data.error){

                            $('#right-modal').modal('hide');

                            dataTables.draw();

                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: data.success_message,
                                showConfirmButton: false,
                                timer: 3000
                            });
                        }
                        else{

                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: data.error_message,
                                showConfirmButton: false,
                                timer: 3000
                            });
                        }
                    })
                    .fail(function(xhr, textStatus, errorThrown){

                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: 'Request '+errorThrown,
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

        $('.modal-title').text('Edit Item');
        $('.form-vessel')[0].reset();
        $('.form-vessel').attr('id', 'form-edit');
        $('#other-buttons').show();

        $.post(document.URL+'/getTechIssueData/'+id, {})
            .done(function(data){

                data = JSON.parse(data);

                $('#right-modal').modal('show');

                $.each(data, (key, val) => {
                    $('#'+key).val(val);
                });

            })
            .fail(function(xhr, textStatus, errorThrown){

                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Request '+errorThrown,
                    showConfirmButton: false,
                    timer: 1500
                });

        });

    });

});