<?php

namespace FME\News\Block\Adminhtml\News\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class SaveAndContinueButton extends GenericButton implements ButtonProviderInterface {

    public function getButtonData() {
        return [
            'label' => __('Save and Continue Edit'),
            'class' => 'save',
            'data_attribute' => [
                'mage-init' => [
                    'button' => ['news' => 'saveAndContinueEdit'],
                ],
            ],
            'sort_order' => 80,
        ];
    }

}
