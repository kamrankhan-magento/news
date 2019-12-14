<?php

namespace FME\News\Ui\Component\Listing\Column;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;
use FME\News\Block\Adminhtml\News\Grid\Renderer\Action\UrlBuilder;
use Magento\Framework\UrlInterface;

class Actions extends Column {

    const EVENT_URL_PATH_EDIT = 'news/news/edit';
    const EVENT_URL_PATH_DELETE = 'news/news/delete';

    /** @var UrlBuilder */
    protected $actionUrlBuilder;

    /** @var UrlInterface */
    protected $urlBuilder;

    /**
     * @var string
     */
    private $editUrl;

    public function __construct(
    ContextInterface $context, UiComponentFactory $uiComponentFactory, UrlBuilder $actionUrlBuilder, UrlInterface $urlBuilder, array $components = [], array $data = [], $editUrl = self::EVENT_URL_PATH_EDIT
    ) {
        $this->urlBuilder = $urlBuilder;
        $this->actionUrlBuilder = $actionUrlBuilder;
        $this->editUrl = $editUrl;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    public function prepareDataSource(array $dataSource) {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                $name = $this->getData('name');
                if (isset($item['news_id'])) {
                    $item[$name]['edit'] = [
                        'href' => $this->urlBuilder->getUrl($this->editUrl, ['news_id' => $item['news_id']]),
                        'label' => __('Edit')
                    ];
                    $item[$name]['delete'] = [
                        'href' => $this->urlBuilder->getUrl(
                                self::EVENT_URL_PATH_DELETE, ['news_id' => $item['news_id']]
                        ),
                        'label' => __('Delete'),
                        'confirm' => [
                            'title' => __('Delete \"${ $.$data.store_name }\"'),
                            'message' => __('Are you sure you wan\'t to delete a \"${ $.$data.news_name }\" record?')
                        ]
                    ];
                }
            }
        }
        return $dataSource;
    }

}
