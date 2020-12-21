function editInputs() {
    let idOrder = '';
    if ($(window).width() < 600) {
        idOrder = '#contentTableM';
    }else{
        idOrder = '#contentTable';
    }
    $('input').prop("disabled", false);
    $('textarea').prop("disabled", false);

    $(idOrder + ' #editLoadOrder').hide();
    $(idOrder + ' #saveLoadOrder').show();
}

function updatePost(id) {
    let idOrder = '#contentTable';
    let modelColor = $(idOrder + ' .modelColor').val().split('//');
    let address_load = $(idOrder + ' .addresses_load').val().split('//');
    let address_download = $(idOrder + ' .info_download').val().split('//');

    console.log(modelColor);


    let data = {
        'load_id'                   : id,
        'car[0][model_car]'         : modelColor[0],
        'car[0][color_car]'         : modelColor[1],
        'date_load'                 : $(idOrder + ' .date_load').val(),
        'car[0][vin]'               : $(idOrder + ' .vin').val(),
        'car[0][plate_number]'      : $(idOrder + ' .plate_number').val(),
        'car[0][vin_original]'      : $(idOrder + ' .vin_original').val(),
        'signing'                   : $(idOrder + ' .signing').val(),
        'addresses_load'            : address_load[0],
        'city_load'                 : address_load[1],
        'postal_cod_load'           : address_load[2],
        'phone_load'                : $(idOrder + ' .phone_load').val(),
        'mobile_load'               : $(idOrder + ' .mobile_load').val(),
        'fax'                       : $(idOrder + ' .fax').val(),
        'country'                   : $(idOrder + ' #country_load').val(),
        'country_download'          : $(idOrder + ' #country_download').val(),
        'poblacion'                 : $(idOrder + ' .poblacion').val(),
        'payment_type'              : $(idOrder + ' .custom-select').val(),
        'identificacion_fiscal'     : $(idOrder + ' .identificacion_fiscal').val(),
        'domicilio_fiscal'          : $(idOrder + ' .domicilio_fiscal').val(),
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
        'observations'              : $(idOrder + ' .observations').val(),
        'mobile_download'           : $(idOrder + ' .mobile_download').val(),
        'auto_id'                   : $(idOrder + ' .auto_id').val(),
        'pick_up'                   : $(idOrder + ' .pick_up').val(),
    };

    $.ajax({
        url: "/load-orders/"+id,
        type: 'PUT',
        data: data,
        success: function() {
            $('#contentTable .vin_original').val($(idOrder + ' .vin').val());
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

function setTextareaHeight(textareas) {
    textareas.each(function () {
        let textarea = $(this);
        if ( !textarea.hasClass('autoHeightDone') ) {
            textarea.addClass('autoHeightDone');
            let extraHeight = parseInt(textarea.css('padding-top')) + parseInt(textarea.css('padding-bottom')),
                h = textarea[0].scrollHeight - extraHeight;
            textarea.height('auto').height(h);
            textarea.bind('keyup', function() {
                textarea.removeAttr('style');
                h = textarea.get(0).scrollHeight - extraHeight;
                textarea.height(h+'px');
            });
        }
    })
}

