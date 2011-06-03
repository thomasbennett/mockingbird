/* Author:  Thomas Bennett */
jQuery(document).ready(function($){
    $('a.nav-link').hover(function(){
        $navHover = $('div.nav-hover');
        var linkHeight = $(this).height();
        $(this).animate({'margin-top': - linkHeight/2 + 'px'}, 150);

        var linkText = $(this).html();
        $navHover.text(linkText);
        $navHover.fadeIn(200);

        if((linkText) == 'Contact' || linkText == 'About Us'){
            $navHover.css({'right':'60px'});
        } else {
            $navHover.css({'right': '40px'});
        }

    }, function() {
        $(this).animate({'margin-top':'0'}, 300);
        $navHover.fadeOut(100);
    });
});
