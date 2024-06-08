define([
    'jquery',
    'Magento_Customer/js/model/customer',
    'Magento_Checkout/js/model/quote',
    'mage/url',
    'Magento_Checkout/js/model/error-processor',
], function (
    $,
    customer,
    quote,
    urlBuilder,
    errorProcessor
) {
    'use strict';

    return function (originalFunction) {
        return function (serviceUrl, payload, messageContainer) {
            console.log("my function working fine");
            let isCustomer = customer.isLoggedIn();
            let quoteId = quote.getQuoteId();
            let apiurl = urlBuilder.build('rest/V1/ispdata/:cartid');

            let isSatisfied = $('[name="is_satisfied"]:checked').val();
            let isp = $('[name="isp"]').val();

            if (isp) {
                let apiData = {
                     'cartid': quoteId,
                     'is_satisfied': isSatisfied,
                     'isp': isp,
                     'is_customer': isCustomer
                };

                if (!apiData.isp) {
                    return true;
                }

                let result = true;

                $.ajax({
                    url: apiurl,
                    data: apiData,
                    dataType: 'json',
                    type: 'PUT',
                }).done(
                    function (response) {
                        console.log(response);
                        result = true;
                    }
                ).fail(
                    function (response) {
                        result = false;
                        errorProcessor.process(response);
                    }
                );
            }

            // Call the original function
            return originalFunction(serviceUrl, payload, messageContainer);
        };
    };
});
