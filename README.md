AvroCaseBundle [![Build Status](https://travis-ci.org/jdewit/AvroCaseBundle.png?branch=master)](https://travis-ci.org/jdewit/AvroCaseBundle)
--------------
Convert strings to different case formats.

Supports: camelCase, PascalCase, Title Case, and underscore_case.

Installation
------------
This bundle is listed on packagist.

Simply add it to your apps composer.json file

``` js
    "avro/case-bundle": "0.1.1"
```

Enable the bundle in the kernel:

``` php
// app/AppKernel.php

    new Avro\CaseBundle\AvroCaseBundle
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

You can also convert string in your Twig files using the following filters

``` jinja
    {{ var | camel }}
    {{ var | pascal }}
    {{ var | title }}
    {{ var | underscore }}
```


