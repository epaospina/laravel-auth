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
        if (y[i].name !== "data_driver" && y[i].name !== "cmr" && y[i].name !== "phone_load" && y[i].name.substr(-11) !== "[color_car]"){
            if (y[i].value === "" && y[i].type !== "radio") {
                y[i].className += " invalid";
                valid = false;
            }
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

function changeId(element, num) {
    element.prop('id', 'car__'+num);
    element.find("input").eq(0).attr('name', "car["+num+"][model_car]");
    element.find("input").eq(1).attr('name', "car["+num+"][color_car]");
    element.find("input").eq(2).attr('name', "car["+num+"][vin]");
    element.find("input").eq(3).attr('name', "car["+num+"][itv]");
    element.find("input").eq(4).attr('name', "car["+num+"][itv]");
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
        new_car.find('input').each(function( index, element ) {
            element.value = "";
        });
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

function printTable(divName) {
    let printContents = document.getElementById(divName).innerHTML;
    let originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
    location.reload();
}

function searchCustomer(search) {
    let searchValue = $(search).val();
    let customers = $('#customerComplete').empty();
    $.ajax({
        url: "/load-orders/filter/"+searchValue,
        type: 'GET',
        success: function(response) {
            let newHtml = '<div class="content-customer">';
            $.each(response, function( index, value ) {
                newHtml += '<span onclick="assignDataCustomer('+value.id+')" class="btn btn-outline-primary m-1">'+value.signing+'</span>';
            });
            newHtml += '</div>';
            customers.append(newHtml);
        }
    });
}

function assignDataCustomer(id) {
    $.ajax({
        url: "/load-orders/get-filter/"+id,
        type: 'GET',
        success: function(response) {
            $('#bill_to').val(response.signing);
            $('#addresses_client').val(response.addresses);
            $('#city_client').val(response.city);
            $('#postal_cod_client').val(response.postal_cod);
            //$('#bill_to').val(response.phone);
            //$('#bill_to').val(response.mobile);
            //$('#bill_to').val(response.email);
            $('#province_client').val(response.province);
            console.log(response);
        }
    });
}

function changeType(selectType) {
    if ($(selectType).val() === 'otros'){
        $(selectType).after('<input class="m-2 col-4" type="text" placeholder="Cual?"/>')
    }
}
