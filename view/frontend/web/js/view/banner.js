define([
    'uiComponent',
    'jquery',
    'ko'
], function(Component, $, ko) {
    'use strict';
    return Component.extend({
        defaults: {
            template: 'Iways_PaypalInstalmentsBanners/widget/banner'
        },

        initialize: function () {
            var self = this;
            this._super();
        }
    });
});
