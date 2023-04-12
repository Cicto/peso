$(document).ready(function(){

    let urlVals = new URLSearchParams(window.location.search);
    let list = '';
    let tempId = pathname[5]; // original val is 3

    fetchRequirements();
    fetchParticulars();

    $(document).on('click', '#particulars-add', function(){

        $('.modal-title').text('Add New Particular');
        $('.form-vessel').attr('id', 'form-add');
        $('#particulars').modal('show');
        $('.form-vessel')[0].reset();

    });

    $(document).on('click', '.particulars-edit', function(){

        let particularId = $(this).attr('data-id');
        $('.modal-title').text('Edit Particular');
        $('.form-vessel').attr('id', 'form-edit');
        $('#particulars').modal('show');

        $.post(url+'/getParticularInfo/'+particularId, {}, function(data, status){

            if(data.status){

                $.each(data.message, function(key, value){
                    $('#'+key).val(value);
                });

            }
            else{
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: data.message,
                    showConfirmButton: false,
                    timer: 3000
                });
            }
            console.log(data);

        }, 'json');

    });

    $(document).on('click', '.particulars-remove', function(){

        event.preventDefault();
        let particularId = $(this).attr('data-id');

        Swal.fire({
            title: 'Wait',
            text: "Are you sure you want to remove this particular?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#02a8b5',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {

                $.post(url+'/removeParticular/'+particularId, {})
                    .done(function(data){

                        data = JSON.parse(data);

                        if(data.status){

                            fetchParticulars();

                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: data.message,
                                showConfirmButton: false,
                                // timer: 2000
                            });

                            
                        }
                        else{

                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: data.message,
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

                $('#template').modal('hide');
            }
        });

    });

    $(document).on('submit', '#form-edit', function(){

        event.preventDefault();

        let formData = $(this).serialize();

        Swal.fire({
            title: 'Wait',
            text: "Are you sure you want to update this particular?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#02a8b5',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {

                $.post(url+'/updateParticular', formData)
                    .done(function(data){

                        data = JSON.parse(data);

                        console.log(data);
                        if(data.status){

                            fetchParticulars();

                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: data.message,
                                showConfirmButton: false,
                                // timer: 2000
                            });

                            
                        }
                        else{

                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: data.message,
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

                $('#template').modal('hide');
            }
        });
    });
    
    $(document).on('submit', '#form-add', function(){

        event.preventDefault();

        let formData = $(this).serialize();

        Swal.fire({
            title: 'Wait',
            text: "Are you sure you want to add this particular?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#02a8b5',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {

                $.post(url+'/addParticular/'+tempId, formData)
                    .done(function(data){

                        data = JSON.parse(data);

                        if(data.status){

                            fetchParticulars();

                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: data.message,
                                showConfirmButton: false,
                                timer: 2000
                            });

                            
                        }
                        else{

                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: data.message,
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

    $(document).on('submit', '#particulars-form', function(){

        event.preventDefault();
        let formData = [];

        $('select').each(function(){

            formData.push({
                'particular_id': $(this).attr('data-index'),
                'requirements_list': ($(this).val().length > 0) ? $(this).val() : null 
            });
        });


        Swal.fire({
            title: 'Wait',
            text: "Are you sure you want to submit?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#02a8b5',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {

                $.post(url+'/particularsRequirements', {formData: formData})
                    .done(function(data){

                        data = JSON.parse(data);

                        if(data.status){

                            fetchParticulars();

                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: data.message,
                                showConfirmButton: false,
                                timer: 2000
                            });

                            
                        }
                        else{

                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: data.message,
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

    async function fetchRequirements(){

        $.post(url+'/getFilterRequirementsList/'+urlVals.get('visa_id'), {}, function(data, status){

            data.forEach(function(j){

                list = list+'<option value = "'+j.req_id+'">'+j.req_title+'</option>';

                
            });


        }, 'json');
        
    }   
    
    async function fetchParticulars(){

        $('#particulars-cont tr').remove();

        $.post(url+'/fetchParticulars/'+tempId, {}, function(data, status){

            data.message.forEach(function(i){

                
                $('#particulars-cont').append(
                    '<tr>'+
                        '<td style = "width: 1000px"><div class="symbol symbol-50px me-2"><span class="symbol-label bg-light-success"><span class="svg-icon svg-icon-2x svg-icon-success ri-list-unordered"></span></span></div>'+i.particular_title+'</td>'+
                        '<td>'+
                            '<button class = "btn btn-light btn-sm me-1 particulars-edit" data-id = "'+i.particular_id+'"><span class = "ri-edit-2-fill align-middle"></span></button>'+
                            '<button class = "btn btn-light btn-sm me-1 particulars-remove" data-id = "'+i.particular_id+'"><span class = "ri-delete-bin-fill align-middle"></span></button>'+
                        '</td>'+
                    '</tr>'+
                    '<tr>'+
                        '<td colspan = "2">'+
                            '<select class = "form-control" data-toggle = "select2" table-index = "-1" aria-hidden = "true" data-index = "'+i.particular_id+'" id = "particular_'+i.particular_id+'" value = "'+i.requirements_list+'" name = "particulars-requirements" multiple>'+list+'</select>'+
                        '</td>'+
                    '</tr>'
                    // '<div class="mb-2">'+
                    //     '<label for="exampleInputEmail1" class="form-label">'+i.particular_title+'</label>'+
                    //     ''+
                    // '</div>'
                );

                i.requirements_list.split(",").forEach(function(item){
                    $('#particular_'+i.particular_id+' option[value="'+item+'"]').attr('selected', 'selected');
                })
            });

            

            $('select').select2();

        }, 'json');

    }

});