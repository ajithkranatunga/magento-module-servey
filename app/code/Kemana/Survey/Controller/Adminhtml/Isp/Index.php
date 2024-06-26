<?php
namespace Kemana\Survey\Controller\Adminhtml\Isp;

use Kemana\Survey\Model\ResourceModel\Isp\CollectionFactory;
use Magento\Backend\App\Action;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;

/**
 * Class Index
 * @package Kemana\Survey\Controller\Adminhtml\Isp
 */
class Index extends Action
{
    /**
     * @return ResponseInterface|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $resultPage->setActiveMenu('Magento_Sales::sales_order');
        $resultPage->addBreadcrumb(__('Sales'), __('Sales'));
        $resultPage->addBreadcrumb(__('ISP'), __('ISP'));
        $resultPage->getConfig()->getTitle()->prepend(__('ISP Data'));
        return $resultPage;
    }
}
