$(document).ready(function () {

    $(function () {
        var nav = $('#menuHeader');
        var logo = $('#logo');
        
        $(window).scroll(function () {
            if ($(this).scrollTop() > 25) {
                nav.addClass("navbar-fixed-top");
                nav.removeClass("navbar-static-top");
                
                logo.addClass("logo_small");
                logo.removeClass("logo_big");
            } else {
                nav.addClass("navbar-static-top");
                nav.removeClass("navbar-fixed-top");
                
                logo.addClass("logo_big");
                logo.removeClass("logo_small");
            }
        });
    });

    $('a[href^="#"]').on('click', function (e) {

        $('.navbar li').removeClass('active');
        var $this = $(this).parent();
        if (!$this.hasClass('active')) {
            $this.addClass('active');
        }

        e.preventDefault();

        var target = this.hash,
                $target = $(target);

        $('html, body').stop().animate({
            'scrollTop': $target.offset().top - 150
        }, 500, 'swing', function () {
            window.location.hash = target;
        });
    });
});