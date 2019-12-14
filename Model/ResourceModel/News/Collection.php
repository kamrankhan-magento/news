<?php

namespace FME\News\Model\ResourceModel\News;

use FME\News\Model\ResourceModel\AbstractCollection;
use Magento\Store\Model\Store;


class Collection extends AbstractCollection {

    protected $_idFieldName = 'news_id';

    protected $_previewFlag;

    protected function _construct() {
        $this->_init('FME\News\Model\News', 'FME\News\Model\ResourceModel\News');
      //  $this->_map['fields']['news_id'] = 'main_table.news_id';
      //  $this->_map['fields']['store'] = 'store_table.store_id';
    }
/*
    public function setFirstStoreFlag($flag = false) {
        $this->_previewFlag = $flag;
        return $this;
    }

    public function addStoreFilter($store, $withAdmin = true) {
        if (!$this->getFlag('store_filter_added')) {
            $this->performAddStoreFilter($store, $withAdmin);
        }
        return $this;
    }

    protected function _afterLoad() {
        $this->performAfterLoad('fme_news_store', 'news_id');
        $this->_previewFlag = false;

        return parent::_afterLoad();
    }

    protected function _renderFiltersBefore() {
        $this->joinStoreRelationTable('fme_news_store', 'news_id');
    } */

}
