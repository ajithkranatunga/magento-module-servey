<?php
namespace Kemana\Survey\Model\ResourceModel\Isp;

use Kemana\Survey\Model\Isp;
use Kemana\Survey\Model\ResourceModel\Isp as IspResource;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Class Collection
 * @package Kemana\Survey\Model\ResourceModel\Isp
 */
class Collection extends AbstractCollection
{
    /** @var string $_idFieldName */
    protected $_idFieldName = 'entity_id';

    /**
     * Constructor creation
     */
    protected function _construct()
    {
        $this->_init(Isp::class, IspResource::class);
    }

}
