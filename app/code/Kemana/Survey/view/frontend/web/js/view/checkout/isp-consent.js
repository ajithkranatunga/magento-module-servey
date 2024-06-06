define([
        'uiComponent',
        'ko',
        'jquery',
        'mage/url'
    ], function (Component, ko, $, urlBuilder) {
        'use strict';
        return Component.extend({
            defaults: {
                template: 'Kemana_Survey/isp-consent'
            },

            initialize: function () {
                var self = this;
                this._super();

                this.fieldISP = ko.observable('');
                this.allow_detect_isp = ko.observable(false);

                this.loadData();

            },

            loadData: function () {
                let self = this;

                self.allow_detect_isp = window.checkoutConfig.isp_consent;

                let apiUrl = urlBuilder.build("rest/V1/ispdata");

                $.ajax({
                    url: apiUrl,
                    type: 'GET',
                    dataType : 'json',
                    success: function (result) {
                        let data = JSON.parse(result);
                        self.fieldISP(data.isp);
                    },
                    error: function (error) {
                        console.error('AJAX Error:', error);
                    }
                });
            }

        });
    }
);
