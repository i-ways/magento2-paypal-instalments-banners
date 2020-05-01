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

use Magento\Framework\Locale\Resolver;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Widget\Block\BlockInterface;

/**
 * Iways\PaypalInstalmentsBanners\Block\Logo
 *
 * @author  Bertozzi Matteo <bertozzi@i-ways.net>
 * @license http://opensource.org/licenses/osl-3.0.php Open Software License 3.0
 * @link    https://www.i-ways.net
 */
class Logo extends Template implements BlockInterface
{
    const TARGET_URL_DE = 'https://www.paypal.com/de/webapps/mpp/paypal-instalments',
          TARGET_URL_EN_US = 'https://www.paypal.com/us/webapps/mpp/paypal-credit',
          IMAGE_URL_EN_US = 'https://www.paypalobjects.com/webstatic/en_US/i/buttons'
                          . '/PP_credit_logo_h_200x51.png';

    /**
     * PayPal Instalments Banner class constructor
     *
     * @param $context Magento\Framework\View\Element\Template\Context
     * @param $locale  Magento\Framework\Locale\Resolver
     * @param $data    array
     *
     * @return void
     */
    public function __construct(
        Context $context,
        Resolver $locale,
        array $data = []
    ) {
        $this->_locale = $locale;

        parent::__construct($context, $data);
    }

    /**
     * PayPal Instalments Banner logo information
     *
     * @return string
     */
    protected function _toHtml()
    {
        $localeCode = $this->_locale->getLocale();

        if ($localeCode == 'de_DE') {
            $this->setData('target_url', self::TARGET_URL_DE);
        } else {
            $this->setData('target_url', self::TARGET_URL_EN_US);
            $this->setData('logo_image', self::IMAGE_URL_EN_US);
        }

        return parent::_toHtml();
    }
}
