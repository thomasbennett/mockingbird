jQuery(document).ready(function($){
    $('a.nav-link').hover(function(){
        var linkHeight = $(this).find('img').height();
        alert(linkHeight);
        $(this).animate({'margin-top': - linkHeight/2 + 'px');
    }, function() {
    });
});
