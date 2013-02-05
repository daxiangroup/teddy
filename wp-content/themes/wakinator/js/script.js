var ResponsiveWidget = {
    settings: {
        direction: '',
        opacity: '',
        menuOpacity: '',
        speed: 300,
        menuControl: $('#menu-control'),
        menuContainer: $('#responsive-menu-main-navigation'),
        footer: $('div[role="footer"]'),
        contentContainer: $('.content-container'),
    },

    init: function() {
        obj = this.settings;
        this.bindUIActions();
    },

    bindUIActions: function() {
        obj.menuControl.on('click', function() {
            ResponsiveWidget.animate();
        });
    },

    getDirection: function() {
        if (obj.menuControl.hasClass('toggle-up')) {
            obj.menuControl.addClass('toggle-down');
            obj.menuControl.removeClass('toggle-up');

            var icon = obj.menuControl.find('.direction');
            icon.addClass('icon-arrow-down');
            icon.removeClass('icon-arrow-up');

            obj.direction = '+';
            obj.opacity = 0.5;
            obj.menuOpacity = 1;
        }
        else if (obj.menuControl.hasClass('toggle-down')) {
            obj.menuControl.addClass('toggle-up');
            obj.menuControl.removeClass('toggle-down');

            var icon = obj.menuControl.find('.direction');
            icon.addClass('icon-arrow-up');
            icon.removeClass('icon-arrow-down');

            obj.direction = '-';
            obj.opacity = 1;
            obj.menuOpacity = 0;
        }
    },

    animate: function() {
        this.getDirection();

        obj.footer.animate({
            height: obj.direction + '=200px',
            width: '100%',
        }, obj.speed);
        obj.contentContainer.fadeTo(obj.sped, obj.opacity);
        obj.menuContainer.fadeTo(obj.speed, obj.menuOpacity);
    }
};

$(document).ready(function() {
    ResponsiveWidget.init();
});
