function editInputs() {
    let allInputs = $('input');
    allInputs.css({"border": "2px solid blue", "margin": "1rem"});
    allInputs.parent().find("span").removeClass("d-none");
    allInputs.removeClass("d-none");
    allInputs.prop("disabled", false);
    $('.infoLabel').addClass("d-none");
    $('textarea').prop("disabled", false);

    $('#editLoadOrder').hide();
    $('#saveLoadOrder').show();
}

function updatePost(id) {
    let idOrder = '#contentTable';
    let data = {
        'load_id'               : id,
        'car[0][marca_car]'     : $(idOrder + ' #marca_car').val(),
        'car[0][model_car]'     : $(idOrder + ' #model_car').val(),
        'car[0][color_car]'     : $(idOrder + ' #color_car').val(),
        'car[0][vin]'           : $(idOrder + ' #vin').val(),
        'car[0][vin_original]'  : $(idOrder + ' #vin_original').text(),
        'car[0][plate_number]'  : $(idOrder + ' #plate_number').val(),
        'auto_id'               : $(idOrder + ' #auto_id').val(),
        'pick_up'               : $(idOrder + ' #pick_up').val(),
        'signing'               : $(idOrder + ' #signing').val(),
        'addresses_load'        : $(idOrder + ' #addresses_load').val(),
        'city_load'             : $(idOrder + ' #city_load').val(),
        'postal_cod_load'       : $(idOrder + ' #postal_cod_load').val(),
        'data_load'             : $(idOrder + ' #data_load').val(),
        'mobile_load'           : $(idOrder + ' #mobile_load').val(),
        'signing_download'      : $(idOrder + ' #signing_download').val(),
        'addresses_download'    : $(idOrder + ' #addresses_download').val(),
        'city_download'         : $(idOrder + ' #city_download').val(),
        'postal_cod_download'   : $(idOrder + ' #postal_cod_download').val(),
        'contact_download'      : $(idOrder + ' #contact_download').val(),
        'mobile_download'       : $(idOrder + ' #mobile_download').val(),
        'documents'             : $(idOrder + ' #documents').val(),
        'bill_to'               : $(idOrder + ' #bill_to').val(),
        'identificacion_fiscal' : $(idOrder + ' #identificacion_fiscal').val(),
        'domicilio_fiscal'      : $(idOrder + ' #domicilio_fiscal').val(),
        'poblacion'             : $(idOrder + ' #poblacion').val(),
        'constancy'             : $(idOrder + ' #constancy').val(),
        'import_company'        : $(idOrder + ' #import_company').val(),
        'payment_type'          : $(idOrder + ' #payment_type').val(),
        'price'                 : $(idOrder + ' #price').val(),
        'car_id'                : $(idOrder + ' #car_id').text(),
    };

    $.ajax({
        url: "/load-orders/"+id,
        type: 'PUT',
        data: data,
        success: function() {
            $('#contentTable .vin_original').val($(idOrder + ' .vin').val());

            $('input').css({"border": "0 solid blue", "margin": "0"});
            $('input').parent().find("span").addClass("d-none")
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

