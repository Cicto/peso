$(document).ready(function(){
    let columnImg = function(data){
        return '<div class="symbol symbol-50px me-2">'+
            '<span class="symbol-label bg-light-warning">'+
                '<span class="svg-icon svg-icon-2x svg-icon-warning">'+
                    '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">'+
                        '<path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="currentColor"></path>'+
                        '<path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="currentColor"></path>'+
                    '</svg>'+
                '</span>'+
            '</span>'+
        '</div>'+
        '<span>'+data+'</span>'
    }

    let dataTables = $('#requirements-dataTable').DataTable({
        processing: true,
        serverSide: true,
        orderCellsTop: true,
        ajax: url+'/getRequirements',
        'createdRow': function (row, data, rowIndex) {
            // Per-cell function to do whatever needed with cells
            $(row).attr('data-id', data['req_id']);
            
            console.log(data.deleted_at);
            if(data['deleted_at'] != null){
                $(row).addClass('deleted-item');
            }

            // $.each($('tr', row), function (colIndex) {
            //     // For example, adding data-* attributes to the cell
            //     $(this).attr('title', 'sample');
            // });
        },
        columns: [
            {data: 'req_title', render: columnImg},
            {data: 'req_description'},
            {data: 'req_remarks'},
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

        $('.modal-title').text('Add New Requirement');
        $('.form-vessel').attr('id', 'add-req-form');

        $('.form-vessel')[0].reset();
        $('#right-modal').modal('show');

    });

    $(document).on('submit', '#add-req-form', function(){

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

                $.post(url+'/addRequirements', $(this).serialize())
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

    $(document).on('submit', '#update-doctype-form', function(){
        
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

                $.post(url+'/updateRequirements', $(this).serialize())
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

                $.post(url+'/removeRequirements/'+rt_id, {})
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

    $(document).on('click', '#restore-btn', function(){
        
        event.preventDefault();
        var req_id = $(this).attr('data-id');

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

                $.post(url+'/restoreRequirements/'+req_id, {})
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

    $('#requirements-dataTable tbody').on('click', 'tr', function () {

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

        $.post(url+'/getSpecificRequirement/'+id, {})
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