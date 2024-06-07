
# Kemana_Survey Module

This Magento module is developed to collect customer's ISP and whether the customer is happy with them. Those data will be collected at the end of the checkout page.

This feature can be enabled in My Account area; Create new account page and Edit account information page.

In addition to that Admin user can see the collected data summery in Magento Admin >> Sales >> ISP Data page.

## Installation

Source code for this module is available at this Github Repository : [magento-module-servey(https://github.com/ajithkranatunga/magento-module-servey)].

1. Download the source code, extract and copy them to [MAGENTO_ROOT]/app/code directory
2. Run bellow commands to complete the installation.

```sh
$ bin/magento setup:upgrade
$ bin/magento setup:di:compile
$ bin/magento setup:static-content:deploy
$ bin/magento cache:flush
$ 
```

Once this is done, the module should be open for use.

## Changelog

- 1.0.0 - Initial release of the module



