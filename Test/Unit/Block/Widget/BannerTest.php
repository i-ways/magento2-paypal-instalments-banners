<?php


namespace Iways\PaypalInstalmentsBanners\Test\Unit\Block\Widget;

use PHPUnit\Framework\TestCase;
use Iways\PaypalInstalmentsBanners\Block\Widget\Banner;
use Magento\Checkout\Model\Cart;
use Magento\Framework\Registry;
use Magento\Framework\View\Element\Template\Context;
Use \Magento\Quote\Model\Quote;
use Magento\Quote\Model\Cart\Total;

class BannerTest extends TestCase
{
	private $bannerObj;

	/** @var Registry|\PHPUnit_Framework_MockObject_MockObject */
	protected $registryMock;

	/** @var Context|\PHPUnit_Framework_MockObject_MockObject */
	protected $contextMock;

	/** @var Cart|\PHPUnit_Framework_MockObject_MockObject */
	protected $cartMock;

	/** @var quote|\PHPUnit_Framework_MockObject_MockObject */
	protected $quoteTotalMock;



	public function setUp() : void
	{
		$this->contextMock = $this->getMockBuilder(Context::class)
		->disableOriginalConstructor()
		->getMock();

		$this->registryMock = $this->getMockBuilder(Registry::class)
		->disableOriginalConstructor()
		->getMock();

		$this->cartMock = $this->getMockBuilder(Cart::class)
		->disableOriginalConstructor()
		->getMock();
		
		$this->quoteTotalMock = $this->getMockBuilder(Total::class)
		->setMethods(['getGrandTotal'])
		->disableOriginalConstructor()
		->getMock();

		$this->cartMock->method('getQuote')
		->willReturn($this->quoteTotalMock);

		$this->quoteTotalMock->expects($this->any())
		->method('getGrandTotal')
		->will($this->returnValue(100));

		$this->bannerObj = new Banner(
			$this->cartMock,
			$this->contextMock,
			$this->registryMock
		);
	}

	public function testBannerInstance()
	{
		$this->assertInstanceOf(Banner::class, $this->bannerObj);
	}
	public function testbeforeToHtml()
	{
		$nammerRefObj = new \ReflectionClass('Iways\PaypalInstalmentsBanners\Block\Widget\Banner');
		$toHtmlMethod = $nammerRefObj->getMethod('_beforeToHtml');
        $toHtmlMethod->setAccessible(true);
		$returndata = $toHtmlMethod->invoke($this->bannerObj);
		$this->assertEquals($this->bannerObj,$returndata);
	}
}