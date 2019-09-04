var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
    // This function will display the specified tab of the form ...
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    // ... and fix the Previous/Next buttons:
    if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
    } else {
        document.getElementById("prevBtn").style.display = "inline";
    }
    if (n == (x.length - 1)) {
        document.getElementById("nextBtn").innerHTML = "Submit";
    } else {
        document.getElementById("nextBtn").innerHTML = "Next";
    }
    // ... and run a function that displays the correct step indicator:
    fixStepIndicator(n)
}

function nextPrev(n) {
    // This function will figure out which tab to display
    var x = document.getElementsByClassName("tab");
    // Exit the function if any field in the current tab is invalid:
    if (n == 1 && !validateForm()) return false;
    // Hide the current tab:
    x[currentTab].style.display = "none";
    // Increase or decrease the current tab by 1:
    currentTab = currentTab + n;
    // if you have reached the end of the form... :
    if (currentTab >= x.length) {
        //...the form gets submitted:
        document.getElementById("regForm").submit();
        return false;
    }
    // Otherwise, display the correct tab:
    showTab(currentTab);
}

function validateForm() {
    // This function deals with validation of the form fields
    var x, y, i, valid = true;
    x = document.getElementsByClassName("tab");
    y = x[currentTab].getElementsByTagName("input");
    // A loop that checks every input field in the current tab:
    for (i = 0; i < y.length; i++) {
        // If a field is empty...
        if (y[i].value == "") {
            // add an "invalid" class to the field:
            y[i].className += " invalid";
            // and set the current valid status to false:
            valid = false;
        }
    }
    // If the valid status is true, mark the step as finished and valid:
    if (valid) {
        document.getElementsByClassName("step")[currentTab].className += " finish";
    }
    return valid; // return the valid status
}

function fixStepIndicator(n) {
    // This function removes the "active" class of all steps...
    var i, x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
    }
    //... and adds the "active" class to the current step:
    x[n].className += " active";
}

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
        'model_car'                 : modelColor[0],
        'color_car'                 : modelColor[1],
        'vin'                       : $('#vin').val(),
        'signing'                   : $('#signing').val(),
        'addresses_load'            : address_load[0],
        'city_load'                 : address_load[1],
        'postal_cod_load'           : address_load[2],
        'phone_load'                : $('#phone_load').val(),
        'mobile_load'               : $('#mobile_load').val(),
        'fax'                       : $('#fax').val(),
        'contact_person'            : $('#contact_person').val(),
        'documents'                 : $('#documents').val(),
        'bill_to'                   : $('#bill_to').val(),
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
        success: function(response) {
            //...
        }
    });
}
