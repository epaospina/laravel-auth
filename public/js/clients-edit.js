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

    let data = {
        'load_id'                   : id,
        'car[0][model_car]'         : modelColor[0],
        'car[0][color_car]'         : modelColor[1],
        'date_load'                 : $('#date_load').val(),
        'car[0][vin]'               : $('#vin').val(),
        'car[0][vin_original]'      : $('#vin_original').val(),
        'signing'                   : $('#signing').val(),
        'addresses_load'            : address_load[0],
        'city_load'                 : address_load[1],
        'postal_cod_load'           : address_load[2],
        'phone_load'                : $('#phone_load').val(),
        'mobile_load'               : $('#mobile_load').val(),
        'fax'                       : $('#fax').val(),
        'contact_person'            : $('#contact_person').val(),
        'car[0][documents]'         : $('#documents').val(),
        'bill_to'                   : $('#bill_to').val(),
        'price_order'               : $('#price').val(),
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
        success: function() {
            $('input').prop("disabled", true);
            $('textarea').prop("disabled", true);
            $('#editLoadOrder').show();
            $('#saveLoadOrder').hide();
        }
    });
}

function changeType(selectType) {
    if ($(selectType).val() === 'otros'){
        $(selectType).after('<input class="m-2 col-4" type="text" placeholder="Cual?"/>')
    }
}

