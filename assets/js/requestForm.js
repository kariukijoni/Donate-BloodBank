/**
 * File : addUser.js
 * 
 * This file contain the validation of add user form
 * 
 * Using validation plugin : jquery.validate.js
 * 
 * @author kariuki
 */

$(document).ready(function () {

    var request_Form = $("#requestForm");

    var validator = request_Form.validate({
        rules: {
            type_requested: {required: true}
        },
        messages: {
            type_requested: {required: "Enter Quantity Requested", digits: "Please enter numbers only"}
        }
    });
});
