<?php

namespace FME\News\Controller\Adminhtml\News;

class Delete extends \Magento\Backend\App\Action
{
    
    const ADMIN_RESOURCE = 'FME_News::manage_news';
    public function execute()
    {
        
        $id = $this->getRequest()->getParam('news_id');
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($id) {
            $title = "";
            try {
                // init model and delete
                $model = $this->_objectManager->create('FME\News\Model\News');
                $model->load($id);
                $title = $model->getTitle();
                $model->delete();
                // display success message
                $this->messageManager->addSuccess(__('The page has been deleted.'));
                // go to grid
                $this->_eventManager->dispatch(
                    'adminhtml_cmspage_on_delete',
                    ['title' => $title, 'status' => 'success']
                );
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                $this->_eventManager->dispatch(
                    'adminhtml_cmspage_on_delete',
                    ['title' => $title, 'status' => 'fail']
                );
                // display error message
                $this->messageManager->addError($e->getMessage());
                // go back to edit form
                return $resultRedirect->setPath('*/*/edit', ['news_id' => $id]);
            }
        }
        // display error message
        $this->messageManager->addError(__('We can\'t find a page to delete.'));
        // go to grid
        return $resultRedirect->setPath('*/*/');
    }
}
