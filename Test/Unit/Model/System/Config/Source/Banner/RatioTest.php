<?php


namespace Iways\PaypalInstalmentsBanners\Test\Unit\Model\System\Config\Source\Banner;

use PHPUnit\Framework\TestCase;
use Iways\PaypalInstalmentsBanners\Model\System\Config\Source\Banner\Ratio;

/**
 * Class RatioTest
 * @package Iways\PaypalInstalmentsBanners\Test\Unit\Model\System\Config\Source\Banner
 */
class RatioTest extends TestCase
{
    private $ratioObj;

    const RATIO_1X1 = '1x1',
        RATIO_1X4 = '1x4',
        RATIO_8X1 = '8x1',
        RATIO_20X1 = '20x1';

    public function setUp() : void
    {

        $this->ratioObj = new Ratio();
    }

    public function testToArray()
    {
        $data = [
            self::RATIO_1X1 => '1x1', // default, see etc/config.xml
            self::RATIO_1X4 => '1x4',
            self::RATIO_8X1 => '8x1',
            self::RATIO_20X1 => '20x1'
        ];
        $this->assertEquals($data, $this->ratioObj->toArray());
    }

    public function testtoOptionArray()
    {
        $data = [
            [
                'value' => '1x1',
                'label' => '1x1'
            ],
            [
                'value' => '1x4',
                'label' => '1x4'
            ],
            [
                'value' => '8x1',
                'label' => '8x1'
            ],
            [
                'value' => '20x1',
                'label' => '20x1'
            ],
        ];

        $this->assertEquals($data, $this->ratioObj->toOptionArray());
    }
}
