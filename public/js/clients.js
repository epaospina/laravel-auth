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
            if (y[i].value === "" && y[i].type !== "radio" && y[i].type !== "checkbox") {
                if ($(y[i]).parent().attr('id') !== 'constar_client'){
                    y[i].className += " invalid";
                    valid = false;
                }

                if (y[i].id === 'constar_client' && $('#constar').prop('check')){
                    y[i].className += " invalid";
                    valid = false;
                }

                if ($(y[i]).id === 'otrosInput' && $('#selectTransferencia').val('') === 'otros'){
                    y[i].className += " invalid";
                    valid = false;
                }
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

function printTable(divPrint) {
    let printContents = $('#' + divPrint).html();
    let originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
    //location.reload();
}

function exportPDF(divName) {
    const pdf = new jsPDF('a4');
    pdf.addHTML($('#'+divName), function () {
        pdf.save('Test.pdf');
    });
}

function downWord(divName) {
    var header = "<html xmlns:o='urn:schemas-microsoft-com:office:office' "+
        "xmlns:w='urn:schemas-microsoft-com:office:word' "+
        "xmlns='http://www.w3.org/TR/REC-html40'>"+
        "<head><meta charset='utf-8'><title>Export HTML to Word Document with JavaScript</title>" +
        "<link rel='stylesheet' href='/home/johan/proyectos/php/laravel/auth/public/vendor/adminlte/vendor/bootstrap/dist/css/bootstrap.min.css'>" +
        "<link rel='stylesheet' href='/home/johan/proyectos/php/laravel/auth/public/css/clients.css'></head>" +
        "<link rel='stylesheet' href='/home/johan/proyectos/php/laravel/auth/public/css/cmr.css'></head><body>";
    var footer = "</body></html>";
    var sourceHTML = header+document.getElementById(divName).innerHTML+footer;

    var source = 'data:application/vnd.ms-word;charset=utf-8,' + encodeURIComponent(sourceHTML);
    var fileDownload = document.createElement("a");
    document.body.appendChild(fileDownload);
    fileDownload.href = source;
    fileDownload.download = 'document.doc';
    fileDownload.click();
    document.body.removeChild(fileDownload);
}

function searchCustomer(search) {
    let searchValue = $(search).val();
    let customers = $('#customerComplete');
    $.ajax({
        url: "/load-orders/filter/"+searchValue,
        type: 'GET',
        success: function(response) {
            let newHtml = '<div class="content-customer">';
            customers.empty();
            $.each(response, function( index, value ) {
                if (index > 0){
                    if (response[index-1].import_company === value.import_company){
                        newHtml += '<span onclick="assignDataCustomer('+value.id+')" class="btn btn-outline-primary m-1">'+value.import_company+'</span>';
                    }
                }else{
                    newHtml += '<span onclick="assignDataCustomer('+value.id+')" class="btn btn-outline-primary m-1">'+value.import_company+'</span>';
                }
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
            $('#bill_to').val(response[0].bill_to);
            console.log(response);
            $('#import_company').val(response[0].import_company);
            $('#addresses_client').val(response[0].addresses);
            $('#city_client').val(response[0].city);
            $('#postal_cod_client').val(response[0].postal_cod);
            $("#country").val(response[0].countries_id);
            $('#province_client').val(response[0].province);
        }
    });
}

function changeType(selectType) {
    //if ($(selectType).val() === 'otros'){
    //    $(selectType).after('<input name="payment_other" class="m-2 col-4" type="text" placeholder="Cual?"/>')
    //}
}

function checkedConstar(check) {
    if ($(check).prop('checked')){
        $('#constar_client').show();
    }else{
        $('#constar_client').hide();
    }
}

function cmrCompleteMatricula(matricula) {
    $('#matricula').val(matricula.val());
    $('#span-matricula').text(matricula.val());
}

function cmrCompleteDate(date) {
    $('#date').val(date.val());
    $('#span-date').text(date.val());
}

function cmrCompleteCocheUsado() {
    $('#observationLabel').text('COCHES USADOS, DA&#241;ADOS Y SUCIEDAD PROPIOS DEL USO');
    $('#typeCoche').val('COCHES USADOS, DA&#241;ADOS Y SUCIEDAD PROPIOS DEL USO');
}

function cmrCompleteCocheNuevo() {
    $('#observationLabel').text('COCHES NUEVOS');
    $('#typeCoche').val('COCHES NUEVOS');
}
