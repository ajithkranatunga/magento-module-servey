define([
        'uiComponent',
        'ko',
        'jquery',
    ], function (Component, ko, $) {
        'use strict';
        return Component.extend({
            defaults: {
                template: 'Kemana_Survey/isp-consent'
            },

            initialize: function () {
                var self = this;
                this._super();
            }

        });
    }
);
