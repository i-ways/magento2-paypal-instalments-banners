<?php


namespace Iways\PaypalInstalmentsBanners\Test\Unit\Model\System\Config\Source\Banner;

use PHPUnit\Framework\TestCase;
use Iways\PaypalInstalmentsBanners\Model\System\Config\Source\Banner\Color;

/**
 * Class ColorTest
 * @package Iways\PaypalInstalmentsBanners\Test\Unit\Model\System\Config\Source\Banner
 */
class ColorTest extends TestCase
{

    private $colorObj;
    const NO_BANNER = 0,
        COLOR_WHITE = 'white',
        //COLOR_WHITE_NO_BORDER = 'white-no-border',
        COLOR_GRAY = 'gray',
        COLOR_BLUE = 'blue',
        COLOR_BLACK = 'black';


    public function setUp()
    {

        $this->colorObj = new Color();
    }

    public function testToArray()
    {
        $data = [
            self::NO_BANNER => __('none'),
            self::COLOR_WHITE => __('white'),
            self::COLOR_GRAY => __('gray'),
            self::COLOR_BLUE => __('blue'), // default, see etc/config.xml
            self::COLOR_BLACK => __('black')
        ];
        $this->assertEquals($data, $this->colorObj->toArray());
    }

    public function testtoOptionArray()
    {
        $data = [
            [
                'value' => 0,
                'label' => "none"
            ],
            [
                'value' => "white",
                'label' => "white"
            ],
            [
                'value' => "gray",
                'label' => "gray"
            ],
            [
                'value' => "blue",
                'label' => "blue"
            ],
            [
                'value' => "black",
                'label' => "black"
            ],
        ];

        $this->assertEquals($data, $this->colorObj->toOptionArray());
    }
}
