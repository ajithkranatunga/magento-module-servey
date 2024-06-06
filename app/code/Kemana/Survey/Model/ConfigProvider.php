<?php
namespace Kemana\Survey\Model;

use Magento\Checkout\Model\ConfigProviderInterface;
use Magento\Framework\View\LayoutInterface;
use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Customer\Model\SessionFactory;

/**
 * Class ConfigProvider
 * @package Kemana\Survey\Model
 */
class ConfigProvider
{
    /**
     * @var LayoutInterface
     */
    protected $_layout;

    /**
     * @var CustomerRepositoryInterface
     */
    protected $customerRepository;

    /**
     * @var SessionFactory
     */
    protected $customerSession;

    /**
     * ConfigProvider constructor.
     * @param LayoutInterface $layout
     * @param CustomerRepositoryInterface $customerRepository
     * @param SessionFactory $customerSession
     */
    public function __construct(
        LayoutInterface $layout,
        CustomerRepositoryInterface $customerRepository,
        SessionFactory $customerSession
    ) {
        $this->_layout = $layout;
        $this->customerRepository = $customerRepository;
        $this->customerSession = $customerSession->create();
    }

    /**
     * @return array
     */
    public function getConfig()
    {
        $configVal = false;
        if ($this->getIspConsentConfig()){
            $configVal = true;
        }
        return ['isp_consent' => $configVal];
    }

    /**
     * get ISP consent value for logged in User
     * @return bool | int
     */
    protected function getIspConsentConfig()
    {
        if ($this->customerSession->isLoggedIn()) {
            $customerData = $this->customerSession->getCustomerData();
            return $customerData->getCustomAttribute('allow_detect_isp')->getValue();
        }
        return false;
    }

}
