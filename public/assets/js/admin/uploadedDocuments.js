$(document).ready(function(){

    $('.upload-form input[type="file"]').change(function(){
        
        var formData = new FormData($('#'+$(this).parent().parent().attr('id'))[0]);

        var parentElement = $(this).parent();

        // parentElement.addClass('disabled').html(
        //     '<span><i class="mdi mdi-cloud-upload me-1"></i>Uploading</span>'+
        //     '<input type="file" name = "userDocs" class="upload">'
        // );
        
        
        var appId = parentElement.parent().attr('data-appid');
        var rtId = parentElement.parent().attr('data-rtid');
        var reqId = parentElement.parent().attr('data-reqid');
        
        $.ajax({
            method: 'post',
            processData: false,
            contentType: false,
            cache: false,
            data: formData,
            dataType: 'json',
            enctype: 'multipart/form-data',
            url: url+'/uploadDocuments?appId='+appId+'&rtId='+rtId+'&reqId='+reqId,
            success: function (response) {

                if(response.status){

                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: response.message,
                        showConfirmButton: false,
                        timer: 3000
                    });

                    $('#status'+appId+rtId+reqId).html('<h2 class = "text-success"><span class = "ri-check-line"></span></h2>');

                    $('.text'+appId+rtId+reqId).remove();
                    $('.fileList'+appId+rtId+reqId+' .uploads-list').append(
                        '<div class="btn-group mt-1">'+
                            '<a type="button" href = "'+response.url+'" target = "_blank" class="btn btn-outline-success btn-xs" data-bs-toggle="tooltip" data-bs-placement="top" title data-bs-original-title="'+response.filename+'" ><span class = "ri-file-list-line"></span></a>'+
                            '<a type="button" href = "'+response.url+'" target = "_blank" class="btn btn-outline-success btn-xs" data-bs-toggle="tooltip" data-bs-placement="top" title data-bs-original-title="'+response.filename+'" download><span class = "ri-download-cloud-2-line"></span></a>'+
                            '<button type="button" data-id = "'+response.upload_id+'" class="btn btn-danger btn-xs delete-file-btn"><span class = "ri-delete-bin-line"></span></button>'+
                        '</div>'
                    );
                    // parentElement.removeClass('disabled btn btn-sm btn-primary').html(
                    //     '<div class="btn-group mb-2">'+
                    //         '<a href = "'+response.url+'" target = "_blank" class = "btn btn-outline-success btn-sm">View File</a>'+
                    //         '<button class = "btn btn-primary btn-sm">Replace</button>'+
                    //     '</div>'
                    // );
                    
                }
                else{

                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: response.message,
                        showConfirmButton: false,
                        timer: 3000
                    });  
                    
                }
            }
        });
    });

    $('#additional-form').on('submit', function(){

        event.preventDefault();

        var formData = new FormData(this);

        var appId = $(this).attr('data-appid');

        $.ajax({
            method: 'post',
            processData: false,
            contentType: false,
            cache: false,
            data: formData,
            dataType: 'json',
            enctype: 'multipart/form-data',
            url: url+'/uploadAdditionFile?appId='+appId,
            success: function (response) {

                if(response.status){

                    $('#additional-form')[0].reset();

                    $('#additionalDocs-cont').append(
                        '<tr>'+
                            '<td>'+response.filename+'</td>'+
                            '<td>'+
                                '<a  class = "btn btn-primary btn-sm me-1" href = "'+response.url+'" target = "_blank"><span class="ri-eye-line"></span></span></a>'+
                                '<a  class = "btn btn-primary btn-sm" href = "'+response.url+'" target = "_blank" download><span class="ri-download-cloud-2-line"></span></a>'+
                            '</td>'+
                        '</tr>'
                    );

                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: response.message,
                        showConfirmButton: false,
                        timer: 3000
                    });
                    
                }
                else{

                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: response.message,
                        showConfirmButton: false,
                        timer: 3000
                    });  
                    
                }
            }
        });

    });

    $(document).on('click', '.delete-file-btn', function(){

        let upload_id = $(this).attr('data-id');
        let parentDiv = $(this).parent();

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

                $.post(url+'/removeUploadedItem/'+upload_id, {})
                    .done(function(data){

                        data = JSON.parse(data);

                        if(!data.error){

                            parentDiv.remove();

                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: data.message,
                                showConfirmButton: false,
                                timer: 3000
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

});