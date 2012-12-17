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
    protected $converter;
    protected $extension;

    public function setup()
    {
        $this->converter = $this->getMock('Avro\CaseBundle\Util\CaseConverter');
        $this->extension = new CaseExtension($this->converter);
    }

    /**
     * @covers Avro\CaseBundle\Twig\Extension\CaseExtension::getName
     */
    public function testGetName()
    {
        $this->assertSame('CaseExtension', $this->extension->getName());
    }

    /**
     * @covers Avro\CaseBundle\Twig\Extension\CaseExtension::getFilters
     */
    public function testGetFilters()
    {
        $functions = $this->extension->getFilters();
        $this->assertInstanceOf('\Twig_Filter_Method', $functions['underscore']);
        $this->assertInstanceOf('\Twig_Filter_Method', $functions['pascal']);
        $this->assertInstanceOf('\Twig_Filter_Method', $functions['camel']);
        $this->assertInstanceOf('\Twig_Filter_Method', $functions['title']);
    }

    public function testCamelCase()
    {
        $this->converter->expects($this->any())
                        ->method('toCamelCase')
                        ->will($this->returnValue('camelCase'));
        $this->assertEquals(
            'camelCase',
            $this->extension->toCamelCase('camel case')
        );
    }

    public function testPascalCase()
    {
        $this->converter->expects($this->any())
                        ->method('toPascalCase')
                        ->will($this->returnValue('PascalCase'));
        $this->assertEquals(
            'PascalCase',
            $this->extension->toPascalCase('pascal_case')
        );
    }

    public function testTitleCase()
    {
        $this->converter->expects($this->any())
                        ->method('toTitleCase')
                        ->will($this->returnValue('Title Case'));
        $this->assertEquals(
            'Title Case',
            $this->extension->toTitleCase('title_case')
        );
    }

    public function testUnderscoreCase()
    {
        $this->converter->expects($this->any())
                        ->method('toUnderscoreCase')
                        ->will($this->returnValue('underscore_case'));
        $this->assertEquals(
            'underscore_case',
            $this->extension->toUnderscoreCase('underscore case')
        );
    }

}
