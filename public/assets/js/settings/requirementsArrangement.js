$(document).ready(function(){

    
    $(document).on('click', '.visa-item', function(){
        
        $('#loader-wrapper').show();
        $.post(url+'/getRequirementsTypeListing', {visa_id: $(this).attr('data-id')})
            .done(function(data){

                data = JSON.parse(data);
                var list = '';

                if(data.status){
                    $('#requirementsList div').remove();
                    
                    data.data.forEach(function(i){
                        
                        data.requirements.forEach(function(j){
                            if(jQuery.inArray(j.req_id, i.requirements_list.split(',')) >= 0){
                                list = list+'<option value = "'+j.req_id+'" selected>'+j.req_title+'</option>';
                            }
                            else{
                                list = list+'<option value = "'+j.req_id+'" >'+j.req_title+'</option>';
                            }
                        });
                        
                        $('#requirementsList').append(
                            '<div class="mb-2">'+
                                '<label for="exampleInputEmail1" class="form-label">'+i.rt_description+'</label>'+
                                '<select class = "form-control" data-toggle = "select2" table-index = "-1" aria-hidden = "true" data-index = "'+i.rt_id+'" value = "'+i.rt_description+'" multiple>'+
                                    list+
                                '</select>'+
                            '</div>'
                        );

                        list = '';

                    });
                    
                    if($('select').data("select2-hidden-accessible")){
                        $('select').select2('destroy');
                    }

                    $('select').select2();
                    $('#loader-wrapper').hide();
                    
                }
                else{
                    $('#requirementsList div').remove();
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: data.message,
                        showConfirmButton: false,
                        timer: 3000
                    });
                    $('#loader-wrapper').hide();
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
        

    });

    $(document).on('submit', '', function(){

        event.preventDefault();
        var formData = [];

        $('select').each(function(){

            formData.push({
                'rt_id': $(this).attr('data-index'),
                'requirements_list': ($(this).val().length > 0) ? $(this).val() : null 
            });
        });

        Swal.fire({
            title: 'Wait',
            text: "Are you sure you want to update requirements listing?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#02a8b5',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {

                $.post(url+'/updateRequuirementsType', {formData: formData})
                    .done(function(data){

                        data = JSON.parse(data);

                        if(data.success){

                            $('#right-modal').modal('hide');

                            // dataTablesReqType.draw();

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
});