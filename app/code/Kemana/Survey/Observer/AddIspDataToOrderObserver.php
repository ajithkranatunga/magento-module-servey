<?php
namespace Kemana\Survey\Observer;

use Kemana\Survey\Api\Data\IspDataInterface;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class AddIspDataToOrderObserver implements ObserverInterface
{
    public function execute(Observer $observer)
    {
        /** @var  $order Order $order */
        $order = $observer->getEvent()->getOrder();
        /** @var  $quote Quote $quote */
        $quote = $observer->getEvent()->getQuote();

        $isp = $quote->getData(IspDataInterface::ISP);
        $isSatisfied = $quote->getData(IspDataInterface::IS_SATISFIED);

        $order->setData(IspDataInterface::ISP, $isp);
        $order->setData(IspDataInterface::IS_SATISFIED, $isSatisfied);
    }
}
