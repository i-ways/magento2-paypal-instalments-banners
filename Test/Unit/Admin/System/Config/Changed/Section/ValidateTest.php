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

namespace Iways\PaypalInstalmentsBanners\Test\Unit\Observer\Admin\System\Config\Changed\Section;

use PHPUnit\Framework\TestCase;
use Iways\PaypalInstalmentsBanners\Observer\Admin\System\Config\Changed\Section\Validate;
use Iways\PaypalInstalmentsBanners\Helper\Data;
use Magento\Framework\Event\Observer;
use Magento\Framework\HTTP\Client\Curl;
use Magento\Framework\Message\ManagerInterface;

/**
 * Class ValidateTest
 * @package Iways\PaypalInstalmentsBanners\Test\Unit\Observer\Admin\System\Config\Changed\Section
 */
class ValidateTest extends TestCase
{

    private $validateObj;

    /** @var Curl |\PHPUnit_Framework_MockObject_MockObject */
    protected $curlMock;
    /** @var helper Data|\PHPUnit_Framework_MockObject_MockObject */
    protected $dataMock;
    /** @var Message ManagerInterface |\PHPUnit_Framework_MockObject_MockObject */
    protected $messageManagerMock;
    /** @var Observer |\PHPUnit_Framework_MockObject_MockObject */
    protected $observerMock;

    public function setUp() : void
    {
        $this->curlMock = $this->getMockBuilder(Curl::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->dataMock = $this->getMockBuilder(Data::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->messageManagerMock = $this->getMockBuilder(ManagerInterface::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->observerMock = $this->getMockBuilder(Observer::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->validateObj = new Validate(
            $this->dataMock,
            $this->curlMock,
            $this->messageManagerMock
        );

    }

    public function testValidateInstance()
    {
        $this->assertInstanceOf(Validate::class, $this->validateObj);
    }

    public function testExcute()
    {
        $url = "http:\\test.com";
        $this->dataMock->method('getSdkUrl')->willReturn($url);
        $this->curlMock->method('getBody')->willReturn("test");
        $this->assertNull($this->validateObj->execute($this->observerMock));
    }
}
