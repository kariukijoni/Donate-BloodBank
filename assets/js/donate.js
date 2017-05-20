/**
 * 
 * donate.js
 */

$(document).ready(function () {

    var donateBloodForm = $("#donate_blood");
    
     var validator = donateBloodForm.validate({
        rules: {
            amount_donated_cc: {required: true},           
            donation_type: {required: true}            
        },
        messages: {
            amount_donated_cc: {required: "Please Enter Amount Donated"},            
            donation_type: {required: "Please Enter Donation Type"}
            
        }
    });
    
    });