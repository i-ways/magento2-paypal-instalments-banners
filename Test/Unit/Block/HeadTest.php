<?php


namespace Iways\PaypalInstalmentsBanners\Test\Unit\Block;

use PHPUnit\Framework\TestCase;
use Iways\PaypalInstalmentsBanners\Helper\Data;
use Iways\PaypalInstalmentsBanners\Block\Head;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Integration\Model\Oauth\Nonce\Generator;
use Magento\Widget\Block\BlockInterface;

class HeadTest extends TestCase
{
    private $HeadObj;

    /** @var Context|\PHPUnit_Framework_MockObject_MockObject */
    protected $contextMock;

    /** @var generator|\PHPUnit_Framework_MockObject_MockObject */
    protected $generatorMock;

    /** @var helper|\PHPUnit_Framework_MockObject_MockObject */
    protected $helperMock;

    public function setUp() : void
    {
        $this->contextMock = $this->getMockBuilder(Context::class)
        ->disableOriginalConstructor()
        ->getMock();

        $this->generatorMock = $this->getMockBuilder(Generator::class)
        ->disableOriginalConstructor()
        ->getMock();



        $this->helperMock = $this->getMockBuilder(Data::class)
        ->disableOriginalConstructor()
        ->getMock();

        $this->HeadObj = new Head(
            $this->contextMock,
            $this->generatorMock,
            $this->helperMock
        );
    }
    public function testHeadInstance()
    {
        $this->assertInstanceOf(Head::class, $this->HeadObj);
    }

    public function testtoHtml()
    {
        $headRefObj = new \ReflectionClass('Iways\PaypalInstalmentsBanners\Block\Head');
        $toHtmlMethod = $headRefObj->getMethod('_toHtml');
        $toHtmlMethod->setAccessible(true);

        $sdkUrl = "https:\\\SdkUrl.com";
        $nonce = "test";
        $this->generatorMock->method('generateNonce')->willReturn($nonce);
        $this->helperMock->method('getSdkUrl')->willReturn($sdkUrl);
        $this->helperMock->method('getShowOnCheckoutFromConfig')->willReturn(true);
        $data = '<script src="'.$sdkUrl.'" data-csp-nonce="' . $nonce  . '"></script>'
        . '<script>window.ipib_show_on_checkout = 1;</script>';
        $returndata = $toHtmlMethod->invoke($this->HeadObj);
        $this->assertEquals($data,$returndata);
    }
}
