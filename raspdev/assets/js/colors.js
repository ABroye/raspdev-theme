(function ($) {

    wp.customize('header_background', function (value) {
        value.bind(function (newVal) {
            $('.color-header').attr('style', 'background:' + newVal + '!important')
        });
    });

    wp.customize('infobar_background', function (value) {
        value.bind(function (newVal) {
            $('.color-infobar').attr('style', 'background:' + newVal + '!important')
        });
    });

    wp.customize('body_background', function (value) {
        value.bind(function (newVal) {
            $('.color-body').attr('style', 'background:' + newVal + '!important')
        });
    });

    wp.customize('card_background', function (value) {
        value.bind(function (newVal) {
            $('.color-card').attr('style', 'background:' + newVal + '!important')
        });
    });

    wp.customize('footer_background', function (value) {
        value.bind(function (newVal) {
            $('.color-footer').attr('style', 'background:' + newVal + '!important')
        });
    });

})(jQuery);