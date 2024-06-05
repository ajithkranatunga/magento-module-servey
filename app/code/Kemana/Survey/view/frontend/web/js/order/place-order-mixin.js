/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

define ([
    'jquery',
    'mage/utils/wrapper',
    'Magento_CheckoutAgreements/js/model/agreements-assigner',
    'Magento_Checkout/js/model/quote',
    'Magento_Customer/js/model/customer',
    'Magento_Checkout/js/model/url-builder',
    'mage/url',
    'Magento_Checkout/js/model/error-processor',
    'uiRegistry'
], function (
    $,
    wrapper,
    agreementsAssigner,
    quote,
    customer,
    urlBuilder,
    urlFormatter,
    errorProcessor,
    registry
) {
    'use strict';

    return wrapper.wrap(placeOrderAction, function (originalAction, paymentData, messageContainer) {
        agreementsAssigner(paymentData);
        var isCustomer = customer.isLoggedIn();
        var quoteId = quote.getQuoteId();

        var url = urlFormatter.build('rest/V1/orderdata/update');

        var isSatisfied = $('[name="is_satisfied"]:checked').val();
        let isp = $('[name="isp"]').val();

        if (isp) {

            var payload = {
                'cartId': quoteId,
                'is_satisfied': isSatisfied,
                'isp': isp,
                'is_customer': isCustomer
            };

            if (!payload.isp) {
                return true;
            }

            var result = true;

            $.ajax({
                url: url,
                data: payload,
                dataType: 'text',
                type: 'POST',
            }).done(
                function (response) {
                    result = true;
                }
            ).fail(
                function (response) {
                    result = false;
                    errorProcessor.process(response);
                }
            );
        }

        return originalAction(paymentData, messageContainer);
    });
});
