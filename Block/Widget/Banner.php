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

namespace Iways\PaypalInstalmentsBanners\Block\Widget;

use Magento\Checkout\Model\Cart;
use Magento\Framework\Registry;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Widget\Block\BlockInterface;

/**
 * Iways\PaypalInstalmentsBanners\Block\Widget\Banner
 *
 * @author  Bertozzi Matteo <bertozzi@i-ways.net>
 * @license http://opensource.org/licenses/osl-3.0.php Open Software License 3.0
 * @link    https://www.i-ways.net
 */
class Banner extends Template implements BlockInterface
{
    const DEFAULT_LAYOUT = 'flex',
          DEFAULT_COLOR = 'blue',
          DEFAULT_RATIO = '1x1';

    protected $_cart; // phpcs:ignore PSR2.Classes.PropertyDeclaration
    protected $_registry; // phpcs:ignore PSR2.Classes.PropertyDeclaration
    protected $_template; // phpcs:ignore PSR2.Classes.PropertyDeclaration

    /**
     * PayPal Instalments Banner class constructor
     *
     * @param $cart     Magento\Checkout\Model\Cart
     * @param $context  Magento\Framework\View\Element\Template\Context
     * @param $registry Magento\Framework\Registry
     * @param $data     array
     *
     * @return void
     */
    public function __construct(
        Cart $cart,
        Context $context,
        Registry $registry,
        array $data = []
    ) {
        $this->_cart = $cart;
        $this->_registry = $registry;
        $this->_template = "widget/banner.phtml";

        parent::__construct($context, $data);
    }

    /**
     * PayPal Instalments Banner HTML constructor
     *
     * @return void
     */
    protected function _construct() // phpcs:ignore PSR2.Methods.MethodDeclaration
    {
        if (!$this->getData('banner_layout')) {
            $this->setData('banner_layout', self::DEFAULT_LAYOUT);
        }

        if (!$this->getData('banner_color')) {
            $this->setData('banner_color', self::DEFAULT_COLOR);
        }

        if (!$this->getData('banner_ratio')) {
            $this->setData('banner_ratio', self::DEFAULT_RATIO);
        }

        $bannerAmount = 0;

        if ($currentQuote = $this->_cart->getQuote()) {
            $grandTotal = $currentQuote->getGrandTotal();
            $bannerAmount += $grandTotal;
        }

        if ($currentProduct = $this->_registry->registry('product')) {
            $bannerAmount += $currentProduct->getFinalPrice();
        }

        $this->setData('banner_amount', number_format($bannerAmount, 2, ".", ''));
        $this->setData('cart_amount', number_format($grandTotal, 2, ".", ''));

        parent::_construct();
    }

    /**
     * PayPal Instalments Banner HTML additional data
     *
     * @return Magento\Framework\View\Element\Template
     */
    protected function _beforeToHtml() // phpcs:ignore PSR2.Methods.MethodDeclaration
    {
        $this->setData('unique_id', 'ipib_' . $this->getNameInLayout());

        return $this;
    }
}
