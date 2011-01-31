<?php
/**
 * This file is part of PHP_PMD.
 *
 * PHP Version 5
 *
 * Copyright (c) 2009-2010, Manuel Pichler <mapi@phpmd.org>.
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions
 * are met:
 *
 *   * Redistributions of source code must retain the above copyright
 *     notice, this list of conditions and the following disclaimer.
 *
 *   * Redistributions in binary form must reproduce the above copyright
 *     notice, this list of conditions and the following disclaimer in
 *     the documentation and/or other materials provided with the
 *     distribution.
 *
 *   * Neither the name of Manuel Pichler nor the names of his
 *     contributors may be used to endorse or promote products derived
 *     from this software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS
 * FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 * COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT,
 * INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING,
 * BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER
 * CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT
 * LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN
 * ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @category   PHP
 * @package    PHP_PMD
 * @subpackage Rule_Design
 * @author     Manuel Pichler <mapi@phpmd.org>
 * @copyright  2009-2010 Manuel Pichler. All rights reserved.
 * @license    http://www.opensource.org/licenses/bsd-license.php  BSD License
 * @version    SVN: $Id$
 * @link       http://phpmd.org
 */

require_once dirname(__FILE__) . '/../../AbstractTest.php';

require_once 'PHP/PMD/Rule/Design/ExitExpression.php';

/**
 * Test case for the {@link PHP_PMD_Rule_Design_ExitExpression} class.
 *
 * @category   PHP
 * @package    PHP_PMD
 * @subpackage Rule_Design
 * @author     Manuel Pichler <mapi@phpmd.org>
 * @copyright  2009-2010 Manuel Pichler. All rights reserved.
 * @license    http://www.opensource.org/licenses/bsd-license.php  BSD License
 * @version    Release: @package_version@
 * @link       http://phpmd.org
 */
class PHP_PMD_Rule_Design_ExitExpressionTest extends PHP_PMD_AbstractTest
{
    /**
     * testRuleNotAppliesToMethodWithoutExitExpression
     *
     * @covers PHP_PMD_Rule_Design_ExitExpression
     * @group phpmd
     * @group phpmd::rule
     * @group phpmd::rule::design
     * @group unittest
     */
    public function testRuleNotAppliesToMethodWithoutExitExpression()
    {
        $rule = new PHP_PMD_Rule_Design_ExitExpression();
        $rule->setReport($this->getReportMock(0));
        $rule->apply($this->getMethod());
    }

    /**
     * testRuleAppliesToMethodWithExitExpression
     *
     * @covers PHP_PMD_Rule_Design_ExitExpression
     * @group phpmd
     * @group phpmd::rule
     * @group phpmd::rule::design
     * @group unittest
     */
    public function testRuleAppliesToMethodWithExitExpression()
    {
        $rule = new PHP_PMD_Rule_Design_ExitExpression();
        $rule->setReport($this->getReportMock(1));
        $rule->apply($this->getMethod());
    }

    /**
     * testRuleAppliesMultipleTimesToMethodWithExitExpression
     *
     * @covers PHP_PMD_Rule_Design_ExitExpression
     * @group phpmd
     * @group phpmd::rule
     * @group phpmd::rule::design
     * @group unittest
     */
    public function testRuleAppliesMultipleTimesToMethodWithExitExpression()
    {
        $rule = new PHP_PMD_Rule_Design_ExitExpression();
        $rule->setReport($this->getReportMock(3));
        $rule->apply($this->getMethod());
    }

    /**
     * testRuleNotAppliesToFunctionWithoutExitExpression
     *
     * @covers PHP_PMD_Rule_Design_ExitExpression
     * @group phpmd
     * @group phpmd::rule
     * @group phpmd::rule::design
     * @group unittest
     */
    public function testRuleNotAppliesToFunctionWithoutExitExpression()
    {
        $rule = new PHP_PMD_Rule_Design_ExitExpression();
        $rule->setReport($this->getReportMock(0));
        $rule->apply($this->getFunction());
    }

    /**
     * testRuleAppliesToFunctionWithExitExpression
     *
     * @covers PHP_PMD_Rule_Design_ExitExpression
     * @group phpmd
     * @group phpmd::rule
     * @group phpmd::rule::design
     * @group unittest
     */
    public function testRuleAppliesToFunctionWithExitExpression()
    {
        $rule = new PHP_PMD_Rule_Design_ExitExpression();
        $rule->setReport($this->getReportMock(1));
        $rule->apply($this->getFunction());
    }

    /**
     * testRuleAppliesMultipleTimesToFunctionWithExitExpression
     *
     * @covers PHP_PMD_Rule_Design_ExitExpression
     * @group phpmd
     * @group phpmd::rule
     * @group phpmd::rule::design
     * @group unittest
     */
    public function testRuleAppliesMultipleTimesToFunctionWithExitExpression()
    {
        $rule = new PHP_PMD_Rule_Design_ExitExpression();
        $rule->setReport($this->getReportMock(3));
        $rule->apply($this->getFunction());
    }
}