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

    public function testLcTitleToTitleCase()
    {
        $this->assertEquals(
            'Title Case Format',
            $this->converter->toTitleCase('title case format')
        );
    }

    public function testTitleToTitleCase()
    {
        $this->assertEquals(
            'Title Case Format',
            $this->converter->toTitleCase('Title Case Format')
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

    public function testwordsToCamelCase()
    {
        $this->assertEquals(
            'titleCaseFormat',
            $this->converter->toCamelCase('title case format')
        );
    }


    public function testTitleToPascalCase()
    {
        $this->assertEquals(
            'PascalCaseFormat',
            $this->converter->toPascalCase('Pascal Case Format')
        );
    }

    public function testCamelToPascalCase()
    {
        $this->assertEquals(
            'PascalCaseFormat',
            $this->converter->toPascalCase('pascalCaseFormat')
        );
    }

    public function testUnderscoreToPascalCase()
    {
        $this->assertEquals(
            'PascalCaseFormat',
            $this->converter->toPascalCase('pascal_case_format')
        );
    }

    public function testWordsToPascalCase()
    {
        $this->assertEquals(
            'PascalCaseFormat',
            $this->converter->toPascalCase('pascal case format')
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

    public function testConvert()
    {
        $this->assertEquals(
            'underscore_case_format',
            $this->converter->convert('underscoreCaseFormat', 'underscore')
        );
        $this->assertEquals(
            'camelCaseFormat',
            $this->converter->convert('camel Case Format', 'camel')
        );
        $this->assertEquals(
            'PascalCaseFormat',
            $this->converter->convert('pascal_case_format', 'pascal')
        );
        $this->assertEquals(
            'Title Case Format',
            $this->converter->convert('title case format', 'title')
        );
    }

    public function testArrayArguments()
    {
        $this->assertEquals(
            array(
                'underscore_case_format1',
                'underscore_case_format1',
            ),
            $this->converter->convert(array(
                'underscoreCaseFormat1',
                'underscoreCaseFormat1',
            ), 'underscore')
        );
        $this->assertEquals(
            array(
                'camelCaseFormat1',
                'camelCaseFormat2',
            ),
            $this->converter->convert(array(
                'camel Case Format1',
                'camel Case Format2',
            ), 'camel')
        );
        $this->assertEquals(
            array(
                'PascalCaseFormat1',
                'PascalCaseFormat2',
            ),
            $this->converter->convert(array(
                'pascal_case_format1',
                'pascal_case_format2',
            ), 'pascal')
        );
        $this->assertEquals(array(
                'Title Case Format1',
                'Title Case Format2',
            ),
            $this->converter->convert(array(
                'title case format1',
                'title case format2',
            ), 'title')
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

