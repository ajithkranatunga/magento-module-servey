<?php
namespace Kemana\Survey\Model\Data;

use Kemana\Survey\Api\Data\IspDataInterface;
use Magento\Framework\Api\AbstractSimpleObject;

/**
 * Class IspData
 * @package Kemana\Survey\Model\Data
 */
class IspData extends AbstractSimpleObject implements IspDataInterface
{
    /**
     * @inheritDoc
     */
    public function getIsp()
    {
        return $this->_get(self::ISP);
    }

    /**
     * @inheritDoc
     */
    public function getIsSatisfied()
    {
        return $this->_get(self::IS_SATISFIED);
    }

    /**
     * @inheritDoc
     */
    public function setIsp($isp)
    {
        return $this->setData(self::ISP, $isp);
    }

    /**
     * @inheritDoc
     */
    public function setIsSatisfied($isSatisfied)
    {
        return $this->setData(self::IS_SATISFIED, $isSatisfied);
    }
}
