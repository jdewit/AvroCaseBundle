AvroCaseBundle [![Build Status](https://travis-ci.org/jdewit/AvroCaseBundle.png?branch=master)](https://travis-ci.org/jdewit/AvroCaseBundle)
--------------
Convert strings or an array of strings to different case formats.

Supports: camelCase, PascalCase, Title Case, and underscore_case.

Installation
------------
This bundle is listed on packagist.

Simply add it to your apps composer.json file

```json
    "avro/case-bundle": "0.1.2"
```

Enable the bundle in config/bundles.php:

```php
    Avro\CaseBundle\AvroCaseBundle::class => ['all' => true],
```

Configuration
-------------

*Optional:* Add this config

```yaml
# config/packages/avro_case.yaml
avro_case:
    use_twig: false #disable the twig extension (true by default)
```

Usage
-----
```php
use Avro\CaseBundle\Util\CaseConverter;

class SomeClass
{
    private $caseConverter;

    /**
     * @param CaseConverter $caseConverter
     */
    public function __construct(CaseConverter $caseConverter)
    {
        $this->caseConverter = $caseConverter;
    }

    /**
     * @param string $str
     */
    public function foo(string $str)
    {
        $camelCaseFormat = $this->converter->toCamelCase($str);
        $pascalCaseFormat = $this->converter->toPascalCase($str);
        $titleCaseFormat = $this->converter->toTitleCase($str);
        $underscoreCaseFormat = $this->converter->toUnderscoreCase($str);
    }
}
```

The following filters are also available if you use Twig

```twig
    {{ var | camel }}
    {{ var | pascal }}
    {{ var | title }}
    {{ var | underscore }}
```


