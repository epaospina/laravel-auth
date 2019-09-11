function saveBill(id) {

    let data = {
        'bill_id'                   : id,
        'mobile_download'           : $('#mobile_download').val(),
    };

    $.ajax({
        url: "/bills/"+id,
        type: 'PUT',
        data: data,
        success: function() {
            $('#'+contenedor+' input').prop("disabled", true);
            $('#'+contenedor+' textarea').prop("disabled", true);
            $('#'+contenedor+' #bill').hide();
        }
    });
}
