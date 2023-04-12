$(document).ready(function(){

    getTemplates();
    let pageId = pathname[5];

    $(document).on('click', '.add-btn', function(){

        $('.modal-title').text('Add New Template');
        $('.form-vessel').attr('id', 'form-add');
        $('#template').modal('show');
        $('.form-vessel')[0].reset();

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

                $.post(url+'/addTemplate', formData)
                    .done(function(data){

                        data = JSON.parse(data);

                        if(data.status){

                            getTemplates();

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

    $(document).on('click', '.edit-btn', function(){

        let tempId = $(this).attr('data-id');

        $.post(url+'/getTemplateInfo/'+tempId, {}, function(data, status){

            if(data.status){

                $.each(data.message, function(key, value){
                    console.log(value);
                    $('#'+key).val(value);
                });

                $('.modal-title').text('Update Template');
                $('.form-vessel').attr('id', 'form-edit');
                $('#template').modal('show');

            }else{

            }

        }, 'json');

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

                $.post(url+'/updateTemplate', formData)
                    .done(function(data){

                        data = JSON.parse(data);

                        if(data.status){

                            getTemplates();

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

                $('#template').modal('hide');
            }
        });
    });


    $(document).on('click', '.remove-btn', function(){

        event.preventDefault();
        let tempId = $(this).attr('data-id');
        let formData = $(this).serialize();

        Swal.fire({
            title: 'Wait',
            text: "Are you sure you want to remove this template?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#02a8b5',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {

                $.post(url+'/removeTemplate/'+tempId, formData)
                    .done(function(data){

                        data = JSON.parse(data);

                        if(data.status){

                            getTemplates();

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
                                icon: 'error',
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

    function getTemplates(){

        $('#template-cont div').remove();
        
        $.post(url+'/getFilterTemplate', {}, function(data, status){

            if(!data.templates){

                
            }
            else{
                data.templates.forEach(function(i){

                    $('#template-cont').append(
                        '<div class="col-4 ">'+
                        '<div class="card">'+
                                '<div class="card-body d-flex flex-center flex-column pt-12 p-9">'+
                                    '<div class="symbol symbol-65px symbol-circle mb-5">'+
                                        '<span class="symbol-label fs-2x fw-semibold text-primary bg-light-primary"><i class = "ri-send-plane-fill"></i></span>'+
                                        '<div class="bg-success position-absolute border border-4 border-body h-15px w-15px rounded-circle translate-middle start-100 top-100 ms-n3 mt-n3"></div>'+
                                    '</div>'+
                                    '<a href="#" class="fs-4 text-gray-800 text-hover-primary fw-bold mb-0">'+i.template_title+'</a>'+
                                    '<div class="fw-semibold text-gray-400 mb-6">'+i.visa_description+'</div>'+
                                    '<div class = "d-flex">'+
                                        '<a href="'+url+'/filter/'+i.template_id+'?visa_id='+i.visa_id+'" target = "_blank" class="menu-link px-3 btn btn-light me-2 ps-5 pe-5">Filter</a>'+
                                        '<a href="'+url+'/manageTemplate/'+i.template_id+'?visa_id='+i.visa_id+'" target = "_blank" class="menu-link px-3 btn btn-light me-2 ps-5 pe-5">Manage</a>'+
                                        '<button type = "button" class="menu-link px-3 edit-btn btn btn-light me-2 ps-5 pe-5" data-id = "'+i.template_id+'">Edit</button>'+
                                        '<button href="#" class="menu-link px-3 remove-btn btn btn-light me-2 ps-5 pe-5" data-id = "'+i.template_id+'">Remove</button>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                        '</div>'
                    );
                });

            }
            
        }, 'json');

    }



});