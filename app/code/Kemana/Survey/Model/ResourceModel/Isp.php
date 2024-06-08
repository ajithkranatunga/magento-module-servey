<?php
namespace Kemana\Survey\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Class Isp
 * @package Kemana\Survey\Model\ResourceModel
 */
class Isp extends AbstractDb
{
    /**
     * Isp Resource Model
     */
    protected function _construct()
    {
        $this->_init('sales_order', 'entity_id');
    }
}
