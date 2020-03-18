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
 * PHP version 7.2.18
 *
 * @category Modules
 * @package  Magento
 * @author   Bertozzi Matteo <bertozzi@i-ways.net>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License 3.0
 * @link     https://www.i-ways.net
 */

/**
 * Iways\PaypalInstalmentsBanners\Model\System\Config\Source\Banner\Ratio
 *
 * @category Models
 * @package  Magento
 * @author   Bertozzi Matteo <bertozzi@i-ways.net>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License 3.0
 * @link     https://www.i-ways.net
 */

namespace Iways\PaypalInstalmentsBanners\Model\System\Config\Source\Banner;

use Magento\Framework\Option\ArrayInterface;

class Ratio
implements ArrayInterface
{
    const RATIO_1X1 = '1x1',
          RATIO_1X4 = '1x4',
          RATIO_8X1 = '8x1',
          RATIO_20X1 = '20x1';

    /**
     * Translated configuration options
     *
     * @return array
     */
    public function toArray()
    {
        return [
            self::RATIO_1X1 => '1x1', // default, see etc/config.xml
            self::RATIO_1X4 => '1x4',
            self::RATIO_8X1 => '8x1',
            self::RATIO_20X1 => '20x1'
        ];
    }

    /**
     * Translated configuration options in multiarray
     *
     * @return array
     */
    public function toOptionArray()
    {
        $output = [];

        foreach ($this->toArray() as $key => $value) {
            $output[] = [
                'value' => $key,
                'label' => $value
            ];
        }

        return $output;
    }
}
