<?php

/*
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Avro\CaseBundle\Tests\Util;

use Avro\CaseBundle\Util\CaseConverter;
use PHPUnit_Framework_TestCase;

class CaseConverterTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var CaseConverter
     */
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

    public function testArrayArguments(): void
    {
        $this->assertEquals(
            [
                'foo' => 'Title Case Format1',
                'bar' => [
                    'Title Case Format2',
                    'Title Case Format3',
                ],
                'baz' => 'Title Case Format4',
            ],
            $this->converter->convert(
                [
                    'foo' => 'Title Case Format1',
                    'bar' => [
                        'title_case_format2',
                        'title case format3',
                    ],
                    'baz' => 'titleCaseFormat4',
                ],
                'title'
            )
        );
        $this->assertEquals(
            [
                'foo' => 'underscore_case_format1',
                'bar' => [
                    'underscore_case_format2',
                    'underscore_case_format3',
                ],
            ],
            $this->converter->convert(
                [
                    'foo' => 'underscoreCaseFormat1',
                    'bar' => [
                        'underscore_case_format2',
                        'Underscore Case Format3',
                    ],
                ],
                'underscore'
            )
        );
        $this->assertEquals(
            [
                'foo' => 'camelCaseFormat1',
                'bar' => [
                    'camelCaseFormat2',
                    'camelCaseFormat3',
                ],
            ],
            $this->converter->convert(
                [
                    'foo' => 'camelCaseFormat1',
                    'bar' => [
                        'camel_case_format2',
                        'camel Case Format3',
                    ],
                ],
                'camel'
            )
        );
        $this->assertEquals(
            [
                'foo' => 'PascalCaseFormat1',
                'bar' => [
                    'PascalCaseFormat2',
                    'PascalCaseFormat3',
                ],
                'baz' => 'PascalCaseFormat4',
            ],
            $this->converter->convert(
                [
                    'foo' => 'PascalCaseFormat1',
                    'bar' => [
                        'pascal_case_format2',
                        'pascal case format3',
                    ],
                    'baz' => 'Pascal Case Format4',
                ],
                'pascal'
            )
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
