function editInputs() {
    let idOrder = '';
    if ($(window).width() <= 600) {
        idOrder = '#contentTableM';
    }else{
        idOrder = '#contentTable';
    }
    console.log(idOrder);
    $('input').prop("disabled", false);
    $('textarea').prop("disabled", false);

    console.log($(idOrder + ' #editLoadOrder'));
    $(idOrder + ' #editLoadOrder').hide();
    $(idOrder + ' #saveLoadOrder').show();
}

function updatePost(id) {
    let idOrder = '';
    if ($(window).width() <= 600) {
        idOrder = '#contentTableM';
    }else{
        idOrder = '#contentTable';
    }
    let modelColor = $(idOrder + ' .modelColor').text().split('//');
    let address_load = $(idOrder + ' .addresses_load').text().split('//');
    let address_download = $(idOrder + ' .info_download').text().split('//');

    console.log(address_download);


    let data = {
        'load_id'                   : id,
        'car[0][model_car]'         : modelColor[0],
        'car[0][color_car]'         : modelColor[1],
        'date_load'                 : $(idOrder + ' .date_load').text(),
        'car[0][vin]'               : $(idOrder + ' .vin').text(),
        'car[0][vin_original]'      : $(idOrder + ' .vin_original').val(),
        'signing'                   : $(idOrder + ' .signing').val(),
        'addresses_load'            : address_load[0],
        'city_load'                 : address_load[1],
        'postal_cod_load'           : address_load[2],
        'phone_load'                : $(idOrder + ' .phone_load').val(),
        'mobile_load'               : $(idOrder + ' .mobile_load').val(),
        'fax'                       : $(idOrder + ' .fax').val(),
        'contact_person'            : $(idOrder + ' .contact_person').val(),
        'car[0][documents]'         : $(idOrder + ' .documents').val(),
        'bill_to'                   : $(idOrder + ' .bill_to').val(),
        'price_order'               : $(idOrder + ' .price').val(),
        'import_company'            : $(idOrder + ' .import_company').val(),
        'addresses_download'        : address_download[0],
        'city_download'             : address_download[1],
        'postal_cod_download'       : address_download[2],
        'contact_download'          : $(idOrder + ' .contact_download').val(),
        'driver_data'               : $(idOrder + ' .driver_data').val(),
        'cmr'                       : $(idOrder + ' .cmr').val(),
        'observations'              : $(idOrder + ' .observations').text(),
        'mobile_download'           : $(idOrder + ' .mobile_download').val(),
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

