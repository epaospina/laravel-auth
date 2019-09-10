let currentTab = 0;
showTab(currentTab);

function showTab(n) {
    const tab_content = $('.tab');
    tab_content.eq(n).css('display', 'block');
    if (n === 0) {
        $('#prevBtn').css('display', 'none');
    } else {
        $('#prevBtn').css('display', 'inline');
    }
    if (n === (tab_content.length - 1)) {
        $('#nextBtn').text('Guardar');
    } else {
        $('#nextBtn').text('Siguiente');
    }
    fixStepIndicator(n)
}

function nextPrev(n) {
    const tab_content = $('.tab');
    if (n === 1 && !validateForm()) return false;
    tab_content.eq(currentTab).css('display', 'none');
    currentTab = currentTab + n;
    if (currentTab >= tab_content.length) {
        $('#regForm').submit();
        return false;
    }
    showTab(currentTab);
}

function validateForm() {
    let x, y, i, valid = true;
    x = document.getElementsByClassName("tab");
    y = x[currentTab].getElementsByTagName("input");
    for (i = 0; i < y.length; i++) {
        if (y[i].value === "") {
            y[i].className += " invalid";
            valid = false;
        }
    }
    if (valid) {
        $('.step')[currentTab].className += " finish";
    }
    return valid;
}

function fixStepIndicator(n) {
    let i, x = $('.step');
    for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
    }
    x[n].className += " active";
}

function editInputs() {
    $('input').prop("disabled", false);
    $('textarea').prop("disabled", false);
    $('#editLoadOrder').hide();
    $('#saveLoadOrder').show();
}

function updatePost(id) {
    let modelColor = $('#modelColor').val().split('//');
    let address_load = $('#addresses_load').val().split('//');
    let address_download = $('#info_download').val().split('//');
    $("input[id^='modelColor']").each(function( index, element ) {
        console.log(element.value);
    });


    let data = {
        'load_id'                   : id,
        'model_car'                 : modelColor[0],
        'color_car'                 : modelColor[1],
        'vin'                       : $('#vin').val(),
        'signing'                   : $('#signing').val(),
        'addresses_load'            : address_load[0],
        'city_load'                 : address_load[1],
        'postal_cod_load'           : address_load[2],
        'phone_load'                : $('#phone_load').val(),
        'mobile_load'               : $('#mobile_load').val(),
        'fax'                       : $('#fax').val(),
        'contact_person'            : $('#contact_person').val(),
        'documents'                 : $('#documents').val(),
        'bill_to'                   : $('#bill_to').val(),
        'import_company'            : $('#import_company').val(),
        'addresses_download'        : address_download[0],
        'city_download'             : address_download[1],
        'postal_cod_download'       : address_download[2],
        'contact_download'          : $('#contact_download').val(),
        'driver_data'               : $('#driver_data').val(),
        'cmr'                       : $('#cmr').val(),
        'observations'              : $('#observations').val(),
        'mobile_download'           : $('#mobile_download').val(),
    };
    $.ajax({
        url: "/load-orders/"+id,
        type: 'PUT',
        data: data,
        success: function(response) {
            //...
        }
    });
}

function changeId(element, num) {
    element.prop('id', 'car__'+num);
    element.find("input").eq(0).attr('name', "car["+num+"][model_car]");
    element.find("input").eq(1).attr('name', "car["+num+"][color_car]");
    element.find("input").eq(2).attr('name', "car["+num+"][vin]");
    element.find("input").eq(5).attr('name', "car["+num+"][documents]");
    element.find("input").eq(5).attr('name', "car["+num+"][documents]");
    element.find("[class*=delete-car]").attr('class', 'btn btn-danger close delete-car'+num);
}

function addCarForm() {
    let btnAddCar = $('#btnAddCar');
    let num = btnAddCar.attr('data-car');
    num++;
    if (num < 9){
        $( "#car__0" ).clone()
            .prop('id', 'car__'+num)
            .appendTo( "#create_car" );
        let new_car = $("#car__"+num);
        changeId(new_car, num);
        $('.delete-car0').show();
        btnAddCar.attr('data-car', num);
        $('.delete-car'+num).attr('data-car', num);
    }
    return false;
}

function removeCarForm(num) {
    let deleteBlock = $('.delete-car'+num);
    let parentDelete = deleteBlock.parent().parent();
    let btnAddCar = $('#btnAddCar');
    if (parentDelete.attr('id') === "car__0"){
        parentDelete.find('input').each(function( index, element ) {
            element.value = "";
        });
    }else{
        parentDelete.remove();
        let idsCar = $('[id*=car__]');
        let countCar = idsCar.length;
        idsCar.each(function( index){
            changeId($(this), index);
        });
        btnAddCar.attr('data-car', countCar-1);
        deleteBlock.attr('data-car', countCar-1);
    }
}
