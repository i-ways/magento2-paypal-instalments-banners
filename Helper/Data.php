<?php
/**
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com and you will be sent a copy immediately.
 *
 * PHP version 7.3.17
 *
 * @category Modules
 * @package  Magento
 * @author   Bertozzi Matteo <bertozzi@i-ways.net>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License 3.0
 * @link     https://www.i-ways.net
 */

namespace Iways\PaypalInstalmentsBanners\Helper;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Store\Model\ScopeInterface;
use Magento\Store\Model\StoreManagerInterface;

/**
 * Iways\PaypalInstalmentsBanners\Helper\Data
 *
 * @author  Bertozzi Matteo <bertozzi@i-ways.net>
 * @license http://opensource.org/licenses/osl-3.0.php Open Software License 3.0
 * @link    https://www.i-ways.net
 */
class Data extends AbstractHelper
{
    const SDK_URL = 'https://www.paypal.com/sdk/js';

    protected $_config; // phpcs:ignore PSR2.Classes.PropertyDeclaration
    protected $_storeManager; // phpcs:ignore PSR2.Classes.PropertyDeclaration

    /**
     * PayPal Instalments Banner class constructor
     *
     * @param $context      Magento\Framework\View\Element\Template\Context
     * @param $config       Magento\Framework\App\Config\ScopeConfigInterface
     * @param $storeManager Magento\Store\Model\StoreManagerInterface
     *
     * @return void
     */
    public function __construct(
        ScopeConfigInterface $config,
        Context $context,
        StoreManagerInterface $storeManager
    ) {
        $this->_config = $config;
        $this->_storeManager = $storeManager;

        parent::__construct($context);
    }

    /**
     * Calculates banner messages SDK url
     *
     * @return string
     */
    public function getSdkUrl()
    {
        $clientId = $this->_config->getValue(
            'iways_paypalplus/api/client_id',
            ScopeInterface::SCOPE_STORE
        );

        $store = $this->_storeManager->getStore();

        $currencyCode = $store->getCurrentCurrency()->getCode();

        $scriptUrl = self::SDK_URL
                   . '?client-id=' . $clientId
                   . '&currency=' . $currencyCode
                   . '&components=messages';

        return $scriptUrl;
    }

    /**
     * Returns banner_color value for module's 'show_on_cart_page' configuration
     *
     * @return string
     */
    public function getShowOnCartPageFromConfig()
    {
        return $this->_config->getValue(
            'iways_paypalinstalmentsbanners/show_on_cart_page/banner_color',
            ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * Returns banner_color value for module's 'show_on_checkout' configuration
     *
     * @return string
     */
    public function getShowOnCheckoutFromConfig()
    {
        return $this->_config->getValue(
            'iways_paypalinstalmentsbanners/show_on_checkout/banner_color',
            ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * Returns banner_color value for module's 'show_on_footer' configuration
     *
     * @return string
     */
    public function getShowOnFooterFromConfig()
    {
        return $this->_config->getValue(
            'iways_paypalinstalmentsbanners/show_on_footer/banner_color',
            ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * Returns banner_color value for module's 'show_on_product_page' configuration
     *
     * @return string
     */
    public function getShowOnProductPageFromConfig()
    {
        return $this->_config->getValue(
            'iways_paypalinstalmentsbanners/show_on_product_page/banner_color',
            ScopeInterface::SCOPE_STORE
        );
    }
}
