/**
 * Created by PhpStorm.
 * User: ivke
 * Date: 5/19/2016
 * Time: 12:51 PM
 */



// Auto close alert box after 2 sec
window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();
    });
}, 2000);

// BOotstrap tooltip
$('[data-toggle="tooltip"]').tooltip();