<?php

namespace FME\News\Model\News;

use FME\News\Model\ResourceModel\News\CollectionFactory;
use Magento\Framework\App\Request\DataPersistorInterface;

class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider {

    protected $collection;

    protected $dataPersistor;
    public $_storeManager;

    protected $loadedData;

    public function __construct(
    $name, $primaryFieldName, $requestFieldName, CollectionFactory $blockCollectionFactory, DataPersistorInterface $dataPersistor, \Magento\Store\Model\StoreManagerInterface $storeManager, array $meta = [], array $data = []
    ) {
        $this->collection = $blockCollectionFactory->create();
        $this->_storeManager = $storeManager;
        $this->dataPersistor = $dataPersistor;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    public function getData() {

        if (isset($this->loadedData)) {
            return $this->loadedData;
        }
        $items = $this->collection->getItems();

        foreach ($items as $page) {
            $this->loadedData[$page->getId()] = $page->getData();
        }

        $data = $this->dataPersistor->get('fme_news');
        if (!empty($data)) {
            $page = $this->collection->getNewEmptyItem();
            $page->setData($data);
            $this->loadedData[$page->getId()] = $page->getData();
            $this->dataPersistor->clear('fme_news');
        }
        return $this->loadedData;
    }

}
