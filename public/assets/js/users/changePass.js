$(document).ready(function(){

    $(document).on('submit', '#changepass-form', function(){

        event.preventDefault();

        let customUrl = '/users/changeUserPassword';

        Swal.fire({
            title: 'Wait',
            text: "Are you sure you want to change your password?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#02a8b5',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {

                $.post(customUrl, $(this).serialize())
                    .done(function(data){

                        data = JSON.parse(data);

                        if(!data.error){

                            $('#change-pass-modal').modal('hide');

                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: data.success_message,
                                showConfirmButton: false,
                                timer: 3000
                            });

                            location.href = '';
                        }
                        else{

                            Swal.fire({
                                // position: 'top-end',
                                icon: 'error',
                                html: data.error_message,
                                showConfirmButton: false,
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