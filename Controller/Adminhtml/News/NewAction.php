<?php

namespace FME\News\Controller\Adminhtml\News;

class NewAction extends \Magento\Backend\App\Action {

    const ADMIN_RESOURCE = 'FME_News::manage_news';

    protected $resultForwardFactory;

    public function __construct(
    \Magento\Backend\App\Action\Context $context, \Magento\Backend\Model\View\Result\ForwardFactory $resultForwardFactory
    ) {
        $this->resultForwardFactory = $resultForwardFactory;
        parent::__construct($context);
    }

    public function execute() {
        $resultForward = $this->resultForwardFactory->create();
        return $resultForward->forward('edit');
    }

}
