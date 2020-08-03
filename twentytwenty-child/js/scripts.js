$( document ).ready(function() {
    var $url, $code;
    $url = window.location.href.toString();
    //$code = $url.substr($url.length - 6); 
    $code= $url.substring($url.indexOf("code")+4).slice(0,6);
    $('#field_5ghr1').val($code);


    //Open Vitas as popups

    if ($('body').hasClass('page-id-124')) {
        $(document).on('click', 'a', function(e) {
            var speakerUrl = $(this).attr('href');
            if (speakerUrl.indexOf("/speaker/") > 1 ) {
                e.preventDefault();            
            }

            var speakerName = speakerUrl.split("/speaker/")[1];
            var preUrl = "httpa://shared-history.de/wp-json/wp/v2/posts/?slug=";
            var jsonUrl = preUrl + speakerName;
            $.getJSON( jsonUrl, function( data ) {
                var title = data[0].title.rendered;
                var content = data[0].content.rendered;
                var imageUrl =  data[0].images.medium;

                $('body').addClass('no-scroll');

                if (imageUrl) {
                    $('body').append('<div class="speaker-popup"><img src="' + imageUrl + '"class="speaker-popup__foto"><div class="speaker-popup__content"><h4 style="margin: 0">' + title + '</h4>'+  content + '</div><svg class="speaker-popup__close" width="16" height="16" viewBox="0 0 16 16"><line x1="2" x2="14" y1="14" y2="2"></line><line x1="14" x2="2" y1="14" y2="2"></line></svg></div>');
                } else {
                    $('body').append('<div class="speaker-popup"><div class="speaker-popup__content"><h4 style="margin: 0">' + title + '</h4>'+  content + '</div><svg class="speaker-popup__close" width="16" height="16" viewBox="0 0 16 16"><line x1="2" x2="14" y1="14" y2="2"></line><line x1="14" x2="2" y1="14" y2="2"></line></svg></div>');
                }
                

                $(document).on('click', '.speaker-popup__close', function(e) {
                    $('.speaker-popup').remove();
                    $('body').removeClass('no-scroll');

                });

                $(document).on('click', 'body', function(e) {
                    var $target = $(event.target);
                    if (!$($target).parent('.speaker-popup').length) {
                        $('.speaker-popup').remove(); 
                        $('body').removeClass('no-scroll');
                    } 
                    
                });
            });
        });
    }
});
