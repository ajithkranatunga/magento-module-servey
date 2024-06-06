<?php
namespace Kemana\Survey\Model;

use Kemana\Survey\Api\SalesOrderProcessInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Webapi\Rest\Request;
use Magento\Quote\Model\QuoteIdMaskFactory;
use Magento\Quote\Api\CartRepositoryInterface;
use Magento\Customer\Model\SessionFactory;
use Magento\Checkout\Model\Session as CheckoutSession;
use Magento\Quote\Model\Quote;

/**
 * Class SalesOrderProcesser
 * @package Kemana\Survey\Model
 */
class SalesOrderProcesser implements SalesOrderProcessInterface
{
    /**
     * @var Request
     */
    protected $request;
    /**
     * @var CartRepositoryInterface
     */
    protected $quoteRepository;
    /**
     * @var QuoteIdMaskFactory
     */
    protected $quoteIdMaskFactory;
    /**
     * @var SessionFactory
     */
    protected $customerSession;
    /**
     * @var \Magento\Quote\Model\Quote
     */
    private $quote;

    private $checkoutSession;

    /**
     * SalesOrderProcesser constructor.
     * @param Request $request
     * @param QuoteIdMaskFactory $quoteIdMaskFactory
     * @param CartRepositoryInterface $quoteRepository
     * @param SessionFactory $customerSession
     * @param Quote $quote
     * @param CheckoutSession $checkoutSession
     */
    public function __construct(
        Request $request,
        QuoteIdMaskFactory $quoteIdMaskFactory,
        CartRepositoryInterface $quoteRepository,
        SessionFactory $customerSession,
        Quote $quote,
        CheckoutSession $checkoutSession
    ) {
        $this->request = $request;
        $this->quoteRepository = $quoteRepository;
        $this->quoteIdMaskFactory = $quoteIdMaskFactory;
        $this->customerSession = $customerSession->create();
        $this->quote = $quote;
        $this->checkoutSession = $checkoutSession;
    }

    /**
     * @return mixed|void
     * @throws NoSuchEntityException
     * Saves isp & is_satisfied values into quote table
     */
    public function saveIspDataToQuoteTable()
    {
        $post = $this->request->getPostValue();
        if ($post) {
            $quote = $this->checkoutSession->getQuote();
            $cartId = $quote->getId();
            $cartId = 16;
            $isSatisfied = $post['is_satisfied'];
            $isp = $post['isp'];
            $loggin = $this->customerSession->isLoggedIn();

            if ($loggin === 'false') {
                $cartId = $this->quoteIdMaskFactory->create()
                    ->load($cartId, 'masked_id')->getQuoteId();
            }

            $quote = $this->quoteRepository->getActive($cartId);
            if (!$quote->getItemsCount()) {
                throw new NoSuchEntityException(__('Cart %1 doesn\'t contain products', $cartId));
            }

            $quote->setData('is_satisfied', $isSatisfied);
            $quote->setData('isp', $isp);
            $this->quoteRepository->save($quote);
        }
    }

}
