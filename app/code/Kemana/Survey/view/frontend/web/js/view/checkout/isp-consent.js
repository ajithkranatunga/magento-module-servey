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

                console.log('Value '+window.checkoutConfig.isp_consent);
                this.ispConsentFields = ko.observable('');
                this.loadData();

            },

            loadData: function () {
                let self = this;

                let apiUrl = urlBuilder.build("rest/V1/ispdata");

                $.ajax({
                    url: apiUrl,
                    type: 'GET',
                    dataType : 'json',
                    success: function (result) {
                        let data = JSON.parse(result);
                        self.ispConsentFields(data.isp);
                        console.log('provider is '+data.isp);
                    },
                    error: function (error) {
                        console.error('AJAX Error:', error);
                    }
                });
            }

        });
    }
);
