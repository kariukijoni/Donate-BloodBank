/**
 * 
 * addHos.js
 */

$(document).ready(function () {

    var addHosForm = $("#addHos");
    
     var validator = addHosForm.validate({
        rules: {
            hos_name: {required: true},           
            hos_location: {required: true}            
        },
        messages: {
            hos_name: {required: "Please Enter Name"},            
            hos_location: {required: "Please Enter Location"}
            
        }
    });
    
    });