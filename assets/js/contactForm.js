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

    var contactForm = $("#contact");

    var validator = contactForm.validate({
        rules: {
            fullName: {required: true},
            email: {required: true, email: true},
            mobile: {required: true, digits: true},
            textArea: {required: true},
            code: {required: true}
        },
        messages: {
            fullName: {required: "Enter your full name"},
            email: {required: "Enter your email", email: "Please enter valid email address"},
            mobile: {required: "Enter your mobile number", digits: "Please enter numbers only"},
            textArea: {required: "This field is required"},
            code: {required: "This field is required", selected: "Please select atleast one option"}
        }
    });
});
