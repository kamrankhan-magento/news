<?php

namespace FME\News\Model;

class News extends \Magento\Framework\Model\AbstractModel {

  //  const STATUS_ENABLED = 1;
  //  const STATUS_DISABLED = 0;

  //  protected $_logger;

    protected function _construct() {
        $this->_init('FME\News\Model\ResourceModel\News');
    }

  /*  public function getAvailableStatuses() {
        $availableOptions = ['1' => 'Enable',
            '0' => 'Disable'];
        return $availableOptions;
    }*/

}
