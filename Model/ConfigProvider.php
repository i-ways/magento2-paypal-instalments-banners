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

namespace Iways\PaypalInstalmentsBanners\Model;

use Iways\PaypalInstalmentsBanners\Block\Widget\Banner;
use Iways\PaypalInstalmentsBanners\Helper\Data;
use Magento\Checkout\Model\ConfigProviderInterface;
use Magento\Framework\View\LayoutInterface;

/**
 * Iways\PaypalInstalmentsBanners\Model\System\Config\Source\Banner\Color
 *
 * @author  Bertozzi Matteo <bertozzi@i-ways.net>
 * @license http://opensource.org/licenses/osl-3.0.php Open Software License 3.0
 * @link    https://www.i-ways.net
 */
class ConfigProvider implements ConfigProviderInterface
{
    protected $_helper; // phpcs:ignore PSR2.Classes.PropertyDeclaration
    protected $_layout; // phpcs:ignore PSR2.Classes.PropertyDeclaration

    /**
     * PayPal Instalments Banner class constructor
     *
     * @param $helper Iways\PaypalInstalmentsBanners\Helper\Data
     * @param $layout Magento\Framework\View\LayoutInterface
     *
     * @return void
     */
    public function __construct(
        Data $helper,
        LayoutInterface $layout
    ) {
        $this->_helper = $helper;
        $this->_layout = $layout;
    }

    /**
     * Returns banner_html code as configuration array for knockout.js
     *
     * @return array
     */
    public function getConfig()
    {
        $block = $this->_layout->createBlock(Banner::class);
        $name = 'iways-paypalinstalmentsbanners-widget-banner-show-on-checkout';
        $html = $block->setNameInLayout($name)
            ->setData('banner_ratio', '8x1')
            ->setData('banner_color', $this->_helper->getShowOnCheckoutFromConfig())
            ->toHtml();

        return [
            'banner_html' => $html
        ];
    }
}
