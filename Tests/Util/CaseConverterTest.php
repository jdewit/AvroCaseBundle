<?php

/**
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Avro\CaseBundle\Tests\Util;

use Avro\CaseBundle\Util\CaseConverter;

class CaseConverterTest extends \PHPUnit_Framework_TestCase
{
    private $converter;

    public function setUp()
    {
        $this->converter = new CaseConverter();
    }

    public function testCamelToTitleCase()
    {
        $this->assertEquals(
            'Title Case Format',
            $this->converter->toTitleCase('titleCaseFormat')
        );
    }

    public function testPascalToTitleCase()
    {
        $this->assertEquals(
            'Title Case Format',
            $this->converter->toTitleCase('TitleCaseFormat')
        );
    }

    public function testUnderscoreToTitleCase()
    {
        $this->assertEquals(
            'Title Case Format',
            $this->converter->toTitleCase('title_case_format')
        );
    }

    public function testTitleToCamelCase()
    {
        $this->assertEquals(
            'titleCaseFormat',
            $this->converter->toCamelCase('Title Case Format')
        );
    }

    public function testPascalToCamelCase()
    {
        $this->assertEquals(
            'titleCaseFormat',
            $this->converter->toCamelCase('TitleCaseFormat')
        );
    }

    public function testUnderscoreToCamelCase()
    {
        $this->assertEquals(
            'titleCaseFormat',
            $this->converter->toCamelCase('title_case_format')
        );
    }

    public function testTitleToUnderscoreCase()
    {
        $this->assertEquals(
            'underscore_case_format',
            $this->converter->toUnderscoreCase('Underscore Case Format')
        );
    }

    public function testPascalToUnderscoreCase()
    {
        $this->assertEquals(
            'underscore_case_format',
            $this->converter->toUnderscoreCase('UnderscoreCaseFormat')
        );
    }

    public function testCamelToUnderscoreCase()
    {
        $this->assertEquals(
            'underscore_case_format',
            $this->converter->toUnderscoreCase('underscoreCaseFormat')
        );
    }

    public function testGetFormat()
    {
        $this->assertEquals(
            'underscore',
            $this->converter->getFormat('underscore_case_format')
        );

        $this->assertEquals(
            'camel',
            $this->converter->getFormat('camelCaseFormat')
        );

        $this->assertEquals(
            'pascal',
            $this->converter->getFormat('PascalCaseFormat')
        );

        $this->assertEquals(
            'title',
            $this->converter->getFormat('Title Case Format')
        );
    }


}

