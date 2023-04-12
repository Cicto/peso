$(document).ready(function () {
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    
    if($('.form-header-sticky').length){
        $('.form-header-sticky').css("top", $("#kt_app_header").height()+"px")
    }

    $('.form-select-search').select2();

    $(".mask-contact-number").mask('N00-000-0000', {
        translation: {
            'N': {
                pattern: /9/,
            }
        }
    });
});

function getBarangaysCitiesAndPronvinces(barangay_id = false){
    let barangays = cities = provinces = null;
    $.ajax({
        url : base_url+`/UtilController/barangaysCitiesAndPronvinces${barangay_id?'/'+barangay_id:''}`,
        type : 'get',
        dataType: 'html',
        async: false,
        success: function(result) {
            result = JSON.parse(result);
            barangays = result.barangays
            cities = result.cities
            provinces = result.provinces
        } 
    })

    return {
        barangays : barangays,
        cities : cities,
        provinces : provinces,
    }
}

async function setBarangaysCitiesAndPronvincesOnDOM(selected_barangay = false){

    $("#user-barangay").html(`<option value="" ${selected_barangay?'':'selected'} disabled >Barangay</option>`)
    $("#user-city").html(`<option value="" disabled >City/Municipality</option>`)
    $("#user-province").html(`<option value="" disabled >Province</option>`)

    const barangaysCitiesAndPronvinces = await getBarangaysCitiesAndPronvinces(selected_barangay)

    barangaysCitiesAndPronvinces.barangays.forEach(barangay => {
        $("#user-province").append(`<option value="${barangay.id}" ${barangay.id == selected_barangay ?'selected':''}>${barangay.brgyDesc}</option>`)
    });
    
    barangaysCitiesAndPronvinces.cities.forEach(city => {
        $("#user-city").append(`<option value="${city.citymunCode}" >${city.citymunDesc}</option>`)
    });

    barangaysCitiesAndPronvinces.provinces.forEach(province => {
        $("#user-province").append(`<option value="${province.provCode}" >${province.provDesc}</option>`)
    });
    
}