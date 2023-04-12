$(document).ready(function(){

    let dataTables = $('#applications-table').DataTable({
        processing: true,
        serverSide: true,
        orderCellsTop: true,
        ajax: url+'/getApplications',
        'createdRow': function (row, data, rowIndex) {
            // Per-cell function to do whatever needed with cells
            $(row).attr('data-id', data['id']);

            if(data.active != 1)
            {
                // $(row).addClass('banned_user');
                $('.active-container').attr('data-action', 'activate');
                $('.active-container').html('<span class = "ri-check-double-line"></span> Activate User');
            }

            if(data.status == 'banned')
            {
                $('.ban-container').attr('id', 'unban-user');
                $('.ban-container').html('<span class = "ri-user-follow-line"></span> Unban User');
            }

            // $.each($('tr', row), function (colIndex) {
            //     // For example, adding data-* attributes to the cell
            //     $(this).attr('title', 'sample');
            // });
        },
        columns: [
            {data: 'fullname'},
            {data: 'email'},
            {data: 'status'},
            {data: 'action'}
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




});