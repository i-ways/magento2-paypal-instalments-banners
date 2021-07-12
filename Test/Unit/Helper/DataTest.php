<?php


namespace Iways\PaypalInstalmentsBanners\Test\Unit\Block;

use PHPUnit\Framework\TestCase;
use Iways\PaypalInstalmentsBanners\Helper\Data;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Store\Model\ScopeInterface;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Store\Model\Store;
use Magento\Directory\Model\Currency;
class DataTest extends TestCase
{
	private $dataObj;

	/** @var Config|\PHPUnit_Framework_MockObject_MockObject */
	protected $configMock;

	/** @var Context|\PHPUnit_Framework_MockObject_MockObject */
	protected $contextMock;

	/** @var storeManager|\PHPUnit_Framework_MockObject_MockObject */
	protected $storeManagerMock;

	const SDK_URL = 'https://www.paypal.com/sdk/js';


	public function setUp() : void
	{
		$this->configMock = $this->getMockBuilder(ScopeConfigInterface::class)
		->disableOriginalConstructor()
		->getMock();
		$this->contextMock = $this->getMockBuilder(Context::class)
		->disableOriginalConstructor()
		->getMock();
		$this->storeManagerMock = $this->getMockBuilder(StoreManagerInterface::class)
		->disableOriginalConstructor()
		->getMock();


		$this->dataObj = new Data(
			$this->configMock,
			$this->contextMock,
			$this->storeManagerMock
		);
	}


	public function testDataInstance()
	{
		$this->assertInstanceOf(Data::class, $this->dataObj);
	}

	public function testGetSdkUrl()
	{
		$clientId = 2;
		$currencyCode= 123;
		
		$scriptUrl = self::SDK_URL
		. '?client-id=' . $clientId
		. '&currency=' . $currencyCode
		. '&components=messages';
		$this->configMock->expects($this->any())->method('getValue')->with('iways_paypalplus/api/client_id', ScopeInterface::SCOPE_STORE)->willReturn($clientId);

		$mockStore = $this->getMockBuilder(Store::class)
		->disableOriginalConstructor()
		->getMock();

		$mockCurrency = $this->getMockBuilder(Currency::class)
		->setMethods(['getCode'])
		->disableOriginalConstructor()
		->getMock();
		$this->storeManagerMock->method('getStore')->willReturn($mockStore);
		$mockStore->method('getCurrentCurrency')->willReturn($mockCurrency);
		$mockCurrency->method('getCode')->willReturn($currencyCode);

		$this->assertEquals($scriptUrl,$this->dataObj->getSdkUrl());
	}

	public function testGetShowOnCartPageFromConfig()
	{
		$bannerColor = "red";
		$this->configMock->expects($this->any())->method('getValue')->with('iways_paypalinstalmentsbanners/show_on_cart_page/banner_color', ScopeInterface::SCOPE_STORE)->willReturn($bannerColor);
		$this->assertEquals($bannerColor,$this->dataObj->getShowOnCartPageFromConfig());
	}

	public function testGetShowOnCheckoutFromConfig()
	{
		
		$bannerColor = "red";
		$this->configMock->expects($this->any())->method('getValue')->with('iways_paypalinstalmentsbanners/show_on_checkout/banner_color', ScopeInterface::SCOPE_STORE)->willReturn($bannerColor);
		$this->assertEquals($bannerColor,$this->dataObj->getShowOnCheckoutFromConfig());
	}

	public function testGetShowOnFooterFromConfig()
	{
		$bannerColor = "red";
		$this->configMock->expects($this->any())->method('getValue')->with('iways_paypalinstalmentsbanners/show_on_footer/banner_color', ScopeInterface::SCOPE_STORE)->willReturn($bannerColor);
		$this->assertEquals($bannerColor,$this->dataObj->getShowOnFooterFromConfig());
	}
	public function testGetShowOnProductPageFromConfig()
	{
		$bannerColor = "red";
		$this->configMock->expects($this->any())->method('getValue')->with('iways_paypalinstalmentsbanners/show_on_product_page/banner_color', ScopeInterface::SCOPE_STORE)->willReturn($bannerColor);
		$this->assertEquals($bannerColor,$this->dataObj->getShowOnProductPageFromConfig());
	}
}