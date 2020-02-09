function selectCars() {
    let arrayCars = '';
    $("input:checked").each(function( index) {
        if (index === 0){
            arrayCars = $(this).val()
        }else{
            arrayCars += ',' + $(this).val();
        }
    });

    let data = {
      cars: arrayCars
    };
    console.log(data);
    $.post('/load-orders/pending/select-cars', data, function (data) {
        window.location = data;
    });
    //$("#pending").
}
