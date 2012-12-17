<?php

/**
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Avro\CaseBundle\Tests\Twig\Extension;

use Avro\CaseBundle\Twig\Extension\CaseExtension;

/**
 * Test CaseExtension Class
 *
 * @author Joris de Wit <joris.w.dewit@gmail.com>
 */
class CaseExtensionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers Avro\CaseBundle\Twig\Extension\CaseExtension::getName
     */
    public function testGetName()
    {
        $containerMock = $this->getMock('Avro\CaseBundle\Util\CaseConverter');
        $extension = new CaseExtension($containerMock);
        $this->assertSame('CaseExtension', $extension->getName());
    }

    /**
     * @covers Avro\CaseBundle\Twig\Extension\CaseExtension::getFilters
     */
    public function testGetFilters()
    {
        $converterMock = $this->getMock('Avro\CaseBundle\Util\CaseConverter');
        $extension = new CaseExtension($converterMock);
        $functions = $extension->getFilters();
        $this->assertInstanceOf('\Twig_Filter_Method', $functions['underscore']);
        $this->assertInstanceOf('\Twig_Filter_Method', $functions['pascal']);
        $this->assertInstanceOf('\Twig_Filter_Method', $functions['camel']);
        $this->assertInstanceOf('\Twig_Filter_Method', $functions['title']);
    }
}
