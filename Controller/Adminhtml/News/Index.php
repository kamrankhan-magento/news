<?php

namespace FME\News\Controller\Adminhtml\News;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Backend\App\Action {

    protected $resultPageFactory;

    public function __construct(
    Context $context, PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    protected function _isAllowed() {

        return $this->_authorization
                        ->isAllowed('FME_News::manage_news');
    } 

    public function execute() {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('FME_News::news');
        $resultPage->addBreadcrumb(__('News'), __('News'));
        $resultPage->addBreadcrumb(__('Manage News'), __('Manage News'));
        $resultPage->getConfig()->getTitle()->prepend(__('Manage News'));
        return $resultPage;
    }

}
