<?php
namespace Kemana\Survey\Model\ResourceModel\Isp\Grid;

use Kemana\Survey\Model\ResourceModel\Isp as IspResource;
use Magento\Framework\Data\Collection\Db\FetchStrategyInterface as FetchStrategy;
use Magento\Framework\Data\Collection\EntityFactoryInterface as EntityFactory;
use Magento\Framework\Event\ManagerInterface as EventManager;
use Magento\Framework\View\Element\UiComponent\DataProvider\SearchResult;
use Psr\Log\LoggerInterface as Logger;

class Collection extends SearchResult
{
    public function __construct(
        EntityFactory $entityFactory,
        Logger $logger,
        FetchStrategy $fetchStrategy,
        EventManager $eventManager,
        $mainTable = 'sales_order',
        $resourceModel = IspResource::class
    )
    {
        parent::__construct(
            $entityFactory,
            $logger,
            $fetchStrategy,
            $eventManager,
            $mainTable,
            $resourceModel
        );
    }

    protected function _initSelect()
    {
        parent::_initSelect();

        $this->getSelect()
            ->columns([
                'entity_id',
                'isp',
                'is_satisfied',
                'isp_count' => new \Zend_Db_Expr('COUNT(`main_table`.`entity_id`)')
            ])
            ->group('main_table.ispw')
            ->group('main_table.is_satisfied');


        return $this;
    }

}
