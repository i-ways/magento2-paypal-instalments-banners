<?php


namespace Iways\PaypalInstalmentsBanners\Test\Unit\Model;

use PHPUnit\Framework\TestCase;
use Iways\PaypalInstalmentsBanners\Model\ConfigProvider;
use Iways\PaypalInstalmentsBanners\Block\Widget\Banner;
use Iways\PaypalInstalmentsBanners\Helper\Data;
use Magento\Checkout\Model\ConfigProviderInterface;
use Magento\Framework\View\LayoutInterface;
use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\Event\Manager;
use Magento\Store\Model\ScopeInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;

class ConfigProviderTest extends TestCase
{

	private $configProviderObj;

	/** @var Data |\PHPUnit_Framework_MockObject_MockObject */
	protected $dataMock;

	/** @var ConfigProviderInterface |\PHPUnit_Framework_MockObject_MockObject */
	protected $configProviderInterfaceMock;

	/** @var LayoutInterface |\PHPUnit_Framework_MockObject_MockObject */
	protected $layoutInterfaceMock;

	/** @var Context|\PHPUnit_Framework_MockObject_MockObject */
	protected $contextMock;

	/** @var Event|\PHPUnit_Framework_MockObject_MockObject */
	protected $eventManagerMock;

	/** @var Config|\PHPUnit_Framework_MockObject_MockObject */
	protected $scopeConfigMock;

	public function setUp()
	{
		$this->contextMock = $this->getMockBuilder(Context::class)
		->disableOriginalConstructor()
		->getMock();
		$this->eventManagerMock = $this->getMockBuilder(Manager::class)
		->disableOriginalConstructor()
		->getMock();
		$this->dataMock = $this->getMockBuilder(Data::class)
		->disableOriginalConstructor()
		->getMock();
		$this->scopeConfigMock = $this->getMockBuilder(ScopeConfigInterface::class)
		->disableOriginalConstructor()
		->getMock();
		$this->configProviderInterfaceMock = $this->getMockBuilder(ConfigProviderInterface::class)
		->disableOriginalConstructor()
		->getMock();
		$this->layoutInterfaceMock = $this->getMockBuilder(LayoutInterface::class)
		->disableOriginalConstructor()
		->getMock();

		$this->configProviderObj = new ConfigProvider(
			$this->dataMock,
			$this->layoutInterfaceMock
		);

	}
	public function testConfigProviderInstance()
	{
		$this->assertInstanceOf(ConfigProvider::class, $this->configProviderObj);
	}
	public function testgetConfig()
	{
		$htmldata="";
		$html = [
            'banner_html' => $htmldata
        ];
		$color = $this->dataMock->method('getShowOnCheckoutFromConfig')
		->willReturn("red");
		$this->contextMock->method('getEventManager')->willReturn($this->eventManagerMock);
		$this->contextMock->method('getScopeConfig')->willReturn($this->scopeConfigMock);
		$this->scopeConfigMock->expects($this->any())->method('getValue')->with('advanced/modules_disable_output/', ScopeInterface::SCOPE_STORE)->willReturn(false);

		$block = new \Magento\Framework\View\Element\Template($this->contextMock);
		$this->layoutInterfaceMock->expects($this->once())
		->method('createBlock')
		->with($this->equalTo(Banner::class))
		->will($this->returnValue($block));
		$returndata =$this->configProviderObj->getConfig();
		$this->assertEquals($html,$returndata);
	}
}
