function selectCars() {
    let arrayCars = '';
    $("input:checked").each(function( index) {
        console.log( index + ": " + $(this).val() );
        if (index === 0){
            arrayCars = $(this).val()
        }else{
            arrayCars += ',' + $(this).val();
        }
    });

    let data = {
      cars: arrayCars
    };
    $.post('/load-orders/pending/select-cars', data, function (data) {
        window.location = data;
    });
    //$("#pending").
}
