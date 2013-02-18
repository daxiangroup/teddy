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

var ContactFormWidget = {
    settings: {
        errors: [],
        form: $('#frm-contact'),
        submitButton: $('#btn-submit'),
        container: $('#cntr-contact-form'),
    },

    init: function() {
        obj = this.settings;
        this.bindUIActions();
    },

    bindUIActions: function() {
        if ($('#cntr-contact-form').length) {
            obj.submitButton.on('click', function(event) {
                event.preventDefault();
                obj.errors.length = null;
                ContactFormWidget.validate();
                ContactFormWidget.submit();
            });
        }
    },

    validate: function() {
        if ($('#con-fullname').val() == '') { obj.errors.push('Full Name must not be empty'); }
        if ($('#con-email').val()    == '') { obj.errors.push('Email Address must not be empty'); }
        if ($('#con-subject').val()  == '') { obj.errors.push('Subject must not be empty'); }
        if ($('#con-message').val()  == '') { obj.errors.push('Message must not be empty'); }
    },

    submit: function() {
        if (obj.errors.length) {
            ContactFormWidget.showErrors();
            return 0;
        }

        obj.form.submit();
    },

    showErrors: function() {
        $('#cntr-error-messages').remove();
        $('.content-container').scrollTop();

        var string = '<div id="cntr-error-messages" class="alert alert-error"> \
            There were some errors submitting your contact request: \
            <ul>';
        $.each(obj.errors, function(key, error) {
            string += '<li>' + error + '</li>';
        });
        string += '</ul></div>';

        obj.container.prepend(string);
    }
};

$(document).ready(function() {
    ResponsiveWidget.init();
    ContactFormWidget.init();
});
