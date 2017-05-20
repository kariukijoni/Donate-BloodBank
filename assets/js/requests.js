/**
 * 
 * addHos.js
 */

$(document).ready(function () {

    var requestForm = $("#requestForm");

    requestForm.validate({
        rules: {
            type_requested: {required: true},
            quantity_requested: {required: true}
        },
        messages: {
            type_requested: {required: "Please Enter Type"},
            quantity_requested: {required: "Please Enter Quantity"}

        }
    });

});