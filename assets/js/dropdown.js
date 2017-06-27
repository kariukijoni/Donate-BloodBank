/* 
 * DropDown js
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function ()
{
//    alert("hello");
//$('ul.nav li.dropdown').hover(function ()
    $('.dropdown').hover(function ()
    {
        $('.dropdown-menu', this).fadeIn();

    }, function ()
    {
        $('.dropdown-menu', this).fadeOut('fast');
    });
});