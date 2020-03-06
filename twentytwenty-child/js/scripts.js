$( document ).ready(function() {
    var $url, $code;
    $url = window.location.href.toString();
    $code = $url.substr($url.length - 6); 

    $('#field_5ghr1').val($code);

});