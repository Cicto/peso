$(document).ready(function(){
    
    let columnImg = function(data){
        return '<div class="symbol symbol-50px me-2">'+
            '<span class="symbol-label bg-light-info">'+
                '<span class="svg-icon svg-icon-2x svg-icon-info">'+
                    '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">'+
                        '<path opacity="0.3" d="M20 15H4C2.9 15 2 14.1 2 13V7C2 6.4 2.4 6 3 6H21C21.6 6 22 6.4 22 7V13C22 14.1 21.1 15 20 15ZM13 12H11C10.5 12 10 12.4 10 13V16C10 16.5 10.4 17 11 17H13C13.6 17 14 16.6 14 16V13C14 12.4 13.6 12 13 12Z" fill="currentColor"></path>'+
                        '<path d="M14 6V5H10V6H8V5C8 3.9 8.9 3 10 3H14C15.1 3 16 3.9 16 5V6H14ZM20 15H14V16C14 16.6 13.5 17 13 17H11C10.5 17 10 16.6 10 16V15H4C3.6 15 3.3 14.9 3 14.7V18C3 19.1 3.9 20 5 20H19C20.1 20 21 19.1 21 18V14.7C20.7 14.9 20.4 15 20 15Z" fill="currentColor"></path>'+
                    '</svg>'+
                '</span>'+
            '</span>'+
        '</div>'+
        '<span>'+data+'</span>'
    }

    let dataTablesReqType = $('#requirementsType-dataTable').DataTable({
        processing: true,
        serverSide: true,
        orderCellsTop: true,
        ajax: url+'/getRequirementsType',
        'createdRow': function (row, data, rowIndex) {
            // Per-cell function to do whatever needed with cells
            $(row).attr('data-id', data['rt_id']);

            if(data.deleted_at != null){
                $(row).addClass('deleted-item');
            }

        },
        columns: [
            {data: 'rt_code', render : columnImg},
            {data: 'rt_description'},
            {data: 'visa_description'},
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

        $('.modal-title').text('Add New Document Type');
        $('.form-vessel').attr('id', 'add-doctype-form');
        $('.form-vessel')[0].reset();
        $('#right-modal').modal('show');

    });

    $(document).on('submit', '#add-doctype-form', function(){

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

                $.post(url+'/addRequirementsType', $(this).serialize())
                    .done(function(data){

                        data = JSON.parse(data);

                        if(!data.error){

                            $('#right-modal').modal('hide');

                            dataTablesReqType.draw();

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

    $(document).on('submit', '#update-doctype-form', function(){
        
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

                $.post(url+'/updateRequirementsType', $(this).serialize())
                    .done(function(data){

                        data = JSON.parse(data);

                        if(!data.error){

                            $('#right-modal').modal('hide');

                            dataTablesReqType.draw();

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

    $(document).on('click', '#remove-btn', function(){
        
        event.preventDefault();
        var rt_id = $(this).attr('data-id');

        Swal.fire({
            title: 'Wait',
            text: "Are you sure you want to remove this item?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#02a8b5',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {

                $.post(url+'/removeRequirementsType/'+rt_id, {})
                    .done(function(data){

                        data = JSON.parse(data);

                        if(!data.error){

                            $('#right-modal').modal('hide');

                            dataTablesReqType.draw();

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

    $(document).on('click', '#restore-btn', function(){
        
        event.preventDefault();
        var rt_id = $(this).attr('data-id');

        Swal.fire({
            title: 'Wait',
            text: "Are you sure you want to restore this item?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#02a8b5',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {

                $.post(url+'/restoreRequirementsType/'+rt_id, {})
                    .done(function(data){

                        data = JSON.parse(data);

                        if(!data.error){

                            $('#right-modal').modal('hide');

                            dataTablesReqType.draw();

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

    $('#requirementsType-dataTable tbody').on('click', 'tr', function () {

        let id = $(this).attr('data-id');
        $('.modal-title').text('Update Document Type');
        $('.form-vessel').attr('id', 'update-doctype-form');

        if($(this).hasClass('deleted-item')){
            $('.delete-btn-cont').hide();
            $('.restore-btn-cont').show();
            
        }else{
            $('.delete-btn-cont').show();
            $('.restore-btn-cont').hide();
        }
        // let data = dataTables.row(this).data();

        $.post(url+'/getSpecificRequirementType/'+id, {})
            .done(function(data){

                data = JSON.parse(data);

                $('#right-modal').modal('show');
                $('#remove-btn').attr('data-id', id);
                $('#restore-btn').attr('data-id', id);

                $.each(data.success_message, (key, val) => {
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

    $(document).on('click', '#visa-item', function(){
        alert();

    });
});