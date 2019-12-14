<?php

namespace FME\News\Model\ResourceModel;

use Magento\Framework\EntityManager\EntityManager;
use Magento\Framework\EntityManager\MetadataPool;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Model\ResourceModel\Db\Context;
use Magento\Store\Model\Store;
use Magento\Store\Model\StoreManagerInterface;
use Zend\Stdlib\DateTime;

class News extends AbstractDb {

    protected $_store = null;
    protected $_tagCollectionFactory;
    protected $_tagGmapTable;

    protected $_storeManager;

    protected $entityManager;

    protected $metadataPool;


    public function __construct(
    Context $context, StoreManagerInterface $storeManager, EntityManager $entityManager, MetadataPool $metadataPool, $connectionName = null
    ) {
        parent::__construct($context, $connectionName);
        $this->_storeManager = $storeManager;

        $this->entityManager = $entityManager;
        $this->metadataPool = $metadataPool;
    }

    protected function _construct() {
        $this->_init('fme_news', 'event_id');
    }

 /*   protected function _afterSave(AbstractModel $product) {
        $this->_saveEventMedia($product);
        $this->_saveEventProducts($product);
        $this->_savenewstoreView($product);
        return parent::_afterSave($product);
    } */

}
