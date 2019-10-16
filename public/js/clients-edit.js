function editInputs(id) {
    $('#'+id+' input').prop("disabled", false);
    $('#'+id+' textarea').prop("disabled", false);
    $('#'+id+' #editLoadOrder').hide();
    $('#'+id+' #saveLoadOrder').show();
}

function updatePost(id, contenedor) {
    let modelColor = $('#'+contenedor+' #modelColor').val().split('//');
    let address_load = $('#'+contenedor+' #addresses_load').val().split('//');
    let address_download = $('#'+contenedor+' #info_download').val().split('//');

    let data = {
        'load_id'                   : id,
        'car[0][model_car]'         : modelColor[0],
        'car[0][color_car]'         : modelColor[1],
        'car[0][vin]'               : $('#'+contenedor+' #vin').val(),
        'car[0][vin_original]'      : $('#'+contenedor+' #vin_original').val(),
        'signing'                   : $('#'+contenedor+' #signing').val(),
        'addresses_load'            : address_load[0],
        'city_load'                 : address_load[1],
        'postal_cod_load'           : address_load[2],
        'phone_load'                : $('#'+contenedor+' #phone_load').val(),
        'mobile_load'               : $('#'+contenedor+' #mobile_load').val(),
        'fax'                       : $('#'+contenedor+' #fax').val(),
        'contact_person'            : $('#'+contenedor+' #contact_person').val(),
        'car[0][documents]'            : $('#'+contenedor+' #documents').val(),
        'bill_to'                   : $('#'+contenedor+' #bill_to').val(),
        'import_company'            : $('#'+contenedor+' #import_company').val(),
        'addresses_download'        : address_download[0],
        'city_download'             : address_download[1],
        'postal_cod_download'       : address_download[2],
        'contact_download'          : $('#'+contenedor+' #contact_download').val(),
        'driver_data'               : $('#'+contenedor+' #driver_data').val(),
        'cmr'                       : $('#'+contenedor+' #cmr').val(),
        'observations'              : $('#'+contenedor+' #observations').val(),
        'mobile_download'           : $('#'+contenedor+' #mobile_download').val(),
    };

    $.ajax({
        url: "/load-orders/"+id,
        type: 'PUT',
        data: data,
        success: function() {
            $('#'+contenedor+' input').prop("disabled", true);
            $('#'+contenedor+' textarea').prop("disabled", true);
            $('#'+contenedor+' #editLoadOrder').show();
            $('#'+contenedor+' #saveLoadOrder').hide();
        }
    });
}
