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
 * Iways\PaypalInstalmentsBanners\Block\Widget\Banner
 *
 * @category Blocks
 * @package  Magento
 * @author   Bertozzi Matteo <bertozzi@i-ways.net>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License 3.0
 * @link     https://www.i-ways.net
 */
namespace Iways\PaypalInstalmentsBanners\Block\Widget;

use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;

class Banner
extends Template
implements BlockInterface
{
    const DEFAULT_LAYOUT = 'flex',
          DEFAULT_COLOR = 'blue',
          DEFAULT_RATIO = '1x1';

    protected $_template = "widget/banner.phtml";

    protected function _construct()
    {
        $this->setData('unique_id', 'ipib_' . md5(time() . microtime()));

        if (!$this->getData('banner_layout')) {
            $this->setData('banner_layout', self::DEFAULT_LAYOUT);
        }

        if (!$this->getData('banner_color')) {
            $this->setData('banner_color', self::DEFAULT_COLOR);
        }

        if (!$this->getData('banner_ratio')) {
            $this->setData('banner_ratio', self::DEFAULT_RATIO);
        }

        parent::_construct();
    }

    protected function _beforeToHtml()
    {
        $this->setData('unique_id', 'ipib_' . $this->getNameInLayout());

        return $this;
    }

    //public function addData(array $arr) {var_dump($arr);}
    /*public function setData($key, $value = null)
    {
        var_dump($key, $value);
    }*/

    //protected $activeSocialNetworks;
    //protected $blockTitle;
    //protected $linkAspect;

    //protected $socialLinksHelper;

    //public function __construct(
        //Context $context,
        //\Iways\SocialLinks\Helper\Data $socialLinksHelper,
        //array $data = []
    //) {
        /*$this->store = $context->getStoreManager()->getStore();

        $this->socialLinksHelper = $socialLinksHelper;

        if ($this->linkAspect === null) {

            $this->linkAspect = $this->socialLinksHelper->getConfig('iways_sociallinks/frontend/link_aspect', $this->store->getCode());
        }

        if ($this->blockTitle === null) {

            $this->blockTitle = $this->socialLinksHelper->getConfig('iways_sociallinks/frontend/block_title', $this->store->getCode());
        }

        if ($this->activeSocialNetworks === null) {

            $config = $this->socialLinksHelper->getConfig('iways_sociallinks/social_networks/active_links', $this->store->getCode());

            $this->activeSocialNetworks = explode(",", $config);
        }*/

        //parent::__construct($context, $data);
    //}

    /*public function getBlockTitle()
    {
        return $this->blockTitle;
    }

    public function getSocialLinks() // assumes active font-awesome support on frontend
    {
        $data = [];

        foreach ($this->activeSocialNetworks as $key) {

            if ($url = $this->socialLinksHelper->getConfig('iways_sociallinks/social_networks/' . $key . '_url', $this->store->getCode())) {

                $name = \Iways\SocialLinks\Helper\Data::$socialNetworks[$key];

                $label = $this->linkAspect == 'icons'
                        ? '<i class="fa fa-' . $key . '" title="' . $name . '"></i>'
                                : $name;

                $data[$key] = [
                                'label' => $label,
                                'url' => $url,
                ];
            }
        }

        return $data;
    }*/
}