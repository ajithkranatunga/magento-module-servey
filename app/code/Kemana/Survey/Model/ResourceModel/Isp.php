<?php


namespace Kemana\Survey\Model\ResourceModel;


use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Isp extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('sales_order', 'entity_id');
    }
}
