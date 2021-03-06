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

namespace XLite\Core\EventDriver;

/**
 * DB-based event driver 
 * 
 */
class Db extends \XLite\Core\EventDriver\AEventDriver
{
    /**
     * Get driver code
     *
     * @return string
     */
    public static function getCode()
    {
        return 'db';
    }

    /**
     * Fire event
     *
     * @param string $name      Event name
     * @param array  $arguments Arguments OPTIONAL
     *
     * @return boolean
     */
    public function fire($name, array $arguments = array())
    {
        $entity = new \XLite\Model\EventTask;
        $entity->setName($name);
        $entity->setArguments($arguments);

        \XLite\Core\Database::getEM()->persist($entity);
        \XLite\Core\Database::getEM()->flush();
    }

}

