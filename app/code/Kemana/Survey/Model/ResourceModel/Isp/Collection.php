<?php
namespace Kemana\Survey\Model\ResourceModel\Isp;

use Kemana\Survey\Model\Isp;
use Kemana\Survey\Model\ResourceModel\Isp as IspResource;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'entity_id';

    protected function _construct()
    {
        $this->_init(Isp::class, IspResource::class);
    }
    
}
