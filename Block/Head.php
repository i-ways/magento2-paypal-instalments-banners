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

use Iways\PaypalInstalmentsBanners\Helper\Data;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Integration\Model\Oauth\Nonce\Generator;
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
    /**
     * Protected $_helper
     *
     * @var Iways\PaypalInstalmentsBanners\Helper\Data
     */
    protected $_helper; // phpcs:ignore PSR2.Classes.PropertyDeclaration

    /**
     * PayPal Instalments Banner class constructor
     *
     * @param Magento\Framework\View\Element\Template\Context $context
     * @param Iways\PaypalInstalmentsBanners\Helper\Data      $helper
     * @param Magento\Integration\Model\Oauth\Nonce\Generator $generator
     * @param array                                           $data
     *
     * @return void
     */
    public function __construct(
        Context $context,
        Data $helper,
        Generator $generator,
        array $data = []
    ) {
        $this->_helper = $helper;
        $this->_generator = $generator;

        parent::__construct($context, $data);
    }

    /**
     * PayPal SDK for Instalments Banner
     *
     * @return string
     */
    protected function _toHtml() // phpcs:ignore PSR2.Methods.MethodDeclaration
    {
        $nonce = $this->_generator->generateNonce();

        return '<script src="' . $this->_helper->getSdkUrl() . '" data-csp-nonce="' . $nonce  . '"></script>';
    }
}
