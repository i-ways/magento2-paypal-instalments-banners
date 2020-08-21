define(
    [
        'uiComponent',
        'jquery',
        'ko'
    ],
    function (Component, $, ko) {
        'use strict';
        if (window.ipib_show_on_checkout) {
            return Component.extend(
                {
                    defaults: {
                        template: 'Iways_PaypalInstalmentsBanners/widget/banner'
                    },
    
                    initialize: function () {
                        var self = this;
                        this._super();
                    }
                }
            );
        }
    }
);
