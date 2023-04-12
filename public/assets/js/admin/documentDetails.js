$(document).ready(function(){

    $(document).on('submit', '#status-form', function(){

        event.preventDefault();

        Swal.fire({
            title: 'Wait!',
            text: "Are you update Application Status?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#1abc9c',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
          }).then((result) => {
            if (result.isConfirmed) {
                $.post(url+'/updateApplicationStatus/'+pathname[5], $(this).serialize())
                    .done(function(data){

                        data = JSON.parse(data);
                        
                        if(!data.error){

                            $('#latest-status').text($('#application_status option:selected').text());

                            $('#status-timeline').prepend(
                                '<li class="timeline-sm-item">'+
                                    '<span class="timeline-sm-date">'+data.date+'</span>'+
                                    '<h5 class="mt-0 mb-1">'+data.log_message+'</h5>'+
                                    '<p>'+data.time+'</p>'+
                                '</li>'
                            );

                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: data.success_message,
                                showConfirmButton: false,
                            });
                        }
                        else{

                            Swal.fire({
                                position: 'top-end',
                                icon: 'error',
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
        })


    });

    $(document).on('submit', '#comment-form', function(){

        event.preventDefault();
        $.post(url+'/addComments/'+pathname[3], $(this).serialize(), function(data, status){

            if(!data.error){
                $('#comment-body').append(
                    '<li class="clearfix odd">'+
                        '<div class="chat-avatar">'+
                            '<img src="'+pathname[1]+'/'+pathname[2]+'/public/assets/images/users/avatar-1.jpg" class="rounded" alt="Nik Patel">'+
                            '<i>'+data.date+'</i>'+
                        '</div>'+
                        '<div class="conversation-text">'+
                            '<div class="ctext-wrap">'+
                                '<i>You</i>'+
                                '<p>'+
                                    data.comment+
                                '</p>'+
                            '</div>'+
                        '</div>'+
                        '<div class="conversation-actions dropdown">'+
                            '<button class="btn btn-sm btn-link text-reset" data-bs-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical font-18"></i></button>'+
                            '<div class="dropdown-menu">'+
                                '<a class="dropdown-item" href="#">Copy Message</a>'+
                                '<a class="dropdown-item" href="#">Edit</a>'+
                                '<a class="dropdown-item" href="#">Delete</a>'+
                            '</div>'+
                        '</div>'+
                    '</li>'
                );
            }
            else{

            }


        }, 'json');


    });

});