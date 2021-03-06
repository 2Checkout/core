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
 * @link      http://www.litecommerce.com/
 * @see       ____file_see____
 * @since     1.0.12
 */

class XLite_Tests_Module_CDev_XMLSitemap_Logic_SitemapIterator extends XLite_Tests_TestCase
{
    public function testCount()
    {
        $iterator = new \XLite\Module\CDev\XMLSitemap\Logic\SitemapIterator;

        $this->assertEquals(
            $iterator->count(),
            \XLite\Core\Database::getRepo('XLite\Model\Product')->count() + \XLite\Core\Database::getRepo('XLite\Model\Category')->count(),
            'check count'
        );

        $this->assertEquals(
            count($iterator),
            \XLite\Core\Database::getRepo('XLite\Model\Product')->count() + \XLite\Core\Database::getRepo('XLite\Model\Category')->count(),
            'check count #2'
        );
    }

    public function testIterate()
    {
        $iterator = new \XLite\Module\CDev\XMLSitemap\Logic\SitemapIterator;

        $i = 0;
        foreach ($iterator as $data) {
            $i++;
            $this->assertTrue(is_array($data), 'check type #' . $i);
            $this->assertTrue(time() >= $data['lastmod'], 'check lastmod #' . $i);
            $this->assertEquals('daily', $data['changefreq'], 'check changefreq #' . $i);

            if ('main' == $data['loc']['target']) {
                $this->assertEquals('main', $data['loc']['target'], 'check loc target #' . $i);
                $this->assertEquals(0.5, $data['priority'], 'check priority #' . $i);

            } elseif ('product' == $data['loc']['target']) {
                $this->assertEquals('product', $data['loc']['target'], 'check loc target #' . $i);
                $model = \XLite\Core\Database::getRepo('XLite\Model\Product')->find($data['loc']['product_id']);
                $this->assertTrue($model instanceof \XLite\Model\Product, 'check model #' . $i);
                $this->assertEquals(0.5, $data['priority'], 'check priority #' . $i);

            } elseif ('category' == $data['loc']['target']) {
                $this->assertEquals('category', $data['loc']['target'], 'check loc target #' . $i);
                $model = \XLite\Core\Database::getRepo('XLite\Model\Category')->find($data['loc']['category_id']);
                $this->assertTrue($model instanceof \XLite\Model\Category, 'check model #' . $i);
                $this->assertEquals(0.5, $data['priority'], 'check priority #' . $i);
            }

        }

        $this->assertEquals(
            count($iterator),
            $i,
            'check count'
        );
    }

    public function testWrongPriority()
    {

        \XLite\Core\Database::getRepo('XLite\Model\Config')->createOption(
            array('category' => 'CDev\XMLSitemap', 'name' => 'welcome_priority', 'value' => 'abc')
        );
        $iterator = new \XLite\Module\CDev\XMLSitemap\Logic\SitemapIterator;
        foreach ($iterator as $data) {
            $this->assertEquals('main', $data['loc']['target'], 'check loc target #1');
            $this->assertEquals(0.5, $data['priority'], 'check priority #1');
            break;
        }        

        \XLite\Core\Database::getRepo('XLite\Model\Config')->createOption(
            array('category' => 'CDev\XMLSitemap', 'name' => 'welcome_priority', 'value' => 2)
        );
        $iterator = new \XLite\Module\CDev\XMLSitemap\Logic\SitemapIterator;
        foreach ($iterator as $data) {
            $this->assertEquals('main', $data['loc']['target'], 'check loc target #2');
            $this->assertEquals(0.5, $data['priority'], 'check priority #2');
            break;
        }

        \XLite\Core\Database::getRepo('XLite\Model\Config')->createOption(
            array('category' => 'CDev\XMLSitemap', 'name' => 'welcome_priority', 'value' => -1)
        );
        $iterator = new \XLite\Module\CDev\XMLSitemap\Logic\SitemapIterator;
        foreach ($iterator as $data) {
            $this->assertEquals('main', $data['loc']['target'], 'check loc target #3');
            $this->assertEquals(0.5, $data['priority'], 'check priority #3');
            break;
        }

        \XLite\Core\Database::getRepo('XLite\Model\Config')->createOption(
            array('category' => 'CDev\XMLSitemap', 'name' => 'welcome_priority', 'value' => '0.43')
        );
        \XLite\Core\Config::updateInstance();
        $iterator = new \XLite\Module\CDev\XMLSitemap\Logic\SitemapIterator;
        foreach ($iterator as $data) {
            $this->assertEquals('main', $data['loc']['target'], 'check loc target #4');
            $this->assertEquals(0.4, $data['priority'], 'check priority #4');
            break;
        }

        \XLite\Core\Database::getRepo('XLite\Model\Config')->createOption(
            array('category' => 'CDev\XMLSitemap', 'name' => 'welcome_priority', 'value' => 0.28)
        );
        \XLite\Core\Config::updateInstance();
        $iterator = new \XLite\Module\CDev\XMLSitemap\Logic\SitemapIterator;
        foreach ($iterator as $data) {
            $this->assertEquals('main', $data['loc']['target'], 'check loc target #5');
            $this->assertEquals(0.3, $data['priority'], 'check priority #5');
            break;
        }
    }
}

