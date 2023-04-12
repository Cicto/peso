function loadTable(){

    let dataTables = $('#data-table').DataTable({
        processing: true,
        serverSide: true,
        orderCellsTop: true,
        ajax: current_url+'/getLogs',
        'createdRow': function (row, data, rowIndex) {
            // $(row).attr('data-id', data['issue_id']);

        },
        columns: [
            {data: 'log_id'},
            {data: 'log_action'},
            {data: 'log_actor'},
            {data: 'created_at'},
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

}
