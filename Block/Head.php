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

namespace Iways\PaypalInstalmentsBanners\Block;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Store\Model\ScopeInterface;
use Magento\Widget\Block\BlockInterface;

/**
 * Iways\PaypalInstalmentsBanners\Block\Head
 *
 * @author  Bertozzi Matteo <bertozzi@i-ways.net>
 * @license http://opensource.org/licenses/osl-3.0.php Open Software License 3.0
 * @link    https://www.i-ways.net
 */
class Head extends Template implements BlockInterface
{
    const SDK_URL = 'https://www.paypal.com/sdk/js';

    /**
     * PayPal Instalments Banner class constructor
     *
     * @param $context Magento\Framework\View\Element\Template\Context
     * @param $config  Magento\Framework\App\Config\ScopeConfigInterface
     * @param $data    array
     *
     * @return void
     */
    public function __construct(
        Context $context,
        ScopeConfigInterface $config,
        array $data = []
    ) {
        $this->_config = $config;

        $this->_clientId = $this->_config->getValue(
            'iways_paypalplus/api/client_id',
            ScopeInterface::SCOPE_STORE
        );

        parent::__construct($context, $data);
    }

    /**
     * PayPal SDK for Instalments Banner
     *
     * @return string
     */
    protected function _toHtml()
    {
        $store = $this->_storeManager->getStore();

        $currencyCode = $store->getCurrentCurrency()->getCode();

        $scriptUrl = self::SDK_URL
                   . '?client-id=' . $this->_clientId
                   . '&currency=' . $currencyCode
                   . '&components=messages';

        return '<script src="' . $scriptUrl . '"></script>';
    }
}
