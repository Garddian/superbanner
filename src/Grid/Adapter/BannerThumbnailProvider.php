<?php
/**
 * Copyright since 2007 PrestaShop SA and Contributors
 * PrestaShop is an International Registered Trademark & Property of PrestaShop SA
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.md.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/OSL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to https://devdocs.prestashop.com/ for more information.
 *
 * @author    PrestaShop SA and Contributors <contact@prestashop.com>
 * @copyright Since 2007 PrestaShop SA and Contributors
 * @license   https://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 */

declare(strict_types=1);

namespace Superbanner\Grid\Adapter;

use HelperList;
use ImageManager;
use PrestaShop\PrestaShop\Adapter\Configuration;
use PrestaShop\PrestaShop\Core\Image\ImageProviderInterface;
use PrestaShop\PrestaShop\Core\Image\Parser\ImageTagSourceParserInterface;

/**
 * Provides path for banner logo in banners grid
 */
class BannerThumbnailProvider implements ImageProviderInterface
{
    /**
     * @var ImageTagSourceParserInterface
     */
    private $imageTagSourceParser;

    /**
     * @param ImageTagSourceParserInterface $parser
     */
    public function __construct(ImageTagSourceParserInterface $parser)
    {
        $this->imageTagSourceParser = $parser;
    }

    /**
     * {@inheritdoc}
     */
    public function getPath($bannerId)
    {
        $conf = new Configuration();
        $pathToImage = _PS_ROOT_DIR_.$conf->get('SUPERBANNER_PATH') . $bannerId . '.png';
        $imageTag = ImageManager::thumbnail(
            $pathToImage,
            'banner_mini_' . $bannerId . '.jpg',
            HelperList::LIST_THUMBNAIL_SIZE,
            'png'
        );
        return $this->imageTagSourceParser->parse($imageTag);
    }
}