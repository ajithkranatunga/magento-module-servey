<?php
namespace Kemana\Survey\Helper;

use Kemana\Survey\Api\IspApiInterface;
use Magento\Framework\HTTP\Client\Curl;

/**
 * Class IspApiService
 * @package Kemana\Survey\Helper
 */
class IspApiService implements IspApiInterface
{
    const ISP_API_URL = "http://ip-api.com/json";
    protected  $curl;

    public function __construct(
        Curl $curl
    ) {
        $this->curl = $curl;
    }
    /**
     * @return mixed
     */
    public function getIspData()
    {
        $this->curl->get(self::ISP_API_URL);
        return $this->curl->getBody();
    }

}
