<?php


namespace Iways\PaypalInstalmentsBanners\Test\Unit\Block;

use PHPUnit\Framework\TestCase;
use Iways\PaypalInstalmentsBanners\Block\Logo;
use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\Locale\Resolver;


class LogoTest extends TestCase
{
    private $LogoObj;

    /** @var Context|\PHPUnit_Framework_MockObject_MockObject */
    protected $contextMock;

    /** @var Resolver|\PHPUnit_Framework_MockObject_MockObject */
    protected $resolverMock;


    public function setUp()
    {
        $this->contextMock = $this->getMockBuilder(Context::class)
        ->disableOriginalConstructor()
        ->getMock();

        $this->resolverMock = $this->getMockBuilder(Resolver::class)
        ->disableOriginalConstructor()
        ->getMock();


        $this->LogoObj = new Logo(
            $this->contextMock,
            $this->resolverMock
        );
    }
    public function testLogoInstance()
    {
        $this->assertInstanceOf(Logo::class, $this->LogoObj);
    }

    public function testtoHtml()
    {
        $logoRefObj = new \ReflectionClass('Iways\PaypalInstalmentsBanners\Block\Logo');
        $toHtmlMethod = $logoRefObj->getMethod('_toHtml');
        $toHtmlMethod->setAccessible(true);
        $this->resolverMock->method('getLocale')->willReturn("de_DE");
        $returndata = $toHtmlMethod->invoke($this->LogoObj);
        $data = "";
        $this->assertEquals($data,$returndata);
    }
}
