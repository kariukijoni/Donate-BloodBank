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

    var addUserForm = $("#addUser");

    var validator = addUserForm.validate({
        rules: {
            fname: {required: true},
            email: {required: true, email: true, remote: {url: baseURL + "checkEmailExists", type: "post"}},
            mobile: {required: true, digits: true},
            gender: {required: true},
            weightLBS: {required: true},
            temperature: {required: true},
            blood_pressure: {required: true},
            blood_type: {required: true},
            dateOfBirth: {required: true},
            password: {required: true},
            cpassword: {required: true, equalTo: "#password"},
            role: {required: true, selected: true}
        },
        messages: {
            fname: {required: "Enter your full name"},
            email: {required: "Enter your email", email: "Please enter valid email address", remote: "Email already taken"},
            mobile: {required: "Enter your mobile number", digits: "Please enter numbers only"},
            gender: {required: "This field is required"},
            weightLBS: {required: "This field is required", digits: "Please enter numbers only"},
            temperature: {required: "This field is required", digits: "Please enter numbers only"},
            blood_pressure: {required: "This field is required", digits: "Please enter numbers only"},
            blood_type: {required: "This field is required", digits: "Please enter numbers only"},
            dateOfBirth: {required: "This field is required"},
            password: {required: "This field is required"},
            cpassword: {required: "This field is required", equalTo: "Please enter same password"},
            
            role: {required: "This field is required", selected: "Please select atleast one option"}
        }
    });
});
