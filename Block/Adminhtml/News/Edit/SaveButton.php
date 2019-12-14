<?php

namespace FME\News\Block\Adminhtml\News\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class SaveButton extends GenericButton implements ButtonProviderInterface {

    public function getButtonData() {
        return [
            'label' => __('Save News'),
            'class' => 'save primary',
            'data_attribute' => [
                'mage-init' => ['button' => ['news' => 'save']],
                'form-role' => 'save',
            ],
            'sort_order' => 90,
        ];
    }

}
