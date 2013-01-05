<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * LiteCommerce
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to licensing@litecommerce.com so we can send you a copy immediately.
 *
 * PHP version 5.3.0
 *
 * @category  LiteCommerce
 * @author    Creative Development LLC <info@cdev.ru>
 * @copyright Copyright (c) 2011-2012 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.litecommerce.com/
 */

namespace XLite\Module\XC\ThemeTweaker\View;

/**
 * Abstract widget
 *
 */
abstract class AView extends \XLite\View\AView implements \XLite\Base\IDecorator
{
    /**
     * Get list of methods, priorities and interfaces for the resources
     *
     * @return array
     */
    protected static function getResourcesSchema()
    {
        $schema = parent::getResourcesSchema();
        $schema[] =  array('getCustomFiles', 1000, 'custom');

        return $schema;
    }   

    /**
     * Return custom common files
     *
     * @return array
     */
    protected function getCustomFiles()
    {
        $files = array();

        if (
            !\XLite::isAdminZone()
        ) {
            if (
                \XLite\Core\Config::getInstance()->XC->ThemeTweaker->use_js
            ) {
                $files[static::RESOURCE_JS] = array(
                    array(
                        'file'  => 'theme/custom.js', 
                        'media' => 'all'
                    )
                );
            }

            if (
                \XLite\Core\Config::getInstance()->XC->ThemeTweaker->use_css
            ) {
                $files[static::RESOURCE_CSS] = array(
                    array(
                        'file'  => 'theme/custom.css',
                        'media' => 'all'
                    )
                );
            }
        }

        return $files;
    }
}
