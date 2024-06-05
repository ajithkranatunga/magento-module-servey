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

                let customerIp = '';

                $.ajax({
                    url: 'https://dev.kemana.com/rest/V1/ispdata',
                    showLoader: true,
                    type: "GET",
                    dataType : 'json',
                    success: function(result){
                        let data = JSON.parse(result);
                        customerIp = data.isp;
                    }
                });
            }

        });
    }
);
