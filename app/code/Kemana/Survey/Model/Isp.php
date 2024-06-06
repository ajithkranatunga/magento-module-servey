<?php
namespace Kemana\Survey\Model;

use Magento\Framework\Model\AbstractModel;

class Isp extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(\Kemana\Survey\Model\ResourceModel\Isp::class);
    }
}
