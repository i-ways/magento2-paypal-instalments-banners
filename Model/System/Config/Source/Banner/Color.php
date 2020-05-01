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

namespace Iways\PaypalInstalmentsBanners\Model\System\Config\Source\Banner;

use Magento\Framework\Option\ArrayInterface;

/**
 * Iways\PaypalInstalmentsBanners\Model\System\Config\Source\Banner\Color
 *
 * @author  Bertozzi Matteo <bertozzi@i-ways.net>
 * @license http://opensource.org/licenses/osl-3.0.php Open Software License 3.0
 * @link    https://www.i-ways.net
 */
class Color implements ArrayInterface
{
    const NO_BANNER = 0,
          COLOR_WHITE = 'white',
          //COLOR_WHITE_NO_BORDER = 'white-no-border',
          COLOR_GRAY = 'gray',
          COLOR_BLUE = 'blue',
          COLOR_BLACK = 'black';

    /**
     * Translated configuration options
     *
     * @return array
     */
    public function toArray()
    {
        return [
            self::NO_BANNER => __('none'),
            self::COLOR_WHITE => __('white'),
            self::COLOR_GRAY => __('gray'),
            self::COLOR_BLUE => __('blue'), // default, see etc/config.xml
            self::COLOR_BLACK => __('black')
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
