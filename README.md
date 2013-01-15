AvroCaseBundle [![Build Status](https://travis-ci.org/jdewit/AvroCaseBundle.png?branch=master)](https://travis-ci.org/jdewit/AvroCaseBundle)
--------------
Convert strings or an array of strings to different case formats.

Supports: camelCase, PascalCase, Title Case, and underscore_case.

Installation
------------
This bundle is listed on packagist.

Simply add it to your apps composer.json file

``` js
    "avro/case-bundle": "0.1.2"
```

Enable the bundle in the kernel:

``` php
// app/AppKernel.php

    new Avro\CaseBundle\AvroCaseBundle
```

Configuration
-------------
``` yaml
avro_case:
    use_twig: false #disable the twig extension (true by default)
```

Usage
-----
``` php
$converter = $this->container->get('avro_case.converter');

$camelCaseFormat = $converter->toCamelCase($str);
$pascalCaseFormat = $converter->toPascalCase($str);
$titleCaseFormat = $converter->toTitleCase($str);
$underscoreCaseFormat = $converter->toUnderscoreCase($str);
```

The following filters are also available if you use Twig

``` jinja
    {{ var | camel }}
    {{ var | pascal }}
    {{ var | title }}
    {{ var | underscore }}
```


