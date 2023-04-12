$(document).ready(function(){
    let addOns = {};
    let packageTotal = 0.00;

    $(document).on('submit', '#immigrationForm', function(){

        event.preventDefault();

        $.post(url+'/applicationImmigration', $(this).serialize())
            .done(function(data){

                data = JSON.parse(data);

                if(!data.error){

                    $.toast({
                        heading: 'Success!',
                        text: data.success_message,
                        // hideAfter: false,
                        icon: 'success',
                        position: 'bottom-center',
                        showHideTransition: 'slide'
                    });

                    drawTableToReview();

                }
                else{

                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'No updates!',
                        showConfirmButton: false,
                        timer: 3000
                    });

                    drawTableToReview();

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

    function drawTableToReview(){
        var table1ids = [], table2ids = [], table3ids = [];

        $('#q1_option1-review').text($('input[name="application_q1"]:checked').val());
        $('#q2_option1-review').text($('input[name="application_q2"]:checked').val());
        $('#q3_option1-review').text($('input[name="application_q3"]:checked').val());
        $('#q4_option1-review').text($('input[name="application_q4"]:checked').val());

        //get all tr IDs
        $('#table1-list tr').each(function(){
            table1ids.push($(this).attr('id'));
        });

        $('#table2-list tr').each(function(){
            table2ids.push($(this).attr('id'));
        });

        $('#table3-list tr').each(function(){
            table3ids.push($(this).attr('id'));
        });

        $('#table1-list-review tr').remove();
        $('#table2-list-review tr').remove();
        $('#table3-list-review tr').remove();

        table1ids.forEach(function(e){
            $('#table1-list-review').append('<tr></tr>');

            $('#table1-list-review tr:last').append('<td>'+$('#application_q2_country'+e).val()+'</td>');
            $('#table1-list-review tr:last').append('<td>'+$('#application_q2_purpose_of_travel'+e).val()+'</td>');
            $('#table1-list-review tr:last').append('<td>'+$('#application_q2_date'+e).val()+'</td>');
            $('#table1-list-review tr:last').append('<td>'+$('#application_q2_reason'+e).val()+'</td>');
        });


        table2ids.forEach(function(e){
            $('#table2-list-review').append('<tr></tr>');

            $('#table2-list-review tr:last').append('<td>'+$('#application_q3_country'+e).val()+'</td>');
            $('#table2-list-review tr:last').append('<td>'+$('#application_q3_purpose_of_travel'+e).val()+'</td>');
            $('#table2-list-review tr:last').append('<td>'+$('#application_q3_date'+e).val()+'</td>');
            $('#table2-list-review tr:last').append('<td>'+$('#application_q3_reason'+e).val()+'</td>');
        });

        table3ids.forEach(function(e){
            $('#table3-list-review').append('<tr></tr>');

            $('#table3-list-review tr:last').append('<td>'+$('#application_q4_name'+e).val()+'</td>');
            $('#table3-list-review tr:last').append('<td>'+$('#application_q4_relationship'+e).val()+'</td>');
            $('#table3-list-review tr:last').append('<td>'+$('#application_q4_address'+e).val()+'</td>');
            $('#table3-list-review tr:last').append('<td>'+$('#application_q4_residence'+e).val()+'</td>');
        });
    }

    $(document).on('submit', '#programDetailsForm', function(){

        event.preventDefault();

        $.post(url+'/applicationProgramDetails', $(this).serialize())
            .done(function(data){

                data = JSON.parse(data);

                if(!data.error){

                    $.toast({
                        heading: 'Success!',
                        text: data.success_message,
                        // hideAfter: false,
                        icon: 'success',
                        position: 'bottom-center',
                        showHideTransition: 'slide'
                    });

                    
                }
                else{
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'No updates!',
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

    });

    $(document).on('submit', '#healthDeclarationForm', function(){

        event.preventDefault();

        $.post(url+'/healthDeclarationDetails', $(this).serialize())
            .done(function(data){

                data = JSON.parse(data);

                if(!data.error){

                    $.toast({
                        heading: 'Success!',
                        text: data.success_message,
                        // hideAfter: false,
                        icon: 'success',
                        position: 'bottom-center',
                        showHideTransition: 'slide'
                    });

                    $('#with_disability-review').text($('input[name="with_disability"]:checked').val());
                    $('#is_vaccinated-review').text($('input[name="is_vaccinated"]:checked').val());


                    if($('input[name="with_disability"]:checked').val() == 'Yes'){
                        $('#yes_disability-review').text($('input[name="yes_disability"]').val());
                    }
                    else{
                        $('#yes_disability-review').text('');
                    }


                    $('#emergency-contact-list-review').append(
                        '<tr>'+
                            '<td>'+$('input[name="first_emergency_contact_name"]').val()+'</td>'+
                            '<td>'+$('input[name="first_emergency_contact_relationship"]').val()+'</td>'+
                            '<td>'+$('input[name="first_emergency_contact_number"]').val()+'</td>'+
                        '</tr>'
                    );

                    if($('input[name="first_emergency_contact_name"]').val() != ''){
                        $('#emergency-contact-list-review').append(
                            '<tr>'+
                                '<td>'+$('input[name="second_emergency_contact_name"]').val()+'</td>'+
                                '<td>'+$('input[name="second_emergency_contact_relationship"]').val()+'</td>'+
                                '<td>'+$('input[name="second_emergency_contact_number"]').val()+'</td>'+
                            '</tr>'
                        );
                    }

                }
                else{

                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'No updates!',
                        showConfirmButton: false,
                        timer: 3000
                    });

                    $('#with_disability-review').text($('input[name="with_disability"]:checked').val());
                    $('#is_vaccinated-review').text($('input[name="is_vaccinated"]:checked').val());


                    if($('input[name="with_disability"]:checked').val() == 'Yes'){
                        $('#yes_disability-review').text($('input[name="yes_disability"]').val());
                    }
                    else{
                        $('#yes_disability-review').text('');
                    }


                    $('#emergency-contact-list-review').append(
                        '<tr>'+
                            '<td>'+$('input[name="first_emergency_contact_name"]').val()+'</td>'+
                            '<td>'+$('input[name="first_emergency_contact_relationship"]').val()+'</td>'+
                            '<td>'+$('input[name="first_emergency_contact_number"]').val()+'</td>'+
                        '</tr>'
                    );

                    if($('input[name="first_emergency_contact_name"]').val() != ''){
                        $('#emergency-contact-list-review').append(
                            '<tr>'+
                                '<td>'+$('input[name="second_emergency_contact_name"]').val()+'</td>'+
                                '<td>'+$('input[name="second_emergency_contact_relationship"]').val()+'</td>'+
                                '<td>'+$('input[name="second_emergency_contact_number"]').val()+'</td>'+
                            '</tr>'
                        );
                    }
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

    $(document).on('submit', '#packagePlanForm', function(){

        event.preventDefault();

        $.post(url+'/packagePlanDetails', {formData: $(this).serializeArray(), addons: addOns, totalPrice: $('#package-total').text()})
            .done(function(data){

                data = JSON.parse(data);    

                if(!data.error){

                    $('#program-list-review tr').remove();
                    
                    if($('#first_choice_school').val() != ''){
                        $('#program-list-review').append(
                            '<tr>'+
                                '<td>First Choice</td>'+
                                '<td>'+$('#first_choice_school').val()+'</td>'+
                                '<td>'+$('#first_choice_address').val()+'</td>'+
                                '<td>'+$('#first_choice_program').val()+'</td>'+
                                '<td>'+$('#first_choice_date').val()+'</td>'+
                            '</tr>'
                        );
                    }

                    if($('#second_choice_school').val() != ''){
                        $('#program-list-review').append(
                            '<tr>'+
                                '<td>Second Choice</td>'+
                                '<td>'+$('#second_choice_school').val()+'</td>'+
                                '<td>'+$('#second_choice_address').val()+'</td>'+
                                '<td>'+$('#second_choice_program').val()+'</td>'+
                                '<td>'+$('#second_choice_date').val()+'</td>'+
                            '</tr>'
                        );
                    }

                    if($('#third_choice_school').val() != ''){
                        $('#program-list-review').append(
                            '<tr>'+
                                '<td>Third Choice</td>'+
                                '<td>'+$('#third_choice_school').val()+'</td>'+
                                '<td>'+$('#third_choice_address').val()+'</td>'+
                                '<td>'+$('#third_choice_program').val()+'</td>'+
                                '<td>'+$('#third_choice_date').val()+'</td>'+
                            '</tr>'
                        );
                    }

                    $.toast({
                        heading: 'Success!',
                        text: data.success_message,
                        // hideAfter: false,
                        icon: 'success',
                        position: 'bottom-center',
                        showHideTransition: 'slide'
                    })
                }
                else{

                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'No updates!',
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

    });

    $(document).on('click', '.visa-item', function(){

        var visa_id = $(this).attr('data-id');
        $('#visaItem').val(visa_id);
        $('#visaPrice').val('');
        $('#loader-wrapper').show();

        //change href value for terms and condition link
        let dataLink = $('#terms-condition-link').attr('data-link');

        if($(this).attr('data-id') == 3){
            $('#terms-condition-link').attr('href', dataLink+'international-student.pdf');
        }else{
            $('#terms-condition-link').attr('href', dataLink+'generic.pdf');
        }
        
        $('.visa-item').each(function(){
            $(this).removeClass('selected-item');
            $('.visa_desc').removeClass('text-white').addClass('text-primary');
            $('.visa_click').removeClass('text-white').addClass('text-muted');
        });

        $(this).addClass('selected-item');
        $('.selected-item .card-body h3, .selected-item .card-body small').removeClass('text-primary, text-muted').addClass('text-white');


        $.post(url+'/getVisaPrices/'+visa_id, {})
            .done(function(data){

                data = JSON.parse(data);
                $('#visa-prices-table tbody tr').remove();
                $('#visa-addons-table tbody tr').remove();
                $('#package-total').text('0.00');
                if(!data.error){
                    data.success.forEach(function(e){
                        var price = parseFloat(e.vp_price);
                        $('#visa-prices-table tbody').append(
                            '<tr class = "prices-item" data-id = "'+e.vp_id+'" data-price = "'+e.vp_price+'" data-desc = "'+e.remarks+'">'+
                                '<td>'+e.vp_code+'</td>'+
                                '<td>'+price.toLocaleString()+'</td>'+
                                '<td>'+e.remarks+'</td>'+
                            +'</tr>'
                        );
                    });

                    if(data.addOns != false){

                        data.addOns.forEach(function(e){

                            var addOnsPrice = parseFloat(e.addon_price);
                            $('#visa-addons-table tbody').append(
                                '<tr class = "addons-item" data-code = "'+e.addon_code+'" data-id = "'+e.addon_id+'" data-price = "'+e.addon_price+'" data-desc = "'+e.addon_description+'" data-remarks = "'+e.addon_remarks+'">'+
                                    '<td>'+e.addon_code+'</td>'+
                                    '<td>'+e.addon_description+'</td>'+
                                    '<td>'+addOnsPrice.toLocaleString()+'</td>'+
                                    '<td>'+e.addon_remarks+'</td>'+
                                +'</tr>'
                            );
                        });
                    }

                    $('#visa-type-review tr').remove();
                    $('#visa-type-review').append(
                        '<tr id = "visa-info-review">'+
                            '<td>'+$('.visa-item.selected-item .card-body .visa_desc').text()+'</td>'+
                        '</tr>'
                    );

                    if(visa_id == 3){
                        $('#choices-list-container').show();

                        $('#first_choice_school').attr('required', 'required');
                        $('#first_choice_address').attr('required', 'required');
                        $('#first_choice_program').attr('required', 'required');
                        $('#first_choice_date').attr('required', 'required');
                    }else{
                        $('#choices-list-container').hide();

                        $('#first_choice_school').attr('required', false);
                        $('#first_choice_address').attr('required', false);
                        $('#first_choice_program').attr('required', false);
                        $('#first_choice_date').attr('required', false);
                    }

                    $('#loader-wrapper').hide();
                }
                else{

                    $('#visa-prices-table tbody tr').remove();

                    $('#loader-wrapper').hide();
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'No Data Found!',
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

    });

    $(document).on('submit', '#reviewForm', function(){

        event.preventDefault();

        Swal.fire({
            title: 'Are you finish this application?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#1abc9c',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
          }).then((result) => {
            if (result.isConfirmed) {
                $.post(url+'/clientAgreement/', {})
                    .done(function(data){

                        data = JSON.parse(data);
                        
                        if(!data.error){
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: data.success_message+'. You will be redirected.',
                                showConfirmButton: false,
                            });

                            location.href = '/requirements';
                        }
                        else{

                            Swal.fire({
                                position: 'top-end',
                                icon: 'error',
                                title: 'No Data Found!',
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

    $(document).on('click', '.prices-item', function(){

        var price = $(this).attr('data-id');
        $('#visaPackage').val(price);
        $('.prices-item').each(function(){
            $(this).removeClass('selected-item text-white');
        });
        $(this).addClass('selected-item text-white');

        $('.visa-other-info').remove();
        $('#visa-info-review').append(
            '<td class = "visa-other-info">'+$('.prices-item.selected-item').attr('data-desc')+'</td>'+
            '<td class = "visa-other-info">'+$('.prices-item.selected-item').attr('data-price')+'</td>'
        );
        $('#package-total, #package-total-review').text(computeTotal().toLocaleString());
        $('#visaPrice').val(computeTotal());
    });

    $(document).on('click', '.addons-item', function(){

        var addOnID = $(this).attr('data-id');
        var addOnPrice = $(this).attr('data-price');
        var addOnDesc = $(this).attr('data-desc');

        if($(this).hasClass('selected-item')){
            $(this).removeClass('selected-item text-white');

            delete addOns[addOnID];

            $('#code'+$(this).attr('data-code')).remove();
            $('#package-total, #package-total-review').text(computeTotal().toLocaleString());
            $('#visaPrice').val(computeTotal());
        }
        else{
            $(this).addClass('selected-item text-white');

            $('#visa-addons-review').append(
                '<tr id = "code'+$(this).attr('data-code')+'">'+
                    '<td>'+$(this).attr('data-desc')+'</td>'+
                    '<td>'+$(this).attr('data-price')+'</td>'+
                    '<td>'+$(this).attr('data-remarks')+'</td>'+
                '</tr>'
            );

            addOns[addOnID] = {id: addOnID, price: addOnPrice, desc: addOnDesc};
            $('#package-total, #package-total-review').text(computeTotal().toLocaleString());
            $('#visaPrice').val(computeTotal());
        }

    });

    function computeTotal(){

        let total = 0.00;

        total = parseFloat($('#visa-prices-table .selected-item').attr('data-price'));

        if(Object.keys(addOns).length > 0){
            for (const key in addOns) {
                const value = addOns[key];
                total += parseFloat(value.price);
            }
        }

        if(!isNaN(total)){
            return total;
        }


    }

    $('input[name="application_q2"]').change(function(){

        var randid = Math.floor(Math.random() * (1000 - 1 + 1)) + 1000;
        if(this.value == 'Yes'){

            $('#table1-list-container').show();

            $('#table1-list').append(
                '<tr id = "'+randid+'">'+
                    '<td>'+
                        '<input type="text" class = "form-control" name = "application_q2_country[]" id = "application_q2_country'+randid+'" required>'+
                    '</td>'+
                    '<td>'+
                        '<input type="text" class = "form-control" name = "application_q2_purpose_of_travel[]" id = "application_q2_purpose_of_travel'+randid+'" required>'+
                    '</td>'+
                    '<td>'+
                        '<input type="text" class = "form-control" name = "application_q2_date[]" id = "application_q2_date'+randid+'" required>'+
                    '</td>'+
                    '<td>'+
                        '<input type="text" class = "form-control" name = "application_q2_reason[]" id = "application_q2_reason'+randid+'" required>'+
                    '</td>'+
                    '<td>'+
                        '<button class = "btn btn-outline-primary btn-xs remove-row" type = "button"><span class="ri-close-line"></span></button>'+
                    '</td>'+
                '</tr>'
            );
        }
        else{
            $('#table1-list-container').hide();
            $('#table1-list tr').remove();
        }

    });

    $(document).on('click', '#add-tr-table1', function(){
        var randid = Math.floor(Math.random() * (1000 - 1 + 1)) + 1000;

        $('#table1-list').append(
            '<tr id = "'+randid+'">'+
                '<td>'+
                    '<input type="text" class = "form-control" name = "application_q2_country[]" id = "application_q2_country'+randid+'" required>'+
                '</td>'+
                '<td>'+
                    '<input type="text" class = "form-control" name = "application_q2_purpose_of_travel[]" id = "application_q2_purpose_of_travel'+randid+'" required>'+
                '</td>'+
                '<td>'+
                    '<input type="text" class = "form-control" name = "application_q2_date[]" id = "application_q2_date'+randid+'" required>'+
                '</td>'+
                '<td>'+
                    '<input type="text" class = "form-control" name = "application_q2_reason[]" id = "application_q2_reason'+randid+'" required>'+
                '</td>'+
                '<td>'+
                    '<button class = "btn btn-outline-primary btn-xs remove-row" type = "button"><span class="ri-close-line"></span></button>'+
                '</td>'+
            '</tr>'
        );

    });

    $('input[name="application_q3"]').change(function(){
        var randid = Math.floor(Math.random() * (1000 - 1 + 1)) + 1000;
        if(this.value == 'Yes'){

            $('#table2-list-container').show();

            $('#table2-list').append(
                '<tr id = "'+randid+'">'+
                    '<td>'+
                        '<input type="text" class = "form-control" name = "application_q3_country[]" id = "application_q3_country'+randid+'" required>'+
                    '</td>'+
                    '<td>'+
                        '<input type="text" class = "form-control" name = "application_q3_purpose_of_travel[]" id = "application_q3_purpose_of_travel'+randid+'" required>'+
                    '</td>'+
                    '<td>'+
                        '<input type="text" class = "form-control" name = "application_q3_date[]" id = "application_q3_date'+randid+'" required>'+
                    '</td>'+
                    '<td>'+
                        '<input type="text" class = "form-control" name = "application_q3_reason[]" id = "application_q3_reason'+randid+'" required>'+
                    '</td>'+
                    '<td>'+
                        '<button class = "btn btn-outline-primary btn-xs"><span class="ri-close-line"></span></button>'+
                    '</td>'+
                '</tr>'
            );
        }
        else{
            $('#table2-list-container').hide();
            $('#table2-list tr').remove();
        }

    });

    $(document).on('click', '#add-tr-table2', function(){
        var randid = Math.floor(Math.random() * (1000 - 1 + 1)) + 1000;
        $('#table2-list').append(
            '<tr id = "'+randid+'">'+
                '<td>'+
                    '<input type="text" class = "form-control" name = "application_q3_country[]" id = "application_q3_country'+randid+'" required>'+
                '</td>'+
                '<td>'+
                    '<input type="text" class = "form-control" name = "application_q3_purpose_of_travel[]" id = "application_q3_purpose_of_travel'+randid+'" required>'+
                '</td>'+
                '<td>'+
                    '<input type="text" class = "form-control" name = "application_q3_date[]" id = "application_q3_date'+randid+'" required>'+
                '</td>'+
                '<td>'+
                    '<input type="text" class = "form-control" name = "application_q3_reason[]" id = "application_q3_reason'+randid+'" required>'+
                '</td>'+
                '<td>'+
                    '<button class = "btn btn-outline-primary btn-xs"><span class="ri-close-line"></span></button>'+
                '</td>'+
            '</tr>'
        );

    });

    $('input[name="application_q4"]').change(function(){
        var randid = Math.floor(Math.random() * (1000 - 1 + 1)) + 1000;
        if(this.value == 'Yes'){

            $('#table3-list-container').show();

            $('#table3-list').append(
                '<tr id = "'+randid+'">'+
                    '<td>'+
                        '<input type="text" class = "form-control" name = "application_q4_name[]" id = "application_q4_name'+randid+'" required>'+
                    '</td>'+
                    '<td>'+
                        '<input type="text" class = "form-control" name = "application_q4_relationship[]" id = "application_q4_relationship'+randid+'" required>'+
                    '</td>'+
                    '<td>'+
                        '<input type="text" class = "form-control" name = "application_q4_address[]" id = "application_q4_address'+randid+'" required>'+
                    '</td>'+
                    '<td>'+
                        '<input type="text" class = "form-control" name = "application_q4_residence[]" id = "application_q4_residence'+randid+'" required>'+
                    '</td>'+
                    '<td>'+
                        '<button class = "btn btn-outline-primary btn-xs remove-row" type = "button"><span class="ri-close-line"></span></button>'+
                    '</td>'+
                '</tr>'
            );
        }
        else{
            $('#table3-list-container').hide();
            $('#table3-list tr').remove();
        }

    });

    $(document).on('click', '#add-tr-table3', function(){
        var randid = Math.floor(Math.random() * (1000 - 1 + 1)) + 1000;
        $('#table3-list').append(
            '<tr id = "'+randid+'">'+
                '<td>'+
                    '<input type="text" class = "form-control" name = "application_q4_name[]" id = "application_q4_name'+randid+'" required>'+
                '</td>'+
                '<td>'+
                    '<input type="text" class = "form-control" name = "application_q4_relationship[]" id = "application_q4_relationship'+randid+'" required>'+
                '</td>'+
                '<td>'+
                    '<input type="text" class = "form-control" name = "application_q4_address[]" id = "application_q4_address'+randid+'" required>'+
                '</td>'+
                '<td>'+
                    '<input type="text" class = "form-control" name = "application_q4_residence[]" id = "application_q4_residence'+randid+'" required>'+
                '</td>'+
                '<td>'+
                    '<button class = "btn btn-outline-primary btn-xs remove-row" type = "button"><span class="ri-close-line"></span></button>'+
                '</td>'+
            '</tr>'
        );
    });

    $('input[name="with_disability"]').change(function(){

        if(this.value == 'Yes'){
            $('#disability-container').show();
        }
        else{
            $('#disability-container').hide();
        }

    });

    $(document).on('click', '.remove-row', function(){

        $(this).parent().parent().remove();

    });

    $("#btnSave").bind("click", function () {
        var base64 = $('#example')[0].toDataURL();
        $("#imgCapture").attr("src", base64);
        $("#imgCapture").show();
    });

    var sketchpad = new Sketchpad({
        penSize: 5,
        element: '#sketchpad',
        width: 800,
        height: 400
    });
});