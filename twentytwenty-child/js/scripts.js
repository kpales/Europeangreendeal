$( document ).ready(function() {
    var $url, $code;
    $url = window.location.href.toString();
    //$code = $url.substr($url.length - 6); 
    $code= $url.substring($url.indexOf("code")+4).slice(0,6);
    $('#field_5ghr1').val($code);


    //Open Vitas as popups
    if ($('body').hasClass('page-id-124')) {
        $(document).on('mouseover', 'a', function(e) {
            var speakerUrl = $(this).attr('href');
            if (speakerUrl.indexOf("/speaker/") > -1 ) {
                e.preventDefault();
                $('body').addClass('no-scroll');
                $('.speaker-popup[data-href="' + speakerUrl + '"]').addClass('speaker-popup--show');            
            }
        });

        $(document).on('click', '.speaker-popup__close', function(e) {
            $('.speaker-popup').removeClass('speaker-popup--show');
            $('body').removeClass('no-scroll');
        });        
        
    }
});
