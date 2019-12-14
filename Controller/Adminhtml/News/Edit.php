<?php

namespace FME\News\Controller\Adminhtml\News;

use Magento\Backend\App\Action;

class Edit extends \Magento\Backend\App\Action {

    const ADMIN_RESOURCE = 'FME_News::manage_news';

    protected $_coreRegistry;

    protected $resultPage;

    protected $resultPageFactory;
    protected $model;

    public function __construct(
    Action\Context $context,
    \Magento\Framework\View\Result\PageFactory $resultPageFactory, 
    \FME\News\Model\News $model,
    \Magento\Framework\Registry $registry
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->_coreRegistry = $registry;
        $this->model = $model;
        parent::__construct($context);
    }

    protected function _initAction() {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('FME_News::news_news')
                ->addBreadcrumb(__('NEWS'), __('NEWS'))
                ->addBreadcrumb(__('Manage News'), __('Manage News'));
        return $resultPage;
    }

    public function execute() {

/*        $id = $this->getRequest()->getParam('news_id');
        $photogallery = $this->_objectManager->create('FME\News\Model\MediaFactory');
        $collection = $photogallery->create()->getCollection()->addFieldToFilter('news_id', $id);
        if ($id) {
            $this->model->load($id);
            if (!$this->model->getId()) {
                $this->messageManager
                        ->addError(__('This news is no longer exists.'));
                $resultRedirect = $this->resultRedirectFactory->create(); */
              //  return $resultRedirect->setPath('*/*/');
/*            }
        }

        $this->_objectManager->get('Magento\Framework\Registry')->register('photogallery_img', $collection);

        $this->_coreRegistry->register('news_news', $this->model);*/

        $resultPage = $this->_initAction();

       // $resultPage->addBreadcrumb(
         //       $id ? __('Edit News') : __('New News'), $id ? __('Edit News') : __('New News')
        //);
              
        $resultPage->getConfig()->getTitle()->prepend(__('News'));
        $resultPage->getConfig()->getTitle()
                ->prepend($this->model->getId() ? $this->model->getEventName() : __('New News'));

        return $resultPage;
    }

}
