<?php
namespace Kemana\Survey\Model;

use Magento\Framework\Model\AbstractModel;

/**
 * Class Isp
 * @package Kemana\Survey\Model
 */
class Isp extends AbstractModel
{
    /**
     * ISP Model
     */
    protected function _construct()
    {
        $this->_init(\Kemana\Survey\Model\ResourceModel\Isp::class);
    }
}
