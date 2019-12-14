<?php

namespace FME\News\Block\Adminhtml\News\Grid\Renderer\Action;

use Magento\Store\Api\StoreResolverInterface;

class UrlBuilder
{

    protected $frontendUrlBuilder;

    public function __construct(\Magento\Framework\UrlInterface $frontendUrlBuilder)
    {
        $this->frontendUrlBuilder = $frontendUrlBuilder;
    }

    public function getUrl($routePath, $scope, $store)
    {
        $this->frontendUrlBuilder->setScope($scope);
        $href = $this->frontendUrlBuilder->getUrl(
            $routePath,
            [
                '_current' => false,
                '_query' => [StoreResolverInterface::PARAM_NAME => $store]
            ]
        );

        return $href;
    }
}
