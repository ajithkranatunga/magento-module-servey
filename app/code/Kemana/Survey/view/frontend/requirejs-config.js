/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
var config = {
    config: {
        mixins: {
            'Magento_Checkout/js/action/place-order': {
                'Kemana_Survey/js/order/place-order-mixin': true
            },
        }
    }
}
