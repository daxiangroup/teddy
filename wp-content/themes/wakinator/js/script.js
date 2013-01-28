$(document).ready(function() {
    $('#menu-control').on('click', function() {
        var direction = '';
        var opacity = '';

        if ($(this).hasClass('toggle-up')) {
            $(this).addClass('toggle-down');
            $(this).removeClass('toggle-up');

            var icon = $(this).find('.direction');
            icon.addClass('icon-arrow-down');
            icon.removeClass('icon-arrow-up');

            direction = '+';
            opacity = 0.5;
        }
        else if ($(this).hasClass('toggle-down')) {
            $(this).addClass('toggle-up');
            $(this).removeClass('toggle-down');

            var icon = $(this).find('.direction');
            icon.addClass('icon-arrow-up');
            icon.removeClass('icon-arrow-down');

            direction = '-';
            opacity = 1;
        }

        $('footer').animate({
            height: direction + '=200px',
            width: '100%',
        }, 400);
        $('.content-container').fadeTo(400, opacity);

    });
});