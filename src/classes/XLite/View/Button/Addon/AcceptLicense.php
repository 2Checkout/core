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
 * @copyright Copyright (c) 2011 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @version   GIT: $Id$
 * @link      http://www.litecommerce.com/
 * @see       ____file_see____
 * @since     1.0.0
 */

namespace XLite\View\Button\Addon;

/**
 * Install addon button 
 * 
 * @see   ____class_see____
 * @since 1.0.0
 */
class AcceptLicense extends \XLite\View\Button\PopupButton
{
    /**
     * Register JS files
     *
     * @return array
     * @see    ____func_see____
     * @since  1.0.0
     */
    public function getJSFiles()
    {
        $list = parent::getJSFiles();
        $list[] = 'button/js/accept_license.js';

        return $list;
    }

    /**
     * getDefaultDisableState
     *
     * @return boolean
     * @see    ____func_see____
     * @since  1.0.0
     */
    protected function getDefaultDisableState()
    {
        return parent::getDefaultDisableState() || true;
    }

    /**
     * Return content for popup button
     *
     * @return string
     * @see    ____func_see____
     * @since  1.0.0
     */
    protected function getButtonContent()
    {
        return 'Install add-on';
    }

    /**
     * Return URL parameters to use in AJAX popup
     *
     * @return array
     * @see    ____func_see____
     * @since  1.0.0
     */
    protected function prepareURLParams()
    {
        return array(
            'target' => 'addon_install',
            'widget' => '\XLite\View\ModulesManager\InstallationType',
        );
    }

    /** 
     * getClass 
     * 
     * @return string
     * @see    ____func_see____
     * @since  1.0.0
     */
    protected function getClass()
    {
        return parent::getClass() . ' accept-license-button';
    }
}
