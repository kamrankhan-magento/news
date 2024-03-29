<?php

namespace FME\News\Model\ResourceModel\News\Grid;

use Magento\Framework\Api\Search\SearchResultInterface;
use Magento\Framework\Api\Search\AggregationInterface;
use FME\News\Model\ResourceModel\News\Collection as PageCollection;

class Collection extends PageCollection implements SearchResultInterface {

    protected $aggregations;

    public function __construct(
    \Magento\Framework\Data\Collection\EntityFactoryInterface $entityFactory,
    \Psr\Log\LoggerInterface $logger, 
    \Magento\Framework\Data\Collection\Db\FetchStrategyInterface $fetchStrategy, 
    \Magento\Framework\Event\ManagerInterface $eventManager,
    \Magento\Store\Model\StoreManagerInterface $storeManager, 
    \Magento\Framework\EntityManager\MetadataPool $metadataPool,
    $mainTable,
    $eventPrefix,
    $eventObject,
    $resourceModel,
    $model = 'Magento\Framework\View\Element\UiComponent\DataProvider\Document', 
    $connection = null,
    \Magento\Framework\Model\ResourceModel\Db\AbstractDb $resource = null
    ) {
        parent::__construct(
                $entityFactory, $logger, $fetchStrategy, $eventManager, $storeManager, $metadataPool, $connection, $resource
        );
        $this->_eventPrefix = $eventPrefix;
        $this->_eventObject = $eventObject;
        $this->_init($model, $resourceModel);
        $this->setMainTable($mainTable);
    }


    public function getAggregations() {
        return $this->aggregations;
    }

    public function setAggregations($aggregations) {
        $this->aggregations = $aggregations;
    }

    public function getSearchCriteria() {
        return null;
    }

    public function setSearchCriteria(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria = null) {
        return $this;
    }

    public function getTotalCount() {
        return $this->getSize();
    }

    public function setTotalCount($totalCount) {
        return $this;
    }

    public function setItems(array $items = null) {
        return $this;
    }

}
