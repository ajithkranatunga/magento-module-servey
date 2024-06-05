<?php
namespace Kemana\Survey\ViewModel;
use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Customer\Model\Session;
use Magento\Framework\View\Element\Block\ArgumentInterface;

/**
 * Class IspConsent
 * @package Kemana\Survey\ViewModel
 */
class IspConsent implements ArgumentInterface
{
    /**
     * @var CustomerRepositoryInterface
     */
    private $customerRepository;

    /**
     * @var Session
     */
    private $customerSession;

    /**
     * IspConsent constructor.
     * @param Session $customerSession
     * @param CustomerRepositoryInterface $customerRepository
     */
    public function __construct(
        Session $customerSession,
        CustomerRepositoryInterface $customerRepository
    ) {
        $this->customerSession = $customerSession;
        $this->customerRepository = $customerRepository;
    }

    /**
     * @return mixed|string
     * @throws \Magento\Framework\Exception\LocalizedException
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getIspConsent()
    {
        $customerId = $this->customerSession->getCustomerId();
        if ($customerId) {
            $customer = $this->customerRepository->getById($customerId);

            return $customer->getCustomAttribute('allow_detect_isp')
                ? $customer->getCustomAttribute('allow_detect_isp')->getValue() : '';
        }
        return '';
    }
}
