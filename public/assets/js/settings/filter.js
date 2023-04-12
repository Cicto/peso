$(document).ready(function(){

    let urlVals = new URLSearchParams(window.location.search);
    let tempId = pathname[5];

    $(document).on('submit', '#application-search-form', function(){

        event.preventDefault();
        $('#loader-wrapper').show();

        $.post(url+'/searchApplication/'+tempId+'?visa_id='+urlVals.get('visa_id'), $(this).serialize(), function(data, status){

            if(data.status){

                console.log(data.clientInfo);
                
                $('.preload-icon').remove();
                $('#loader-wrapper').hide();

                $('#req-container button').remove();
                $('#req-container table').remove();

                data.message.forEach(function(i){

                    $('#req-container').append(
                        '<form id = "form_'+i.particular_id+'" >'+
                            '<button type = "submit" class = "btn btn-primary btn-sm float-end mb-1 zip-btn">Zip & Download</button>'+
                            '<input type = "hidden" class = "form-control" value = "'+data.clientInfo.firstname+'_'+data.clientInfo.lastname+'_'+data.clientInfo.user_id+'" name = "folderName">'+
                            '<input type = "hidden" class = "form-control" value = "'+i.particular_title+'" name = "particularName">'+
                            '<table class = "table table-row-dashed align-middle gs-0 gy-3 my-0 table-sm mb-10">'+
                                '<thead class = "">'+
                                    '<tr style = "width: 1000px">'+
                                        '<th colspan="2" class = "text-dark fw-bold">'+
                                            '<div class="symbol symbol-50px me-2">'+
                                                '<span class="symbol-label bg-light-success">'+
                                                    '<span class="svg-icon svg-icon-2x svg-icon-success ri-list-unordered"></span>'+
                                                '</span>'+
                                            '</div>'+
                                            i.particular_title+
                                        '</th>'+
                                        '<th style = "width: 50px" class = "text-center">'+
                                            '<div class="form-check ms-2">'+
                                                '<input class="form-check-input checkAll" type="checkbox" value="" id="flexCheckDefault" checked>'+
                                            '</div>'+
                                        '</th>'+
                                    '</tr>'+
                                '</thead>'+
                                '<tbody class = "req_'+i.particular_id+'">'+
                                    
                                '</tbody>'+
                            '</table>'+
                        '</form>'
                    );

                    if(i.requirements != false){

                        i.requirements.forEach(function(req){
                            
                            // $('.req_'+i.particular_id).append(
                            //     '<tr>'+
                            //         '<td style = "width: 800px">'+
                            //             req.reqName+
                            //         '</td>'+
                            //         '<td class = "files_'+i.particular_id+req.reqId+'"></td>'+
                            //     '</tr>'
                            // );
                            
                            if(req.files != false){

                                let counter = 0;

                                req.files.forEach(function(file){
                                    
                                    if(counter != 0){
                                        $('.req_'+i.particular_id).append(
                                            '<tr>'+
                                                // '<td class = "text-end" style = "width: 500px">'+file.filename+'</td>'+
                                                '<td style = "width: 100px">'+
                                                    '<div class = "btn-groups me-1 float-end" id = "tooltip-container">'+
                                                        // '<button class = "btn btn-outline-primary btn-sm" disabled>'+file.filename+'</button>'+
                                                        '<a href = "'+data.fileUrl+file.filename+'" target = "_blank" class = "btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"><span class = "ri-eye-line"></span></a>'+
                                                        '<a href = "'+data.fileUrl+file.filename+'" target = "_blank" class = "btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" download><span class = "ri-download-cloud-2-line"></span></a>'+
                                                    '</div>'+
                                                '</td>'+
                                                '<td>'+
                                                    '<div class="form-check ms-2">'+
                                                        '<input class="form-check-input indCheck" type="checkbox" value="'+file.filename+'" id="flexCheckDefault" name = "docsFilename[]"  checked>'+
                                                    '</div>'+
                                                '</td>'+
                                            '</tr>'
                                        );
                                    }
                                    else{
                                        $('.req_'+i.particular_id).append(
                                            '<tr>'+
                                                '<td rowspan = "'+req.files.length+'" class = "ps-10">'+
                                                    '<div class="symbol symbol-20px me-2">'+
                                                        '<span class="symbol-label bg-light-success">'+
                                                            '<span class="svg-icon svg-icon-2x svg-icon-primary ri-play-mini-fill"></span>'+
                                                        '</span>'+
                                                    '</div>'+
                                                    req.reqName+
                                                '</td>'+
                                                // '<td class = "text-end">'+file.filename+'</td>'+
                                                '<td>'+
                                                    '<div class = "btn-groups me-1 float-end" id = "tooltip-container">'+
                                                        // '<button class = "btn btn-outline-primary btn-sm" disabled>'+file.filename+'</button>'+
                                                        '<a href = "'+data.fileUrl+file.filename+'" target = "_blank" class = "btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" ><span class = "ri-eye-line"></span></a>'+
                                                        '<a href = "'+data.fileUrl+file.filename+'" target = "_blank" class = "btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" download><span class = "ri-download-cloud-2-line"></span></a>'+
                                                    '</div>'+
                                                '</td>'+
                                                '<td>'+
                                                    '<div class="form-check ms-2">'+
                                                        '<input class="form-check-input indCheck" type="checkbox" value="'+file.filename+'" id="flexCheckDefault" name = "docsFilename[]" checked>'+
                                                    '</div>'+
                                                '</td>'+
                                            '</tr>'
                                        );
                                    }

                                    counter++;

                                });

                            }
                            else{
                                $('.req_'+i.particular_id).append(
                                    '<tr>'+
                                        '<td class = "ps-10">'+
                                            '<div class="symbol symbol-20px me-2">'+
                                                '<span class="symbol-label bg-light-success">'+
                                                    '<span class="svg-icon svg-icon-2x svg-icon-primary ri-play-mini-fill"></span>'+
                                                '</span>'+
                                            '</div>'+
                                            req.reqName+
                                        '</td>'+
                                        '<td>'+
                                            
                                        '</td>'+
                                    '</tr>'
                                );
                                
                            }
                            
                        });
                    }
                    else{



                    }
                    

                    
                });
            }
            else{

                $('#loader-wrapper').hide();

                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: data.message,
                    showConfirmButton: false,
                    timer: 3000
                });
            }
        }, 'json');
    });

    $(document).on('click', '.zip-btn', function(){

        let folderName = $(this).parent().attr('data-folder');
        let particularName = $(this).parent().attr('data-particular');
        $('#loader-wrapper').show();
        $(this).parent().submit(function(){

            event.preventDefault();

            $.post(url+'/zipFile', $(this).serialize(), function(data, status){
                
                if(data.status){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: data.message,
                        showConfirmButton: false,
                        timer: 3000
                    });

                    $('#loader-wrapper').hide();
                    window.open(data.zipLocation, '_blank').focus();
                }
                else{
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: data.message,
                        showConfirmButton: false,
                        timer: 3000
                    });
                    $('#loader-wrapper').hide();
                }

            }, 'json');

        });

        // alert($(this).parent().attr('id'));

    });

    $(document).on('click', '.checkAll', function(){

        let parentId = $(this).parent().parent().parent().parent().parent().parent().attr('id');
        
        $('#'+parentId+' input:checkbox').not(this).prop('checked', this.checked);
    });

    // $('.checkAll').click(function() {

    //     let parentId = $(this).parent().parent().parent().parent().parent().parent().attr('id');

    //     if ($(this).is(':checked')) {
    //         $('#'+parentId+' input:checkbox').attr('checked', true);
    //     } else {
    //         $('#'+parentId+' input:checkbox').attr('checked', false);
    //     }
    // });
    
    $(document).on('click', '.indCheck', function(){

        let parentId = $(this).parent().parent().parent().parent().parent().parent().attr('id');
       
        if (!$(this).is(':checked')) {
            $('#'+parentId+' .checkAll').prop('checked', false);
        }
    });

});