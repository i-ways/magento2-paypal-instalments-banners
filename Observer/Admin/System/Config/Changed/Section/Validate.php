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

namespace Iways\PaypalInstalmentsBanners\Observer\Admin\System\Config\Changed\Section;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Message\ManagerInterface;

/**
 * Iways\PaypalInstalmentsBanners\Observer\Admin\System\Config\Changed\Section\Validate
 *
 * @author  Bertozzi Matteo <bertozzi@i-ways.net>
 * @license http://opensource.org/licenses/osl-3.0.php Open Software License 3.0
 * @link    https://www.i-ways.net
 */
class Validate implements ObserverInterface
{
	/**
	 * PayPal Instalments Banner class constructor
	 *
	 * @param $messageManagerMagento\Framework\Message\ManagerInterface
	 *
	 * @return void
	 */
	public function __construct(
		ManagerInterface $messageManager
	) {
		$this->_messageManager = $messageManager;
	}
	
	/**
	 * Returns banner_html code as configuration array for knockout.js
	 * 
	 * @param $observer Magento\Framework\Event\Observer
	 *
	 * @return array
	 */
	public function execute(Observer $observer)
	{
		$this->_messageManager->addError(
			__('Webhook creation failed.')
		);
	}
}
